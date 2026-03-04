<?php
require_once 'app/config/database.php';
require_once 'app/models/AccountModel.php';
require_once 'app/helpers/SessionHelper.php';

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
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirm_password'];

        if ($password !== $confirmPassword) {
            die("Mật khẩu xác nhận không khớp.");
        }

        if ($this->accountModel->findByUsername($username)) {
            die("Tên tài khoản đã tồn tại.");
        }

        $this->accountModel->register($username, $phone, $address, $password);

        header("Location: /webbanhang/Account/login");
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
        $username = $_POST['username'];
        $password = $_POST['password'];

        $user = $this->accountModel->findByUsername($username);

        if (!$user || !password_verify($password, $user->password)) {
            die("Sai tài khoản hoặc mật khẩu.");
        }

        SessionHelper::login($user);

        header("Location: /webbanhang/");
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
}