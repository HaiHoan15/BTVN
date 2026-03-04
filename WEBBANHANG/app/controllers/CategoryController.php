<?php
require_once 'app/config/database.php';
require_once 'app/models/CategoryModel.php';

class CategoryController
{
    private $categoryModel;
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
        $this->categoryModel = new CategoryModel($this->db);
    }

    public function index()
    {
        $categories = $this->categoryModel->getAllCategories();
        include 'app/views/category/index.php';
    }

    public function create()
    {
        include 'app/views/category/create.php';
    }

    public function store()
    {
        $query = "INSERT INTO category (name, description)
                  VALUES (:name, :description)";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":name", $_POST['name']);
        $stmt->bindParam(":description", $_POST['description']);
        $stmt->execute();

        header("Location: /webbanhang/Category");
    }

    public function edit($id)
    {
        $query = "SELECT * FROM category WHERE id=:id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $category = $stmt->fetch(PDO::FETCH_OBJ);

        include 'app/views/category/edit.php';
    }

    public function update()
    {
        $query = "UPDATE category 
                  SET name=:name, description=:description
                  WHERE id=:id";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $_POST['id']);
        $stmt->bindParam(":name", $_POST['name']);
        $stmt->bindParam(":description", $_POST['description']);
        $stmt->execute();

        header("Location: /webbanhang/Category");
    }

    public function delete($id)
    {
        $checkQuery = "SELECT COUNT(*) as total 
                   FROM product 
                   WHERE category_id = :id";

        $stmt = $this->db->prepare($checkQuery);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ);

        if ($result->total > 0) {
            header("Location: /webbanhang/Category?error=has_product");
            exit();
        }

        $deleteQuery = "DELETE FROM category WHERE id=:id";
        $stmt = $this->db->prepare($deleteQuery);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        header("Location: /webbanhang/Category?success=deleted");
        exit();
    }
}