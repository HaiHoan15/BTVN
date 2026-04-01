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
        max-width: 600px;
        margin: 40px auto;
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
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        font-weight: 600;
        color: var(--text-dark);
        margin-bottom: 8px;
        font-size: 15px;
    }

    /* FORM CONTROL */
    .form-input,
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
    .form-textarea:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(184, 147, 106, 0.1);
    }

    .form-textarea {
        resize: vertical;
        min-height: 120px;
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
    }

    .btn-submit {
        background: var(--primary-color);
        color: white;
        flex: 1;
        justify-content: center;
    }

    .btn-submit:hover {
        background: var(--secondary-color);
        transform: translateY(-2px);
    }

    .btn-back {
        background: white;
        color: var(--primary-color);
        border: 2px solid var(--border-color);
        flex: 1;
        justify-content: center;
    }

    .btn-back:hover {
        background: var(--light-bg);
        border-color: var(--primary-color);
    }

    /* RESPONSIVE */
    @media (max-width: 768px) {
        .form-container {
            margin: 20px auto;
            padding: 0 15px;
        }

        .page-title {
            font-size: 24px;
        }

        .button-group {
            flex-direction: column;
        }

        .btn {
            width: 100%;
        }
    }
</style>

<div class="form-container">
    <!-- PAGE HEADER -->
    <div class="page-header">
        <h1 class="page-title"><i class="bi bi-tag"></i> Thêm danh mục</h1>
    </div>

    <form method="POST" action="/webbanhang/Category/store">

        <!-- NAME FIELD -->
        <div class="form-group">
            <label for="name">Tên danh mục <span style="color: #F44336;">*</span></label>
            <input type="text" id="name" name="name" class="form-input" placeholder="Ví dụ: Giường đơn, Giường đôi..." required>
        </div>

        <!-- DESCRIPTION FIELD -->
        <div class="form-group">
            <label for="description">Mô tả</label>
            <textarea id="description" name="description" class="form-textarea" placeholder="Mô tả chi tiết về danh mục..."></textarea>
        </div>

        <!-- BUTTONS -->
        <div class="button-group">
            <button type="submit" class="btn btn-submit">
                <i class="bi bi-check-circle"></i> Lưu danh mục
            </button>
            <a href="/webbanhang/Category" class="btn btn-back">
                <i class="bi bi-arrow-left"></i> Quay lại
            </a>
        </div>

    </form>
</div>

<?php include 'app/views/shares/footer.php'; ?>