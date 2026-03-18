<?php
require_once('app/config/database.php');

class DashboardController
{
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
    }

    public function index()
    {
        // Tổng số sản phẩm
        $totalProducts = $this->db->query("SELECT COUNT(*) FROM product")->fetchColumn();

        // Tổng số danh mục
        $totalCategories = $this->db->query("SELECT COUNT(*) FROM category")->fetchColumn();

        // Tổng giá trị sản phẩm (giả lập doanh thu)
        $totalRevenue = $this->db->query("SELECT SUM(price) FROM product")->fetchColumn();

        // Giá trung bình
        $avgPrice = $this->db->query("SELECT AVG(price) FROM product")->fetchColumn();

        // Top 5 sản phẩm giá cao nhất
        $topProducts = $this->db->query("
            SELECT name, price 
            FROM product 
            ORDER BY price DESC 
            LIMIT 5
        ")->fetchAll(PDO::FETCH_OBJ);

        // Số sản phẩm theo category
        $productByCategory = $this->db->query("
            SELECT c.name, COUNT(p.id) as total
            FROM category c
            LEFT JOIN product p ON p.category_id = c.id
            GROUP BY c.name
        ")->fetchAll(PDO::FETCH_OBJ);

        include 'app/views/dashboard/index.php';
        // Giả lập số lượng đã bán (random)
        $soldProducts = [];

        foreach ($this->db->query("SELECT id, name FROM product") as $p) {
            $soldProducts[] = (object) [
                'name' => $p['name'],
                'sold' => rand(10, 200) // fake data
            ];
        }
    }
}