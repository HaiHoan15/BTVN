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

    .form-container {
        max-width: 700px;
        margin: 40px auto;
        padding: 0 15px;
    }

    /* PAGE HEADER */
    .page-header {
        border-bottom: 2px solid var(--border-color);
        padding-bottom: 30px;
        margin-bottom: 30px;
    }

    .page-title {
        font-size: 28px;
        font-weight: 700;
        color: var(--secondary-color);
        margin: 0;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    /* FORM GROUP */
    .form-group {
        margin-bottom: 22px;
    }

    .form-group label {
        display: block;
        font-weight: 600;
        color: var(--text-dark);
        margin-bottom: 8px;
        font-size: 15px;
    }

    .required {
        color: #F44336;
    }

    /* FORM CONTROLS */
    .form-input,
    .form-select,
    .form-textarea {
        width: 100%;
        padding: 12px 16px;
        border: 2px solid var(--border-color);
        border-radius: 8px;
        font-size: 14px;
        color: var(--text-dark);
        font-family: inherit;
        transition: all 0.3s;
        box-sizing: border-box;
    }

    .form-input:focus,
    .form-select:focus,
    .form-textarea:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(184, 147, 106, 0.1);
    }

    .form-textarea {
        resize: vertical;
        min-height: 120px;
    }

    /* IMAGE PREVIEW */
    .image-preview-container {
        margin-bottom: 20px;
    }

    .image-preview {
        width: 150px;
        height: 150px;
        border-radius: 8px;
        border: 2px solid var(--border-color);
        object-fit: cover;
        display: block;
        margin-bottom: 12px;
    }

    .file-input-label {
        display: inline-block;
        padding: 8px 16px;
        background: var(--light-bg);
        border: 2px solid var(--border-color);
        border-radius: 8px;
        cursor: pointer;
        font-weight: 600;
        color: var(--text-dark);
        transition: all 0.3s;
        font-size: 14px;
    }

    .file-input-label:hover {
        background: var(--border-color);
    }

    #imageInput {
        display: none;
    }

    /* BUTTONS */
    .button-group {
        display: flex;
        gap: 12px;
        margin-top: 30px;
    }

    .btn {
        padding: 12px 28px;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        font-size: 15px;
        cursor: pointer;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s;
        flex: 1;
        justify-content: center;
    }

    .btn-submit {
        background: var(--primary-color);
        color: white;
    }

    .btn-submit:hover {
        background: var(--secondary-color);
        transform: translateY(-2px);
    }

    .btn-back {
        background: white;
        color: var(--primary-color);
        border: 2px solid var(--border-color);
    }

    .btn-back:hover {
        background: var(--light-bg);
        border-color: var(--primary-color);
    }

    /* RESPONSIVE */
    @media (max-width: 768px) {
        .form-container {
            margin: 20px auto;
        }

        .page-title {
            font-size: 24px;
        }

        .button-group {
            flex-direction: column;
        }
    }
</style>

<div class="form-container">
    <!-- PAGE HEADER -->
    <div class="page-header">
        <h1 class="page-title"><i class="bi bi-plus-circle"></i> Thêm sản phẩm</h1>
    </div>

    <form method="POST" action="/webbanhang/Product/store" enctype="multipart/form-data">

        <!-- NAME FIELD -->
        <div class="form-group">
            <label for="name">Tên sản phẩm <span class="required">*</span></label>
            <input type="text" id="name" name="name" class="form-input" placeholder="Ví dụ: Giường gỗ tự nhiên..." required>
        </div>

        <!-- MATERIAL FIELD -->
        <div class="form-group">
            <label for="material">Chất liệu <span class="required">*</span></label>
            <input type="text" id="material" name="material" class="form-input" placeholder="Ví dụ: Gỗ sồi, gỗ thông..." required>
        </div>

        <!-- SIZE FIELD -->
        <div class="form-group">
            <label for="size">Kích thước <span class="required">*</span></label>
            <input type="text" id="size" name="size" class="form-input" placeholder="Ví dụ: 160x200cm, 180x200cm..." required>
        </div>

        <!-- COLOR FIELD -->
        <div class="form-group">
            <label for="color">Màu sắc</label>
            <input type="text" id="color" name="color" class="form-input" placeholder="Ví dụ: Nâu, Trắng, Đen...">
        </div>

        <!-- PRICE FIELD -->
        <div class="form-group">
            <label for="price">Giá (VND) <span class="required">*</span></label>
            <input type="number" id="price" name="price" class="form-input" placeholder="0" required min="0" max="999999999999999999" step="any">
        </div>

        <!-- CATEGORY FIELD -->
        <div class="form-group">
            <label for="category">Danh mục <span class="required">*</span></label>
            <select id="category" name="category_id" class="form-select" required>
                <option value="">-- Chọn danh mục --</option>
                <?php foreach ($categories as $category): ?>
                    <option value="<?= $category->id ?>">
                        <?= $category->name ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- DESCRIPTION FIELD -->
        <div class="form-group">
            <label for="description">Mô tả</label>
            <textarea id="description" name="description" class="form-textarea" placeholder="Mô tả chi tiết sản phẩm..."></textarea>
        </div>

        <!-- IMAGE FIELD -->
        <div class="form-group">
            <label>Hình ảnh</label>
            <div class="image-preview-container">
                <img id="previewImage" src="/webbanhang/public/images/error/bed-error-image.jpg" alt="Preview" class="image-preview">
                <label for="imageInput" class="file-input-label">
                    <i class="bi bi-image"></i> Chọn ảnh
                </label>
                <input type="file" id="imageInput" name="image" accept="image/*">
            </div>
        </div>

        <!-- BUTTONS -->
        <div class="button-group">
            <button type="submit" class="btn btn-submit">
                <i class="bi bi-check-circle"></i> Lưu sản phẩm
            </button>
            <a href="/webbanhang/Product/manage" class="btn btn-back">
                <i class="bi bi-arrow-left"></i> Quay lại
            </a>
        </div>

    </form>
</div>

<!-- IMAGE PREVIEW SCRIPT -->
<script>
    document.getElementById("imageInput").addEventListener("change", function (event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById("previewImage").src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
</script>

<?php include 'app/views/shares/footer.php'; ?>

<!-- JavaScript để hiển thị preview hình ảnh khi chọn file mới -->
<script>
    document.getElementById("imageInput").addEventListener("change", function (event) {
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = function (e) {
                document.getElementById("previewImage").src = e.target.result;
            };

            reader.readAsDataURL(file);
        }
    });
</script>

<?php include 'app/views/shares/footer.php'; ?>