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

    /* BREADCRUMB */
    .breadcrumb {
        padding: 15px 0;
        margin-bottom: 40px;
        background: transparent;
        border-bottom: 1px solid var(--border-color);
    }

    .breadcrumb-item a {
        color: var(--primary-color);
    }

    .breadcrumb-item.active {
        color: var(--text-light);
    }

    /* PRODUCT DETAIL */
    .detail-container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 50px;
        padding: 40px 0;
    }

    .product-image-section {
        background: var(--light-bg);
        border-radius: 12px;
        padding: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 500px;
    }

    .product-image {
        max-width: 100%;
        max-height: 500px;
        object-fit: contain;
    }

    .product-info-section h1 {
        font-size: 32px;
        font-weight: 700;
        color: var(--secondary-color);
        margin-bottom: 15px;
        line-height: 1.2;
    }

    .product-category {
        display: inline-block;
        background: rgba(184, 147, 106, 0.1);
        color: var(--primary-color);
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 20px;
    }

    .product-specs {
        margin-bottom: 30px;
        padding-bottom: 30px;
        border-bottom: 1px solid var(--border-color);
    }

    .spec-row {
        display: flex;
        justify-content: space-between;
        padding: 12px 0;
        font-size: 15px;
    }

    .spec-label {
        color: var(--text-light);
        font-weight: 500;
    }

    .spec-value {
        color: var(--text-dark);
        font-weight: 600;
    }

    .product-price-section {
        margin-bottom: 30px;
        padding: 25px;
        background: var(--light-bg);
        border-radius: 12px;
    }

    .price-label {
        color: var(--text-light);
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 8px;
    }

    .price-amount {
        font-size: 36px;
        font-weight: 700;
        color: var(--primary-color);
    }

    /* QUANTITY SELECTOR */
    .quantity-section {
        margin-bottom: 30px;
    }

    .quantity-label {
        display: block;
        font-weight: 600;
        color: var(--text-dark);
        margin-bottom: 10px;
        font-size: 14px;
    }

    .quantity-control {
        display: flex;
        align-items: center;
        gap: 10px;
        width: fit-content;
    }

    .qty-btn {
        width: 40px;
        height: 40px;
        border: 1px solid var(--border-color);
        background: white;
        color: var(--text-dark);
        border-radius: 6px;
        cursor: pointer;
        font-weight: 600;
        font-size: 18px;
        transition: all 0.3s;
    }

    .qty-btn:hover {
        border-color: var(--primary-color);
        color: var(--primary-color);
    }

    #quantity {
        width: 60px;
        height: 40px;
        text-align: center;
        border: 1px solid var(--border-color);
        border-radius: 6px;
        font-weight: 600;
        font-size: 16px;
    }

    #quantity:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(184, 147, 106, 0.1);
    }

    /* DESCRIPTION */
    .product-description {
        margin-bottom: 30px;
        padding-bottom: 30px;
        border-bottom: 1px solid var(--border-color);
    }

    .description-title {
        font-weight: 600;
        color: var(--text-dark);
        margin-bottom: 12px;
        font-size: 15px;
    }

    .description-text {
        color: var(--text-light);
        line-height: 1.8;
        font-size: 14px;
    }

    /* ACTION BUTTONS */
    .action-buttons {
        display: flex;
        gap: 15px;
    }

    .btn-action {
        flex: 1;
        padding: 14px 24px;
        border-radius: 8px;
        border: none;
        font-weight: 600;
        font-size: 15px;
        cursor: pointer;
        transition: all 0.3s;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .btn-primary-action {
        background: var(--primary-color);
        color: white;
    }

    .btn-primary-action:hover {
        background: var(--secondary-color);
        transform: translateY(-2px);
    }

    .btn-secondary-action {
        background: var(--light-bg);
        color: var(--text-dark);
        border: 1px solid var(--border-color);
    }

    .btn-secondary-action:hover {
        background: white;
        border-color: var(--primary-color);
        color: var(--primary-color);
    }

    /* ALERT */
    #cartAlert {
        background: #10B981;
        color: white;
        border: none;
        padding: 15px 20px;
        border-radius: 8px;
        font-weight: 500;
    }

    @media (max-width: 768px) {
        .detail-container {
            grid-template-columns: 1fr;
            gap: 30px;
        }

        .product-image-section {
            min-height: 300px;
        }

        .product-info-section h1 {
            font-size: 24px;
        }

        .action-buttons {
            flex-direction: column;
        }
    }
</style>

