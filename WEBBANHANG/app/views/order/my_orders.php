<?php include 'app/views/shares/header.php'; ?>

<h2 class="mb-4">Đơn hàng của tôi</h2>

<?php if (empty($orders)): ?>

    <div class="alert alert-info">
        Bạn chưa có đơn hàng nào.
    </div>

<?php else: ?>

    <table class="table table-bordered text-center align-middle">
        <thead class="table-dark">
            <tr>
                <th>Mã đơn</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
                <th>Ngày tạo</th>
                <th>Chi tiết</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($orders as $order): ?>

                <tr>
                    <td>#<?= $order->id ?></td>

                    <td class="text-danger fw-bold">
                        <?= number_format($order->total_amount, 0, ',', '.') ?> VNĐ
                    </td>

                    <td>
                        <?php
                        $statusClass = match($order->status) {
                            'pending' => 'warning',
                            'confirmed' => 'primary',
                            'completed' => 'success',
                            'cancelled' => 'danger',
                            default => 'secondary'
                        };
                        ?>
                        <span class="badge bg-<?= $statusClass ?>">
                            <?= ucfirst($order->status) ?>
                        </span>
                    </td>

                    <td>
                        <?= $order->created_at ?? '' ?>
                    </td>

                    <td>
                        <a href="/webbanhang/Order/show/<?= $order->id ?>" 
                           class="btn btn-info btn-sm">
                            Xem
                        </a>
                    </td>

                </tr>

            <?php endforeach; ?>

        </tbody>
    </table>

<?php endif; ?>

<?php include 'app/views/shares/footer.php'; ?>