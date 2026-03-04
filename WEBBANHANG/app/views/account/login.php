<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-5" style="max-width:500px;">
    <h2 class="mb-4 text-center">Đăng Nhập</h2>

    <form method="POST" action="/webbanhang/Account/authenticate">

        <div class="mb-3">
            <label class="form-label">Tên tài khoản</label>
            <input type="text" name="username" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Mật khẩu</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">
            Đăng Nhập
        </button>

    </form>

    <div class="mt-3 text-center">
        Chưa có tài khoản?
        <a href="/webbanhang/Account/register">
            Đăng ký ngay!
        </a>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>