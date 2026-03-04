<?php

class SessionHelper
{
    public static function start()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function login($user)
    {
        self::start();
        $_SESSION['user'] = [
            'id' => $user->id,
            'username' => $user->username,
            'role' => $user->role
        ];
    }

    public static function logout()
    {
        self::start();
        unset($_SESSION['user']);
    }

    public static function isLoggedIn()
    {
        self::start();
        return isset($_SESSION['user']);
    }

    public static function user()
    {
        self::start();
        return $_SESSION['user'] ?? null;
    }

    public static function isAdmin()
    {
        self::start();
        return isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin';
    }

    public static function requireLogin()
    {
        if (!self::isLoggedIn()) {
            header("Location: /webbanhang/Account/login");
            exit();
        }
    }

    public static function requireAdmin()
    {
        if (!self::isAdmin()) {
            header("Location: /webbanhang/");
            exit();
        }
    }
}