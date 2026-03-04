<?php include 'app/views/shares/header.php'; ?>

<div class="card shadow p-4">
    <div class="row">

        <div class="col-md-5 text-center">
            <?php if (!empty($product->image)): ?>
                <img src="data:image/jpeg;base64,<?= base64_encode($product->image) ?>" class="img-fluid rounded shadow"
                    style="max-height:400px; object-fit:cover;">
            <?php else: ?>
                <img src="/webbanhang/public/images/error/bed-error-image.jpg" class="img-fluid rounded shadow"
                    style="max-height:400px; object-fit:cover;">
            <?php endif; ?>
        </div>

        <div class="col-md-7">

            <h2 class="mb-3"><?= $product->name ?></h2>

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

            <div class="mt-4">
                <a href="/webbanhang/Cart" class="btn btn-secondary">
                    Quay lại giỏ hàng
                </a>
            </div>

        </div>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>