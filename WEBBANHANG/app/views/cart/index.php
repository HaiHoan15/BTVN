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
        --success: #10B981;
        --danger: #EF4444;
    }

    body {
        background: url("/webbanhang/public/images/background/cart-background-3.avif") center/cover no-repeat;
    }

    /* PAGE HEADER */
    .cart-header {
        padding: 40px 20px 30px 20px;
        margin-bottom: 40px;
        border-bottom: 2px solid var(--border-color);
        background: white;
        border-radius: 12px;

    }

    .cart-subtitle {
        color: var(--text-light);
        margin-top: 8px;
        font-size: 14px;
    }

    .cart-title {
        font-size: 32px;
        font-weight: 700;
        color: var(--secondary-color);
        margin: 0;
    }

    /* EMPTY STATE */
    .empty-cart {
        text-align: center;
        padding: 80px 40px;
    }

    .empty-icon {
        font-size: 64px;
        color: var(--border-color);
        margin-bottom: 20px;
    }

    .empty-text {
        font-size: 18px;
        color: var(--text-dark);
        margin-bottom: 10px;
    }

    .empty-description {
        color: var(--text-light);
        margin-bottom: 30px;
        font-size: 14px;
    }

    .btn-continue-shopping {
        display: inline-block;
        background: var(--primary-color);
        color: white;
        padding: 12px 30px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
        transition: 0.3s;
    }

    .btn-continue-shopping:hover {
        background: var(--secondary-color);
    }

    /* CART TABLE CONTAINER */
    .cart-table-container {
        background: var(--light-bg);
        border-radius: 12px;
        padding: 30px;
        margin-bottom: 30px;
        border: 1px solid var(--border-color);
    }

    .cart-table-title {
        font-size: 18px;
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    /* CART TABLE */
    .cart-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 0;
    }

    .cart-table thead {
        background: var(--secondary-color);
    }

    .cart-table thead th {
        color: white;
        padding: 16px;
        text-align: left;
        font-weight: 600;
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .cart-table tbody tr {
        border-bottom: 1px solid var(--border-color);
        transition: 0.3s;
    }

    .cart-table tbody tr:hover {
        background: var(--light-bg);
    }

    .cart-table tbody td {
        padding: 18px 16px;
        vertical-align: middle;
    }

    .product-image {
        width: 100px;
        height: 100px;
        object-fit: contain;
        background: white;
        border-radius: 8px;
        border: 1px solid var(--border-color);
    }

    .product-name {
        font-weight: 600;
        color: var(--text-dark);
        margin-bottom: 4px;
    }

    .product-sku {
        font-size: 12px;
        color: var(--text-light);
    }

    .price-value {
        font-weight: 700;
        color: var(--primary-color);
        font-size: 15px;
    }

    .quantity-input {
        width: 80px;
        padding: 8px 12px;
        border: 1px solid var(--border-color);
        border-radius: 6px;
        text-align: center;
        font-weight: 600;
        transition: 0.3s;
    }

    .quantity-input:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(184, 147, 106, 0.1);
    }

    .subtotal {
        font-weight: 700;
        color: var(--text-dark);
        font-size: 15px;
    }

    .action-buttons {
        display: flex;
        gap: 8px;
    }

    .btn-action {
        padding: 6px 12px;
        border: none;
        border-radius: 6px;
        font-weight: 600;
        font-size: 12px;
        cursor: pointer;
        transition: 0.3s;
        text-decoration: none;
    }

    .btn-view {
        background: var(--primary-color);
        color: white;
    }

    .btn-view:hover {
        background: var(--secondary-color);
    }

    .btn-remove {
        background: rgba(239, 68, 68, 0.1);
        color: var(--danger);
    }

    .btn-remove:hover {
        background: var(--danger);
        color: white;
    }

    /* CART SUMMARY */
    .cart-footer {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 40px;
        margin-top: 50px;
    }

    .cart-summary {
        background: var(--light-bg);
        border-radius: 12px;
        padding: 30px;
    }

    .summary-title {
        font-size: 18px;
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 20px;
    }

    .summary-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 12px;
        font-size: 14px;
    }

    .summary-label {
        color: var(--text-light);
    }

    .summary-value {
        font-weight: 600;
        color: var(--text-dark);
    }

    .summary-divider {
        border-top: 1px solid var(--border-color);
        margin: 15px 0;
    }

    .summary-total {
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 20px;
        font-weight: 700;
        color: var(--secondary-color);
    }

    .summary-total-amount {
        color: var(--primary-color);
    }

    .checkout-buttons {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .btn-checkout {
        background: var(--primary-color);
        color: white;
        padding: 14px 24px;
        border: none;
        border-radius: 8px;
        font-weight: 700;
        font-size: 15px;
        cursor: pointer;
        transition: 0.3s;
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .btn-checkout:hover {
        background: var(--secondary-color);
        transform: translateY(-2px);
    }

    .btn-back {
        background: white;
        color: var(--primary-color);
        border: 2px solid var(--border-color);
        padding: 12px 24px;
    }

    .btn-back:hover {
        border-color: var(--primary-color);
        background: rgba(184, 147, 106, 0.05);
    }

    /* PAGINATION */
    .pagination-section {
        display: flex;
        justify-content: center;
        gap: 8px;
        margin: 40px 0;
    }

    .page-btn {
        padding: 8px 12px;
        border: 1px solid var(--border-color);
        background: white;
        color: var(--text-dark);
        border-radius: 6px;
        cursor: pointer;
        font-weight: 500;
        font-size: 14px;
        transition: 0.3s;
    }

    .page-btn:hover:not(.disabled) {
        border-color: var(--primary-color);
        color: var(--primary-color);
    }

    .page-btn.active {
        background: var(--primary-color);
        color: white;
        border-color: var(--primary-color);
    }

    .page-btn.disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }

    @media (max-width: 1024px) {
        .cart-footer {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 768px) {
        .cart-table-container {
            padding: 15px;
        }

        .cart-table-title {
            font-size: 16px;
        }

        .action-buttons {
            flex-direction: column;
        }

        .btn-action {
            width: 100%;
        }

        .cart-table {
            font-size: 13px;
        }

        .cart-table tbody td {
            padding: 12px 8px;
        }

        .product-image {
            width: 70px;
            height: 70px;
        }
    }
</style>

<div class="container py-4">

    <!-- HEADER -->
    <div class="cart-header">
        <h1 class="cart-title">Giỏ hàng của bạn</h1>
        <p class="cart-subtitle">Kiểm tra và hoàn tất đơn hàng của bạn</p>
    </div>

    <?php if (empty($cart)): ?>
        <!-- EMPTY STATE -->
        <div class="empty-cart" style="background: white; border-radius: 12px; margin-bottom: 30px;">
            <div class="empty-icon"><i class="bi bi-cart-x"></i></div>
            <h2 class="empty-text">Giỏ hàng trống</h2>
            <p class="empty-description">Bạn chưa thêm sản phẩm nào vào giỏ hàng</p>
            <a href="/webbanhang/Product/index" class="btn-continue-shopping">
                <i class="bi bi-shop"></i> Tiếp tục mua sắm
            </a>
        </div>

    <?php else: ?>
        <!-- CART TABLE CONTAINER -->
        <div class="cart-table-container">
            <h2 class="cart-table-title"><i class="bi bi-bag-check"></i> Chi tiết sản phẩm</h2>

            <!-- CART TABLE -->
            <table class="cart-table">
                <thead>
                    <tr>
                        <th style="width: 12%;">Hình ảnh</th>
                        <th style="width: 28%;">Sản phẩm</th>
                        <th style="width: 15%;">Giá</th>
                        <th style="width: 15%;">Số lượng</th>
                        <th style="width: 18%;">Thành tiền</th>
                        <th style="width: 12%;">Hành động</th>
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
                                    <img src="data:image/jpeg;base64,<?= base64_encode($item['image']) ?>" class="product-image"
                                        alt="<?= htmlspecialchars($item['name']) ?>">
                                <?php else: ?>
                                    <img src="/webbanhang/public/images/error/bed-error-image.jpg" class="product-image"
                                        alt="No image">
                                <?php endif; ?>
                            </td>

                            <td>
                                <div class="product-name"><?= htmlspecialchars($item['name']) ?></div>
                                <div class="product-sku">SKU: #<?= $item['id'] ?></div>
                            </td>

                            <td>
                                <span class="price-value" data-price="<?= $item['price'] ?>">
                                    <?= number_format($item['price'], 0, ',', '.') ?> đ
                                </span>
                            </td>

                            <td class="text-center">
                                <input type="number" value="<?= $item['quantity'] ?>" min="1" class="quantity-input">
                            </td>

                            <td>
                                <span class="subtotal">
                                    <span class="subtotal-number"><?= number_format($subtotal, 0, ',', '.') ?></span> đ
                                </span>
                            </td>

                            <td>
                                <div class="action-buttons">
                                    <a href="/webbanhang/Cart/show/<?= $item['id'] ?>" class="btn-action btn-view"
                                        title="Xem chi tiết">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="/webbanhang/Cart/remove/<?= $item['id'] ?>" class="btn-action btn-remove"
                                        onclick="return confirm('Xóa sản phẩm này?')" title="Xóa">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- PAGINATION -->
        <div class="pagination-section" id="paginationContainer"></div>

        <!-- FOOTER -->
        <div class="cart-footer">
            <div></div>

            <div class="cart-summary">
                <h3 class="summary-title">Tóm tắt đơn hàng</h3>

                <div class="summary-row">
                    <span class="summary-label">Tạm tính:</span>
                    <span class="summary-value subtotal-amount"><?= number_format($total, 0, ',', '.') ?> đ</span>
                </div>

                <div class="summary-row">
                    <span class="summary-label">Phí vận chuyển:</span>
                    <span class="summary-value">Miễn phí</span>
                </div>

                <div class="summary-divider"></div>

                <div class="summary-total">
                    <span>Tổng cộng:</span>
                    <span class="summary-total-amount" id="totalAmount"><?= number_format($total, 0, ',', '.') ?> đ</span>
                </div>

                <div class="checkout-buttons" style="margin-top: 25px;">
                    <a href="/webbanhang/Order/checkout" class="btn-checkout">
                        <i class="bi bi-credit-card"></i> Tiến hành thanh toán
                    </a>
                    <a href="/webbanhang/Product/index" class="btn-back">
                        <i class="bi bi-arrow-left"></i> Tiếp tục mua sắm
                    </a>
                </div>
            </div>
        </div>

    <?php endif; ?>

</div>

<!-- SCRIPTS -->
<script>
    document.querySelectorAll('.quantity-input').forEach(input => {
        input.addEventListener('change', function () {
            const row = this.closest('tr');
            const productId = row.dataset.id;
            const quantity = this.value;
            const price = parseInt(row.querySelector('.price-value').dataset.price);

            // Update subtotal
            const subtotal = price * quantity;
            row.querySelector('.subtotal-number').innerText = subtotal.toLocaleString('vi-VN');

            // Update total
            updateTotal();

            // Send to server
            fetch('/webbanhang/Cart/update', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: `id=${productId}&quantity=${quantity}`
            });
        });
    });

    const cartItems = document.querySelectorAll('.cart-item');
    let currentPage = 1;
    const itemsPerPage = 5;

    function updateTotal() {
        let total = 0;
        document.querySelectorAll('.subtotal-number').forEach(el => {
            total += parseInt(el.innerText.replace(/\D/g, ''));
        });
        document.getElementById('totalAmount').innerText = total.toLocaleString('vi-VN') + ' đ';
        document.querySelector('.subtotal-amount').innerText = total.toLocaleString('vi-VN') + ' đ';
    }

    function showPage(page) {
        currentPage = page;
        const start = (page - 1) * itemsPerPage;
        const end = start + itemsPerPage;

        cartItems.forEach((item, i) => {
            item.style.display = (i >= start && i < end) ? 'table-row' : 'none';
        });

        createPagination();
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    function createPagination() {
        const pageCount = Math.ceil(cartItems.length / itemsPerPage);
        const container = document.getElementById('paginationContainer');
        container.innerHTML = '';

        if (pageCount <= 1) return;

        const prev = document.createElement('button');
        prev.innerText = '‹ Trước';
        prev.className = 'page-btn' + (currentPage === 1 ? ' disabled' : '');
        prev.onclick = () => { if (currentPage > 1) showPage(currentPage - 1); };
        container.appendChild(prev);

        for (let i = 1; i <= pageCount; i++) {
            const btn = document.createElement('button');
            btn.innerText = i;
            btn.className = 'page-btn' + (i === currentPage ? ' active' : '');
            btn.onclick = () => showPage(i);
            container.appendChild(btn);
        }

        const next = document.createElement('button');
        next.innerText = 'Sau ›';
        next.className = 'page-btn' + (currentPage === pageCount ? ' disabled' : '');
        next.onclick = () => { if (currentPage < pageCount) showPage(currentPage + 1); };
        container.appendChild(next);
    }

    if (cartItems.length > 0) showPage(1);
</script>

<?php include 'app/views/shares/footer.php'; ?>