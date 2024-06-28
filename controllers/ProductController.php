<?php
require_once 'models/ProductModel.php';

class ProductController {
    private $productModel;

    public function __construct() {
        $this->productModel = new ProductModel();
    }

    public function index() {
        $products = $this->productModel->getProducts();
        require_once 'views/products.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $price = $_POST['price'];

            if ($this->productModel->addProduct($name, $price)) {
                header('Location: index.php?page=product');
                exit();
            }
        } else {
            require_once 'views/create-product.php';
        }
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $price = $_POST['price'];

            if ($this->productModel->updateProduct($id, $name, $price)) {
                header('Location: index.php?page=product');
                exit();
            }
        } else {
            $product = $this->productModel->getProductById($id);
            require_once 'views/edit-product.php';
        }
    }

    public function delete($id) {
        if ($this->productModel->deleteProduct($id)) {
            header('Location: index.php?page=product');
            exit();
        }
    }
}

$productController = new ProductController();
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch ($action) {
    case 'index':
        $productController->index();
        break;
    case 'create':
        $productController->create();
        break;
    case 'edit':
        $id = isset($_GET['id']) ? $_GET['id'] : die('Missing product ID.');
        $productController->edit($id);
        break;
    case 'delete':
        $id = isset($_GET['id']) ? $_GET['id'] : die('Missing product ID.');
        $productController->delete($id);
        break;
    default:
        die('Invalid action for product.');
}
?>
