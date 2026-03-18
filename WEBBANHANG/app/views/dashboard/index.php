<?php include 'app/views/shares/header.php'; ?>

<style>
    body {
        background: linear-gradient(135deg, #eef2ff, #f8fafc);
        font-family: 'Segoe UI', sans-serif;
    }

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