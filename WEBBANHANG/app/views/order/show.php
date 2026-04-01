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

    .detail-container {
        padding: 40px 0;
    }

    /* PAGE HEADER */
    .page-header {
        border-bottom: 2px solid var(--border-color);
        padding-bottom: 30px;
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

    /* INFO SECTION */
    .info-section {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 20px;
        margin-bottom: 35px;
        padding-bottom: 30px;
        border-bottom: 2px solid var(--border-color);
    }

    .info-card {
        background: var(--light-bg);
        border: 1px solid var(--border-color);
        border-radius: 12px;
        padding: 20px;
        transition: all 0.3s ease;
    }

    .info-card:hover {
        border-color: var(--primary-color);
        box-shadow: 0 4px 12px rgba(184, 147, 106, 0.1);
    }

    .info-label {
        display: block;
        font-size: 12px;
        font-weight: 700;
        color: var(--text-light);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 8px;
    }

    .info-value {
        display: block;
        font-size: 16px;
        font-weight: 700;
        color: var(--text-dark);
        line-height: 1.5;
        word-break: break-word;
    }

    .info-value.status {
        display: inline-block;
        padding: 8px 14px;
        border-radius: 8px;
        font-weight: 700;
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .status-pending {
        background: rgba(212, 175, 55, 0.15);
        color: var(--accent-color);
    }

    .status-confirmed {
        background: rgba(184, 147, 106, 0.15);
        color: var(--primary-color);
    }

    .status-shipping {
        background: rgba(26, 31, 54, 0.1);
        color: var(--secondary-color);
    }

    .status-completed {
        background: rgba(76, 175, 80, 0.15);
        color: #4CAF50;
    }

    .status-cancelled {
        background: rgba(244, 67, 54, 0.15);
        color: #F44336;
    }

    /* TABLE SECTION */
    .table-section {
        margin-bottom: 30px;
    }

    .table-title {
        font-size: 18px;
        font-weight: 700;
        color: var(--secondary-color);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 18px;
        padding-bottom: 12px;
        border-bottom: 2px solid var(--border-color);
    }

    /* TABLE WRAPPER */
    .table-wrapper {
        overflow-x: auto;
        border-radius: 12px;
        border: 1px solid var(--border-color);
        margin-bottom: 30px;
    }

    /* TABLE STYLING */
    .detail-table {
        border-collapse: collapse;
        width: 100%;
    }

    .detail-table thead {
        background: var(--secondary-color);
    }

    .detail-table thead th {
        color: white;
        font-weight: 700;
        padding: 18px 16px;
        text-align: center;
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .detail-table thead th:first-child {
        text-align: left;
    }

    .detail-table tbody tr {
        border-bottom: 1px solid var(--border-color);
        transition: background-color 0.3s;
    }

    .detail-table tbody tr:hover {
        background-color: var(--light-bg);
    }

    .detail-table tbody td {
        padding: 18px 16px;
        color: var(--text-dark);
        font-size: 14px;
        vertical-align: middle;
    }

    .detail-table tbody td:first-child {
        font-weight: 600;
        text-align: left;
    }

    .detail-table tbody td {
        text-align: center;
    }

    .detail-table tbody td:last-child {
        font-weight: 700;
        color: var(--primary-color);
    }

    /* TOTAL SUMMARY */
    .total-summary {
        background: var(--light-bg);
        border: 2px solid var(--border-color);
        border-radius: 12px;
        padding: 24px;
        margin: 30px 0;
        text-align: right;
    }

    .summary-row {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        padding: 12px 0;
        font-size: 15px;
        gap: 20px;
    }

    .summary-row.total {
        border-top: 2px solid var(--border-color);
        padding-top: 16px;
        margin-top: 16px;
    }

    .summary-label {
        font-weight: 600;
        color: var(--text-dark);
    }

    .summary-amount {
        font-weight: 700;
        color: var(--text-dark);
        min-width: 180px;
    }

    .summary-amount.total-amount {
        font-size: 24px;
        color: var(--primary-color);
    }

    /* BUTTON */
    .btn-back {
        background: white;
        color: var(--primary-color);
        padding: 12px 32px;
        border: 2px solid var(--border-color);
        border-radius: 8px;
        font-weight: 600;
        font-size: 15px;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        margin-top: 20px;
    }

    .btn-back:hover {
        background: var(--primary-color);
        color: white;
        border-color: var(--primary-color);
        transform: translateY(-2px);
        text-decoration: none;
    }

    /* RESPONSIVE */
    @media (max-width: 768px) {
        .page-title {
            font-size: 24px;
        }

        .info-section {
            grid-template-columns: 1fr;
            gap: 16px;
        }

        .detail-table thead th {
            padding: 12px 8px;
            font-size: 11px;
        }

        .detail-table tbody td {
            padding: 12px 8px;
            font-size: 13px;
        }

        .summary-row {
            flex-direction: column;
            align-items: flex-end;
            gap: 8px;
        }

        .summary-amount {
            min-width: auto;
        }

        .total-summary {
            text-align: left;
        }

        .summary-row {
            justify-content: space-between;
        }
    }

    @media (max-width: 480px) {
        .page-title {
            font-size: 20px;
        }

        .info-card {
            padding: 16px;
        }

        .info-value {
            font-size: 14px;
        }

        .detail-table thead th {
            font-size: 10px;
            padding: 10px 6px;
        }

        .detail-table tbody td {
            padding: 10px 6px;
            font-size: 12px;
        }

        .btn-back {
            width: 100%;
            justify-content: center;
        }
    }
</style>

<div class="container">
    <div class="detail-container">

        <!-- PAGE HEADER -->
        <div class="page-header">
            <h1 class="page-title"><i class="bi bi-receipt"></i> Chi tiết đơn hàng #<?= $order->id ?></h1>
        </div>

        <!-- ORDER INFO SECTION -->
        <div class="info-section">
            <div class="info-card">
                <span class="info-label">Khách hàng</span>
                <span class="info-value"><?= htmlspecialchars($order->customer_name) ?></span>
            </div>

            <div class="info-card">
                <span class="info-label">Số điện thoại</span>
                <span class="info-value"><?= htmlspecialchars($order->phone) ?></span>
            </div>

            <div class="info-card">
                <span class="info-label">Địa chỉ</span>
                <span class="info-value"><?= htmlspecialchars($order->address) ?></span>
            </div>

            <div class="info-card">
                <span class="info-label">Phương thức thanh toán</span>
                <span class="info-value">
                    <?php
                    if ($order->payment_method === 'cod') {
                        echo 'COD (Trực tiếp)';
                    } elseif ($order->payment_method === 'momo') {
                        echo 'MoMo (Online)';
                    } else {
                        echo ucfirst($order->payment_method);
                    }
                    ?>
                </span>
            </div>

            <div class="info-card">
                <span class="info-label">Trạng thái</span>
                <span class="info-value status <?php
                    echo match($order->status) {
                        'pending' => 'status-pending',
                        'confirmed' => 'status-confirmed',
                        'shipping' => 'status-shipping',
                        'completed' => 'status-completed',
                        'cancelled' => 'status-cancelled',
                        default => ''
                    };
                ?>">
                    <?php
                    echo match($order->status) {
                        'pending' => 'Chờ xác nhận',
                        'confirmed' => 'Đã xác nhận',
                        'shipping' => 'Đang giao',
                        'completed' => 'Hoàn thành',
                        'cancelled' => 'Hủy',
                        default => ucfirst($order->status)
                    };
                    ?>
                </span>
            </div>

            <div class="info-card">
                <span class="info-label">Ngày tạo</span>
                <span class="info-value"><?= date('d/m/Y H:i', strtotime($order->created_at)) ?></span>
            </div>
        </div>

        <!-- PRODUCTS TABLE -->
        <div class="table-section">
            <div class="table-title"><i class="bi bi-box"></i> Chi tiết sản phẩm</div>

            <div class="table-wrapper">
                <table class="detail-table">
                    <thead>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $total = 0;
                        foreach ($details as $item):
                            $subtotal = $item->price * $item->quantity;
                            $total += $subtotal;
                        ?>
                            <tr>
                                <td><?= htmlspecialchars($item->name) ?></td>
                                <td><?= $item->quantity ?></td>
                                <td><?= number_format($item->price, 0, ',', '.') ?> đ</td>
                                <td><?= number_format($subtotal, 0, ',', '.') ?> đ</td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- TOTAL SUMMARY -->
        <div class="total-summary">
            <div class="summary-row total">
                <span class="summary-label">Tổng cộng:</span>
                <span class="summary-amount total-amount">
                    <?= number_format($order->total_amount, 0, ',', '.') ?> đ
                </span>
            </div>
        </div>

        <!-- BACK BUTTON -->
        <a href="/webbanhang/Order/myOrders" class="btn-back">
            <i class="bi bi-arrow-left"></i> Quay lại danh sách
        </a>

    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>

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
    .detail-container {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        padding: 40px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
        margin-bottom: 40px;
    }

    /* Info section */
    .info-section {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 24px;
        margin-bottom: 35px;
        padding-bottom: 30px;
        border-bottom: 2px solid #f3f4f6;
    }

    .info-card {
        background: linear-gradient(135deg, #f9fafb 0%, #f3f4f6 100%);
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        padding: 20px;
        transition: all 0.3s ease;
    }

    .info-card:hover {
        border-color: #d1d5db;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.08);
    }

    .info-label {
        display: block;
        font-size: 12px;
        font-weight: 700;
        color: #6b7280;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 8px;
    }

    .info-value {
        display: block;
        font-size: 16px;
        font-weight: 700;
        color: #111827;
        line-height: 1.5;
        word-break: break-word;
    }

    .info-value.highlight {
        background: linear-gradient(135deg, #3b82f6, #2563eb);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .info-value.status {
        display: inline-block;
        padding: 8px 14px;
        border-radius: 8px;
        font-weight: 700;
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .status-pending {
        background: linear-gradient(135deg, #fbbf24, #f59e0b);
        color: white;
    }

    .status-confirmed {
        background: linear-gradient(135deg, #60a5fa, #3b82f6);
        color: white;
    }

    .status-shipping {
        background: linear-gradient(135deg, #f97316, #ea580c);
        color: white;
    }

    .status-completed {
        background: linear-gradient(135deg, #10b981, #059669);
        color: white;
    }

    .status-cancelled {
        background: linear-gradient(135deg, #ef4444, #dc2626);
        color: white;
    }

    /* Table section */
    .table-section {
        margin-bottom: 30px;
    }

    .table-title {
        font-size: 16px;
        font-weight: 700;
        color: #111827;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        margin-bottom: 18px;
        padding-bottom: 12px;
        border-bottom: 2px solid #dbeafe;
    }

    /* Table styling */
    .detail-table {
        border-collapse: collapse;
        width: 100%;
        table-layout: auto;
    }

    .detail-table thead {
        background: linear-gradient(135deg, #1f2937 0%, #111827 100%);
    }

    .detail-table thead th {
        color: #ffffff;
        font-weight: 700;
        padding: 18px 16px;
        text-align: center;
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        border: 1px solid #374151;
    }

    .detail-table thead th:first-child {
        text-align: left;
        border-left: none;
    }

    .detail-table thead th:last-child {
        border-right: none;
    }

    .detail-table tbody tr {
        border: 1px solid #e5e7eb;
        transition: all 0.3s ease;
    }

    .detail-table tbody tr:hover {
        background-color: #f9fafb;
        box-shadow: inset 0 0 8px rgba(0, 0, 0, 0.03);
    }

    .detail-table tbody td {
        padding: 18px 16px;
        vertical-align: middle;
        color: #374151;
        font-size: 14px;
        border-right: 1px solid #e5e7eb;
    }

    .detail-table tbody td:first-child {
        border-left: 1px solid #e5e7eb;
        font-weight: 600;
        color: #111827;
    }

    .detail-table tbody td:last-child {
        border-right: none;
        font-weight: 700;
        background: linear-gradient(135deg, #10b981, #059669);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .detail-table tbody tr:last-child td {
        border-bottom: none;
    }

    /* Total summary */
    .total-summary {
        background: linear-gradient(135deg, #f0f9ff 0%, #f8fafc 100%);
        border: 2px solid #dbeafe;
        border-radius: 12px;
        padding: 24px;
        margin: 30px 0;
        text-align: right;
    }

    .summary-row {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        padding: 12px 0;
        font-size: 15px;
        gap: 20px;
    }

    .summary-row.total {
        border-top: 2px solid #bfdbfe;
        padding-top: 16px;
        margin-top: 16px;
    }

    .summary-label {
        font-weight: 600;
        color: #0c4a6e;
    }

    .summary-amount {
        font-weight: 700;
        color: #0c4a6e;
        min-width: 180px;
    }

    .summary-amount.total-amount {
        font-size: 24px;
        background: linear-gradient(135deg, #059669, #047857);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    /* Button */
    .btn-back {
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
        margin-top: 20px;
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

    /* Table wrapper */
    .table-wrapper {
        overflow-x: auto;
        border-radius: 12px;
        border: 1px solid #e5e7eb;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .detail-container {
            padding: 25px;
        }

        .page-title {
            font-size: 28px;
        }

        .info-section {
            grid-template-columns: 1fr;
            gap: 16px;
        }

        .detail-table thead th {
            padding: 12px 8px;
            font-size: 11px;
        }

        .detail-table tbody td {
            padding: 12px 8px;
            font-size: 13px;
        }

        .summary-row {
            flex-direction: column;
            align-items: flex-end;
            gap: 8px;
        }

        .summary-amount {
            min-width: auto;
        }

        .summary-amount.total-amount {
            font-size: 20px;
        }

        .total-summary {
            text-align: left;
        }

        .summary-row {
            justify-content: space-between;
        }
    }

    @media (max-width: 480px) {
        .detail-container {
            padding: 20px;
        }

        .page-title {
            font-size: 24px;
            margin-bottom: 25px;
        }

        .info-card {
            padding: 16px;
        }

        .info-value {
            font-size: 14px;
        }

        .detail-table thead th {
            font-size: 10px;
            padding: 10px 6px;
        }

        .detail-table tbody td {
            padding: 10px 6px;
            font-size: 12px;
        }

        .btn-back {
            width: 100%;
            text-align: center;
        }
    }
</style>

<div class="detail-container">
    <h1 class="page-title">Chi Tiết Đơn Hàng #<?= $order->id ?></h1>

    <!-- Thông tin đơn hàng -->
    <div class="info-section">
        <div class="info-card">
            <span class="info-label">Khách hàng</span>
            <span class="info-value"><?= htmlspecialchars($order->customer_name) ?></span>
        </div>

        <div class="info-card">
            <span class="info-label">Số điện thoại</span>
            <span class="info-value"><?= htmlspecialchars($order->phone) ?></span>
        </div>

        <div class="info-card">
            <span class="info-label">Địa chỉ</span>
            <span class="info-value"><?= htmlspecialchars($order->address) ?></span>
        </div>

        <div class="info-card">
            <span class="info-label">Phương thức thanh toán</span>
            <span class="info-value">
                <?php
                    if ($order->payment_method === 'cod') {
                        echo 'COD (Trực tiếp)';
                    } elseif ($order->payment_method === 'momo') {
                        echo 'MoMo (Online)';
                    } else {
                        echo ucfirst($order->payment_method);
                    }
                ?>
            </span>
        </div>

        <div class="info-card">
            <span class="info-label">Trạng thái</span>
            <span class="info-value status <?php
                echo match($order->status) {
                    'pending' => 'status-pending',
                    'confirmed' => 'status-confirmed',
                    'shipping' => 'status-shipping',
                    'completed' => 'status-completed',
                    'cancelled' => 'status-cancelled',
                    default => ''
                };
            ?>">
                <?php
                    echo match($order->status) {
                        'pending' => 'Chờ xác nhận',
                        'confirmed' => 'Đã xác nhận',
                        'shipping' => 'Đang giao',
                        'completed' => 'Hoàn thành',
                        'cancelled' => 'Hủy',
                        default => ucfirst($order->status)
                    };
                ?>
            </span>
        </div>

        <div class="info-card">
            <span class="info-label">Ngày tạo</span>
            <span class="info-value"><?= date('d/m/Y H:i', strtotime($order->created_at)) ?></span>
        </div>
    </div>

    <!-- Bảng sản phẩm -->
    <div class="table-section">
        <div class="table-title">Chi tiết sản phẩm</div>

        <div class="table-wrapper">
            <table class="detail-table">
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>

                    <?php 
                    $total = 0;
                    foreach ($details as $item):
                        $subtotal = $item->price * $item->quantity;
                        $total += $subtotal;
                    ?>

                        <tr>
                            <td><?= htmlspecialchars($item->name) ?></td>
                            <td style="text-align: center;"><?= $item->quantity ?></td>
                            <td style="text-align: center;"><?= number_format($item->price, 0, ',', '.') ?> VNĐ</td>
                            <td><?= number_format($subtotal, 0, ',', '.') ?> VNĐ</td>
                        </tr>

                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>

    <!-- Tổng cộng -->
    <div class="total-summary">
        <div class="summary-row total">
            <span class="summary-label">Tổng tiền:</span>
            <span class="summary-amount total-amount">
                <?= number_format($order->total_amount, 0, ',', '.') ?> VNĐ
            </span>
        </div>
    </div>

    <!-- Button quay lại -->
    <a href="/webbanhang/Order/myOrders" class="btn-back">
        Quay lại danh sách đơn hàng
    </a>
</div>

<?php include 'app/views/shares/footer.php'; ?>