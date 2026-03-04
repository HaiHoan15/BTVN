<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-5" style="max-width:500px;">
    <h2 class="mb-4 text-center">Đăng Ký Tài Khoản</h2>

    <form method="POST" action="/webbanhang/Account/store">

        <div class="mb-3">
            <label class="form-label">Tên tài khoản</label>
            <input type="text" name="username" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Số điện thoại</label>
            <input type="text" name="phone" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Địa chỉ</label>
            <input type="text" name="address" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Mật khẩu</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Xác nhận mật khẩu</label>
            <input type="password" name="confirm_password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success w-100">
            Đăng Ký
        </button>

    </form>

    <div class="mt-3 text-center">
        Đã có tài khoản?
        <a href="/webbanhang/Account/login">
            Đăng nhập ngay!
        </a>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>