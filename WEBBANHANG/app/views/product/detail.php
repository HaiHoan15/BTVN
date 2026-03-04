<?php include 'app/views/shares/header.php'; ?>

<style>
    body {
        /* background: url('/webbanhang/public/images/background/background-1.avif') no-repeat center center fixed; */
        background-size: cover;
        background-color: azure;
        min-height: 100vh;
    }
</style>
<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="/webbanhang/">Trang chủ</a>
        </li>

        <li class="breadcrumb-item">
            <a href="/webbanhang/Product/index">Sản phẩm</a>
        </li>

        <li class="breadcrumb-item">
            <a href="/webbanhang/Product/index?category=<?= urlencode($product->category_name) ?>">
                <?= $product->category_name ?? 'Chưa có danh mục' ?>
            </a>
        </li>

        <li class="breadcrumb-item active" aria-current="page">
            <?= $product->name ?>
        </li>
    </ol>
</nav>

<div class="card shadow p-4">
    <div class="row">

        <!-- Hình ảnh -->
        <div class="col-md-5 text-center">
            <?php if (!empty($product->image)): ?>
                <img src="data:image/jpeg;base64,<?= base64_encode($product->image) ?>" class="img-fluid rounded shadow"
                    style="max-height:400px; object-fit:cover;">
            <?php else: ?>
                <img src="/webbanhang/public/images/error/bed-error-image.jpg" class="img-fluid rounded shadow"
                    style="max-height:400px; object-fit:cover;">
            <?php endif; ?>
        </div>

        <!-- Thông tin -->
        <div class="col-md-7">

            <h2 class="mb-3"><?= $product->name ?></h2>

            <div id="cartAlert" class="alert alert-success position-fixed end-0 m-3 d-none"
                style="top: 40px; z-index:9999;">
                Đã thêm vào giỏ hàng!
            </div>

            <p><strong>Danh mục:</strong>
                <?= $product->category_name ?? 'Chưa có danh mục' ?>
            </p>

            <p><strong>Chất liệu:</strong> <?= $product->material ?></p>

            <p><strong>Kích thước:</strong> <?= $product->size ?></p>

            <p><strong>Màu sắc:</strong> <?= $product->color ?></p>

            <div class="d-flex justify-content-between align-items-center mt-3 mb-3">

                <div>

                    <strong>Số lượng</strong>

                    <div class="input-group mt-2" style="width:140px;">

                        <button class="btn btn-outline-secondary" id="minusBtn">−</button>

                        <input type="number" id="quantity" class="form-control text-center" value="1" min="1" max="999">

                        <button class="btn btn-outline-secondary" id="plusBtn">+</button>

                    </div>

                </div>

                <div class="text-end">

                    <strong>Thành tiền</strong>

                    <div class="fs-3 fw-bold text-danger" id="totalPrice">

                        <?= number_format($product->price, 0, ',', '.') ?>đ

                    </div>

                </div>

            </div>

            <hr>

            <p><strong>Mô tả:</strong></p>
            <p><?= $product->description ?></p>

            <div class="mt-4 d-flex gap-2">

                <a href="/webbanhang/Product/index" class="btn btn-secondary">
                    Quay lại
                </a>

                <button class="btn btn-success add-to-cart-btn" data-id="<?= $product->id ?>"
                    data-price="<?= $product->price ?>">
                    Thêm vào giỏ hàng
                </button>

            </div>

        </div>
    </div>
</div>

<!-- JS thêm vào giỏ -->
<script>
    const quantityInput = document.getElementById("quantity");
    const minusBtn = document.getElementById("minusBtn");
    const plusBtn = document.getElementById("plusBtn");
    const totalPrice = document.getElementById("totalPrice");

    const price = <?= $product->price ?>;

    function updateTotal() {

        const qty = parseInt(quantityInput.value);

        const total = qty * price;

        totalPrice.innerText = total.toLocaleString('vi-VN') + "đ";
    }

    minusBtn.onclick = function () {

        let qty = parseInt(quantityInput.value);

        if (qty > 1) {
            qty--;
            quantityInput.value = qty;
            updateTotal();
        }

    }

    plusBtn.onclick = function () {

        let qty = parseInt(quantityInput.value);

        qty++;

        quantityInput.value = qty;

        updateTotal();
    }

    document.querySelector(".add-to-cart-btn")?.addEventListener("click", function () {

        const productId = this.getAttribute("data-id");
        const qty = document.getElementById("quantity").value;

        fetch("/webbanhang/Cart/add/" + productId + "?qty=" + qty)
            .then(response => response.json())
            .then(data => {
                if (data.status === "success") {
                    const alertBox = document.getElementById("cartAlert");
                    alertBox.classList.remove("d-none");

                    setTimeout(() => {
                        alertBox.classList.add("d-none");
                    }, 1000);
                }
            });

    });

    // giới hạn số lượng nhập vào ô input
    quantityInput.addEventListener("input", function () {

        let qty = parseInt(this.value);

        if (isNaN(qty) || qty < 1) qty = 1;

        if (qty > 999) qty = 999;

        this.value = qty;

        updateTotal();

    });
</script>

<?php include 'app/views/shares/footer.php'; ?>