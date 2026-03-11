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

    <style>
        /* HEADER - chủ đề shop giường ngủ */

        .main-header {
            background: rgba(44, 62, 80, 0.97);
            /* xanh navy nhạt */
            backdrop-filter: blur(10px);
            border-bottom: 1px solid #dbeafe;
            /* xanh nhạt */
        }

        /* Logo */

        .logo-blue {
            color: #2563eb;
            /* xanh dương nổi bật */
            font-weight: bold;
        }

        .logo-purple {
            color: #d32304;
            /* xám xanh nhạt, tạo cảm giác thư giãn */
            font-weight: bold;
        }

        /* menu */

        .navbar-nav .nav-link {
            color: #f1f5f9 !important;
            /* trắng xanh nhạt */
            font-weight: 500;
            position: relative;
            transition: 0.3s;
        }

        /* hover */

        .navbar-nav .nav-link:hover {
            color: #facc15 !important;
            /* vàng nhạt */
        }

        /* underline animation */

        .navbar-nav .nav-link::after {
            content: "";
            position: absolute;
            bottom: -4px;
            left: 0;
            width: 0;
            height: 2px;
            background: #facc15;
            /* vàng nhạt */
            transition: 0.3s;
        }

        /* hover */

        .navbar-nav .nav-link:hover::after {
            width: 100%;
        }

        /* active */

        .navbar-nav .nav-link.active::after {
            width: 100%;
        }

        /* khi hover menu khác thì ẩn active */

        .navbar-nav:hover .nav-link.active::after {
            width: 0;
        }

        /* menu đang active */

        .navbar-nav .nav-link.active {
            color: #facc15 !important;
            /* vàng nhạt */
        }

        .navbar-nav .nav-link.active::after {
            width: 100%;
        }

        /* username */

        .nav-username {
            color: #2563eb !important;
            /* xanh dương nổi bật */
            font-weight: bold;
        }

        /* logout */

        .nav-logout {
            color: #ef4444 !important;
            /* đỏ nhạt */
        }
    </style>

</head>

<body>

    <?php
    $current = $_SERVER['REQUEST_URI'];
    ?>

    <nav class="navbar navbar-expand-lg navbar-dark main-header sticky-top">

        <div class="container">

            <!-- Logo -->

            <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="/webbanhang/">

                <img src="/webbanhang/public/images/logo.png" alt="Logo" style="height:40px; width:auto;">

                <span class="logo-blue">Shop</span>
                <span class="logo-purple">Ngường Giủ</span>

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
                                <a class="nav-link <?= (strpos($current, 'Account/manage') !== false ? 'active' : '') ?>"
                                    href="/webbanhang/Account/manage">
                                    Quản lý tài khoản
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
                                    Quản lý danh mục
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link <?= (strpos($current, 'Order') !== false ? 'active' : '') ?>"
                                    href="/webbanhang/Order">
                                    Quản lý đơn hàng
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


    <div class="container mt-4">