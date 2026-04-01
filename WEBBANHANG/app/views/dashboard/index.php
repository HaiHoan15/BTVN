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

    .dashboard-container {
        padding: 40px 15px;
    }

    /* PAGE TITLE */
    .dashboard-title {
        font-size: 32px;
        font-weight: 700;
        color: var(--secondary-color);
        margin-bottom: 30px;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    /* STATS GRID */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        margin-bottom: 40px;
    }

    /* STAT CARD */
    .stat-card {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: white;
        border-radius: 12px;
        padding: 25px;
        transition: all 0.3s;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 24px rgba(26, 31, 54, 0.2);
    }

    .stat-card.variant-2 {
        background: linear-gradient(135deg, var(--accent-color), var(--primary-color));
    }

    .stat-card.variant-3 {
        background: linear-gradient(135deg, #10b981, #059669);
    }

    .stat-card.variant-4 {
        background: linear-gradient(135deg, #3b82f6, #2563eb);
    }

    .stat-label {
        font-size: 14px;
        opacity: 0.9;
        margin-bottom: 8px;
        font-weight: 500;
    }

    .stat-value {
        font-size: 28px;
        font-weight: 700;
        display: block;
    }

    /* CONTENT GRID */
    .content-grid {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 20px;
        margin-top: 30px;
    }

    /* BOX */
    .box {
        background: white;
        border-radius: 12px;
        padding: 25px;
        border: 1px solid var(--border-color);
        transition: all 0.3s;
    }

    .box:hover {
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.08);
    }

    .box-title {
        font-size: 18px;
        font-weight: 700;
        color: var(--secondary-color);
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 8px;
        padding-bottom: 15px;
        border-bottom: 2px solid var(--border-color);
    }

    /* TABLE IN BOX */
    .box table {
        width: 100%;
        border-collapse: collapse;
    }

    .box table thead {
        background: var(--light-bg);
    }

    .box table th {
        padding: 12px 15px;
        text-align: left;
        font-weight: 600;
        color: var(--text-dark);
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        border-bottom: 1px solid var(--border-color);
    }

    .box table td {
        padding: 12px 15px;
        border-bottom: 1px solid var(--border-color);
        color: var(--text-dark);
        font-size: 14px;
    }

    .box table tr:hover {
        background: var(--light-bg);
    }

    .box table tr:last-child td {
        border-bottom: none;
    }

    .price-highlight {
        color: var(--primary-color);
        font-weight: 700;
    }

    /* CHART CONTAINER */
    .chart-container {
        position: relative;
        height: 300px;
        margin-bottom: 20px;
    }

    /* PERFORMANCE BOX */
    .performance-card {
        text-align: center;
    }

    .performance-value {
        font-size: 24px;
        font-weight: 700;
        color: var(--primary-color);
        margin: 15px 0;
    }

    .performance-label {
        color: var(--text-light);
        font-size: 14px;
        margin-bottom: 15px;
    }

    .progress {
        height: 8px;
        background: var(--border-color);
        border-radius: 10px;
        overflow: hidden;
        margin: 15px 0;
    }

    .progress-bar {
        height: 100%;
        background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
        transition: width 0.3s;
    }

    /* RESPONSIVE */
    @media (max-width: 1200px) {
        .content-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 768px) {
        .dashboard-container {
            padding: 20px 15px;
        }

        .dashboard-title {
            font-size: 24px;
        }

        .stats-grid {
            grid-template-columns: 1fr;
            gap: 15px;
        }

        .stat-card {
            padding: 20px;
        }

        .stat-value {
            font-size: 24px;
        }

        .box {
            padding: 15px;
        }

        .box-title {
            font-size: 16px;
        }

        .chart-container {
            height: 250px;
        }
    }
</style>

<div class="dashboard-container">

    <!-- DASHBOARD TITLE -->
    <h1 class="dashboard-title">
        <i class="bi bi-graph-up"></i> Thống kê và phân tích
    </h1>

    <!-- STATS GRID -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-label">Tổng sản phẩm</div>
            <span class="stat-value"><?= $totalProducts ?></span>
        </div>

        <div class="stat-card variant-2">
            <div class="stat-label">Danh mục</div>
            <span class="stat-value"><?= $totalCategories ?></span>
        </div>

        <div class="stat-card variant-3">
            <div class="stat-label">Tổng thu nhập</div>
            <span class="stat-value"><?= number_format($totalRevenue, 0, ',', '.') ?> đ</span>
        </div>

        <div class="stat-card variant-4">
            <div class="stat-label">Giá TB mỗi đơn</div>
            <span class="stat-value"><?= number_format($avgPrice, 0, ',', '.') ?> đ</span>
        </div>
    </div>

    <!-- CONTENT GRID -->
    <div class="content-grid">

        <!-- LEFT: CHARTS AND TABLE -->
        <div>

            <!-- CATEGORY CHART -->
            <div class="box">
                <div class="box-title">
                    <i class="bi bi-bar-chart"></i> Sản phẩm theo danh mục
                </div>
                <div class="chart-container">
                    <canvas id="categoryChart"></canvas>
                </div>
            </div>

            <!-- TOP PRODUCTS TABLE -->
            <div class="box" style="margin-top: 20px;">
                <div class="box-title">
                    <i class="bi bi-star"></i> Top sản phẩm giá cao
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Giá</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($topProducts as $p): ?>
                            <tr>
                                <td><?= htmlspecialchars($p->name) ?></td>
                                <td class="price-highlight"><?= number_format($p->price, 0, ',', '.') ?> đ</td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>

        <!-- RIGHT: PERFORMANCE -->
        <div>
            <div class="box performance-card">
                <div class="box-title" style="justify-content: center; border: none; padding-bottom: 0;">
                    <i class="bi bi-target"></i> Hiệu suất
                </div>
                
                <div class="chart-container" style="margin: 20px 0;">
                    <canvas id="donutChart"></canvas>
                </div>

                <div class="performance-value" id="percentText">0%</div>
                <div class="performance-label">Mức độ đạt</div>

                <div class="progress">
                    <div id="progressBar" class="progress-bar" style="width: 0%;"></div>
                </div>
            </div>
        </div>

    </div>

</div>

<script>
    // Category Chart
    const labels = <?= json_encode(array_column($productByCategory, 'name')) ?>;
    const data = <?= json_encode(array_column($productByCategory, 'total')) ?>;

    new Chart(document.getElementById('categoryChart'), {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                data: data,
                backgroundColor: '#B8936A',
                borderRadius: 8,
                borderSkipped: false
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    },
                    grid: {
                        color: '#E8E6E3'
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });

    // Donut Chart
    const percent = Math.min(100, Math.round((<?= $avgPrice ?> / <?= $totalRevenue ?: 1 ?>) * 100 * 10));

    document.getElementById("percentText").innerText = percent + "%";
    document.getElementById("progressBar").style.width = percent + "%";

    new Chart(document.getElementById('donutChart'), {
        type: 'doughnut',
        data: {
            datasets: [{
                data: [percent, 100 - percent],
                backgroundColor: ['#B8936A', '#E8E6E3']
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '75%',
            plugins: { legend: { display: false } }
        }
    });
</script>

<?php include 'app/views/shares/footer.php'; ?>

    .dashboard-title {
        font-weight: 700;
        margin-bottom: 25px;
        color: #333;
    }

    /* CARD */
    .card-custom {
        border: none;
        border-radius: 16px;
        padding: 20px;
        color: white;
        transition: 0.3s;
    }

    .card-custom:hover {
        transform: translateY(-5px);
    }

    /* Gradient từng card */
    .bg-1 {
        background: linear-gradient(135deg, #667eea, #764ba2);
    }

    .bg-2 {
        background: linear-gradient(135deg, #43cea2, #185a9d);
    }

    .bg-3 {
        background: linear-gradient(135deg, #f7971e, #ffd200);
    }

    .bg-4 {
        background: linear-gradient(135deg, #ff6a00, #ee0979);
    }

    .stat-title {
        font-size: 14px;
        opacity: 0.8;
    }

    .stat-value {
        font-size: 28px;
        font-weight: bold;
        margin-top: 8px;
    }

    /* Box trắng */
    .box {
        background: #fff;
        border-radius: 16px;
        padding: 20px;
        box-shadow: 0 5px 25px rgba(0, 0, 0, 0.05);
    }

    .card-header-custom {
        font-weight: 600;
        margin-bottom: 15px;
    }

    .table thead {
        background: #f1f5f9;
    }

    .table tr:hover {
        background: #f9fafb;
    }

    .progress {
        height: 8px;
        border-radius: 20px;
    }

    .progress-bar {
        background: linear-gradient(90deg, #667eea, #764ba2);
    }
</style>

<div class="container-fluid py-3">

    <h3 class="dashboard-title">Thống kê</h3>

    <!-- STATS -->
    <div class="row g-3">

        <div class="col-md-3">
            <div class="card-custom bg-1">
                <div class="stat-title">Tổng sản phẩm</div>
                <div class="stat-value"><?= $totalProducts ?></div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card-custom bg-2">
                <div class="stat-title">Danh mục</div>
                <div class="stat-value"><?= $totalCategories ?></div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card-custom bg-3">
                <div class="stat-title">Tổng giá trị thu nhập</div>
                <div class="stat-value"><?= number_format($totalRevenue) ?> VND</div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card-custom bg-4">
                <div class="stat-title">Giá trung bình sau mỗi đơn hàng</div>
                <div class="stat-value"><?= number_format($avgPrice, 2) ?> VND</div>
            </div>
        </div>

    </div>

    <!-- CONTENT -->
    <div class="row mt-4 g-3">

        <!-- LEFT -->
        <div class="col-md-8">

            <div class="box">
                <div class="card-header-custom">Sản phẩm theo danh mục</div>
                <canvas id="categoryChart"></canvas>
            </div>

            <div class="box mt-4">
                <div class="card-header-custom">Top sản phẩm giá cao</div>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Giá</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($topProducts as $p): ?>
                            <tr>
                                <td><?= $p->name ?></td>
                                <td class="text-danger fw-bold">
                                    <?= number_format($p->price) ?> VND
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>

        </div>

        <!-- RIGHT -->
        <div class="col-md-4">

            <div class="box text-center">

                <div class="card-header-custom"> Hiệu suất</div>

                <canvas id="donutChart" style="max-height:200px;"></canvas>

                <div class="stat-value mt-3 text-dark" id="percentText"></div>

                <div class="mt-3">
                    <small class="text-muted">Mức độ đạt</small>
                    <div class="progress mt-2">
                        <div id="progressBar" class="progress-bar"></div>
                    </div>
                </div>

            </div>

        </div>

    </div>

</div>

<script>
    const labels = <?= json_encode(array_column($productByCategory, 'name')) ?>;
    const data = <?= json_encode(array_column($productByCategory, 'total')) ?>;

    new Chart(document.getElementById('categoryChart'), {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                data: data,
                backgroundColor: '#667eea',
                borderRadius: 8
            }]
        },
        options: {
            plugins: { legend: { display: false } }
        }
    });

    const percent = Math.min(100, Math.round((<?= $avgPrice ?> / <?= $totalRevenue ?: 1 ?>) * 100 * 10));

    document.getElementById("percentText").innerText = percent + "%";
    document.getElementById("progressBar").style.width = percent + "%";

    new Chart(document.getElementById('donutChart'), {
        type: 'doughnut',
        data: {
            datasets: [{
                data: [percent, 100 - percent],
                backgroundColor: ['#667eea', '#e5e7eb']
            }]
        },
        options: {
            cutout: '75%',
            plugins: { legend: { display: false } }
        }
    });
</script>

<?php include 'app/views/shares/footer.php'; ?>