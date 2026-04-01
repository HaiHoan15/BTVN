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

    /* BUTTONS */
    .btn-action {
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
    }

    .btn-add {
        background: var(--primary-color);
        color: white;
        margin-bottom: 20px;
    }

    .btn-add:hover {
        background: var(--secondary-color);
        transform: translateY(-2px);
    }

    /* ALERTS */
    .alert-box {
        padding: 15px 18px;
        border-radius: 8px;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 12px;
        font-weight: 500;
    }

    .alert-danger {
        background: rgba(244, 67, 54, 0.15);
        color: #F44336;
        border-left: 4px solid #F44336;
    }

    .alert-success {
        background: rgba(76, 175, 80, 0.15);
        color: #4CAF50;
        border-left: 4px solid #4CAF50;
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
        vertial-align: middle;
    }

    tbody td:first-child {
        text-align: left;
        font-weight: 600;
        color: var(--primary-color);
    }

    tbody td:nth-child(3) {
        max-width: 300px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
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
    }

    .btn-edit:hover {
        background: var(--secondary-color);
        transform: translateY(-1px);
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
        margin-left: 8px;
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

        .btn-edit, .btn-delete {
            padding: 6px 10px;
            font-size: 12px;
            margin-left: 0;
            margin-right: 4px;
        }
    }
</style>

<div class="container" style="padding: 40px 15px;">

    <!-- PAGE HEADER -->
    <div class="page-header">
        <h1 class="page-title"><i class="bi bi-tag"></i> Quản lý danh mục</h1>
        <a href="/webbanhang/Category/create" class="btn-action btn-add">
            <i class="bi bi-plus-circle"></i> Thêm danh mục
        </a>
    </div>

    <!-- ALERTS -->
    <?php if (isset($_GET['error']) && $_GET['error'] == 'has_product'): ?>
        <div class="alert-box alert-danger">
            <i class="bi bi-exclamation-circle"></i>
            <span>Không thể xóa danh mục vì còn sản phẩm liên kết.</span>
        </div>
    <?php endif; ?>

    <?php if (isset($_GET['success']) && $_GET['success'] == 'deleted'): ?>
        <div class="alert-box alert-success">
            <i class="bi bi-check-circle"></i>
            <span>Xóa danh mục thành công.</span>
        </div>
    <?php endif; ?>

    <!-- SEARCH BOX -->
    <input type="text" id="searchBox" class="search-box" placeholder="🔍 Tìm danh mục..." style="margin-bottom: 20px;">

    <!-- TABLE -->
    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th style="width: 8%;">ID</th>
                    <th style="width: 25%;">Tên danh mục</th>
                    <th style="width: 50%;">Mô tả</th>
                    <th style="width: 17%;">Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $category): ?>
                    <tr>
                        <td><?= $category->id ?></td>
                        <td><?= $category->name ?></td>
                        <td><?= $category->description ?></td>
                        <td>
                            <a href="/webbanhang/Category/edit/<?= $category->id ?>" class="btn-edit">
                                <i class="bi bi-pencil"></i> Sửa
                            </a>
                            <a href="/webbanhang/Category/delete/<?= $category->id ?>" class="btn-delete"
                               onclick="return confirm('Bạn có chắc muốn xóa danh mục này?')">
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
            const categoryName = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
            if (categoryName.includes(filter)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>

<?php include 'app/views/shares/footer.php'; ?>

<script>
    // Tìm kiếm danh mục theo tên
    const searchBox = document.getElementById('searchBox');
    searchBox.addEventListener('input', function() {
        const filter = searchBox.value.toLowerCase();
        const rows = document.querySelectorAll('table tbody tr');
        rows.forEach(row => {
            const categoryName = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
            if (categoryName.includes(filter)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>

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