<?php
require_once 'app/models/CategoryModel.php';
class ProductModel
{
    private $conn;
    private $table_name = "product";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getAllProducts()
    {
        $query = "SELECT p.*, c.name AS category_name
          FROM product p
          LEFT JOIN category c ON p.category_id = c.id
          ORDER BY p.id DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getProductById($id)
    {
        $query = "SELECT p.*, c.name AS category_name
          FROM product p
          LEFT JOIN category c ON p.category_id = c.id
          WHERE p.id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function addProduct($name, $material, $size, $color, $price, $description, $image, $category_id)
    {
        $query = "INSERT INTO product
                  (name, material, size, color, price, description, image, category_id)
                  VALUES (:name, :material, :size, :color, :price, :description, :image, :category_id)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":material", $material);
        $stmt->bindParam(":size", $size);
        $stmt->bindParam(":color", $color);
        $stmt->bindParam(":price", $price);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":image", $image, PDO::PARAM_LOB);
        $stmt->bindParam(":category_id", $category_id);

        return $stmt->execute();
    }

    public function updateProduct($id, $name, $material, $size, $color, $price, $description, $image, $category_id)
    {
        $query = "UPDATE product SET
                  name=:name,
                  material=:material,
                  size=:size,
                  color=:color,
                  price=:price,
                  description=:description,
                  image=:image,
                  category_id=:category_id
                  WHERE id=:id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":material", $material);
        $stmt->bindParam(":size", $size);
        $stmt->bindParam(":color", $color);
        $stmt->bindParam(":price", $price);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":image", $image, PDO::PARAM_LOB);
        $stmt->bindParam(":category_id", $category_id);

        return $stmt->execute();
    }

    public function deleteProduct($id)
    {
        $query = "DELETE FROM product WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }

}