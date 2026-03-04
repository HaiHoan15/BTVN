<?php include 'app/views/shares/header.php'; ?>

<h2 class="mb-4">Sửa Danh Mục</h2>

<form method="POST" action="/webbanhang/Category/update">

    <input type="hidden" name="id" value="<?= $category->id ?>">

    <div class="mb-3">
        <label>Tên danh mục</label>
        <input type="text" name="name"
               value="<?= $category->name ?>"
               class="form-control"
               required>
    </div>

    <div class="mb-3">
        <label>Mô tả</label>
        <textarea name="description"
                  class="form-control"><?= $category->description ?></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Cập nhật</button>
    <a href="/webbanhang/Category" class="btn btn-secondary">Quay lại</a>

</form>

<?php include 'app/views/shares/footer.php'; ?>