<?php include 'app/views/shares/header.php'; ?>

<style>
    :root {
        --primary-color: #B8936A;
        --secondary-color: #1a1f36;
        --accent-color: #D4AF37;
        --light-bg: #F8F7F3;
        --text-dark: #2C3E50;
        --text-light: #6B7280;
        --border-color: #E8E6E3;
    }

    body {
        background-color: white;
    }

    /* PAGE HEADER */
    .page-header {
        border-bottom: 2px solid var(--border-color);
        padding-bottom: 30px;
        margin-bottom: 30px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .page-title {
        font-size: 32px;
        font-weight: 700;
        color: var(--secondary-color);
        margin: 0;
    }

    /* SEARCH BOX */
    .search-box {
        width: 250px;
        padding: 12px 16px;
        border: 2px solid var(--border-color);
        border-radius: 8px;
        font-size: 14px;
        color: var(--text-dark);
        transition: all 0.3s;
    }

    .search-box:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(184, 147, 106, 0.1);
    }

    /* ADD BUTTON */
    .btn-add {
        background: var(--primary-color);
        color: white;
        padding: 12px 24px;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        font-size: 15px;
        cursor: pointer;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s;
        margin-bottom: 20px;
    }

    .btn-add:hover {
        background: var(--secondary-color);
        transform: translateY(-2px);
        color: white;
    }

    /* TABLE */
    .table-wrapper {
        overflow-x: auto;
        border-radius: 12px;
        border: 1px solid var(--border-color);
        margin-bottom: 30px;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    thead {
        background: var(--secondary-color);
    }

    thead th {
        color: white;
        font-weight: 700;
        padding: 18px 16px;
        text-align: center;
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    thead th:first-child {
        text-align: left;
    }

    tbody tr {
        border-bottom: 1px solid var(--border-color);
        transition: background-color 0.3s;
    }

    tbody tr:hover {
        background-color: var(--light-bg);
    }

    tbody td {
        padding: 18px 16px;
        color: var(--text-dark);
        font-size: 14px;
        vertical-align: middle;
    }

    tbody td:first-child {
        text-align: center;
    }

    tbody td:nth-child(2) {
        text-align: left;
        font-weight: 600;
        color: var(--text-dark);
    }

    /* PRODUCT IMAGE */
    .product-image {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 8px;
        border: 1px solid var(--border-color);
    }

    /* PRICE */
    .product-price {
        color: var(--primary-color);
        font-weight: 700;
        font-size: 15px;
    }

    /* ACTION BUTTONS */
    .btn-edit {
        background: var(--primary-color);
        color: white;
        padding: 8px 14px;
        border: none;
        border-radius: 6px;
        font-weight: 600;
        font-size: 13px;
        cursor: pointer;
        text-decoration: none;
        transition: all 0.3s;
        display: inline-block;
        margin-right: 6px;
    }

    .btn-edit:hover {
        background: var(--secondary-color);
        transform: translateY(-1px);
        color: white;
    }

    .btn-view {
        background: rgba(184, 147, 106, 0.15);
        color: var(--primary-color);
        padding: 8px 14px;
        border: none;
        border-radius: 6px;
        font-weight: 600;
        font-size: 13px;
        cursor: pointer;
        text-decoration: none;
        transition: all 0.3s;
        display: inline-block;
        margin-right: 6px;
    }

    .btn-view:hover {
        background: var(--primary-color);
        color: white;
    }

    .btn-delete {
        background: rgba(244, 67, 54, 0.15);
        color: #F44336;
        padding: 8px 14px;
        border: none;
        border-radius: 6px;
        font-weight: 600;
        font-size: 13px;
        cursor: pointer;
        text-decoration: none;
        transition: all 0.3s;
        display: inline-block;
    }

    .btn-delete:hover {
        background: #F44336;
        color: white;
    }

    /* RESPONSIVE */
    @media (max-width: 768px) {
        .page-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 15px;
        }

        .search-box {
            width: 100%;
        }

        thead th {
            padding: 12px 8px;
            font-size: 11px;
        }

        tbody td {
            padding: 12px 8px;
            font-size: 12px;
        }

        tbody td:nth-child(3) {
            display: none;
        }

        .btn-edit, .btn-view, .btn-delete {
            padding: 6px 10px;
            font-size: 11px;
            margin-right: 3px;
        }
    }
</style>

<div class="container" style="padding: 40px 15px;">

    <!-- PAGE HEADER -->
    <div class="page-header">
        <h1 class="page-title"><i class="bi bi-box"></i> Quản lý sản phẩm</h1>
        <a href="/webbanhang/Product/create" class="btn-add">
            <i class="bi bi-plus-circle"></i> Thêm sản phẩm
        </a>
    </div>

    <!-- SEARCH BOX -->
    <input type="text" id="searchBox" class="search-box" placeholder="🔍 Tìm sản phẩm..." style="margin-bottom: 20px;">

    <!-- TABLE -->
    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th style="width: 15%;">Hình ảnh</th>
                    <th style="width: 25%;">Tên sản phẩm</th>
                    <th style="width: 18%;">Danh mục</th>
                    <th style="width: 15%;">Giá</th>
                    <th style="width: 27%;">Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td>
                            <?php if (!empty($product->image)): ?>
                                <img src="data:image/jpeg;base64,<?= base64_encode($product->image) ?>" class="product-image" alt="<?= $product->name ?>">
                            <?php else: ?>
                                <img src="/webbanhang/public/images/error/bed-error-image.jpg" class="product-image" alt="No Image">
                            <?php endif; ?>
                        </td>
                        <td><?= $product->name ?></td>
                        <td><?= $product->category_name ?? 'Chưa có danh mục' ?></td>
                        <td>
                            <span class="product-price"><?= number_format($product->price, 0, ',', '.') ?> đ</span>
                        </td>
                        <td>
                            <a href="/webbanhang/Product/edit/<?= $product->id ?>" class="btn-edit">
                                <i class="bi bi-pencil"></i> Sửa
                            </a>
                            <a href="/webbanhang/Product/show/<?= $product->id ?>" class="btn-view">
                                <i class="bi bi-eye"></i> Xem
                            </a>
                            <a href="/webbanhang/Product/delete/<?= $product->id ?>" class="btn-delete"
                               onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?')">
                                <i class="bi bi-trash"></i> Xóa
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>

<!-- SEARCH SCRIPT -->
<script>
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

<?php include 'app/views/shares/footer.php'; ?>

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