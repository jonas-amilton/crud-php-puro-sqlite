<?php
require './models/Color.php';

class ColorController
{
    public function linkColor()
    {
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
    }
}
