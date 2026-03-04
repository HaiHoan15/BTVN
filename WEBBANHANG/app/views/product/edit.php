<?php include 'app/views/shares/header.php'; ?>

<h2 class="mb-4">Sửa Sản Phẩm</h2>

<form method="POST" action="/webbanhang/Product/update" enctype="multipart/form-data">

    <input type="hidden" name="id" value="<?= $product->id ?>">

    <div class="mb-3">
        <label>Tên sản phẩm</label>
        <input type="text" name="name" class="form-control" value="<?= $product->name ?>" required>
    </div>

    <div class="mb-3">
        <label>Chất liệu</label>
        <input type="text" name="material" class="form-control" value="<?= $product->material ?>" required>
    </div>

    <div class="mb-3">
        <label>Kích thước</label>
        <input type="text" name="size" class="form-control" value="<?= $product->size ?>" required>
    </div>

    <div class="mb-3">
        <label>Màu sắc</label>
        <input type="text" name="color" class="form-control" value="<?= $product->color ?>">
    </div>

    <div class="mb-3">
        <label>Giá</label>
        <input type="number" name="price" class="form-control" value="<?= $product->price ?>" required min="0"
            max="999999999999999999" step="any">
    </div>

    <div class="mb-3">
        <label>Danh mục</label>
        <select name="category_id" class="form-control" required>
            <?php foreach ($categories as $category): ?>
                <option value="<?= $category->id ?>" <?= $category->id == $product->category_id ? 'selected' : '' ?>>
                    <?= $category->name ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Mô tả</label>
        <textarea name="description" class="form-control"><?= $product->description ?></textarea>
    </div>
    
    <div class="mb-3">
        <label>Hình ảnh hiện tại</label><br>

        <?php if (!empty($product->image)): ?>
            <img id="previewImage" src="data:image/jpeg;base64,<?= base64_encode($product->image) ?>"
                style="width:150px; margin-bottom:10px; object-fit:cover;">
        <?php else: ?>
            <img id="previewImage" src="/webbanhang/public/images/error/bed-error-image.jpg" alt="Preview"
                style="width:150px; margin-bottom:10px; object-fit:cover;">
        <?php endif; ?>

    </div>

    <div class="mb-3">
        <label>Đổi hình (nếu muốn)</label>
        <input type="file" name="image" id="imageInput" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Cập nhật</button>
    <a href="/webbanhang/Product/manage" class="btn btn-secondary">Quay lại</a>

</form>

<?php include 'app/views/shares/footer.php'; ?>

<!-- JavaScript để hiển thị preview hình ảnh khi chọn file mới -->
<script>
    document.getElementById("imageInput").addEventListener("change", function (event) {
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = function (e) {
                document.getElementById("previewImage").src = e.target.result;
            };

            reader.readAsDataURL(file);
        }
    });
</script>