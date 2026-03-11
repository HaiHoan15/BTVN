<?php include 'app/views/shares/header.php'; ?>

<style>
    body {
        background: url('/webbanhang/public/images/background/login-background-2.jpg') no-repeat center center fixed;
        background-size: cover;
        min-height: 100vh;
    }
</style>
<div class="container mt-5" style="max-width:500px;">

    <h2 class="text-center mb-4">Đăng nhập</h2>

    <form method="POST" action="/webbanhang/Account/authenticate">

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Mật khẩu</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button class="btn btn-primary w-100">
            Đăng nhập
        </button>

    </form>

    <div class="text-center mt-3">
        Chưa có tài khoản?
        <a href="/webbanhang/Account/register">Đăng ký</a>
    </div>

</div>


<!-- POPUP -->
<div id="popup"
    style="display:none;position:fixed;inset:0;background:rgba(0,0,0,.5);align-items:center;justify-content:center;">

    <div style="background:white;padding:30px;border-radius:10px;max-width:400px;text-align:center">

        <h5 id="popupTitle"></h5>
        <p id="popupMessage"></p>

        <button onclick="closePopup()" class="btn btn-primary w-100">OK</button>

    </div>
</div>


<script>

    function showPopup(title, msg) {

        document.getElementById("popupTitle").innerText = title
        document.getElementById("popupMessage").innerText = msg
        document.getElementById("popup").style.display = "flex"

    }

    function closePopup() {
        document.getElementById("popup").style.display = "none"
    }

    <?php if (isset($_GET['error']) && $_GET['error'] == "invalid"): ?>

        showPopup(
            "Đăng nhập thất bại",
            "Email hoặc mật khẩu của bạn không hợp lệ, vui lòng thử lại..."
        )

    <?php endif; ?>

</script>

<?php include 'app/views/shares/footer.php'; ?>