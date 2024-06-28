<?php
class ProductModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getProducts() {
        $query = "SELECT * FROM products";
        $result = $this->db->query($query);
        return $this->db->fetchAll($result);
    }

    public function getProductById($id) {
        $query = "SELECT * FROM products WHERE id = " . $id;
        $result = $this->db->query($query);
        return $this->db->fetch($result);
    }

    public function addProduct($name, $price) {
        $name = $this->db->escapeString($name);
        $price = floatval($this->db->escapeString($price));

        $query = "INSERT INTO products (name, price) VALUES ('$name', $price)";
        $result = $this->db->query($query);
        if ($result) {
            return true;
        } else {
            die('Error adding product: ' . mysqli_error($this->db->connection));
        }
    }

    public function updateProduct($id, $name, $price) {
        $name = $this->db->escapeString($name);
        $price = floatval($this->db->escapeString($price));

        $query = "UPDATE products SET name = '$name', price = $price WHERE id = $id";
        $result = $this->db->query($query);
        if ($result) {
            return true;
        } else {
            die('Error updating product: ' . mysqli_error($this->db->connection));
        }
    }

    public function deleteProduct($id) {
        $query = "DELETE FROM products WHERE id = " . $id;
        $result = $this->db->query($query);
        if ($result) {
            return true;
        } else {
            die('Error deleting product: ' . mysqli_error($this->db->connection));
        }
    }
}
?>
