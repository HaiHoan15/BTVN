<?php

class AccountModel
{
    private $conn;
    private $table_name = "account";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Tạo tài khoản mới
    public function register($username, $phone, $address, $password)
    {
        $query = "INSERT INTO " . $this->table_name . "
                  (username, phone, address, password, role)
                  VALUES (:username, :phone, :address, :password, 'user')";

        $stmt = $this->conn->prepare($query);

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":phone", $phone);
        $stmt->bindParam(":address", $address);
        $stmt->bindParam(":password", $hashedPassword);

        return $stmt->execute();
    }

    // Tìm user theo username
    public function findByUsername($username)
    {
        $query = "SELECT * FROM " . $this->table_name . " 
                  WHERE username = :username LIMIT 1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_OBJ);
    }
}