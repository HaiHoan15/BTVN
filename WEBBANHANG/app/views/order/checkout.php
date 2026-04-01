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

    .checkout-wrapper {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 40px;
        padding: 40px 0;
    }

    /* PAGE HEADER */
    .page-header {
        grid-column: 1 / -1;
        padding-bottom: 30px;
        border-bottom: 2px solid var(--border-color);
        margin-bottom: 30px;
    }

    .page-title {
        font-size: 32px;
        font-weight: 700;
        color: var(--secondary-color);
        margin: 0;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    /* FORM SECTIONS */
    .form-section {
        background: var(--light-bg);
        border-radius: 12px;
        padding: 25px;
        margin-bottom: 20px;
    }

    .section-title {
        font-size: 15px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: var(--secondary-color);
        margin-bottom: 20px;
        padding-bottom: 12px;
        border-bottom: 2px solid var(--border-color);
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .form-group {
        margin-bottom: 18px;
    }

    .form-group label {
        display: block;
        font-weight: 600;
        color: var(--text-dark);
        margin-bottom: 8px;
        font-size: 14px;
    }

    .required {
        color: #EF4444;
    }

    .form-control {
        width: 100%;
        padding: 12px 16px;
        border: 1px solid var(--border-color);
        border-radius: 8px;
        font-size: 14px;
        color: var(--text-dark);
        background: white;
        transition: all 0.3s;
        font-family: inherit;
        box-sizing: border-box;
    }

    .form-control:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(184, 147, 106, 0.1);
    }

    .form-control:disabled,
    .form-control[readonly] {
        background: #F3F4F6;
        color: var(--text-light);
        cursor: not-allowed;
    }

    textarea.form-control {
        resize: vertical;
        min-height: 100px;
    }

    /* PAYMENT OPTIONS */
    .payment-options {
        display: grid;
        gap: 12px;
    }

    .payment-option {
        position: relative;
    }

    .payment-option input[type="radio"] {
        margin-right: 10px;
        cursor: pointer;
        width: 18px;
        height: 18px;
    }

    .payment-option-label {
        display: flex;
        align-items: center;
        padding: 15px 18px;
        background: white;
        border: 2px solid var(--border-color);
        border-radius: 8px;
        cursor: pointer;
        font-weight: 500;
        color: var(--text-dark);
        transition: all 0.3s;
    }

    .payment-option input[type="radio"]:checked + .payment-option-label {
        border-color: var(--primary-color);
        background: rgba(184, 147, 106, 0.05);
    }

    /* ORDER SUMMARY */
    .order-summary {
        background: var(--light-bg);
        border-radius: 12px;
        padding: 25px;
        position: sticky;
        top: 100px;
    }

    .summary-title {
        font-size: 18px;
        font-weight: 700;
        color: var(--secondary-color);
        margin-bottom: 20px;
    }

    .summary-row {
        display: flex;
        justify-content: space-between;
        padding: 12px 0;
        font-size: 14px;
        border-bottom: 1px solid var(--border-color);
    }

    .summary-row:last-of-type {
        border-bottom: none;
    }

    .summary-label {
        color: var(--text-light);
    }

    .summary-value {
        font-weight: 600;
        color: var(--text-dark);
    }

    .summary-total {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px 0;
        margin-top: 15px;
        border-top: 2px solid var(--border-color);
        font-size: 18px;
        font-weight: 700;
    }

    .summary-total-amount {
        color: var(--primary-color);
    }

    /* BUTTONS */
    .button-group {
        display: flex;
        flex-direction: column;
        gap: 10px;
        margin-top: 25px;
    }

    .btn-action {
        padding: 12px 20px;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        font-size: 15px;
        cursor: pointer;
        transition: all 0.3s;
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
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
        border-color: var(--primary-color);
        background: rgba(184, 147, 106, 0.05);
    }

    /* INFO BOX */
    .info-box {
        grid-column: 1 / -1;
        background: rgba(212, 175, 55, 0.08);
        border-left: 4px solid var(--accent-color);
        border-radius: 8px;
        padding: 15px 18px;
        color: var(--secondary-color);
        font-size: 14px;
        margin-bottom: 20px;
    }

    @media (max-width: 1024px) {
        .checkout-wrapper {
            grid-template-columns: 1fr;
        }

        .order-summary {
            position: static;
        }
    }

    @media (max-width: 768px) {
        .page-title {
            font-size: 24px;
        }
    }
</style>

<div class="container py-4">

    <div class="checkout-wrapper">

        <!-- INFO BOX -->
        <div class="info-box">
            <i class="bi bi-info-circle"></i> Vui lòng kiểm tra thông tin cẩn thận trước khi xác nhận đơn hàng
        </div>

        <!-- FORM SECTION -->
        <form method="POST" action="/webbanhang/Order/store">

            <!-- CUSTOMER INFO -->
            <div class="form-section">
                <h2 class="section-title"><i class="bi bi-person"></i> Thông tin khách hàng</h2>
                
                <div class="form-group">
                    <label>Tên khách hàng</label>
                    <input type="text" class="form-control" value="<?= htmlspecialchars($account->username) ?>" readonly>
                    <input type="hidden" name="customer_name" value="<?= htmlspecialchars($account->username) ?>">
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" value="<?= htmlspecialchars($account->email) ?>" readonly>
                </div>
            </div>

            <!-- DELIVERY INFO -->
            <div class="form-section">
                <h2 class="section-title"><i class="bi bi-truck"></i> Thông tin giao hàng</h2>
                
                <div class="form-group">
                    <label>Số điện thoại <span class="required">*</span></label>
                    <input type="text" name="phone" class="form-control" value="<?= htmlspecialchars($account->phone ?? '') ?>" required>
                </div>

                <div class="form-group">
                    <label>Địa chỉ <span class="required">*</span></label>
                    <textarea name="address" class="form-control" required><?= htmlspecialchars($account->address ?? '') ?></textarea>
                </div>

                <div class="form-group">
                    <label>Ghi chú đặc biệt</label>
                    <textarea name="note" class="form-control" placeholder="Ví dụ: Giao vào buổi sáng, để phía ngoài cửa..."></textarea>
                </div>
            </div>

            <!-- PAYMENT METHOD -->
            <div class="form-section">
                <h2 class="section-title"><i class="bi bi-credit-card"></i> Phương thức thanh toán</h2>
                
                <div class="payment-options">
                    <div class="payment-option">
                        <input type="radio" id="payment_cod" name="payment_method" value="cod" checked>
                        <label for="payment_cod" class="payment-option-label">
                            <i class="bi bi-cash-coin"></i> Thanh toán trực tiếp (COD)
                        </label>
                    </div>

                    <div class="payment-option">
                        <input type="radio" id="payment_momo" name="payment_method" value="momo">
                        <label for="payment_momo" class="payment-option-label">
                            <i class="bi bi-wallet2"></i> Thanh toán qua MoMo
                        </label>
                    </div>
                </div>
            </div>

            <!-- BUTTONS -->
            <div class="button-group">
                <button type="submit" class="btn-action btn-submit">
                    <i class="bi bi-check-circle"></i> Xác nhận đặt hàng
                </button>
                <a href="/webbanhang/Cart" class="btn-action btn-back">
                    <i class="bi bi-arrow-left"></i> Quay lại giỏ hàng
                </a>
            </div>

        </form>

        <!-- ORDER SUMMARY (Sticky Sidebar) -->
        <div class="order-summary">
            <h3 class="summary-title"><i class="bi bi-receipt"></i> Tóm tắt đơn hàng</h3>
            
            <div class="summary-row">
                <span class="summary-label">Tạm tính:</span>
                <span class="summary-value"><?= number_format($total, 0, ',', '.') ?> đ</span>
            </div>

            <div class="summary-row">
                <span class="summary-label">Phí vận chuyển:</span>
                <span class="summary-value">Miễn phí</span>
            </div>

            <div class="summary-total">
                <span>Tổng cộng:</span>
                <span class="summary-total-amount"><?= number_format($total, 0, ',', '.') ?> đ</span>
            </div>
        </div>

    </div>

</div>

<?php include 'app/views/shares/footer.php'; ?>

    <div class="info-box">
        Vui lòng kiểm tra thông tin và hoàn tất đơn hàng của bạn
    </div>

    <form method="POST" action="/webbanhang/Order/store">

        <!-- THÔNG TIN KHÁCH HÀNG -->
        <div class="form-section">
            <div class="section-title">Thông tin khách hàng</div>

            <div class="form-group">
                <label>Tên khách hàng</label>
                <input type="text" class="form-control" value="<?php echo htmlspecialchars($account->username); ?>"
                    readonly>
                <input type="hidden" name="customer_name" value="<?php echo htmlspecialchars($account->username); ?>">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" value="<?php echo htmlspecialchars($account->email); ?>"
                    readonly>
            </div>
        </div>


        <!-- THÔNG TIN GIAO HÀNG -->
        <div class="form-section">
            <div class="section-title">Thông tin giao hàng</div>

            <div class="form-group">
                <label>Số điện thoại <span class="required">*</span></label>
                <input type="text" name="phone" class="form-control"
                    value="<?php echo htmlspecialchars($account->phone); ?>" required>
            </div>

            <div class="form-group">
                <label>Địa chỉ <span class="required">*</span></label>
                <textarea name="address" class="form-control"
                    required><?php echo htmlspecialchars($account->address); ?></textarea>
            </div>

            <div class="form-group">
                <label>Ghi chú</label>
                <textarea name="note" class="form-control"
                    placeholder="Thêm bất cứ ghi chú nào cho người giao hàng..."></textarea>
            </div>
        </div>


        <!-- PHƯƠNG THỨC THANH TOÁN -->
        <div class="form-section">
            <div class="section-title">Phương thức thanh toán</div>

            <div class="payment-options">
                <div class="payment-option">
                    <input type="radio" id="payment_cod" name="payment_method" value="cod" checked>
                    <label for="payment_cod" class="payment-option-label">
                        Thanh toán trực tiếp (COD)
                    </label>
                </div>

                <div class="payment-option">
                    <input type="radio" id="payment_momo" name="payment_method" value="momo">
                    <label for="payment_momo" class="payment-option-label">
                        Thanh toán qua MoMo
                    </label>
                </div>
            </div>
        </div>


        <!-- TỔNG TIỀN -->
        <div class="total-section">
            <div class="total-label">Tổng tiền thanh toán</div>
            <div class="total-amount">
                <?php echo number_format($total, 0, ',', '.'); ?> VNĐ
            </div>
        </div>


        <!-- BUTTONS -->
        <div class="button-group">
            <a href="/webbanhang/Cart" class="btn-back">
                Quay lại
            </a>

            <button type="submit" class="btn-submit">
                Xác nhận đặt hàng
            </button>
        </div>

    </form>
</div>
<style>
    body {
        background: url('/webbanhang/public/images/background/payment-background.avif') no-repeat center center fixed;
        background-size: cover;
        min-height: 100vh;
    }

    /* Tiêu đề */
    .page-title {
        font-size: 42px;
        font-weight: 800;
        background: linear-gradient(135deg, #facc15 0%, #fbbf24 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        letter-spacing: 1px;
        text-transform: uppercase;
        position: relative;
        padding-bottom: 15px;
        margin-bottom: 35px;
    }

    .page-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 3px;
        background: linear-gradient(90deg, #facc15, #fbbf24, transparent);
        border-radius: 2px;
    }

    /* Container */
    .checkout-container {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        padding: 40px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
        margin-bottom: 40px;
    }

    /* Form styling */
    .form-section {
        margin-bottom: 35px;
        padding-bottom: 25px;
        border-bottom: 2px solid #f3f4f6;
    }

    .form-section:last-of-type {
        border-bottom: none;
    }

    .section-title {
        font-size: 16px;
        font-weight: 700;
        color: #111827;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        margin-bottom: 18px;
        padding-bottom: 10px;
        border-bottom: 2px solid #dbeafe;
    }

    /* Form group styling */
    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        font-weight: 600;
        color: #374151;
        margin-bottom: 8px;
        font-size: 14px;
    }

    .form-group label .required {
        color: #ef4444;
        font-weight: 700;
    }

    /* Input styling */
    .form-control {
        background: white !important;
        border: 2px solid #e5e7eb !important;
        border-radius: 10px !important;
        padding: 12px 16px !important;
        font-size: 14px !important;
        color: #111827 !important;
        transition: all 0.3s ease !important;
    }

    .form-control:focus {
        border-color: #3b82f6 !important;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1) !important;
    }

    .form-control:disabled,
    .form-control[readonly] {
        background: #f9fafb !important;
        color: #6b7280 !important;
        cursor: not-allowed;
    }

    textarea.form-control {
        resize: vertical;
        min-height: 100px;
    }

    /* Radio button styling */
    .payment-options {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 16px;
    }

    .payment-option {
        position: relative;
    }

    .payment-option input[type="radio"] {
        display: none;
    }

    .payment-option-label {
        display: flex;
        align-items: center;
        padding: 16px;
        background: white;
        border: 2px solid #e5e7eb;
        border-radius: 10px;
        cursor: pointer;
        transition: all 0.3s ease;
        font-weight: 600;
        color: #374151;
    }

    .payment-option input[type="radio"]:checked+.payment-option-label {
        border-color: #3b82f6;
        background: linear-gradient(135deg, #f0f9ff, #f8fafc);
        color: #1e40af;
    }

    .payment-option-label::before {
        content: '';
        width: 20px;
        height: 20px;
        min-width: 20px;
        border: 2px solid #d1d5db;
        border-radius: 50%;
        margin-right: 12px;
        transition: all 0.3s ease;
    }

    .payment-option input[type="radio"]:checked+.payment-option-label::before {
        background: linear-gradient(135deg, #3b82f6, #2563eb);
        border-color: #3b82f6;
        box-shadow: inset 0 0 0 4px white;
    }

    /* Total price section */
    .total-section {
        background: linear-gradient(135deg, #f0f9ff 0%, #f8fafc 100%);
        border: 2px solid #dbeafe;
        border-radius: 12px;
        padding: 24px;
        margin: 30px 0;
    }

    .total-label {
        font-size: 13px;
        font-weight: 700;
        color: #0c4a6e;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 8px;
    }

    .total-amount {
        font-size: 32px;
        font-weight: 800;
        background: linear-gradient(135deg, #059669, #047857);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    /* Buttons container */
    .button-group {
        display: flex;
        gap: 15px;
        margin-top: 35px;
    }

    /* Submit button */
    .btn-submit {
        flex: 1;
        background: linear-gradient(135deg, #10b981, #059669);
        color: white;
        padding: 14px 32px;
        border: none;
        border-radius: 10px;
        font-weight: 700;
        font-size: 15px;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
        text-align: center;
    }

    .btn-submit:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 24px rgba(16, 185, 129, 0.3);
    }

    .btn-submit:active {
        transform: translateY(-1px);
    }

    /* Back button */
    .btn-back {
        flex: 1;
        background: #f3f4f6;
        color: #374151;
        padding: 14px 32px;
        border: 2px solid #e5e7eb;
        border-radius: 10px;
        font-weight: 700;
        font-size: 15px;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
        text-align: center;
    }

    .btn-back:hover {
        background: #e5e7eb;
        border-color: #d1d5db;
        transform: translateY(-3px);
        color: #374151;
        text-decoration: none;
    }

    .btn-back:active {
        transform: translateY(-1px);
    }

    /* Info box */
    .info-box {
        background: #fef3c7;
        border-left: 4px solid #f59e0b;
        border-radius: 8px;
        padding: 16px;
        margin-bottom: 25px;
        color: #92400e;
        font-size: 14px;
        font-weight: 500;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .checkout-container {
            padding: 25px;
        }

        .page-title {
            font-size: 28px;
        }

        .payment-options {
            grid-template-columns: 1fr;
        }

        .button-group {
            flex-direction: column;
        }

        .btn-submit,
        .btn-back {
            width: 100%;
        }

        .section-title {
            font-size: 15px;
        }
    }

    @media (max-width: 480px) {
        .checkout-container {
            padding: 20px;
        }

        .page-title {
            font-size: 24px;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 16px;
        }

        .total-amount {
            font-size: 26px;
        }
    }
</style>
<?php include 'app/views/shares/footer.php'; ?>