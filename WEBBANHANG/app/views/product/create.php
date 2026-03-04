<?php include 'app/views/shares/header.php'; ?>

<h2 class="mb-4">Thêm Sản Phẩm</h2>

<form method="POST" action="/webbanhang/Product/store" enctype="multipart/form-data">

    <div class="mb-3">
        <label>Tên sản phẩm</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Chất liệu</label>
        <input type="text" name="material" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Kích thước</label>
        <input type="text" name="size" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Màu sắc</label>
        <input type="text" name="color" class="form-control">
    </div>

    <div class="mb-3">
        <label>Giá (VND)</label>
        <input type="number" name="price" class="form-control" required min="0" max="999999999999999999" step="any">
    </div>

    <div class="mb-3">
        <label>Danh mục</label>
        <select name="category_id" class="form-control" required>
            <?php foreach ($categories as $category): ?>
                <option value="<?= $category->id ?>">
                    <?= $category->name ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Mô tả</label>
        <textarea name="description" class="form-control"></textarea>
    </div>

    <div class="mb-3">
        <label>Hình ảnh</label>

        <br>

        <img id="previewImage" src="/webbanhang/public/images/error/bed-error-image.jpg" alt="Preview"
            style="width:150px; margin-bottom:10px; display:block;">

        <input type="file" name="image" id="imageInput" class="form-control">
    </div>

    <button type="submit" class="btn btn-success">Lưu sản phẩm</button>
    <a href="/webbanhang/Product/manage" class="btn btn-secondary">Quay lại</a>

</form>

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

<?php include 'app/views/shares/footer.php'; ?>