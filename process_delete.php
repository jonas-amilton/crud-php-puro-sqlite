<?php
require 'connection.php';

if (isset($_GET['id'])) {
    $connection = new Connection();

    $id = $_GET['id'];
    $condition = "id = :id";

    $stmt = $connection->prepare("DELETE FROM users WHERE $condition");
    $stmt->bindValue(":id", $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo "Registro deletado com sucesso.";
        header("Location: index.php");
        die();
    } else {
        echo "Falha ao deletar o registro.";
    }
} else {
    echo "ID não fornecido.";
}
