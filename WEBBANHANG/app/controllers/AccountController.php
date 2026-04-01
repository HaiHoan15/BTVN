<?php
require_once 'app/config/database.php';
require_once 'app/models/AccountModel.php';
require_once 'app/helpers/SessionHelper.php';
require_once 'app/helpers/JwtHandler.php';

class AccountController
{
    private $accountModel;
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
        $this->accountModel = new AccountModel($this->db);
    }

    // Hiển thị form đăng ký
    public function register()
    {
        include 'app/views/account/register.php';
    }

    // Xử lý đăng ký 
    public function store()
    {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['phone'] ?? null;
        $address = $_POST['address'] ?? null;
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirm_password'];

        if ($password !== $confirmPassword) {
            header("Location: /webbanhang/Account/register?error=password");
            exit();
        }

        if ($this->accountModel->usernameExists($username)) {
            header("Location: /webbanhang/Account/register?error=username");
            exit();
        }

        if ($this->accountModel->emailExists($email)) {
            header("Location: /webbanhang/Account/register?error=email");
            exit();
        }

        $this->accountModel->register(
            $username,
            $email,
            $phone,
            $address,
            $password
        );

        header("Location: /webbanhang/Account/login?register=success");
        exit();
    }

    // Hiển thị form login
    public function login()
    {
        include 'app/views/account/login.php';
    }

    // Xử lý login
    public function authenticate()
    {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $user = $this->accountModel->findByEmail($email);

        if (!$user || !password_verify($password, $user->password)) {
            header("Location: /webbanhang/Account/login?error=invalid");
            exit();
        }

        // tạo token
        require_once 'app/helpers/JwtHandler.php';
        $jwt = new JwtHandler();
        $token = $jwt->generateToken([
            "id" => $user->id,
            "email" => $user->email
        ]);

        //  LƯU TOKEN VÀO SESSION
        $_SESSION['token'] = $token;

        // login như cũ
        SessionHelper::login($user);

        // redirect về trang chủ
        header("Location: /webbanhang/?login=success");
        exit();
    }
    // Logout
    public function logout()
    {
        SessionHelper::logout();
        header("Location: /webbanhang/");
        exit();
    }
    public function manage()
    {
        require_once 'app/helpers/SessionHelper.php';
        SessionHelper::requireAdmin();

        $query = "SELECT * FROM account ORDER BY id DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        $accounts = $stmt->fetchAll(PDO::FETCH_OBJ);

        include 'app/views/account/manage.php';
    }

    public function changeRole($id)
    {
        require_once 'app/helpers/SessionHelper.php';
        SessionHelper::requireAdmin();

        // Không cho admin tự đổi role của chính mình
        if ($id == SessionHelper::user()['id']) {
            header("Location: /webbanhang/Account/manage");
            exit();
        }

        $query = "UPDATE account 
              SET role = CASE 
                    WHEN role = 'user' THEN 'admin'
                    ELSE 'user'
              END
              WHERE id = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        header("Location: /webbanhang/Account/manage");
        exit();
    }
    public function delete($id)
    {
        require_once 'app/helpers/SessionHelper.php';
        SessionHelper::requireAdmin();

        // Không cho admin tự xóa chính mình
        if ($id == SessionHelper::user()['id']) {
            header("Location: /webbanhang/Account/manage");
            exit();
        }

        $query = "DELETE FROM account WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        header("Location: /webbanhang/Account/manage");
        exit();
    }

    public function index()
    {
        if (!SessionHelper::isLoggedIn()) {
            header("Location: /webbanhang/Account/login");
            exit();
        }

        $user = SessionHelper::user();
        $account = $this->accountModel->getById($user['id']);

        // nếu submit form
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $username = $_POST['username'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];

            $password = $_POST['password'] ?? null;
            $confirm = $_POST['confirm_password'] ?? null;

            $avatar = null;

            // kiểm tra username trùng
            if ($this->accountModel->usernameExists($username, $account->id)) {
                die("Username đã tồn tại");
            }

            // kiểm tra confirm password
            if (!empty($password)) {

                if ($password !== $confirm) {
                    die("Mật khẩu xác nhận không đúng");
                }
            }

            // upload avatar
            if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] == 0) {

                $avatar = file_get_contents($_FILES['avatar']['tmp_name']);
            }

            $this->accountModel->updateAccount(
                $account->id,
                $username,
                $phone,
                $address,
                $password,
                $avatar
            );

            $_SESSION['username'] = $username;

            header("Location: /webbanhang/Account/index");
            exit();
        }

        include 'app/views/account/index.php';
    }
    public function checkUsername()
    {
        if (!isset($_GET['username'])) {
            echo json_encode(['exists' => false]);
            exit();
        }

        $username = $_GET['username'];

        $query = "SELECT id FROM account WHERE username = :username LIMIT 1";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->execute();

        echo json_encode([
            'exists' => $stmt->rowCount() > 0
        ]);
        exit();
    }
    public function checkApi()
    {
        $data = json_decode(file_get_contents("php://input"), true);

        $email = $data['email'] ?? '';
        $password = $data['password'] ?? '';

        $user = $this->accountModel->findByEmail($email);

        if (!$user || !password_verify($password, $user->password)) {
            echo json_encode([
                "message" => "Sai tài khoản hoặc mật khẩu"
            ], JSON_UNESCAPED_UNICODE);
            return;
        }

        require_once 'app/helpers/JwtHandler.php';

        $jwt = new JwtHandler();
        $token = $jwt->generateToken([
            "id" => $user->id,
            "email" => $user->email
        ]);

        echo json_encode([
            "message" => "Đăng nhập thành công",
            "token" => $token
        ], JSON_UNESCAPED_UNICODE);
    }
}