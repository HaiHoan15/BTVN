<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

<style>
    /* FOOTER */
    :root {
        --primary-color: #B8936A;
        --secondary-color: #1a1f36;
        --accent-color: #D4AF37;
        --light-bg: #F8F7F3;
        --text-dark: #2C3E50;
        --text-light: #6B7280;
        --border-color: #E8E6E3;
    }

    .footer-shop {
        background: var(--secondary-color);
        color: #F3F4F6;
        margin-top: 60px;
        border-top: 1px solid var(--border-color);
    }

    .footer-shop a {
        color: var(--primary-color);
        text-decoration: none;
        transition: 0.3s;
    }

    .footer-shop a:hover {
        color: var(--accent-color);
        text-decoration: underline;
    }

    .footer-title {
        color: var(--accent-color);
        font-size: 14px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 18px;
    }

    .footer-section p {
        font-size: 14px;
        line-height: 1.8;
        color: #D1D5DB;
    }

    .footer-links {
        list-style: none;
        padding: 0;
    }

    .footer-links li {
        margin-bottom: 10px;
    }

    .footer-links a {
        color: #D1D5DB;
        font-size: 14px;
        transition: 0.3s;
    }

    .footer-links a:hover {
        color: var(--accent-color);
        padding-left: 5px;
    }

    .social-icons {
        display: flex;
        gap: 12px;
        margin-top: 12px;
    }

    .social-icons a {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(184, 147, 106, 0.15);
        border-radius: 50%;
        color: var(--primary-color);
        font-size: 18px;
        transition: 0.3s;
    }

    .social-icons a:hover {
        background: var(--primary-color);
        color: white;
        transform: translateY(-3px);
    }

    .footer-contact {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        margin-bottom: 12px;
        font-size: 14px;
    }

    .footer-contact i {
        color: var(--primary-color);
        margin-top: 2px;
    }

    .footer-bottom {
        border-top: 1px solid rgba(184, 147, 106, 0.2);
        padding-top: 20px;
        margin-top: 30px;
        text-align: center;
        color: #9CA3AF;
        font-size: 13px;
    }

    @media (max-width: 768px) {
        .footer-section {
            margin-bottom: 30px;
        }
    }
</style>

<footer class="footer-shop">

    <div class="container py-5">

        <div class="row">

            <!-- Logo + Giới thiệu -->
            <div class="col-md-4 footer-section">
                <div class="d-flex align-items-center mb-3">
                    <i class="bi bi-moon-stars" style="font-size: 24px; color: var(--primary-color); margin-right: 10px;"></i>
                    <h5 class="mb-0" style="color: var(--accent-color); font-weight: 700;">Ngường Giủ</h5>
                </div>
                <p>
                    Chuyên cung cấp các loại giường ngủ chất lượng cao, thiết kế hiện đại và sang trọng, mang lại giấc ngủ thoải mái cho gia đình bạn.
                </p>
            </div>

            <!-- Danh mục -->
            <div class="col-md-2 footer-section">
                <h6 class="footer-title">Danh mục</h6>
                <ul class="footer-links">
                    <li><a href="/webbanhang/">Trang chủ</a></li>
                    <li><a href="/webbanhang/Product/index">Sản phẩm</a></li>
                    <li><a href="/webbanhang/Product/index">Khuyến mãi</a></li>
                    <li><a href="#">Tin tức</a></li>
                </ul>
            </div>

            <!-- Hỗ trợ -->
            <div class="col-md-2 footer-section">
                <h6 class="footer-title">Hỗ trợ</h6>
                <ul class="footer-links">
                    <li><a href="#">Hướng dẫn mua</a></li>
                    <li><a href="#">Chính sách</a></li>
                    <li><a href="#">Bảo hành</a></li>
                    <li><a href="#">Liên hệ</a></li>
                </ul>
            </div>

            <!-- Liên hệ -->
            <div class="col-md-4 footer-section">
                <h6 class="footer-title">Liên hệ</h6>
                <div class="footer-contact">
                    <i class="bi bi-geo-alt"></i>
                    <span>Số 69, Phường 69, Quận 69, TP.HCM</span>
                </div>
                <div class="footer-contact">
                    <i class="bi bi-envelope"></i>
                    <span><a href="mailto:shopnguonggiu@gmail.com">shopnguonggiu@gmail.com</a></span>
                </div>
                <div class="footer-contact">
                    <i class="bi bi-telephone"></i>
                    <span><a href="tel:0969696969">0969 696 969</a></span>
                </div>
                <div class="mt-3">
                    <h6 class="footer-title" style="color: var(--primary-color);">Kết nối với chúng tôi</h6>
                    <div class="social-icons">
                        <a href="#" title="Facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" title="Instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" title="YouTube"><i class="bi bi-youtube"></i></a>
                    </div>
                </div>
            </div>

        </div>

        <div class="footer-bottom">
            © 2026 Shop Ngường Giủ. All rights reserved. | Designed with <i class="bi bi-heart-fill" style="color: var(--primary-color); font-size: 11px;"></i> for your comfort
        </div>

    </div>

</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>