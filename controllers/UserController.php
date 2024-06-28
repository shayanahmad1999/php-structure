<?php
require_once 'models/UserModel.php';

class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function index() {
        $users = $this->userModel->getUsers();
        require_once 'views/users.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            if ($this->userModel->addUser($name, $email, $password)) {
                header('Location: user');
                exit();
            }
        } else {
            require_once 'views/create-user.php';
        }
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];

            if ($this->userModel->updateUser($id, $name, $email)) {
                header('Location: user');
                exit();
            }
        } else {
            $user = $this->userModel->getUserById($id);
            require_once 'views/edit-user.php';
        }
    }

    public function delete($id) {
        if ($this->userModel->deleteUser($id)) {
            header('Location: user');
            exit();
        }
    }
}

$userController = new UserController();
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch ($action) {
    case 'index':
        $userController->index();
        break;
    case 'create':
        $userController->create();
        break;
    case 'edit':
        $id = isset($_GET['id']) ? $_GET['id'] : die('Missing user ID.');
        $userController->edit($id);
        break;
    case 'delete':
        $id = isset($_GET['id']) ? $_GET['id'] : die('Missing user ID.');
        $userController->delete($id);
        break;
    default:
        die('Invalid action for user.');
}
?>
