<?php include 'app/views/shares/header.php'; ?>

<style>
    body {
        background: url('/webbanhang/public/images/background/order-background.avif') no-repeat center center fixed;
        background-size: cover;
        min-height: 100vh;
    }

    /* Tiêu đề */
    .product-title {
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
    .orders-container {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        padding: 40px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
        margin-bottom: 40px;
    }

    /* Empty state styling */
    .empty-state {
        text-align: center;
        padding: 60px 30px;
    }

    .empty-state-icon {
        font-size: 80px;
        margin-bottom: 20px;
        opacity: 0.7;
    }

    .empty-state-text {
        font-size: 18px;
        color: #6b7280;
        margin-bottom: 30px;
        font-weight: 500;
    }

    .empty-state-link {
        background: linear-gradient(135deg, #3b82f6, #2563eb);
        color: white;
        padding: 12px 32px;
        border-radius: 10px;
        text-decoration: none;
        font-weight: 700;
        transition: all 0.3s ease;
        display: inline-block;
    }

    .empty-state-link:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 24px rgba(59, 130, 246, 0.3);
    }

    /* Table styling */
    .orders-table {
        border-collapse: collapse;
        width: 100%;
        table-layout: auto;
    }

    .orders-table thead {
        background: linear-gradient(135deg, #1f2937 0%, #111827 100%);
    }

    .orders-table thead th {
        color: #ffffff;
        font-weight: 700;
        padding: 18px 16px;
        text-align: center;
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        border: 1px solid #374151;
    }

    .orders-table thead th:first-child {
        text-align: left;
        border-left: none;
    }

    .orders-table thead th:last-child {
        border-right: none;
    }

    .orders-table tbody tr {
        border: 1px solid #e5e7eb;
        transition: all 0.3s ease;
    }

    .orders-table tbody tr:hover {
        background-color: #f9fafb;
        box-shadow: inset 0 0 8px rgba(0, 0, 0, 0.03);
    }

    .orders-table tbody td {
        padding: 18px 16px;
        vertical-align: middle;
        color: #374151;
        font-size: 14px;
        border-right: 1px solid #e5e7eb;
    }

    .orders-table tbody td:first-child {
        border-left: 1px solid #e5e7eb;
    }

    .orders-table tbody td:last-child {
        border-right: none;
    }

    .orders-table tbody tr:last-child td {
        border-bottom: none;
    }

    /* Order ID styling */
    .order-id {
        font-weight: 700;
        color: #3b82f6;
        font-size: 15px;
        text-align: left;
    }

    /* Amount styling */
    .order-amount {
        font-weight: 800;
        font-size: 16px;
        background: linear-gradient(135deg, #059669, #047857);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        text-align: center;
        display: block;
    }

    /* Payment method styling */
    .payment-method {
        color: #4b5563;
        font-weight: 600;
        text-align: center;
    }

    .payment-note {
        color: #9ca3af;
        font-size: 12px;
        display: block;
        text-align: center;
        margin-top: 4px;
    }

    /* Status badge styling */
    .status-badge {
        display: inline-block;
        padding: 8px 14px;
        border-radius: 8px;
        font-weight: 700;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        transition: all 0.3s ease;
    }

    .status-badge.pending {
        background: linear-gradient(135deg, #fbbf24, #f59e0b);
        color: white;
    }

    .status-badge.confirmed {
        background: linear-gradient(135deg, #60a5fa, #3b82f6);
        color: white;
    }

    .status-badge.shipping {
        background: linear-gradient(135deg, #f97316, #ea580c);
        color: white;
    }

    .status-badge.completed {
        background: linear-gradient(135deg, #10b981, #059669);
        color: white;
    }

    .status-badge.cancelled {
        background: linear-gradient(135deg, #ef4444, #dc2626);
        color: white;
    }

    .status-badge.secondary {
        background: #e5e7eb;
        color: #6b7280;
    }

    /* Date styling */
    .order-date {
        color: #6b7280;
        font-weight: 500;
        font-size: 13px;
        text-align: center;
        display: block;
    }

    /* Action button styling */
    .btn-view {
        background: linear-gradient(135deg, #3b82f6, #2563eb);
        color: white;
        padding: 8px 16px;
        border: none;
        border-radius: 8px;
        font-weight: 700;
        font-size: 13px;
        cursor: pointer;
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-block;
    }

    .btn-view:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 16px rgba(59, 130, 246, 0.3);
        color: white;
        text-decoration: none;
    }

    .btn-view:active {
        transform: translateY(0);
    }

    /* Responsive table wrapper */
    .table-wrapper {
        overflow-x: auto;
        border-radius: 12px;
        border: 1px solid #e5e7eb;
        margin-bottom: 30px;
    }

    /* Pagination styling */
    .pagination-container {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 8px;
        margin-top: 30px;
        flex-wrap: wrap;
    }

    .pagination-info {
        color: #6b7280;
        font-weight: 600;
        font-size: 13px;
        margin-right: 20px;
    }

    .pagination-list {
        display: flex;
        gap: 4px;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .pagination-item {
        margin: 0;
    }

    .pagination-link {
        display: flex;
        align-items: center;
        justify-content: center;
        min-width: 36px;
        height: 36px;
        padding: 0 8px;
        background: white;
        border: 2px solid #e5e7eb;
        border-radius: 8px;
        color: #374151;
        text-decoration: none;
        font-weight: 600;
        font-size: 13px;
        transition: all 0.3s ease;
    }

    .pagination-link:hover {
        border-color: #3b82f6;
        color: #3b82f6;
        background: #f0f9ff;
    }

    .pagination-link.active {
        background: linear-gradient(135deg, #3b82f6, #2563eb);
        color: white;
        border-color: #3b82f6;
    }

    .pagination-link.disabled {
        color: #d1d5db;
        border-color: #e5e7eb;
        cursor: not-allowed;
        background: #f9fafb;
    }

    .pagination-link.disabled:hover {
        border-color: #e5e7eb;
        color: #d1d5db;
        background: #f9fafb;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .orders-container {
            padding: 20px;
        }

        .orders-header {
            flex-direction: column;
            align-items: flex-start;
            margin-bottom: 25px;
        }

        .orders-header h2 {
            font-size: 24px;
        }

        .orders-table thead th {
            padding: 12px 8px;
            font-size: 11px;
        }

        .orders-table tbody td {
            padding: 12px 8px;
            font-size: 13px;
        }

        .order-id {
            font-size: 14px;
        }

        .order-amount {
            font-size: 15px;
        }

        .payment-note {
            font-size: 11px;
        }

        .status-badge {
            padding: 6px 10px;
            font-size: 11px;
        }

        .btn-view {
            padding: 6px 12px;
            font-size: 12px;
        }

        .pagination-container {
            margin-top: 20px;
        }

        .pagination-info {
            margin-right: 15px;
            width: 100%;
            text-align: center;
            margin-bottom: 10px;
        }

        .pagination-link {
            min-width: 32px;
            height: 32px;
            font-size: 12px;
        }
    }

    @media (max-width: 480px) {
        .orders-header h2 {
            font-size: 20px;
        }

        .orders-table thead th {
            font-size: 10px;
            padding: 10px 6px;
        }

        .orders-table tbody td {
            padding: 10px 6px;
            font-size: 12px;
        }

        .pagination-container {
            gap: 4px;
        }

        .pagination-link {
            min-width: 28px;
            height: 28px;
            font-size: 11px;
            padding: 0 4px;
        }
    }
</style>

<div class="orders-container">
    <h1 class="product-title mb-6">🛒 Đơn hàng của tôi</h1>

    <?php if (empty($orders)): ?>

        <div class="empty-state">
            <div class="empty-state-icon">📦</div>
            <p class="empty-state-text">Bạn chưa có đơn hàng nào</p>
            <a href="/webbanhang/Product/index" class="empty-state-link">
                Bắt đầu mua sắm ngay
            </a>
        </div>

    <?php else: ?>

        <div class="table-wrapper">
            <table class="orders-table">
                <thead>
                    <tr>
                        <th>Mã đơn</th>
                        <th>Tổng tiền</th>
                        <th>Phương thức</th>
                        <th>Trạng thái</th>
                        <th>Ngày tạo</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($orders as $order): ?>

                        <tr>
                            <td>
                                <span class="order-id">#<?= $order->id ?></span>
                            </td>

                            <td>
                                <span class="order-amount">
                                    <?= number_format($order->total_amount, 0, ',', '.') ?> VNĐ
                                </span>
                            </td>

                            <td>
                                <div class="payment-method">
                                    <?php
                                    $method = '';
                                    if ($order->payment_method === 'cod') {
                                        $method = 'COD';
                                    } elseif ($order->payment_method === 'momo') {
                                        $method = 'Momo';
                                    } else {
                                        $method = ucfirst($order->payment_method);
                                    }
                                    echo $method;
                                    ?>
                                </div>
                                <span class="payment-note">
                                    <?php
                                    if ($order->payment_method === 'cod') {
                                        echo '(Trực tiếp)';
                                    } elseif ($order->payment_method === 'momo') {
                                        echo '(Online)';
                                    }
                                    ?>
                                </span>
                            </td>

                            <td style="text-align: center;">
                                <?php
                                $statusClass = match ($order->status) {
                                    'pending' => 'pending',
                                    'confirmed' => 'confirmed',
                                    'shipping' => 'shipping',
                                    'completed' => 'completed',
                                    'cancelled' => 'cancelled',
                                    default => 'secondary'
                                };

                                $statusText = match ($order->status) {
                                    'pending' => 'Chờ xác nhận',
                                    'confirmed' => 'Đã xác nhận',
                                    'shipping' => 'Đang giao',
                                    'completed' => 'Hoàn thành',
                                    'cancelled' => 'Hủy',
                                    default => ucfirst($order->status)
                                };
                                ?>
                                <span class="status-badge <?= $statusClass ?>">
                                    <?= $statusText ?>
                                </span>
                            </td>

                            <td>
                                <span class="order-date">
                                    <?= date('d/m/Y H:i', strtotime($order->created_at)) ?>
                                </span>
                            </td>

                            <td style="text-align: center;">
                                <a href="/webbanhang/Order/show/<?= $order->id ?>" class="btn-view">
                                    Xem
                                </a>
                            </td>

                        </tr>

                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <?php
        // Thiết lập phân trang
        $itemsPerPage = 5; // Số đơn hàng trên mỗi trang
        $totalItems = count($orders);
        $totalPages = ceil($totalItems / $itemsPerPage);
        $currentPage = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;

        if ($currentPage > $totalPages) {
            $currentPage = $totalPages;
        }

        $startIndex = ($currentPage - 1) * $itemsPerPage;
        $paginatedOrders = array_slice($orders, $startIndex, $itemsPerPage);

        // Lấy thông tin query string hiện tại
        $queryString = http_build_query(array_merge($_GET, ['page' => '']));
        $baseUrl = '/webbanhang/Order/index?' . rtrim($queryString, '&=');
        ?>

        <?php if ($totalPages > 1): ?>
            <div class="pagination-container">
                <span class="pagination-info">
                    Hiển thị <?= $startIndex + 1 ?> - <?= min($startIndex + $itemsPerPage, $totalItems) ?> / <?= $totalItems ?>
                    đơn hàng
                </span>

                <ul class="pagination-list">
                    <!-- Nút Trước -->
                    <li class="pagination-item">
                        <?php if ($currentPage > 1): ?>
                            <a href="<?= $baseUrl ?>&page=<?= $currentPage - 1 ?>" class="pagination-link">
                                ← Trước
                            </a>
                        <?php else: ?>
                            <span class="pagination-link disabled">← Trước</span>
                        <?php endif; ?>
                    </li>

                    <!-- Các trang -->
                    <?php
                    $startPage = max(1, $currentPage - 2);
                    $endPage = min($totalPages, $currentPage + 2);

                    if ($startPage > 1): ?>
                        <li class="pagination-item">
                            <a href="<?= $baseUrl ?>&page=1" class="pagination-link">1</a>
                        </li>
                        <?php if ($startPage > 2): ?>
                            <li class="pagination-item">
                                <span class="pagination-link disabled">...</span>
                            </li>
                        <?php endif;
                    endif;

                    for ($i = $startPage; $i <= $endPage; $i++): ?>
                        <li class="pagination-item">
                            <?php if ($i === $currentPage): ?>
                                <span class="pagination-link active"><?= $i ?></span>
                            <?php else: ?>
                                <a href="<?= $baseUrl ?>&page=<?= $i ?>" class="pagination-link"><?= $i ?></a>
                            <?php endif; ?>
                        </li>
                    <?php endfor;

                    if ($endPage < $totalPages): ?>
                        <?php if ($endPage < $totalPages - 1): ?>
                            <li class="pagination-item">
                                <span class="pagination-link disabled">...</span>
                            </li>
                        <?php endif; ?>
                        <li class="pagination-item">
                            <a href="<?= $baseUrl ?>&page=<?= $totalPages ?>" class="pagination-link"><?= $totalPages ?></a>
                        </li>
                    <?php endif; ?>

                    <!-- Nút Sau -->
                    <li class="pagination-item">
                        <?php if ($currentPage < $totalPages): ?>
                            <a href="<?= $baseUrl ?>&page=<?= $currentPage + 1 ?>" class="pagination-link">
                                Sau →
                            </a>
                        <?php else: ?>
                            <span class="pagination-link disabled">Sau →</span>
                        <?php endif; ?>
                    </li>
                </ul>
            </div>
        <?php endif; ?>

    <?php endif; ?>
</div>

<?php include 'app/views/shares/footer.php'; ?>