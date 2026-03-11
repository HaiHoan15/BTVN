<?php

class AccountModel
{
    private $conn;
    private $table_name = "account";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // ===============================
    // ĐĂNG KÝ TÀI KHOẢN
    // ===============================
    public function register($username, $email, $phone, $address, $password)
    {
        $query = "INSERT INTO " . $this->table_name . "
                  (username, email, phone, address, password, role)
                  VALUES (:username, :email, :phone, :address, :password, 'user')";

        $stmt = $this->conn->prepare($query);

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":phone", $phone);
        $stmt->bindParam(":address", $address);
        $stmt->bindParam(":password", $hashedPassword);

        return $stmt->execute();
    }

    // ===============================
    // LOGIN BẰNG EMAIL
    // ===============================
    public function findByEmail($email)
    {
        $query = "SELECT * FROM " . $this->table_name . " 
                  WHERE email = :email LIMIT 1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    // ===============================
    // KIỂM TRA USERNAME TRÙNG
    // ===============================
    public function usernameExists($username, $currentId = null)
    {
        if ($currentId) {

            $query = "SELECT id FROM " . $this->table_name . "
                      WHERE username = :username AND id != :id";

            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":id", $currentId);

        } else {

            $query = "SELECT id FROM " . $this->table_name . "
                      WHERE username = :username";

            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":username", $username);
        }

        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

    // ===============================
    // KIỂM TRA EMAIL TRÙNG
    // ===============================
    public function emailExists($email)
    {
        $query = "SELECT id FROM " . $this->table_name . "
                  WHERE email = :email";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }

    // ===============================
    // LẤY ACCOUNT THEO ID
    // ===============================
    public function getById($id)
    {
        $query = "SELECT * FROM " . $this->table_name . " 
                  WHERE id = :id LIMIT 1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    // ===============================
    // UPDATE PROFILE
    // ===============================
    public function updateAccount($id, $username, $phone, $address, $password = null, $avatar = null)
    {

        if ($password) {

            $query = "UPDATE account SET
                        username = :username,
                        phone = :phone,
                        address = :address,
                        password = :password,
                        avatar = :avatar
                      WHERE id = :id";

        } else {

            $query = "UPDATE account SET
                        username = :username,
                        phone = :phone,
                        address = :address,
                        avatar = :avatar
                      WHERE id = :id";
        }

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":phone", $phone);
        $stmt->bindParam(":address", $address);

        if ($password) {
            $password = password_hash($password, PASSWORD_BCRYPT);
            $stmt->bindParam(":password", $password);
        }

        if ($avatar) {
            $stmt->bindParam(":avatar", $avatar, PDO::PARAM_LOB);
        }

        $stmt->bindParam(":id", $id);

        return $stmt->execute();
    }
}