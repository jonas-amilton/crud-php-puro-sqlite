<?php
require './models/User.php';

if (isset($_GET['id'])) {
    $modelUser = new User();

    $id = $_GET['id'];

    if ($modelUser->delete($id)) {
        echo "Registro deletado com sucesso.";
        header("Location: index.php");
        die();
    } else {
        echo "Falha ao deletar o registro.";
    }
} else {
    echo "ID não fornecido.";
}
