<?php include 'app/views/shares/header.php'; ?>

<style>
    /* body {
        background: url('/webbanhang/public/images/background/background-1.avif') no-repeat center center fixed;
        background-size: cover;
        min-height: 100vh;
    } */
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
            <?= $product->category_name ?? 'Chưa có danh mục' ?>
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

            <p class="fs-4 text-danger fw-bold">
                <?= number_format($product->price, 0, ',', '.') ?> VNĐ
            </p>

            <hr>

            <p><strong>Mô tả:</strong></p>
            <p><?= $product->description ?></p>

            <div class="mt-4 d-flex gap-2">

                <a href="/webbanhang/Product/index" class="btn btn-secondary">
                    Quay lại
                </a>

                <button class="btn btn-success add-to-cart-btn" data-id="<?= $product->id ?>">
                    Thêm vào giỏ hàng
                </button>

            </div>

        </div>
    </div>
</div>

<!-- JS thêm vào giỏ -->
<script>
    document.querySelector(".add-to-cart-btn")?.addEventListener("click", function () {

        const productId = this.getAttribute("data-id");

        fetch("/webbanhang/Cart/add/" + productId)
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
</script>

<?php include 'app/views/shares/footer.php'; ?>