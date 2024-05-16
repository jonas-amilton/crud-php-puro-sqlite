<?php
require 'connection.php';

if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['email'])) {
    $connection = new Connection();

    $data = [
        'name' => $_POST['name'],
        'email' => $_POST['email']
    ];

    $id = $_POST['id'];

    if (!empty($data) && !empty($id)) {
        $condition = "id = :id";
        $dataWithCondition = array_merge($data, ['id' => $id]);

        $connection->update('users', $dataWithCondition, $condition);

        echo "Dados atualizados com sucesso.";

        header("Location: index.php");
        die();
    } else {
        echo "Falha durante a atualização no banco de dados.";
    }
} else {
    echo "Dados obrigatórios não foram fornecidos.";
}