<?php
require_once './app/controllers/AuthController.php';
require_once './app/controllers/TextoController.php';
require_once './app/controllers/AutorController.php';
require_once './app/controllers/HomeController.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$action = 'home'; // acción por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);

switch ($params[0]) {
    case 'home':
        $controller = new HomeController();
        $controller->showHome();
        break;
    case 'listarTextos':
        $controller = new TextoController();
        $controller->showTextos();
        break;
    case 'texto':
        $controller = new TextoController();
        $controller->showTextoById($params[1]);
        break;
    case 'formModificarTexto':
        $controller = new TextoController();
        $controller->showTextoAModificar($params[1]);
        break;
    case 'modificarTexto':
        $controller = new TextoController();
        $controller->modificarTexto($params[1]);
        break;
    case 'agregarTexto':
        $controller = new TextoController();
        $controller->agregarTexto();
        break;
    case 'eliminarTexto':
        $controller = new TextoController();
        $controller->eliminarTexto($params[1]);
        break;
    case 'listarAutores':
        $controller = new AutorController();
        $controller->showAutores();
        break;
    case 'autor':
        $controller = new AutorController();
        $controller->showAutorById($params[1]);
        break;
    case 'formModificarAutor':
        $controller = new AutorController();
        $controller->showAutorAModificar($params[1]);
        break;
    case 'modificarAutor':
        $controller = new AutorController();
        $controller->modificarAutor($params[1]);
        break;
    case 'agregarAutor':
        $controller = new AutorController();
        $controller->agregarAutor();
        break;
    case 'solicitudEliminarAutor':
        $controller = new AutorController();
        $controller->solicitudEliminarAutor($params[1]);
        break;
    case 'eliminarAutor':
        $controller = new AutorController();
        $controller->eliminarAutor($params[1]);
        break;
    case 'login':
        $controller = new AuthController();
        $controller->showLogin();
        break;
    case 'logout':
        $controller = new AuthController();
        $controller->logout();
        break;
        // quien llama a esto?
    case 'auth':
        $controller = new AuthController();
        $controller->authenticate();
        break;
    default:
        echo "404 Page Not Found";
        break;
}
