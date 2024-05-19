<?php
require './backend/controllers/UserController.php';
require './backend/controllers/ColorController.php';

$userController = new UserController();
$colorController = new ColorController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['email'])) {
        $userController->updateUser();
    } elseif (isset($_POST['name']) && isset($_POST['email'])) {
        $userController->insertUser();
    } elseif (isset($_POST['color_id']) && isset($_POST['user_id'])) {
        $colorController->linkColor();
    } else {
        echo "Dados obrigatórios não foram fornecidos.";
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
        $userController->deleteUser();
    }
} else {
    echo "Método de requisição não suportado.";
}
