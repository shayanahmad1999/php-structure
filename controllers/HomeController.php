<?php
class HomeController {
    public function index()
    {
        require_once 'views/home.php';
    }
}
$homeController = new HomeController();
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch ($action) {
    case 'index':
        $homeController->index();
        break;
    default:
        die('Invalid action for user.');
}
?>
