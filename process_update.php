<?php
require './models/User.php';

if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['email'])) {
    $modelUser = new User();

    $name = $_POST['name'];
    $email = $_POST['email'];
    $id = $_POST['id'];

    if ($modelUser->update($name, $email, $id)) {

        echo "Dados atualizados com sucesso.";

        header("Location: index.php");
        die();
    } else {
        echo "Falha durante a atualização no banco de dados.";
    }
} else {
    echo "Dados obrigatórios não foram fornecidos.";
}
