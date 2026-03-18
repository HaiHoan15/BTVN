<?php include 'app/views/shares/header.php'; ?>

<h1>Quản Lý Đơn Hàng</h1>

<input type="text" id="searchBox" class="form-control" placeholder="Tìm đơn hàng..." style="width:220px; margin-top: 10px;">

<script>
    // Tìm kiếm đơn hàng theo tên khách hàng
    const searchBox = document.getElementById('searchBox');
    searchBox.addEventListener('input', function() {
        const filter = searchBox.value.toLowerCase();
        const rows = document.querySelectorAll('table tbody tr');
        rows.forEach(row => {
            const customerName = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
            if (customerName.includes(filter)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>

<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Khách hàng</th>
            <th>Điện thoại</th>
            <th>Tổng tiền</th>
            <th>Trạng thái</th>
            <th>Ngày tạo</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($orders as $order): ?>
            <tr>
                <td><?= $order->id ?></td>
                <td><?= $order->customer_name ?></td>
                <td><?= $order->phone ?></td>
                <td><?= number_format($order->total_amount, 0, ',', '.') ?> VNĐ</td>
                <!-- cập nhập trạng thái đơn hàng -->
                <td>
                    <select class="form-select status-select" data-id="<?= $order->id ?>">
                        <?php
                        $statuses = ['pending', 'confirmed','shipping', 'completed', 'cancelled'];
                        foreach ($statuses as $status):
                            ?>
                            <option value="<?= $status ?>" <?= $order->status == $status ? 'selected' : '' ?>>
                                <?= ucfirst($status) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </td>

                <td><?= $order->created_at ?></td>
                <td>
                    <a href="/webbanhang/Order/show/<?= $order->id ?>" class="btn btn-info btn-sm">
                        Chi tiết
                    </a>

                    <a href="/webbanhang/Order/delete/<?= $order->id ?>" class="btn btn-danger btn-sm"
                        onclick="return confirm('Xóa đơn hàng này?')">
                        Xóa
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- phần js cập nhật trạng thái đơn hàng -->
<script>
    document.querySelectorAll(".status-select").forEach(select => {

        select.addEventListener("change", function () {

            const orderId = this.getAttribute("data-id");
            const status = this.value;

            fetch("/webbanhang/Order/updateStatus", {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                body: "id=" + orderId + "&status=" + status
            });

        });

    });
</script>

<?php include 'app/views/shares/footer.php'; ?>