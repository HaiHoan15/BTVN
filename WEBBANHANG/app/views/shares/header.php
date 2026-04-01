<?php
require_once 'app/helpers/SessionHelper.php';
SessionHelper::start();
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Ngường Giủ</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <style>
        /* COLOR SCHEME */
        :root {
            --primary-color: #B8936A;
            --secondary-color: #1a1f36;
            --accent-color: #D4AF37;
            --light-bg: #F8F7F3;
            --text-dark: #2C3E50;
            --text-light: #6B7280;
            --border-color: #E8E6E3;
            --success: #10B981;
            --danger: #EF4444;
        }

        * {
            color-scheme: light;
        }

        /* HEADER */
        .main-header {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--border-color);
            padding: 12px 0;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        /* Logo */
        .logo-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
        }

        .logo-text {
            font-size: 18px;
            font-weight: 700;
            color: var(--secondary-color);
        }

        .logo-text .brand-primary {
            color: var(--primary-color);
        }

        /* Navigation */
        .navbar-nav .nav-link {
            color: var(--text-dark) !important;
            font-weight: 500;
            position: relative;
            transition: all 0.3s;
            padding: 0.5rem 1rem !important;
            margin: 0 0.2rem;
            border-radius: 4px;
        }

        .navbar-nav .nav-link:hover {
            color: var(--primary-color) !important;
            background: rgba(184, 147, 106, 0.08);
        }

        .navbar-nav .nav-link.active {
            color: var(--primary-color) !important;
            background: rgba(184, 147, 106, 0.12);
        }

        .nav-username {
            color: var(--primary-color) !important;
            font-weight: 600;
        }

        .nav-logout {
            color: var(--danger) !important;
        }

        .navbar-toggler {
            border-color: var(--border-color);
        }

        .navbar-toggler:focus {
            box-shadow: none;
            border-color: var(--primary-color);
        }

        body {
            background-color: var(--light-bg);
            color: var(--text-dark);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        a {
            color: var(--primary-color);
            text-decoration: none;
            transition: 0.3s;
        }

        a:hover {
            color: var(--secondary-color);
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>

    <?php
    $current = $_SERVER['REQUEST_URI'];
    ?>

    <nav class="navbar navbar-expand-lg main-header sticky-top">

        <div class="container">

            <!-- Logo -->

            <a class="logo-brand" href="/webbanhang/">
                <i class="bi bi-moon-stars" style="font-size: 24px; color: var(--primary-color);"></i>
                <span class="logo-text"><span class="brand-primary">Ngường</span> Giủ</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>


            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav ms-auto">

                    <!-- Trang chủ -->

                    <li class="nav-item">
                        <a class="nav-link <?= ($current == '/webbanhang/' ? 'active' : '') ?>" href="/webbanhang/">
                            Trang chủ
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?= (strpos($current, 'Product') !== false ? 'active' : '') ?>"
                            href="/webbanhang/Product/index">
                            Sản phẩm
                        </a>
                    </li>


                    <?php if (SessionHelper::isLoggedIn()): ?>

                        <?php if (!SessionHelper::isAdmin()): ?>

                            <li class="nav-item">
                                <a class="nav-link <?= (strpos($current, 'Cart') !== false ? 'active' : '') ?>"
                                    href="/webbanhang/Cart">
                                    Giỏ hàng
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link <?= (strpos($current, 'Order') !== false ? 'active' : '') ?>"
                                    href="/webbanhang/Order/myOrders">
                                    Đơn hàng của tôi
                                </a>
                            </li>

                        <?php endif; ?>


                        <?php if (SessionHelper::isAdmin()): ?>
                            <li class="nav-item">
                                <a class="nav-link <?= (strpos($current, 'DashBoard') !== false ? 'active' : '') ?>"
                                    href="/webbanhang/DashBoard">
                                    Thống kê
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= (strpos($current, 'Account/manage') !== false ? 'active' : '') ?>"
                                    href="/webbanhang/Account/manage">
                                    Tài khoản
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link <?= (strpos($current, 'Product/manage') !== false ? 'active' : '') ?>"
                                    href="/webbanhang/Product/manage">
                                    Quản lý sản phẩm
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link <?= (strpos($current, 'Category') !== false ? 'active' : '') ?>"
                                    href="/webbanhang/Category">
                                    Danh mục
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link <?= (strpos($current, 'Order') !== false ? 'active' : '') ?>"
                                    href="/webbanhang/Order">
                                    Đơn hàng
                                </a>
                            </li>

                        <?php endif; ?>


                        <li class="nav-item">
                            <!-- <span class="nav-link nav-username">
                                <?= SessionHelper::user()['username']; ?>
                            </span> -->
                            <a class="nav-link nav-username <?= (strpos($current, 'Account') !== false ? 'active' : '') ?>"
                                href="/webbanhang/Account">
                                <?= SessionHelper::user()['username']; ?>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link nav-logout <?= (strpos($current, 'logout') !== false ? 'active' : '') ?>"
                                href="/webbanhang/Account/logout">
                                Đăng xuất
                            </a>
                        </li>

                    <?php else: ?>

                        <li class="nav-item">
                            <a class="nav-link <?= (strpos($current, 'login') !== false ? 'active' : '') ?>"
                                href="/webbanhang/Account/login">
                                Đăng nhập
                            </a>
                        </li>

                    <?php endif; ?>

                </ul>

            </div>

        </div>

    </nav>


    <div class="mt-4">