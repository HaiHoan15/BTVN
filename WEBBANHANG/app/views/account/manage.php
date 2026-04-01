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
        text-align: left;
        font-weight: 600;
        color: var(--primary-color);
    }

    /* ROLE BADGE */
    .role-badge {
        display: inline-block;
        padding: 6px 12px;
        border-radius: 6px;
        font-weight: 700;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .role-admin {
        background: rgba(244, 67, 54, 0.15);
        color: #F44336;
    }

    .role-user {
        background: rgba(184, 147, 106, 0.15);
        color: var(--primary-color);
    }

    /* ACTION BUTTONS */
    .btn-action {
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
        margin-right: 8px;
    }

    .btn-action:hover {
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
    }

    .btn-delete:hover {
        background: #F44336;
        color: white;
    }

    .text-muted-custom {
        color: var(--text-light);
        font-style: italic;
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

        tbody td:nth-child(3),
        tbody td:nth-child(4) {
            display: none;
        }

        .btn-action, .btn-delete {
            padding: 6px 10px;
            font-size: 12px;
            margin-right: 4px;
        }
    }
</style>

<div class="container" style="padding: 40px 15px;">

    <!-- PAGE HEADER -->
    <div class="page-header">
        <h1 class="page-title"><i class="bi bi-people"></i> Quản lý tài khoản</h1>
        <input type="text" id="searchBox" class="search-box" placeholder="🔍 Tìm tài khoản...">
    </div>

    <!-- TABLE -->
    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th style="width: 8%;">ID</th>
                    <th style="width: 20%;">Tên tài khoản</th>
                    <th style="width: 18%;">Số điện thoại</th>
                    <th style="width: 25%;">Địa chỉ</th>
                    <th style="width: 10%;">Role</th>
                    <th style="width: 22%;">Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($accounts as $account): ?>
                    <tr>
                        <td><?= $account->id ?></td>
                        <td><?= $account->username ?></td>
                        <td><?= $account->phone ?></td>
                        <td><?= $account->address ?></td>
                        <td>
                            <span class="role-badge <?= $account->role === 'admin' ? 'role-admin' : 'role-user' ?>">
                                <?= $account->role === 'admin' ? 'Admin' : 'User' ?>
                            </span>
                        </td>
                        <td>
                            <?php if ($account->id != SessionHelper::user()['id']): ?>
                                <a href="/webbanhang/Account/changeRole/<?= $account->id ?>" class="btn-action">
                                    <i class="bi bi-shield"></i> Đổi quyền
                                </a>
                                <a href="/webbanhang/Account/delete/<?= $account->id ?>" class="btn-delete"
                                   onclick="return confirm('Bạn có chắc muốn xóa tài khoản này?')">
                                    <i class="bi bi-trash"></i>
                                </a>
                            <?php else: ?>
                                <span class="text-muted-custom"><i class="bi bi-check-circle"></i> Tài khoản của bạn</span>
                            <?php endif; ?>
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
            const username = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
            if (username.includes(filter)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>

<?php include 'app/views/shares/footer.php'; ?>

<script>
    // Tìm kiếm tài khoản theo tên
    const searchBox = document.getElementById('searchBox');
    searchBox.addEventListener('input', function() {
        const filter = searchBox.value.toLowerCase();
        const rows = document.querySelectorAll('table tbody tr');
        rows.forEach(row => {
            const username = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
            if (username.includes(filter)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>

<table class="table table-bordered text-center align-middle">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Tên tài khoản</th>
            <th>SĐT</th>
            <th>Địa chỉ</th>
            <th>Role</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>

        <?php foreach ($accounts as $account): ?>

            <tr>
                <td><?= $account->id ?></td>

                <td><?= $account->username ?></td>

                <td><?= $account->phone ?></td>

                <td><?= $account->address ?></td>

                <td>
                    <?php if ($account->role === 'admin'): ?>
                        <span class="badge bg-danger">Admin</span>
                    <?php else: ?>
                        <span class="badge bg-primary">User</span>
                    <?php endif; ?>
                </td>

                <td>
                    <?php if ($account->id != SessionHelper::user()['id']): ?>

                        <a href="/webbanhang/Account/changeRole/<?= $account->id ?>"
                           class="btn btn-warning btn-sm">
                            Đổi quyền
                        </a>

                        <a href="/webbanhang/Account/delete/<?= $account->id ?>"
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Bạn có chắc muốn xóa tài khoản này?')">
                            Xóa
                        </a>

                    <?php else: ?>
                        <span class="text-muted">Tài khoản của bạn</span>
                    <?php endif; ?>
                </td>

            </tr>

        <?php endforeach; ?>

    </tbody>
</table>

<?php include 'app/views/shares/footer.php'; ?>