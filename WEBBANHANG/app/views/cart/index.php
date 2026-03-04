<?php include 'app/views/shares/header.php'; ?>

<h1 class="mb-4">Giỏ Hàng</h1>

<?php if (empty($cart)): ?>
    <div class="alert alert-info">
        Giỏ hàng đang trống.
    </div>
<?php else: ?>

    <table class="table table-bordered text-center align-middle">
        <thead class="table-dark">
            <tr>
                <th>Hình</th>
                <th>Tên</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $total = 0;
            foreach ($cart as $item):

                $subtotal = $item['price'] * $item['quantity'];
                $total += $subtotal;
                ?>

                <tr data-id="<?= $item['id'] ?>">
                    <td>
                        <?php if (!empty($item['image'])): ?>
                            <img src="data:image/jpeg;base64,<?= base64_encode($item['image']) ?>" width="80"
                                style="object-fit:cover;">
                        <?php else: ?>
                            <img src="/webbanhang/public/images/error/bed-error-image.jpg" width="80" style="object-fit:cover;">
                        <?php endif; ?>
                    </td>

                    <td><?= $item['name'] ?></td>

                    <td class="price" data-price="<?= $item['price'] ?>">
                        <?= number_format($item['price'], 0, ',', '.') ?> VNĐ
                    </td>

                    <td style="width:120px;">
                        <input type="number" value="<?= $item['quantity'] ?>" min="1"
                            class="form-control text-center quantity-input">
                    </td>

                    <td class="subtotal">
                        <?= number_format($subtotal, 0, ',', '.') ?> VNĐ
                    </td>

                    <td>
                        <a href="/webbanhang/Cart/show/<?= $item['id'] ?>" class="btn btn-info btn-sm">
                            Chi tiết
                        </a>

                        <a href="/webbanhang/Cart/remove/<?= $item['id'] ?>" class="btn btn-danger btn-sm"
                            onclick="return confirm('Xóa sản phẩm này?')">
                            Xóa
                        </a>
                    </td>
                </tr>

            <?php endforeach; ?>

        </tbody>
    </table>

    <h4 class="text-end text-danger">
        Tổng tiền: <span id="totalAmount">
            <?= number_format($total, 0, ',', '.') ?>
        </span> VNĐ
    </h4>

    <div class="text-end mt-3">
        <a href="/webbanhang/Order/checkout" class="btn btn-success">
            Thanh toán
        </a>
    </div>

<?php endif; ?>

<!-- phần js để xử lý thay đổi số lượng và cập nhật tổng tiền -->
<script>
    document.querySelectorAll(".quantity-input").forEach(input => {

        input.addEventListener("change", function () {

            const row = this.closest("tr");
            const productId = row.getAttribute("data-id");
            const quantity = this.value;
            const price = parseInt(row.querySelector(".price").dataset.price);

            // Cập nhật thành tiền frontend
            const subtotalCell = row.querySelector(".subtotal");
            const newSubtotal = price * quantity;
            subtotalCell.innerText = newSubtotal.toLocaleString('vi-VN') + " VNĐ";

            // Cập nhật tổng tiền
            let total = 0;
            document.querySelectorAll(".subtotal").forEach(cell => {
                total += parseInt(cell.innerText.replace(/\D/g, ""));
            });

            document.getElementById("totalAmount").innerText =
                total.toLocaleString('vi-VN');

            // Gửi AJAX cập nhật session
            fetch("/webbanhang/Cart/update", {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                body: "id=" + productId + "&quantity=" + quantity
            });
        });

    });
</script>

<?php include 'app/views/shares/footer.php'; ?>