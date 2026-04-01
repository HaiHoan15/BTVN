<?php include 'app/views/shares/header.php'; ?>

<style>
    :root {
        --primary-color: #B8936A;
        --secondary-color: #1a1f36;
        --accent-color: #D4AF37;
        --light-bg: #F8F7F3;
        --text-dark: #2C3E50;
        --text-light: #6B7280;
        --border-color: #E8E6E3;
        --danger: #EF4444;
    }

    body {
        min-height: 100vh;
        background: url("/webbanhang/public/images/background/account-background.avif") center/cover no-repeat;
    }

    .auth-container {
        background: white;
        border-radius: 16px;
        box-shadow: 0 15px 50px rgba(0, 0, 0, 0.08);
        padding: 50px;
        max-width: 450px;
        width: 100%;
        margin: 80px auto;
    }

    .auth-header {
        text-align: center;
        margin-bottom: 40px;
    }

    .auth-icon {
        font-size: 48px;
        color: var(--primary-color);
        margin-bottom: 15px;
    }

    .auth-title {
        font-size: 28px;
        font-weight: 700;
        color: var(--secondary-color);
        margin-bottom: 8px;
    }

    .auth-subtitle {
        color: var(--text-light);
        font-size: 14px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-label {
        display: block;
        font-weight: 600;
        color: var(--text-dark);
        margin-bottom: 8px;
        font-size: 14px;
    }

    .form-control {
        width: 100%;
        padding: 12px 16px;
        border: 1px solid var(--border-color);
        border-radius: 8px;
        font-size: 15px;
        transition: all 0.3s;
        font-family: inherit;
    }

    .form-control:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(184, 147, 106, 0.1);
    }

    .btn-submit {
        width: 100%;
        padding: 12px 24px;
        background: var(--primary-color);
        color: white;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        font-size: 15px;
        cursor: pointer;
        transition: all 0.3s;
        margin-top: 10px;
    }

    .btn-submit:hover {
        background: var(--secondary-color);
        transform: translateY(-2px);
    }

    .auth-footer {
        text-align: center;
        margin-top: 20px;
        font-size: 14px;
        color: var(--text-light);
    }

    .auth-footer a {
        color: var(--primary-color);
        font-weight: 600;
        text-decoration: none;
    }

    .auth-footer a:hover {
        text-decoration: underline;
    }

    /* MODAL */
    .modal {
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, 0.5);
        align-items: center;
        justify-content: center;
        z-index: 9999;
    }

    .modal-content {
        background: white;
        padding: 40px 30px;
        border-radius: 12px;
        max-width: 400px;
        text-align: center;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
    }

    .modal-icon {
        font-size: 48px;
        color: var(--danger);
        margin-bottom: 15px;
    }

    .modal-title {
        font-size: 20px;
        font-weight: 700;
        color: var(--secondary-color);
        margin-bottom: 10px;
    }

    .modal-message {
        color: var(--text-light);
        font-size: 14px;
        line-height: 1.6;
        margin-bottom: 25px;
    }

    .modal-button {
        background: var(--primary-color);
        color: white;
        border: none;
        padding: 10px 30px;
        border-radius: 6px;
        font-weight: 600;
        cursor: pointer;
        width: 100%;
    }

    .modal-button:hover {
        background: var(--secondary-color);
    }
</style>

<div class="auth-container">
    <div class="auth-header">
        <div class="auth-icon"><i class="bi bi-lock"></i></div>
        <h1 class="auth-title">Đăng nhập</h1>
        <p class="auth-subtitle">Chào mừng quay lại Shop Ngường Giủ</p>
    </div>

    <form method="POST" action="/webbanhang/Account/authenticate">
        <div class="form-group">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" placeholder="Nhập email..." required>
        </div>

        <div class="form-group">
            <label class="form-label">Mật khẩu</label>
            <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu..." required>
        </div>

        <button type="submit" class="btn-submit">
            <i class="bi bi-box-arrow-in-right"></i> Đăng nhập
        </button>
    </form>

    <div class="auth-footer">
        Chưa có tài khoản? <a href="/webbanhang/Account/register">Đăng ký ngay</a>
    </div>
</div>

<!-- ERROR MODAL -->
<div id="errorModal" class="modal">
    <div class="modal-content">
        <div class="modal-icon"><i class="bi bi-exclamation-circle"></i></div>
        <h3 class="modal-title" id="modalTitle"></h3>
        <p class="modal-message" id="modalMessage"></p>
        <button class="modal-button" onclick="closeModal()">Đóng</button>
    </div>
</div>

<script>
    function showError(title, message) {
        document.getElementById('modalTitle').innerText = title;
        document.getElementById('modalMessage').innerText = message;
        document.getElementById('errorModal').style.display = 'flex';
    }

    function closeModal() {
        document.getElementById('errorModal').style.display = 'none';
    }

    <?php if (isset($_GET['error']) && $_GET['error'] == 'invalid'): ?>
        showError('Đăng nhập thất bại', 'Email hoặc mật khẩu không chính xác. Vui lòng thử lại.');
    <?php endif; ?>
</script>

<?php include 'app/views/shares/footer.php'; ?>