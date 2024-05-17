<?php
require 'connection.php';

// insere usuário
if (isset($_POST['name']) && isset($_POST['email'])) {
    $connection = new Connection();

    $users = [
        'name' => $_POST['name'],
        'email' => $_POST['email']
    ];

    // var_dump($users);

    if ($connection->insert('users', $users)) {
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
    $connection = new Connection();


    $userColors = [
        'user_id' => $_POST['user_id'],
        'color_id' => $_POST['color_id']
    ];

    // var_dump($userColors);

    if ($connection->insert('user_colors', $userColors)) {
        echo "Dados inseridos com sucesso.";

        header("Location: index.php");
        die();
    } else {
        echo "Falha durante a inserção no banco de dados.";
    }
} else {
    echo "Dados obrigatórios não foram fornecidos.";
}