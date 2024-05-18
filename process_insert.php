<?php
require './models/User.php';
require './models/Color.php';

// insere usuário
if (isset($_POST['name']) && isset($_POST['email'])) {
    $modelUser = new User();

    $name = $_POST['name'];
    $email = $_POST['email'];

    if ($modelUser->insert($name, $email)) {
        echo "Dados inseridos com sucesso.";

        header("Location: index.php");
        die();
    } else {
        echo "Falha durante a inserção no banco de dados.";
    }
} else {
    echo "Dados obrigatórios não foram fornecidos.";
}

echo '<hr>';

// vincula cor
if (isset($_POST['color_id']) && isset($_POST['user_id'])) {
    $modelColor = new Color();

    $userId = $_POST['user_id'];
    $colorId = $_POST['color_id'];

    if ($modelColor->insert($userId, $colorId)) {
        echo "Dados inseridos com sucesso.";

        header("Location: index.php");
        die();
    } else {
        echo "Falha durante a inserção no banco de dados.";
    }
} else {
    echo "Dados obrigatórios não foram fornecidos.";
}
