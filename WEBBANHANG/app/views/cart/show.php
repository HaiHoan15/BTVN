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
            <?= $product->category_name ?? 'Chưa có danh mục' ?>
        </li>

        <li class="breadcrumb-item" aria-current="page">
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

            <!-- Tính số lượng trong giỏ hàng và thành tiền -->
            <?php
            $cart = $_SESSION['cart'] ?? [];
            echo "<!-- Debug: cart = " . print_r($cart, true) . ", product->id = " . $product->id . " -->";
            $cartQuantity = 1;

            if (!empty($cart)) {
                foreach ($cart as $item) {
                    if ($item['id'] == $product->id) {
                        $cartQuantity = $item['quantity'];
                        break;
                    }
                }
            }

            $totalPrice = $cartQuantity * $product->price;
            ?>

            <div class="d-flex justify-content-between align-items-center mt-3 mb-3">

                <div>

                    <strong>Số lượng</strong>

                    <div class="input-group mt-2" style="width:140px;">

                        <!-- <button class="btn btn-outline-secondary" disabled>−</button> -->

                        <input type="number" class="form-control text-center" value="<?= $cartQuantity ?>" min="1"
                            max="999" disabled>

                        <!-- <button class="btn btn-outline-secondary" disabled>+</button> -->

                    </div>

                </div>

                <div class="text-end">

                    <strong>Thành tiền</strong>

                    <div class="fs-3 fw-bold text-danger">

                        <?= number_format($totalPrice, 0, ',', '.') ?>đ

                    </div>

                </div>

            </div>

            <hr>

            <p><strong>Mô tả:</strong></p>
            <p><?= $product->description ?></p>

            <div class="mt-4 d-flex gap-2">

                <a href="/webbanhang/Cart/index" class="btn btn-secondary">
                    Quay lại
                </a>

            </div>

        </div>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>