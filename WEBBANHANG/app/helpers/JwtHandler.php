<?php
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JwtHandler
{
    private $secret_key = "my_super_secret_key_1234567890_abcdef";
    private $issuer = "localhost";

    // Tạo token
    public function generateToken($data)
    {
        $payload = [
            "iss" => $this->issuer,
            "iat" => time(),
            "exp" => time() + 3600, // 1 giờ
            "data" => $data
        ];

        return JWT::encode($payload, $this->secret_key, 'HS256');
    }

    // Xác thực token
    public function validateToken($token)
    {
        try {
            return JWT::decode($token, new Key($this->secret_key, 'HS256'));
        } catch (Exception $e) {
            return null;
        }
    }
}