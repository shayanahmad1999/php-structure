<?php
require_once 'config.php';
require_once 'includes/functions.php';
require_once 'routes/index.php';

// Routing logic
$page = isset($_GET['page']) ? $_GET['page'] : 'home';
$page = preg_replace('/[^-a-zA-Z0-9_]/', '', $page); // Basic sanitization


switch ($page) {
    case 'user':
        $pageTitle = 'Users';
        break;
    case 'product':
        $pageTitle = 'Products';
        break;
    case 'about':
        $pageTitle = 'About';
        break;
    case 'contact':
        $pageTitle = 'Contact';
        break;
    default:
        $pageTitle = 'Home';
        break;
}

require_once 'includes/header.php';

$controllerFile = 'controllers/' . $page . 'Controller.php';
if (file_exists($controllerFile)) {
    require_once $controllerFile;
}
 else if(!file_exists($controllerFile)){
    require_once 'views/' . $page . '.php';
} 
else {
    require_once 'views/404.php';
}


// $router = new Router();
// $router->get('/', [UserController::class, 'index']);
// $router->get('/user', [UserController::class, 'index']);
// $router->get('/user/create', [UserController::class, 'create']);
// $router->post('/user/create', [UserController::class, 'create']);
// $router->get('/user/edit', [UserController::class, 'edit']);
// $router->post('/user/edit', [UserController::class, 'edit']);
// $router->get('/user/delete', [UserController::class, 'delete']);

// $router->dispatch();

require_once 'includes/footer.php';
?>
