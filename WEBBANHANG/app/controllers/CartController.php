<?php
require_once 'app/config/database.php';
require_once 'app/models/ProductModel.php';

class CartController
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
        $cartSession = $_SESSION['cart'] ?? [];
        $cart = [];

        foreach ($cartSession as $id => $item) {
            $product = $this->productModel->getProductById($id);

            if ($product) {
                $cart[] = [
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'quantity' => $item['quantity'],
                    'image' => $product->image
                ];
            }
        }

        include 'app/views/cart/index.php';
    }

    public function add($id)
    {
        $product = $this->productModel->getProductById($id);

        $qty = isset($_GET['qty']) ? (int) $_GET['qty'] : 1;

        if ($qty < 1)
            $qty = 1;
        if ($qty > 999)
            $qty = 999;

        if (!$product) {
            echo json_encode(['status' => 'error']);
            exit();
        }

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['quantity'] += $qty;
        } else {
            $_SESSION['cart'][$id] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $qty
            ];
        }

        echo json_encode(['status' => 'success']);
        exit();
    }
    public function update()
    {
        if (isset($_POST['id']) && isset($_POST['quantity'])) {

            $id = $_POST['id'];
            $qty = (int) $_POST['quantity'];

            if ($qty <= 0) {
                unset($_SESSION['cart'][$id]);
            } else {
                $_SESSION['cart'][$id]['quantity'] = $qty;
            }

            echo json_encode(['status' => 'success']);
            exit();
        }

        echo json_encode(['status' => 'error']);
        exit();
    }

    public function remove($id)
    {
        if (isset($_SESSION['cart'][$id])) {
            unset($_SESSION['cart'][$id]);
        }

        header("Location: /webbanhang/Cart");
        exit();
    }
    public function show($id)
    {
        $product = $this->productModel->getProductById($id);

        if (!$product) {
            header("Location: /webbanhang/Cart");
            exit();
        }

        include 'app/views/cart/show.php';
    }
}