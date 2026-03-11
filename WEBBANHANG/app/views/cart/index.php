<?php include 'app/views/shares/header.php'; ?>

<style>
    body {
        background: url('/webbanhang/public/images/background/cart-background-4.avif') no-repeat center center fixed;
        background-size: cover;
        min-height: 100vh;
    }

    /* tiêu đề */
    .product-title {
        font-size: 42px;
        font-weight: 800;
        background: linear-gradient(135deg, #facc15 0%, #fbbf24 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        text-shadow: none;
        letter-spacing: 1px;
        text-transform: uppercase;
        position: relative;
        padding-bottom: 15px;
    }

    .product-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 3px;
        background: linear-gradient(90deg, #facc15, #fbbf24, transparent);
        border-radius: 2px;
    }

    /* Container styling */
    .cart-container {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        padding: 40px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
    }

    /* Table styling */
    .cart-table {
        border-collapse: separate;
        border-spacing: 0;
    }

    .cart-table thead {
        background: linear-gradient(135deg, #1f2937 0%, #111827 100%);
    }

    .cart-table thead th {
        color: #ffffff;
        font-weight: 600;
        padding: 16px;
        text-align: center;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .cart-table tbody tr {
        border-bottom: 1px solid #e5e7eb;
        transition: all 0.3s ease;
    }

    .cart-table tbody tr:hover {
        background-color: #f9fafb;
        box-shadow: inset 0 2px 8px rgba(0, 0, 0, 0.05);
    }

    .cart-table tbody td {
        padding: 16px;
        vertical-align: middle;
        color: #374151;
    }

    .product-image {
        width: 90px;
        height: 90px;
        object-fit: cover;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .product-image:hover {
        transform: scale(1.05);
    }

    .product-name {
        font-weight: 600;
        color: #111827;
        max-width: 200px;
    }

    /* Price styling */
    .price-text {
        font-weight: 700;
        color: #059669;
        font-size: 15px;
    }

    /* Quantity input */
    .quantity-input {
        width: 80px;
        text-align: center;
        border: 2px solid #e5e7eb;
        border-radius: 8px;
        padding: 8px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .quantity-input:focus {
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        outline: none;
    }

    /* Empty state styling */
    .empty-state {
        text-align: center;
        padding: 60px 30px;
    }

    .empty-state-icon {
        font-size: 80px;
        margin-bottom: 20px;
        opacity: 0.6;
    }

    .empty-state-text {
        font-size: 18px;
        color: #6b7280;
        margin-bottom: 30px;
    }

    /* Summary section */
    .cart-summary {
        background: linear-gradient(135deg, #f0f9ff 0%, #f8fafc 100%);
        border-radius: 16px;
        padding: 24px;
        margin-top: 30px;
        border-left: 4px solid #3b82f6;
    }

    .summary-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 12px 0;
        font-size: 16px;
    }

    .summary-row.total {
        border-top: 2px solid #cbd5e1;
        padding-top: 16px;
        margin-top: 16px;
    }

    .total-label {
        font-weight: 700;
        color: #111827;
    }

    .total-amount {
        font-weight: 800;
        font-size: 24px;
        background: linear-gradient(135deg, #059669);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    /* Action buttons */
    .action-buttons {
        display: flex;
        gap: 8px;
        justify-content: center;
    }

    .btn-custom {
        padding: 8px 12px;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 600;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
        text-decoration: none;
    }

    .btn-detail {
        background: linear-gradient(135deg, #3b82f6, #2563eb);
        color: white;
    }

    .btn-detail:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 16px rgba(59, 130, 246, 0.3);
    }

    .btn-delete {
        background: linear-gradient(135deg, #ef4444, #dc2626);
        color: white;
    }

    .btn-delete:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 16px rgba(239, 68, 68, 0.3);
    }

    /* Checkout button */
    .btn-checkout {
        background: linear-gradient(135deg, #10b981, #059669);
        color: white;
        padding: 14px 40px;
        border-radius: 10px;
        font-weight: 700;
        font-size: 16px;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
    }

    .btn-checkout:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 24px rgba(16, 185, 129, 0.4);
    }

    .btn-checkout:active {
        transform: translateY(-1px);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .cart-container {
            padding: 20px;
        }

        .cart-table thead th {
            padding: 12px 8px;
            font-size: 12px;
        }

        .cart-table tbody td {
            padding: 12px 8px;
        }

        .product-image {
            width: 70px;
            height: 70px;
        }

        .action-buttons {
            flex-direction: column;
        }

        .btn-custom {
            width: 100%;
        }

        .summary-row {
            font-size: 14px;
        }

        .total-amount {
            font-size: 20px;
        }
    }

    /* phân trang */
    .pagination-container {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 8px;
        margin-top: 40px;
    }

    .page-btn {
        padding: 8px 16px;
        border-radius: 8px;
        border: 1px solid #2563eb;
        background: white;
        color: #2563eb;
        font-weight: 600;
        cursor: pointer;
        transition: 0.2s;
    }

    .page-btn:hover {
        background: #2563eb;
        color: white;
    }

    .page-btn.active {
        background: #2563eb;
        color: white;
    }

    .page-btn.disabled {
        background: #e5e7eb;
        color: #9ca3af;
        border: none;
        cursor: not-allowed;
    }
</style>

<div class="cart-container">
    <h1 class="product-title mb-6">🛍️ Giỏ Hàng Của Bạn</h1>

    <?php if (empty($cart)): ?>
        <div class="empty-state">
            <div class="empty-state-icon">🛒</div>
            <p class="empty-state-text">Giỏ hàng của bạn đang trống</p>
            <a href="/webbanhang/product/" class="btn-checkout" style="background: linear-gradient(135deg, #6b7280, #4b5563);">
                Tiếp tục mua sắm
            </a>
        </div>
    <?php else: ?>

        <div class="overflow-x-auto">
            <table class="cart-table w-full">
                <thead>
                    <tr>
                        <th style="width: 10%;">Hình</th>
                        <th style="width: 25%;">Tên Sản Phẩm</th>
                        <th style="width: 15%;">Giá</th>
                        <th style="width: 12%;">Số Lượng</th>
                        <th style="width: 15%;">Thành Tiền</th>
                        <th style="width: 23%;">Hành Động</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $total = 0;
                    foreach ($cart as $item):
                        $subtotal = $item['price'] * $item['quantity'];
                        $total += $subtotal;
                        ?>

                        <tr data-id="<?= $item['id'] ?>" class="cart-item">
                            <td class="text-center">
                                <?php if (!empty($item['image'])): ?>
                                    <img src="data:image/jpeg;base64,<?= base64_encode($item['image']) ?>"
                                        class="product-image">
                                <?php else: ?>
                                    <img src="/webbanhang/public/images/error/bed-error-image.jpg" class="product-image">
                                <?php endif; ?>
                            </td>

                            <td>
                                <div class="product-name"><?= $item['name'] ?></div>
                            </td>

                            <td class="text-center">
                                <span class="price-text" data-price="<?= $item['price'] ?>">
                                    <span class="price-number"><?= number_format($item['price'], 0, ',', '.') ?></span> VNĐ
                                </span>
                            </td>

                            <td class="text-center">
                                <input type="number" value="<?= $item['quantity'] ?>" min="1"
                                    class="quantity-input">
                            </td>

                            <td class="text-center">
                                <span class="subtotal price-text">
                                    <span class="subtotal-number"><?= number_format($subtotal, 0, ',', '.') ?></span> VNĐ
                                </span>
                            </td>

                            <td>
                                <div class="action-buttons">
                                    <a href="/webbanhang/Cart/show/<?= $item['id'] ?>" class="btn-custom btn-detail">
                                        Chi tiết
                                    </a>

                                    <a href="/webbanhang/Cart/remove/<?= $item['id'] ?>" class="btn-custom btn-delete"
                                        onclick="return confirm('Xóa sản phẩm này?')">
                                        Xóa
                                    </a>
                                </div>
                            </td>
                        </tr>

                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>

        <!-- phân trang -->
        <div class="d-flex justify-content-center mt-4">
            <ul class="pagination" id="pagination"></ul>
        </div>

        <!-- Cart Summary -->
        <div class="cart-summary">
            <div class="summary-row total">
                <span class="total-label">Tổng Tiền:</span>
                <span class="total-amount" id="totalAmount">
                    <span class="total-number"><?= number_format($total, 0, ',', '.') ?></span> VNĐ
                </span>
                
            </div>
        </div>

        <!-- Checkout Button -->
        <div class="text-end mt-10">
            <a href="/webbanhang/Order/checkout" class="btn-checkout">
                ✓ Thanh Toán Ngay
            </a>
        </div>

    <?php endif; ?>

</div>

<!-- JS xử lý thay đổi số lượng -->
<script>
    document.querySelectorAll(".quantity-input").forEach(input => {
        input.addEventListener("change", function () {
            const row = this.closest("tr");
            const productId = row.getAttribute("data-id");
            const quantity = this.value;
            const price = parseInt(row.querySelector(".price-text").dataset.price);

            // Cập nhật thành tiền frontend
            const subtotalCell = row.querySelector(".subtotal-number");
            const newSubtotal = price * quantity;
            subtotalCell.innerText = newSubtotal.toLocaleString('vi-VN');

            // Cập nhật tổng tiền
            let total = 0;
            document.querySelectorAll(".subtotal-number").forEach(cell => {
                total += parseInt(cell.innerText.replace(/\D/g, ""));
            });

            document.getElementById("totalAmount").querySelector(".total-number").innerText =
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

    // xử lý phân trang
    const cartItems = document.querySelectorAll(".cart-item");
    const pagination = document.getElementById("pagination");

    let currentPage = 1;
    const itemsPerPage = 5;

    function showPage(page) {

        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });

        currentPage = page;

        const start = (page - 1) * itemsPerPage;
        const end = start + itemsPerPage;

        cartItems.forEach((item, i) => {
            item.style.display = (i >= start && i < end) ? "table-row" : "none";
        });

        createPagination(cartItems.length);

        // cập nhật tổng tiền sau khi phân trang
        updateTotalAmount();
    }

    function createPagination(totalItems) {

        pagination.innerHTML = "";

        const pageCount = Math.ceil(totalItems / itemsPerPage);

        if (pageCount <= 1) return;

        const container = document.createElement("div");
        container.className = "pagination-container";

        // nút previous
        const prev = document.createElement("button");
        prev.innerText = "« Trước";
        prev.className = "page-btn" + (currentPage === 1 ? " disabled" : "");
        prev.onclick = () => {
            if (currentPage > 1) showPage(currentPage - 1);
        };
        container.appendChild(prev);

        // các số trang
        for (let i = 1; i <= pageCount; i++) {

            const btn = document.createElement("button");

            btn.innerText = i;

            btn.className = "page-btn" + (i === currentPage ? " active" : "");

            btn.onclick = () => showPage(i);

            container.appendChild(btn);
        }

        // nút next
        const next = document.createElement("button");

        next.innerText = "Sau »";

        next.className = "page-btn" + (currentPage === pageCount ? " disabled" : "");

        next.onclick = () => {
            if (currentPage < pageCount) showPage(currentPage + 1);
        };

        container.appendChild(next);

        pagination.appendChild(container);
    }

    function updateTotalAmount() {
        let total = 0;
        document.querySelectorAll(".subtotal-number").forEach(cell => {
            total += parseInt(cell.innerText.replace(/\D/g, ""));
        });
        document.getElementById("totalAmount").querySelector(".total-number").innerText = total.toLocaleString('vi-VN');
    }

    // Khởi tạo phân trang
    if (cartItems.length > 0) {
        showPage(1);
    }
</script>

<?php include 'app/views/shares/footer.php'; ?>