<div class="container py-4">

    <!-- BREADCRUMB -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/webbanhang/"><i class="bi bi-house"></i> Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="/webbanhang/Product/index">Sản phẩm</a></li>
            <li class="breadcrumb-item"><a href="/webbanhang/Product/index?category=<?= urlencode($product->category_name) ?>"><?= htmlspecialchars($product->category_name ?? 'Chưa có danh mục') ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= htmlspecialchars($product->name) ?></li>
        </ol>
    </nav>

    <!-- NOTIFICATION -->
    <div id="cartAlert" class="alert d-none position-fixed end-0 m-3" style="top: 80px; z-index: 9999;">
        <i class="bi bi-check-circle"></i> Đã thêm vào giỏ hàng!
    </div>

    <!-- DETAIL CONTAINER -->
    <div class="detail-container">

        <!-- IMAGE SECTION -->
        <div class="product-image-section">
            <?php if (!empty($product->image)): ?>
                <img src="data:image/jpeg;base64,<?= base64_encode($product->image) ?>" class="product-image" alt="<?= htmlspecialchars($product->name) ?>">
            <?php else: ?>
                <img src="/webbanhang/public/images/error/bed-error-image.jpg" class="product-image" alt="No image available">
            <?php endif; ?>
        </div>

        <!-- INFO SECTION -->
        <div class="product-info-section">

            <span class="product-category"><?= htmlspecialchars($product->category_name ?? 'Chưa phân loại') ?></span>

            <h1><?= htmlspecialchars($product->name) ?></h1>

            <!-- SPECIFICATIONS -->
            <div class="product-specs">
                <div class="spec-row">
                    <span class="spec-label"><i class="bi bi-palette"></i> Màu sắc</span>
                    <span class="spec-value"><?= htmlspecialchars($product->color) ?></span>
                </div>
                <div class="spec-row">
                    <span class="spec-label"><i class="bi bi-rulers"></i> Kích thước</span>
                    <span class="spec-value"><?= htmlspecialchars($product->size) ?></span>
                </div>
                <div class="spec-row">
                    <span class="spec-label"><i class="bi bi-gem"></i> Chất liệu</span>
                    <span class="spec-value"><?= htmlspecialchars($product->material) ?></span>
                </div>
            </div>

            <!-- PRICE -->
            <div class="product-price-section">
                <div class="price-label">Giá bán</div>
                <div class="price-amount" id="totalPrice"><?= number_format($product->price, 0, ',', '.') ?> đ</div>
            </div>

            <!-- QUANTITY -->
            <div class="quantity-section">
                <label class="quantity-label">Số lượng</label>
                <div class="quantity-control">
                    <button class="qty-btn" id="minusBtn">−</button>
                    <input type="number" id="quantity" value="1" min="1" max="999">
                    <button class="qty-btn" id="plusBtn">+</button>
                </div>
            </div>

            <!-- DESCRIPTION -->
            <div class="product-description">
                <div class="description-title">Mô tả sản phẩm</div>
                <div class="description-text"><?= htmlspecialchars($product->description) ?></div>
            </div>

            <!-- BUTTONS -->
            <div class="action-buttons">
                <a href="/webbanhang/Product/index" class="btn-action btn-secondary-action">
                    <i class="bi bi-arrow-left"></i> Quay lại
                </a>
                <button class="btn-action btn-primary-action add-to-cart-btn" data-id="<?= $product->id ?>" data-price="<?= $product->price ?>">
                    <i class="bi bi-cart-plus"></i> Thêm vào giỏ
                </button>
            </div>

        </div>

    </div>

</div>

<!-- SCRIPTS -->
<script>
    const quantityInput = document.getElementById('quantity');
    const minusBtn = document.getElementById('minusBtn');
    const plusBtn = document.getElementById('plusBtn');
    const totalPrice = document.getElementById('totalPrice');
    const price = <?= $product->price ?>;

    function updateTotal() {
        const qty = parseInt(quantityInput.value) || 1;
        const total = qty * price;
        totalPrice.innerText = total.toLocaleString('vi-VN') + ' đ';
    }

    minusBtn.addEventListener('click', () => {
        let qty = parseInt(quantityInput.value);
        if (qty > 1) {
            quantityInput.value = qty - 1;
            updateTotal();
        }
    });

    plusBtn.addEventListener('click', () => {
        let qty = parseInt(quantityInput.value);
        quantityInput.value = qty + 1;
        updateTotal();
    });

    quantityInput.addEventListener('input', () => {
        let qty = parseInt(quantityInput.value);
        if (isNaN(qty) || qty < 1) qty = 1;
        if (qty > 999) qty = 999;
        quantityInput.value = qty;
        updateTotal();
    });

    document.querySelector('.add-to-cart-btn').addEventListener('click', function() {
        const productId = this.dataset.id;
        const qty = quantityInput.value;

        fetch(`/webbanhang/Cart/add/${productId}?qty=${qty}`)
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    const alert = document.getElementById('cartAlert');
                    alert.classList.remove('d-none');
                    setTimeout(() => alert.classList.add('d-none'), 2000);
                }
            });
    });
</script>

<?php include 'app/views/shares/footer.php'; ?>