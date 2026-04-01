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
        background: url("/webbanhang/public/images/background/background-3.jpg") center/cover no-repeat;
    }

    /* PAGE TITLE */
    .page-header {
        padding: 50px 30px;
        margin-bottom: 40px;
        background: linear-gradient(135deg, #ffffff, #f8f7f3);
        border-radius: 16px;
        border: 1px solid var(--border-color);
    }

    .page-header::after {
        content: "";
        display: block;
        width: 60px;
        height: 3px;
        background: var(--primary-color);
        margin-top: 15px;
        border-radius: 2px;
    }

    .page-title {
        font-size: 32px;
        font-weight: 700;
        color: var(--secondary-color);
        margin: 0;
        letter-spacing: -0.5px;
    }

    .page-subtitle {
        color: var(--text-light);
        margin-top: 10px;
        font-size: 15px;
        font-weight: 400;
    }

    /* FILTER SECTION */
    .filter-section {
        display: flex;
        gap: 15px;
        align-items: center;
        flex-wrap: wrap;
        margin-bottom: 40px;
        padding-bottom: 20px;
        border-bottom: 1px solid var(--border-color);
    }

    .search-box {
        flex: 1;
        min-width: 250px;
    }

    .search-box input {
        border: 1px solid var(--border-color);
        border-radius: 8px;
        padding: 10px 15px;
        font-size: 14px;
        transition: 0.3s;
    }

    .search-box input:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(184, 147, 106, 0.1);
    }

    .filter-box select {
        border: 1px solid var(--border-color);
        border-radius: 8px;
        padding: 10px 12px;
        font-size: 14px;
        color: var(--text-dark);
        background: white;
        cursor: pointer;
        transition: 0.3s;
    }

    .filter-box select:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(184, 147, 106, 0.1);
    }

    /* PRODUCT GRID */
    .product-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 25px;
        margin-bottom: 50px;
    }

    .product-card {
        background: white;
        border: 1px solid var(--border-color);
        border-radius: 12px;
        overflow: hidden;
        transition: all 0.3s;
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .product-card:hover {
        border-color: var(--primary-color);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
        transform: translateY(-5px);
    }

    .product-image {
        width: 100%;
        height: 240px;
        object-fit: contain;
        background: var(--light-bg);
        padding: 15px;
        border-bottom: 1px solid var(--border-color);
    }

    .product-body {
        padding: 18px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .product-name {
        font-size: 16px;
        font-weight: 600;
        color: var(--text-dark);
        margin-bottom: 8px;
        line-height: 1.4;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .product-category {
        font-size: 12px;
        color: var(--text-light);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 12px;
    }

    .product-price {
        font-size: 18px;
        font-weight: 700;
        color: var(--primary-color);
        margin-bottom: 12px;
        margin-top: auto;
    }

    .btn-add-cart {
        background: var(--primary-color);
        color: white;
        border: none;
        padding: 12px 16px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.3s;
        width: 100%;
    }

    .btn-add-cart:hover {
        background: var(--secondary-color);
        transform: translateY(-2px);
    }

    /* NO PRODUCTS MESSAGE */
    .no-products {
        text-align: center;
        padding: 60px 20px;
        color: var(--text-light);
    }

    .no-products-icon {
        font-size: 48px;
        color: var(--border-color);
        margin-bottom: 15px;
    }

    .no-products h3 {
        color: var(--text-dark);
        margin-bottom: 10px;
    }

    /* PAGINATION */
    .pagination-section {
        display: flex;
        justify-content: center;
        gap: 8px;
        margin: 50px 0;
    }

    .page-btn {
        padding: 10px 14px;
        border: 1px solid var(--border-color);
        background: white;
        color: var(--text-dark);
        border-radius: 6px;
        cursor: pointer;
        font-weight: 500;
        transition: all 0.3s;
        font-size: 14px;
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
        color: var(--text-light);
    }

    .product-item {
        display: block;
    }

    .product-item.hidden {
        display: none !important;
    }

    #cartAlert {
        background: #10b981;
        color: white;
        padding: 15px 20px;
        border-radius: 8px;
        font-weight: 500;
    }
</style>

<div class="container py-4">

    <!-- PAGE HEADER -->
    <div class="page-header">
        <h1 class="page-title">Danh sách sản phẩm</h1>
        <p class="page-subtitle">Giường ngủ cao cấp – thiết kế tinh tế cho không gian của bạn</p>
    </div>

    <!-- NOTIFICATION -->
    <div id="cartAlert" class="alert d-none position-fixed end-0 m-3" style="top: 80px; z-index: 9999;">
        <i class="bi bi-check-circle"></i> Đã thêm vào giỏ hàng!
    </div>

    <!-- FILTERS -->
    <div class="filter-section">
        <div class="search-box">
            <input type="text" id="searchBox" placeholder="Tìm sản phẩm..." />
        </div>
        <div class="filter-box">
            <select id="categoryFilter">
                <option value="">Tất cả danh mục</option>
                <?php
                $categories = [];
                foreach ($products as $p) {
                    $categories[$p->category_name] = true;
                }
                foreach (array_keys($categories) as $cat) {
                    echo "<option value=\"" . htmlspecialchars($cat) . "\">" . htmlspecialchars($cat) . "</option>";
                }
                ?>
            </select>
        </div>
        <div class="filter-box">
            <select id="priceFilter">
                <option value="">Tất cả giá</option>
                <option value="1">Dưới 5 triệu</option>
                <option value="2">5 - 10 triệu</option>
                <option value="3">Trên 10 triệu</option>
            </select>
        </div>
    </div>

    <!-- PRODUCT GRID -->
    <div class="product-grid" id="productList">
        <?php foreach ($products as $product): ?>
            <div class="product-item hidden" data-name="<?= strtolower($product->name) ?>"
                data-price="<?= $product->price ?>" data-category="<?= htmlspecialchars($product->category_name) ?>">
                <div class="product-card">
                    <a href="/webbanhang/Product/detail/<?= $product->id ?>" style="text-decoration: none;">
                        <?php if (!empty($product->image)): ?>
                            <img src="data:image/jpeg;base64,<?= base64_encode($product->image) ?>" class="product-image"
                                alt="<?= htmlspecialchars($product->name) ?>">
                        <?php else: ?>
                            <img src="/webbanhang/public/images/error/bed-error-image.jpg" class="product-image" alt="No image">
                        <?php endif; ?>
                    </a>
                    <div class="product-body">
                        <a href="/webbanhang/Product/detail/<?= $product->id ?>"
                            style="text-decoration: none; color: inherit;">
                            <div class="product-category"><?= htmlspecialchars($product->category_name) ?></div>
                            <div class="product-name"><?= htmlspecialchars($product->name) ?></div>
                        </a>
                        <div class="product-price"><?= number_format($product->price, 0, ',', '.') ?> đ</div>
                        <button class="btn-add-cart add-to-cart-btn" data-id="<?= $product->id ?>">
                            <i class="bi bi-cart-plus"></i> Thêm vào giỏ
                        </button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- NO PRODUCTS MESSAGE -->
    <div id="noProductMsg" class="no-products" style="display: none;">
        <div class="no-products-icon"><i class="bi bi-inbox"></i></div>
        <h3>Không tìm thấy sản phẩm</h3>
        <p>Vui lòng thử lại với các tiêu chí tìm kiếm khác</p>
    </div>

    <!-- PAGINATION -->
    <div id="paginationContainer" class="pagination-section"></div>

</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchBox = document.getElementById('searchBox');
        const categoryFilter = document.getElementById('categoryFilter');
        const priceFilter = document.getElementById('priceFilter');
        const productList = document.getElementById('productList');
        const noProductMsg = document.getElementById('noProductMsg');
        const paginationContainer = document.getElementById('paginationContainer');
        const cartAlert = document.getElementById('cartAlert');

        const itemsPerPage = 8;
        let currentPage = 1;

        function getFilteredProducts() {
            const keyword = searchBox.value.toLowerCase();
            const selectedCategory = categoryFilter.value;
            const selectedPrice = priceFilter.value;

            const allItems = Array.from(document.querySelectorAll('.product-item'));

            return allItems.filter(item => {
                const name = item.dataset.name.toLowerCase();
                const price = parseInt(item.dataset.price);
                const category = item.dataset.category;

                // Tìm kiếm
                if (keyword && !name.includes(keyword)) return false;

                // Danh mục
                if (selectedCategory && category !== selectedCategory) return false;

                // Giá
                if (selectedPrice === '1' && price >= 5000000) return false;
                if (selectedPrice === '2' && (price < 5000000 || price > 10000000)) return false;
                if (selectedPrice === '3' && price <= 10000000) return false;

                return true;
            });
        }

        function showPage(pageNum) {
            currentPage = pageNum;
            const filtered = getFilteredProducts();

            // Ẩn tất cả
            document.querySelectorAll('.product-item').forEach(item => {
                item.classList.add('hidden');
            });

            // Hiển thị những cái trong trang hiện tại
            const start = (pageNum - 1) * itemsPerPage;
            const end = start + itemsPerPage;

            filtered.slice(start, end).forEach(item => {
                item.classList.remove('hidden');
            });

            // Hiển thị/ẩn tin nhắn "không có sản phẩm"
            if (filtered.length === 0) {
                noProductMsg.style.display = 'block';
                paginationContainer.innerHTML = '';
            } else {
                noProductMsg.style.display = 'none';
                createPagination(filtered.length);
            }

            // Scroll lên đầu
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        function createPagination(totalItems) {
            paginationContainer.innerHTML = '';

            const pageCount = Math.ceil(totalItems / itemsPerPage);
            if (pageCount <= 1) return;

            // Nút Trước
            const prevBtn = document.createElement('button');
            prevBtn.className = 'page-btn' + (currentPage === 1 ? ' disabled' : '');
            prevBtn.innerText = '‹ Trước';
            prevBtn.disabled = currentPage === 1;
            prevBtn.onclick = () => currentPage > 1 && showPage(currentPage - 1);
            paginationContainer.appendChild(prevBtn);

            // Các nút số trang
            for (let i = 1; i <= pageCount; i++) {
                const btn = document.createElement('button');
                btn.className = 'page-btn' + (i === currentPage ? ' active' : '');
                btn.innerText = i;
                btn.onclick = () => showPage(i);
                paginationContainer.appendChild(btn);
            }

            // Nút Sau
            const nextBtn = document.createElement('button');
            nextBtn.className = 'page-btn' + (currentPage === pageCount ? ' disabled' : '');
            nextBtn.innerText = 'Sau ›';
            nextBtn.disabled = currentPage === pageCount;
            nextBtn.onclick = () => currentPage < pageCount && showPage(currentPage + 1);
            paginationContainer.appendChild(nextBtn);
        }

        // Thêm vào giỏ
        document.addEventListener('click', function (e) {
            if (e.target.closest('.add-to-cart-btn')) {
                const btn = e.target.closest('.add-to-cart-btn');
                const productId = btn.dataset.id;

                fetch('/webbanhang/Cart/add/' + productId)
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            cartAlert.classList.remove('d-none');
                            setTimeout(() => {
                                cartAlert.classList.add('d-none');
                            }, 2000);
                        }
                    });
            }
        });

        // Event listeners
        searchBox.addEventListener('input', () => showPage(1));
        categoryFilter.addEventListener('change', () => showPage(1));
        priceFilter.addEventListener('change', () => showPage(1));

        // Load từ URL nếu có
        const params = new URLSearchParams(window.location.search);
        const categoryFromURL = params.get('category');
        if (categoryFromURL) {
            categoryFilter.value = categoryFromURL;
        }

        // Hiển thị trang đầu
        showPage(1);
    });
</script>

<?php include 'app/views/shares/footer.php'; ?>