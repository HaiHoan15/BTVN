<?php include 'app/views/shares/header.php'; ?>

<h1 class="mb-4">Quản Lý Danh Mục</h1>

<?php if (isset($_GET['error']) && $_GET['error'] == 'has_product'): ?>
    <div class="alert alert-danger alert-dismissible fade show">
        Không thể xóa danh mục vì còn sản phẩm liên kết.
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<?php if (isset($_GET['success']) && $_GET['success'] == 'deleted'): ?>
    <div class="alert alert-success alert-dismissible fade show">
        Xóa danh mục thành công.
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<a href="/webbanhang/Category/create" class="btn btn-success mb-3">
    + Thêm Danh Mục
</a>

<table class="table table-bordered text-center align-middle">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Tên danh mục</th>
            <th>Mô tả</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($categories as $category): ?>
        <tr>
            <td><?= $category->id ?></td>
            <td><?= $category->name ?></td>
            <td><?= $category->description ?></td>
            <td>
                <a href="/webbanhang/Category/edit/<?= $category->id ?>"
                   class="btn btn-warning btn-sm">Sửa</a>

                <a href="/webbanhang/Category/delete/<?= $category->id ?>"
                   class="btn btn-danger btn-sm"
                   onclick="return confirm('Bạn có chắc muốn xóa?')">
                   Xóa
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php include 'app/views/shares/footer.php'; ?>