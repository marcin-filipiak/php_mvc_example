<?php

// Importowanie konfiguracji
include('config/Config.php');

// Importowanie klasy Database
include('includes/Database.php');

// Autoloader do automatycznego ładowania klas
spl_autoload_register(function ($class) {
    @include 'controllers/' . $class . '.php';
    @include 'models/' . $class . '.php';
});

// Pobierz żądanie użytkownika
$action = isset($_GET['action']) ? $_GET['action'] : 'login';

// Kontroler główny
switch ($action) {
    case 'register':
        $controller = new RegisterController();
        break;
    case 'login':
        $controller = new LoginController();
        break;
    case 'editor':
        $controller = new EditorController();
        break;
    case 'display':
        $controller = new DisplayController();
        break;
    case 'delete':
        $controller = new DeleteController();
        break;
    case 'list':
	$controller = new ListController();
	break;
    case 'logout':
        $controller = new LogoutController();
        break;
    default:
        // Przekierowanie na stronę logowania w przypadku nieznanego żądania
        header('Location: index.php?action=login');
        exit;
}

// Wywołaj odpowiednią metodę kontrolera
$controller->handleRequest();

?>
