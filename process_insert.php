<?php
require 'connection.php';

if (isset($_GET['name']) && isset($_GET['email'])) {
    $connection = new Connection();

    $data = [
        'name' => $_GET['name'],
        'email' => $_GET['email']
    ];

    $table = 'users';

    if ($connection->insert($table, $data)) {
        echo "Dados inseridos com sucesso.";

        header("Location: index.php");
        die();
    } else {
        echo "Falha durante a inserção no banco de dados.";
    }
} else {
    echo "Dados obrigatórios não foram fornecidos.";
}
