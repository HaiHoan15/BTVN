<?php
require_once('app/config/database.php');
require_once('app/models/ProductModel.php');
require_once 'app/helpers/JwtHandler.php';

class ProductApiController
{
    private $productModel;
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
        $this->productModel = new ProductModel($this->db);

        // trả về JSON
        header('Content-Type: application/json; charset=utf-8');
        
        // Start output buffering if not started
        if (!ob_get_level()) {
            ob_start();
        }
        
        // Log what's happening
        error_log("ProductApiController constructed. Buffer level: " . ob_get_level());
    }

    // GET: /api/product
    public function index()
    {
        $this->checkAuth(); //kiểm tra token

        // Clean all output buffers
        while (ob_get_level()) {
            ob_end_clean();
        }

        // Stop here to prevent further output
        $products = $this->productModel->getAllProducts();
        
        // Return JSON only
        http_response_code(200);
        echo json_encode([
            "success" => true,
            "data" => $products
        ], JSON_UNESCAPED_UNICODE);
        
        // Prevent any further output
        exit;
        // echo json_encode([
        //     "data" => $products
        // ], JSON_UNESCAPED_UNICODE);
    }

    // GET: /api/product/show/{id}
    public function show($id)
    {
        $this->checkAuth();

        $product = $this->productModel->getProductById($id);

        if ($product) {
            echo json_encode($product, JSON_UNESCAPED_UNICODE);
        } else {
            echo json_encode(["message" => "Không tìm thấy sản phẩm"], JSON_UNESCAPED_UNICODE);
        }
        exit;
    }
    // POST: /api/product/store
    public function store()
    {
        $this->checkAuth();
        // lấy dữ liệu JSON từ body
        $data = json_decode(file_get_contents("php://input"), true);

        // kiểm tra dữ liệu
        if (!$data) {
            echo json_encode(["message" => "Dữ liệu không hợp lệ"]);
            return;
        }

        // gọi model
        $result = $this->productModel->addProduct(
            $data['name'] ?? '',
            $data['material'] ?? '',
            $data['size'] ?? '',
            $data['color'] ?? '',
            $data['price'] ?? 0,
            $data['description'] ?? '',
            $data['image'] ?? null,
            $data['category_id'] ?? null
        );

        if ($result) {
            echo json_encode(["message" => "Thêm sản phẩm thành công"], JSON_UNESCAPED_UNICODE);
        } else {
            echo json_encode(["message" => "Thêm thất bại"], JSON_UNESCAPED_UNICODE);
        }
    }
    // PUT: /api/product/update/{id}
    public function update($id)
    {
        $this->checkAuth();

        $data = json_decode(file_get_contents("php://input"), true);

        if (!$data) {
            echo json_encode(["message" => "Dữ liệu không hợp lệ"]);
            return;
        }

        $result = $this->productModel->updateProduct(
            $id,
            $data['name'] ?? '',
            $data['material'] ?? '',
            $data['size'] ?? '',
            $data['color'] ?? '',
            $data['price'] ?? 0,
            $data['description'] ?? '',
            $data['image'] ?? null,
            $data['category_id'] ?? null
        );

        if ($result) {
            echo json_encode(["message" => "Cập nhật thành công"], JSON_UNESCAPED_UNICODE);
        } else {
            echo json_encode(["message" => "Cập nhật thất bại"], JSON_UNESCAPED_UNICODE);
        }
    }
    // DELETE: /api/product/delete/{id}
    public function delete($id)
    {
        $this->checkAuth();

        $result = $this->productModel->deleteProduct($id);

        if ($result) {
            echo json_encode(["message" => "Xóa thành công"], JSON_UNESCAPED_UNICODE);
        } else {
            echo json_encode(["message" => "Xóa thất bại"], JSON_UNESCAPED_UNICODE);
        }
    }
    // Hàm kiểm tra token
    private function checkAuth()
    {
        $token = null;

        // Ưu tiên lấy từ header (Postman)
        $headers = getallheaders();
        if (isset($headers['Authorization'])) {
            $authHeader = $headers['Authorization'];
            $token = str_replace("Bearer ", "", $authHeader);
        }

        // Nếu không có thì lấy từ session
        if (!$token && isset($_SESSION['token'])) {
            $token = $_SESSION['token'];
        }

        if (!$token) {
            echo json_encode(["message" => "Thiếu token"], JSON_UNESCAPED_UNICODE);
            exit();
        }

        $jwt = new JwtHandler();
        $decoded = $jwt->validateToken($token);

        if (!$decoded) {
            echo json_encode(["message" => "Token không hợp lệ"], JSON_UNESCAPED_UNICODE);
            exit();
        }

        return $decoded;
    }
}