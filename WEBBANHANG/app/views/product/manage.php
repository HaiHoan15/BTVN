<?php include 'app/views/shares/header.php'; ?>

<h1 class="mb-4">Quản Lý Sản Phẩm</h1>

<input type="text" id="searchBox" class="form-control" placeholder="Tìm sản phẩm..." style="width:220px; margin-top: 10px;">

<script>
    // Tìm kiếm sản phẩm theo tên
    const searchBox = document.getElementById('searchBox');
    searchBox.addEventListener('input', function() {
        const filter = searchBox.value.toLowerCase();
        const rows = document.querySelectorAll('table tbody tr');
        rows.forEach(row => {
            const productName = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
            if (productName.includes(filter)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>

<a href="/webbanhang/Product/create" class="btn btn-success mb-3">
    + Thêm Sản Phẩm
</a>

<table class="table table-bordered text-center align-middle">
    <thead class="table-dark">
        <tr>
            <th>Hình</th>
            <th>Tên sản phẩm</th>
            <th>Danh mục</th>
            <th>Giá</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $product): ?>

            <tr>
                <td>
                    <?php if (!empty($product->image)): ?>
                        <img src="data:image/jpeg;base64,<?= base64_encode($product->image) ?>"
                            style="width:80px; height:80px; object-fit:cover;">
                    <?php else: ?>
                        <img src="/webbanhang/public/images/error/bed-error-image.jpg" alt="No Image"
                            style="width:80px; height:80px; object-fit:cover;">
                    <?php endif; ?>
                </td>

                <td><?= $product->name ?></td>

                <td>
                    <?= $product->category_name ?? 'Chưa có danh mục' ?>
                </td>

                <td class="text-danger fw-bold">
                    <?= number_format($product->price, 0, ',', '.') ?> VNĐ
                </td>

                <td>
                    <a href="/webbanhang/Product/edit/<?= $product->id ?>" class="btn btn-warning btn-sm">
                        Sửa
                    </a>

                    <a href="/webbanhang/Product/delete/<?= $product->id ?>" class="btn btn-danger btn-sm"
                        onclick="return confirm('Bạn có chắc muốn xóa?')">
                        Xóa
                    </a>

                    <a href="/webbanhang/Product/show/<?= $product->id ?>" class="btn btn-primary btn-sm">
                        Chi tiết
                    </a>
                </td>
            </tr>

        <?php endforeach; ?>
    </tbody>
</table>

<?php include 'app/views/shares/footer.php'; ?>