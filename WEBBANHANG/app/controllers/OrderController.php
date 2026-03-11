<?php
require_once 'app/config/database.php';
require_once 'app/helpers/SessionHelper.php';

class OrderController
{
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
    }

    public function index()
    {
        $query = "SELECT * FROM orders ORDER BY id DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $orders = $stmt->fetchAll(PDO::FETCH_OBJ);

        include 'app/views/order/index.php';
    }
    public function checkout()
    {
        if (!SessionHelper::isLoggedIn()) {
            header("Location: /webbanhang/Account/login");
            exit();
        }

        $cart = $_SESSION['cart'] ?? [];

        // nếu giỏ hàng trống thì quay lại cart
        if (empty($cart)) {
            header("Location: /webbanhang/Cart");
            exit();
        }

        $user = SessionHelper::user();

        // lấy thông tin account
        require_once 'app/models/AccountModel.php';
        $accountModel = new AccountModel($this->db);
        $account = $accountModel->getById($user['id']);

        // tính tổng tiền
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        include 'app/views/order/checkout.php';
    }
    public function store()
    {
        $cart = $_SESSION['cart'] ?? [];


        if (empty($cart)) {
            header("Location: /webbanhang/Cart");
            exit();
        }

        // Tính tổng tiền
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        if ($total < 1000) {
            die("MoMo sandbox yêu cầu số tiền >= 1000");
        }

        $paymentMethod = $_POST['payment_method'];

        // Nếu COD thì tạo order ngay
        if ($paymentMethod === 'cod') {

            $accountId = SessionHelper::user()['id'];

            $query = "INSERT INTO orders
    (account_id, customer_name, phone, address, note, total_amount, status, payment_method, payment_status)
    VALUES (:account_id, :name, :phone, :address, :note, :total, 'pending', 'cod', 'unpaid')";

            $stmt = $this->db->prepare($query);
            $stmt->bindParam(":account_id", $accountId);
            $stmt->bindParam(":name", $_POST['customer_name']);
            $stmt->bindParam(":phone", $_POST['phone']);
            $stmt->bindParam(":address", $_POST['address']);
            $stmt->bindParam(":note", $_POST['note']);
            $stmt->bindParam(":total", $total);
            $stmt->execute();

            $orderId = $this->db->lastInsertId();

            foreach ($cart as $item) {

                $detailQuery = "INSERT INTO order_details
        (order_id, product_id, quantity, price)
        VALUES (:order_id, :product_id, :quantity, :price)";

                $detailStmt = $this->db->prepare($detailQuery);
                $detailStmt->bindParam(":order_id", $orderId);
                $detailStmt->bindParam(":product_id", $item['id']);
                $detailStmt->bindParam(":quantity", $item['quantity']);
                $detailStmt->bindParam(":price", $item['price']);
                $detailStmt->execute();
            }

            unset($_SESSION['cart']);

            header("Location: /webbanhang/Order/myOrders");
            exit();
        }

        // Lưu dữ liệu tạm để tạo order sau khi thanh toán
        $_SESSION['pending_order'] = [
            "cart" => $cart,
            "customer_name" => $_POST['customer_name'],
            "phone" => $_POST['phone'],
            "address" => $_POST['address'],
            "note" => $_POST['note'],
            "total" => $total
        ];

        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";

        $partnerCode = "MOMOBKUN20180529";
        $accessKey = "klm05TvNBzhg7h7j";
        $secretKey = "at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa";

        $requestId = time() . "";
        $orderIdStr = "MOMO_" . time();
        $amount = (string) $total;
        $orderInfo = "Thanh toán đơn hàng MoMo";

        $redirectUrl = "http://localhost/webbanhang/Order/momoReturn";
        $ipnUrl = "http://localhost/webbanhang/Order/momoReturn";

        $requestType = "payWithATM";
        $extraData = "";

        $rawHash =
            "accessKey=" . $accessKey .
            "&amount=" . $amount .
            "&extraData=" . $extraData .
            "&ipnUrl=" . $ipnUrl .
            "&orderId=" . $orderIdStr .
            "&orderInfo=" . $orderInfo .
            "&partnerCode=" . $partnerCode .
            "&redirectUrl=" . $redirectUrl .
            "&requestId=" . $requestId .
            "&requestType=" . $requestType;

        $signature = hash_hmac("sha256", $rawHash, $secretKey);

        $data = [
            "partnerCode" => $partnerCode,
            "partnerName" => "Test",
            "storeId" => "MomoTestStore",
            "requestId" => $requestId,
            "amount" => $amount,
            "orderId" => $orderIdStr,
            "orderInfo" => $orderInfo,
            "redirectUrl" => $redirectUrl,
            "ipnUrl" => $ipnUrl,
            "lang" => "vi",
            "requestType" => $requestType,
            "autoCapture" => true,
            "extraData" => $extraData,
            "signature" => $signature
        ];

        $result = $this->execPostRequest($endpoint, json_encode($data));
        $jsonResult = json_decode($result, true);

        if (isset($jsonResult['payUrl'])) {
            header("Location: " . $jsonResult['payUrl']);
            exit();
        } else {
            echo "<pre>";
            print_r($jsonResult);
            echo "</pre>";
            die("MoMo API error");
        }
    }

    public function show($id)
    {
        $query = "SELECT * FROM orders WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $order = $stmt->fetch(PDO::FETCH_OBJ);

        $detailQuery = "SELECT od.*, p.name
                    FROM order_details od
                    JOIN product p ON od.product_id = p.id
                    WHERE od.order_id = :id";

        $detailStmt = $this->db->prepare($detailQuery);
        $detailStmt->bindParam(":id", $id);
        $detailStmt->execute();
        $details = $detailStmt->fetchAll(PDO::FETCH_OBJ);

        include 'app/views/order/show.php';
    }

    public function delete($id)
    {
        $query = "DELETE FROM orders WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        header("Location: /webbanhang/Order");
        exit();
    }

    public function updateStatus()
    {
        if (isset($_POST['id']) && isset($_POST['status'])) {

            $query = "UPDATE orders SET status = :status WHERE id = :id";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(":status", $_POST['status']);
            $stmt->bindParam(":id", $_POST['id']);
            $stmt->execute();

            echo json_encode(['status' => 'success']);
            exit();
        }

        echo json_encode(['status' => 'error']);
        exit();
    }
    public function myOrders()
    {
        require_once 'app/helpers/SessionHelper.php';

        $accountId = SessionHelper::user()['id'];

        $query = "SELECT * FROM orders 
              WHERE account_id = :account_id
              ORDER BY id DESC";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":account_id", $accountId);
        $stmt->execute();

        $orders = $stmt->fetchAll(PDO::FETCH_OBJ);

        include 'app/views/order/my_orders.php';
    }
    private function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data)
        ]);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);

        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }
    public function momoReturn()
    {
        if (!isset($_GET['resultCode']) || $_GET['resultCode'] != 0) {
            header("Location: /webbanhang/Cart");
            exit();
        }

        if (!isset($_SESSION['pending_order'])) {
            header("Location: /webbanhang");
            exit();
        }

        $data = $_SESSION['pending_order'];
        $cart = $data['cart'];
        $accountId = SessionHelper::user()['id'];

        // tạo order
        $query = "INSERT INTO orders
(account_id, customer_name, phone, address, note, total_amount, status, payment_method, payment_status)
VALUES (:account_id, :name, :phone, :address, :note, :total, 'confirmed', 'momo', 'paid')";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(":account_id", $accountId);
        $stmt->bindValue(":name", $data['customer_name']);
        $stmt->bindValue(":phone", $data['phone']);
        $stmt->bindValue(":address", $data['address']);
        $stmt->bindValue(":note", $data['note']);
        $stmt->bindValue(":total", $data['total']);

        $stmt->execute();

        $orderId = $this->db->lastInsertId();

        // tạo order details
        foreach ($cart as $item) {

            $detailQuery = "INSERT INTO order_details
    (order_id, product_id, quantity, price)
    VALUES (:order_id, :product_id, :quantity, :price)";

            $detailStmt = $this->db->prepare($detailQuery);

            $detailStmt->bindValue(":order_id", $orderId);
            $detailStmt->bindValue(":product_id", $item['id']);
            $detailStmt->bindValue(":quantity", $item['quantity']);
            $detailStmt->bindValue(":price", $item['price']);

            $detailStmt->execute();
        }

        // xóa cart và pending order
        unset($_SESSION['cart']);
        unset($_SESSION['pending_order']);

        header("Location: /webbanhang/Order/myOrders");
        exit();

    }

    public function momoIPN()
    {
        $data = json_decode(file_get_contents("php://input"), true);

        if ($data['resultCode'] == 0) {

            $orderIdMomo = $data['orderId'];
            $orderId = explode("_", $orderIdMomo)[0];

            $query = "UPDATE orders 
                  SET payment_status = 'paid', status = 'confirmed'
                  WHERE id = :id AND payment_status = 'unpaid'";

            $stmt = $this->db->prepare($query);
            $stmt->bindParam(":id", $orderId);
            $stmt->execute();
        }

        echo json_encode(["status" => "ok"]);
    }
}