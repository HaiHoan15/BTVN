<?php include 'app/views/shares/header.php'; ?>

<h2 class="mb-4">Quản lý tài khoản</h2>

<input type="text" id="searchBox" class="form-control" placeholder="Tìm tài khoản..." style="width:220px; margin-top: 10px;">

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