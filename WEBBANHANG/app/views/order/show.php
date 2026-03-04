<?php include 'app/views/shares/header.php'; ?>

<h2>Chi Tiết Đơn Hàng #<?= $order->id ?></h2>

<p><strong>Khách hàng:</strong> <?= $order->customer_name ?></p>
<p><strong>SĐT:</strong> <?= $order->phone ?></p>
<p><strong>Địa chỉ:</strong> <?= $order->address ?></p>
<p><strong>Phương thức thanh toán:</strong> 
    <?php
        $method = ucfirst($order->payment_method);
        $note = '';
        if ($order->payment_method === 'cod') {
            $note = ' <span class="text-secondary">(Trực tiếp)</span>';
        } elseif ($order->payment_method === 'momo') {
            $note = ' <span class="text-secondary">(Online)</span>';
        }
        echo $method . $note;
    ?>
</p>
<p><strong>Trạng thái:</strong> <?= $order->status ?></p>
<p><strong>Ngày tạo:</strong> <?= $order->created_at ?></p>

<hr>

<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>Sản phẩm</th>
            <th>Số lượng</th>
            <th>Giá</th>
            <th>Thành tiền</th>
        </tr>
    </thead>
    <tbody>

        <?php foreach ($details as $item):
            $subtotal = $item->price * $item->quantity;
            ?>

            <tr>
                <td><?= $item->name ?></td>
                <td><?= $item->quantity ?></td>
                <td><?= number_format($item->price, 0, ',', '.') ?> VNĐ</td>
                <td><?= number_format($subtotal, 0, ',', '.') ?> VNĐ</td>
            </tr>

        <?php endforeach; ?>

    </tbody>
</table>

<a href="/webbanhang/Order" class="btn btn-secondary">
    Quay lại
</a>

<?php include 'app/views/shares/footer.php'; ?>