<?php include 'app/views/shares/header.php'; ?>

<h2 class="mb-4">Thanh Toán</h2>

<form method="POST" action="/webbanhang/Order/store">

    <div class="mb-3">
        <label>Tên khách hàng</label>
        <input type="text" name="customer_name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Số điện thoại</label>
        <input type="text" name="phone" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Địa chỉ</label>
        <textarea name="address" class="form-control" required></textarea>
    </div>

    <div class="mb-3">
        <label>Ghi chú</label>
        <textarea name="note" class="form-control"></textarea>
    </div>

    <div class="mb-3">
        <label class="form-label fw-bold">Phương thức thanh toán</label>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="payment_method" value="cod" checked>
            <label class="form-check-label">
                Thanh toán trực tiếp (COD)
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="payment_method" value="momo">
            <label class="form-check-label">
                Thanh toán ATM MoMo
            </label>
        </div>
    </div>

    <button type="submit" class="btn btn-success">
        Xác nhận đặt hàng
    </button>

    <a href="/webbanhang/Cart" class="btn btn-secondary">
        Quay lại
    </a>

</form>

<?php include 'app/views/shares/footer.php'; ?>