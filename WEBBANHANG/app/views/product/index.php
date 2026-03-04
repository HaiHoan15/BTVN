<?php include 'app/views/shares/header.php'; ?>

<style>
    /* card sản phẩm */

    body {
        background: url('/webbanhang/public/images/background/background-1.avif') no-repeat center center fixed;
        background-size: cover;
        min-height: 100vh;
    }

    .product-card {
        border: 1.5px solid #e0e7ef;
        border-radius: 12px;
        overflow: hidden;
        transition: 0.3s;
        background: #f1f5f9;
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(37, 99, 235, 0.10);
        border-color: #2563eb;
    }

    /* tiêu đề */
    .product-title {
        font-size: 42px;
        font-weight: 800;
        color: #facc15;
        text-shadow:
            0 2px 10px rgba(0, 0, 0, 0.6),
            0 0 15px rgba(250, 204, 21, 0.6);
        letter-spacing: 1px;
    }

    /* ảnh */

    .product-img {
        height: 220px;
        width: 100%;
        object-fit: contain;
        background: #fff;
        border-bottom: 1px solid #e0e7ef;
    }

    /* body */

    .product-body {
        padding: 15px;
    }

    /* tên */

    .product-name {
        font-size: 18px;
        font-weight: 600;
        color: #333;
    }

    /* danh mục */

    .product-category {
        font-size: 14px;
        color: #777;
    }

    /* giá */

    .product-price {
        font-size: 18px;
        font-weight: bold;
        color: #c0392b;
    }

    /* link card */

    .product-link {
        text-decoration: none;
        color: inherit;
    }

    .btn-cart {
        background: #2563eb;
        color: #fff;
        border: none;
        font-weight: 600;
        letter-spacing: 0.5px;
        box-shadow: 0 2px 8px rgba(37, 99, 235, 0.07);
        transition: 0.2s;
    }

    .btn-cart:hover {
        background: #facc15;
        color: #22304a;
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

<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">

    <h1 class="product-title mb-0">Danh Sách Sản Phẩm</h1>

    <div class="d-flex gap-2">

        <input type="text" id="searchBox" class="form-control" placeholder="Tìm sản phẩm..." style="width:220px;">

        <select id="priceFilter" class="form-select" style="width:160px;">
            <option value="">Giá</option>
            <option value="1">Dưới 5 triệu</option>
            <option value="2">5 - 10 triệu</option>
            <option value="3">Trên 10 triệu</option>
        </select>

        <select id="categoryFilter" class="form-select" style="width:180px;">
            <option value="">Tất cả</option>

            <?php
            $categories = [];
            foreach ($products as $p) {
                $categories[$p->category_name] = true;
            }

            foreach (array_keys($categories) as $cat) {
                echo "<option value=\"$cat\">$cat</option>";
            }
            ?>

        </select>

    </div>

</div>

<div id="cartAlert" class="alert alert-success position-fixed end-0 m-3 d-none" style="top: 40px; z-index:9999;">
    Đã thêm vào giỏ hàng!
</div>

<div class="row" id="productList" style="display: flex; flex-wrap: wrap;">
    <?php foreach ($products as $product): ?>
        <div class="col-12 col-sm-6 col-lg-3 mb-4 product-item" data-name="<?= strtolower($product->name) ?>"
            data-price="<?= $product->price ?>" data-category="<?= $product->category_name ?>">
            <div class="card product-card h-100 d-flex flex-column">
                <a href="/webbanhang/Product/detail/<?= $product->id ?>" class="product-link">
                    <?php if (!empty($product->image)): ?>
                        <img src="data:image/jpeg;base64,<?= base64_encode($product->image) ?>"
                            class="card-img-top product-img">
                    <?php else: ?>
                        <img src="/webbanhang/public/images/error/bed-error-image.jpg" class="card-img-top product-img">
                    <?php endif; ?>
                    <div class="product-body">
                        <div class="product-name mb-1">
                            <?= $product->name ?>
                        </div>
                        <div class="product-category mb-2">
                            <?= $product->category_name ?>
                        </div>
                        <div class="product-price">
                            <?= number_format($product->price, 0, ',', '.') ?> VNĐ
                        </div>
                    </div>
                </a>
                <div class="mt-auto p-3 pt-0">
                    <button class="btn btn-cart w-100 add-to-cart-btn" data-id="<?= $product->id ?>">
                        Thêm vào giỏ
                    </button>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<div id="noProductMsg" style="display:none; text-align:center; color:white; font-size:22px; margin-top:40px;">
    Không tìm thấy sản phẩm
</div>

<!-- phân trang -->
<div class="d-flex justify-content-center mt-4">
    <ul class="pagination" id="pagination"></ul>
</div>

<!-- mã JS để xử lý sự kiện thêm vào giỏ hàng -->
<script>
    document.querySelectorAll(".add-to-cart-btn").forEach(button => {
        button.addEventListener("click", function () {

            const productId = this.getAttribute("data-id");

            fetch("/webbanhang/Cart/add/" + productId)
                .then(response => response.json())
                .then(data => {
                    if (data.status === "success") {

                        const alertBox = document.getElementById("cartAlert");
                        alertBox.classList.remove("d-none");

                        setTimeout(() => {
                            alertBox.classList.add("d-none");
                        }, 1000);
                    }
                });
        });
    });

    // xử lý tìm kiếm và phân trang
    const searchBox = document.getElementById("searchBox");
    const products = document.querySelectorAll(".product-item");
    const pagination = document.getElementById("pagination");

    let currentPage = 1;
    const itemsPerPage = 8;

    function showPage(page) {

        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });

        currentPage = page;

        const visibleProducts = Array.from(products).filter(p => p.dataset.visible !== "0");

        const start = (page - 1) * itemsPerPage;
        const end = start + itemsPerPage;

        visibleProducts.forEach((item, i) => {
            item.style.display = (i >= start && i < end) ? "block" : "none";
        });

        createPagination(visibleProducts.length);

        // kiểm tra nếu không có sản phẩm
        const msg = document.getElementById("noProductMsg");
        if (visibleProducts.length === 0) {
            msg.style.display = "block";
        } else {
            msg.style.display = "none";
        }
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

    searchBox.addEventListener("input", function () {
        const keyword = this.value.toLowerCase();
        products.forEach(product => {
            const name = product.innerText.toLowerCase();
            if (name.includes(keyword)) {
                product.dataset.visible = "1";
            } else {
                product.dataset.visible = "0";
                product.style.display = "none";
            }
        });
        showPage(1);
    });

    // Đánh dấu tất cả sản phẩm là visible ban đầu
    products.forEach(product => product.dataset.visible = "1");
    showPage(1);

    // xử lý lọc sản phẩm theo giá và danh mục
    const priceFilter = document.getElementById("priceFilter");
    const categoryFilter = document.getElementById("categoryFilter");

    function filterProducts() {

        const keyword = searchBox.value.toLowerCase();
        const price = priceFilter.value;
        const category = categoryFilter.value;

        products.forEach(product => {
            const name = product.dataset.name;
            const p = parseInt(product.dataset.price);
            const cat = product.dataset.category;

            let show = true;

            if (!name.includes(keyword)) show = false;
            if (price === "1" && p > 5000000) show = false;
            if (price === "2" && (p < 5000000 || p > 10000000)) show = false;
            if (price === "3" && p < 10000000) show = false;
            if (category !== "" && cat !== category) show = false;

            product.dataset.visible = show ? "1" : "0";
            product.style.display = show ? "block" : "none";
        });

        showPage(1);
    }

    searchBox.addEventListener("input", filterProducts);
    priceFilter.addEventListener("change", filterProducts);
    categoryFilter.addEventListener("change", filterProducts);

    // đọc category từ URL
    const params = new URLSearchParams(window.location.search);
    const categoryFromURL = params.get("category");

    if (categoryFromURL) {

        const categoryFilter = document.getElementById("categoryFilter");

        if (categoryFilter) {
            categoryFilter.value = categoryFromURL;
            filterProducts();
        }

    }
</script>

<?php include 'app/views/shares/footer.php'; ?>