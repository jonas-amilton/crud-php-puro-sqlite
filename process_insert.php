<?php
require 'connection.php';

if (isset($_POST['name']) && isset($_POST['email'])) {
    $connection = new Connection();

    $data = [
        'name' => $_POST['name'],
        'email' => $_POST['email']
    ];

    if ($connection->insert('users', $data)) {
        echo "Dados inseridos com sucesso.";

        header("Location: index.php");
        die();
    } else {
        echo "Falha durante a inserção no banco de dados.";
    }
} else {
    echo "Dados obrigatórios não foram fornecidos.";
}