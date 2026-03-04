<?php include 'app/views/shares/header.php'; ?>

<style>
    /* HERO BACKGROUND */

    .home-hero {
        min-height: 100vh;
        background-image: url('/webbanhang/public/images/background/sleeping-background.gif');
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center;
        background-color: #000;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
    }

    /* lớp phủ để chữ dễ đọc */

    .home-hero::before {
        content: "";
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.45);
    }

    /* nội dung */

    .hero-content {
        position: relative;
        z-index: 2;
        color: white;
    }

    .hero-title {
        font-size: 48px;
        font-weight: bold;
    }

    .hero-sub {
        font-size: 20px;
        margin-top: 10px;
        opacity: 0.9;
    }

    .btn-shop {
        margin-top: 25px;
        padding: 12px 28px;
        font-size: 18px;
        background: #d4a373;
        border: none;
        transition: 0.3s;
    }

    .btn-shop:hover {
        background: #b08968;
    }
</style>


<!-- HERO -->

<div class="home-hero">

    <div class="hero-content">

        <h1 class="hero-title">
            Chào mừng đến với Shop Ngường Giủ
        </h1>

        <p class="hero-sub">
            Nơi mang đến giấc ngủ êm ái và không gian phòng ngủ hoàn hảo
        </p>

        <a href="/webbanhang/Product/index" class="btn btn-shop">
            Xem sản phẩm
        </a>

    </div>

</div>

<?php include 'app/views/shares/footer.php'; ?>