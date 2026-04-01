<?php include 'app/views/shares/header.php'; ?>

<style>
    :root {
        --primary-color: #B8936A;
        --secondary-color: #1a1f36;
        --accent-color: #D4AF37;
        --light-bg: #F8F7F3;
        --text-dark: #2C3E50;
    }

    /* HERO SECTION */
    .hero-section {
        height: 85vh;
        background: linear-gradient(135deg, rgba(26, 31, 54, 0.7) 0%, rgba(184, 147, 106, 0.3) 100%), 
                    url('/webbanhang/public/images/background/background-1.avif') center/cover no-repeat;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: hidden;
    }

    .hero-content {
        text-align: center;
        color: white;
        max-width: 600px;
        z-index: 2;
        animation: fadeInUp 1s ease-out;
    }

    .hero-title {
        font-size: clamp(2.5rem, 5vw, 4rem);
        font-weight: 700;
        line-height: 1.2;
        margin-bottom: 20px;
        letter-spacing: -1px;
    }

    .hero-title .accent {
        color: var(--accent-color);
    }

    .hero-subtitle {
        font-size: clamp(1rem, 2vw, 1.3rem);
        color: rgba(255, 255, 255, 0.9);
        margin-bottom: 30px;
        font-weight: 300;
        line-height: 1.6;
    }

    .hero-cta {
        display: inline-flex;
        gap: 15px;
        margin-top: 40px;
    }

    .btn-primary-custom {
        padding: 14px 40px;
        font-size: 16px;
        font-weight: 600;
        background: var(--primary-color);
        color: white;
        border: none;
        border-radius: 50px;
        cursor: pointer;
        transition: all 0.3s;
        text-decoration: none;
        display: inline-block;
    }

    .btn-primary-custom:hover {
        background: var(--accent-color);
        transform: translateY(-2px);
        box-shadow: 0 10px 30px rgba(184, 147, 106, 0.3);
        color: var(--secondary-color);
    }

    .btn-secondary-custom {
        padding: 14px 40px;
        font-size: 16px;
        font-weight: 600;
        background: transparent;
        color: white;
        border: 2px solid white;
        border-radius: 50px;
        cursor: pointer;
        transition: all 0.3s;
        text-decoration: none;
        display: inline-block;
    }

    .btn-secondary-custom:hover {
        background: white;
        color: var(--secondary-color);
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* FEATURES SECTION */
    .features-section {
        padding: 80px 0;
        background: white;
    }

    .feature-box {
        text-align: center;
        padding: 40px 30px;
        border-radius: 12px;
        background: var(--light-bg);
        transition: all 0.3s;
    }

    .feature-box:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
    }

    .feature-icon {
        font-size: 48px;
        color: var(--primary-color);
        margin-bottom: 15px;
    }

    .feature-title {
        font-size: 18px;
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 10px;
    }

    .feature-text {
        color: var(--text-light);
        font-size: 14px;
        line-height: 1.6;
    }
</style>

<!-- HERO SECTION -->
<div class="hero-section">
    <div class="hero-content">
        <h1 class="hero-title">
            Ngôi nhà của bạn bắt đầu từ<br>
            <span class="accent">một chiếc giường hoàn hảo</span>
        </h1>
        <p class="hero-subtitle">
            Khám phá bộ sưu tập giường ngủ cao cấp, được thiết kế để mang lại giấc ngủ sâu và phòng ngủ sang trọng.
        </p>
        <div class="hero-cta">
            <a href="/webbanhang/Product/index" class="btn-primary-custom">
                <i class="bi bi-shop"></i> Khám phá sản phẩm
            </a>
        </div>
    </div>
</div>

<!-- FEATURES SECTION -->
<div class="features-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="feature-box">
                    <div class="feature-icon">
                        <i class="bi bi-check-circle"></i>
                    </div>
                    <h3 class="feature-title">Chất lượng cao</h3>
                    <p class="feature-text">Tất cả sản phẩm được chọn lọc kỹ lưỡng từ những nhà sản xuất uy tín, đảm bảo độ bền và chất lượng tối ưu.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="feature-box">
                    <div class="feature-icon">
                        <i class="bi bi-truck"></i>
                    </div>
                    <h3 class="feature-title">Giao hàng nhanh</h3>
                    <p class="feature-text">Chúng tôi cung cấp dịch vụ giao hàng nhanh chóng và an toàn đến tất cả các khu vực trong thành phố.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="feature-box">
                    <div class="feature-icon">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <h3 class="feature-title">Bảo hành tận tâm</h3>
                    <p class="feature-text">Mọi sản phẩm đều được bảo hành toàn diện, với đội ngũ hỗ trợ khách hàng 24/7 sẵn sàng.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>