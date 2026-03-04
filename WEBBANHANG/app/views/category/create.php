<?php include 'app/views/shares/header.php'; ?>

<h2 class="mb-4">Thêm Danh Mục</h2>

<form method="POST" action="/webbanhang/Category/store">

    <div class="mb-3">
        <label>Tên danh mục</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Mô tả</label>
        <textarea name="description" class="form-control"></textarea>
    </div>

    <button type="submit" class="btn btn-success">Lưu</button>
    <a href="/webbanhang/Category" class="btn btn-secondary">Quay lại</a>

</form>

<?php include 'app/views/shares/footer.php'; ?>