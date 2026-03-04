<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

<style>
    /* FOOTER - chủ đề shop giường ngủ */

    .footer-shop {
        background: #22304a; /* xanh navy đậm */
        color: #f1f5f9;
        width: 100vw;
        margin-left: 50%;
        transform: translateX(-50%);
    }

    .footer-title {
        color: #facc15; /* vàng nhạt */
        margin-bottom: 15px;
        font-weight: 600;
    }

    .footer-links {
        list-style: none;
        padding: 0;
    }

    .footer-links li {
        margin-bottom: 8px;
    }

    .footer-links a {
        color: #cbd5e1; /* xám xanh nhạt */
        text-decoration: none;
        transition: 0.3s;
    }

    .footer-links a:hover {
        color: #facc15;
    }

    /* social icons */

    .social-icons a {
        color: #60a5fa; /* xanh dương nhạt */
        font-size: 22px;
        margin-right: 12px;
        transition: 0.3s;
    }

    .social-icons a:hover {
        color: #facc15;
    }

    .footer-line {
        border-color: #334155; /* xanh xám đậm */
    }

    .footer-contact-icon {
        font-size: 1.1em;
        margin-right: 6px;
        vertical-align: middle;
    }

    @media (min-width: 1200px) {
        .footer-shop .container {
            max-width: 100%;
            padding-left: 48px;
            padding-right: 48px;
        }
    }
</style>


<footer class="footer-shop mt-5">

    <div class="container py-5">

        <div class="row">

            <!-- Logo + giới thiệu -->

            <div class="col-md-4 mb-4">
                <div class="d-flex align-items-center mb-3">
                    <img src="/webbanhang/public/images/logo.png" alt="logo" style="height:40px;width:auto;margin-right:10px;">
                    <h5 class="mb-0 fw-bold" style="color:#facc15;">
                        Shop Ngường Giủ
                    </h5>
                </div>
                <p style="color:#f1f5f9;">
                    Chuyên cung cấp các loại giường ngủ chất lượng cao,<br>
                    thiết kế hiện đại, mang lại giấc ngủ thoải mái<br>
                    và không gian phòng ngủ sang trọng.
                </p>
            </div>


            <!-- Các mục -->

            <div class="col-md-3 mb-4">
                <h6 class="footer-title">Danh mục</h6>
                <ul class="footer-links">
                    <li><a href="#">Trang chủ</a></li>
                    <li><a href="#">Sản phẩm</a></li>
                    <li><a href="#">Khuyến mãi</a></li>
                    <li><a href="#">Tin tức</a></li>
                    <li><a href="#">Liên hệ</a></li>
                </ul>
            </div>


            <!-- Mạng xã hội -->

            <div class="col-md-2 mb-4">
                <h6 class="footer-title">Kết nối</h6>
                <div class="social-icons">
                    <a href="#"><i class="bi bi-facebook"></i></a>
                    <a href="#"><i class="bi bi-chat-dots"></i></a>
                    <a href="#"><i class="bi bi-youtube"></i></a>
                </div>
            </div>


            <!-- Liên hệ -->

            <div class="col-md-3 mb-4">
                <h6 class="footer-title">Liên hệ</h6>
                <p class="small" style="color:#60a5fa;"><span class="footer-contact-icon">📍</span> Số 69 - phường 69, Quận 69, TP.HCM</p>
                <p class="small" style="color:#a5b4fc;"><span class="footer-contact-icon">✉</span> Shopnguonggiu@gmail.com</p>
                <p class="small" style="color:#f472b6;"><span class="footer-contact-icon">☎</span> 696-969-69**</p>
            </div>

        </div>

        <hr class="footer-line">

        <p class="text-center small mb-0" style="color:#a3a3a3;">
            © 2026 Shop Ngường Giủ. All rights reserved.
        </p>

    </div>

</footer>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>