<?php
require_once 'app/config/database.php';
require_once 'app/models/ProductModel.php';

class ProductController
{
    private $productModel;
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
        $this->productModel = new ProductModel($this->db);
    }

    public function index()
    {
        $products = $this->productModel->getAllProducts();
        include 'app/views/product/index.php';
    }

    public function manage()
    {
        $products = $this->productModel->getAllProducts();
        include 'app/views/product/manage.php';
    }

    public function create()
    {
        $categoryModel = new CategoryModel($this->db);
        $categories = $categoryModel->getAllCategories();
        include 'app/views/product/create.php';
    }

    public function store()
    {
        $price = $_POST['price'];

        if ($price < 0 || $price > 999999999999999999) {
            die("Giá tiền không hợp lệ.");
        }

        $imageData = null;

        if (!empty($_FILES['image']['tmp_name'])) {
            $imageData = file_get_contents($_FILES['image']['tmp_name']);
        }

        $this->productModel->addProduct(
            $_POST['name'],
            $_POST['material'],
            $_POST['size'],
            $_POST['color'],
            $price,
            $_POST['description'],
            $imageData,
            $_POST['category_id']
        );

        header("Location: /webbanhang/Product/manage");
    }

    public function edit($id)
    {
        $product = $this->productModel->getProductById($id);

        $categoryModel = new CategoryModel($this->db);
        $categories = $categoryModel->getAllCategories();

        include 'app/views/product/edit.php';
    }

    public function update()
    {
        $id = $_POST['id'];
        $product = $this->productModel->getProductById($id);

        $imageData = $product->image;

        if (!empty($_FILES['image']['tmp_name'])) {
            $imageData = file_get_contents($_FILES['image']['tmp_name']);
        }

        $this->productModel->updateProduct(
            $id,
            $_POST['name'],
            $_POST['material'],
            $_POST['size'],
            $_POST['color'],
            $_POST['price'],
            $_POST['description'],
            $imageData,
            $_POST['category_id']
        );

        header("Location: /webbanhang/Product/manage");
    }

    public function delete($id)
    {
        $product = $this->productModel->getProductById($id);

        $this->productModel->deleteProduct($id);

        header("Location: /webbanhang/Product/manage");
    }
    public function show($id)
    {
        $product = $this->productModel->getProductById($id);
        include 'app/views/product/show.php';
    }
    public function detail($id)
    {
        $product = $this->productModel->getProductById($id);

        if (!$product) {
            header("Location: /webbanhang/Product/index");
            exit();
        }

        include 'app/views/product/detail.php';
    }
}