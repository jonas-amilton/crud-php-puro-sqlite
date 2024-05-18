<?php
require './models/User.php';

class UserController
{
    public function insertUser()
    {
        if (isset($_POST['name']) && isset($_POST['email'])) {
            $modelUser = new User();
            $name = $_POST['name'];
            $email = $_POST['email'];

            $modelUser->setName($name);
            $modelUser->setEmail($email);

            if ($modelUser->insert()) {
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

    public function updateUser()
    {
        if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['email'])) {
            $modelUser = new User();
            $name = $_POST['name'];
            $email = $_POST['email'];
            $id = $_POST['id'];

            $modelUser->setName($name);
            $modelUser->setEmail($email);
            $modelUser->setId($id);

            if ($modelUser->update()) {
                echo "Dados atualizados com sucesso.";
                header("Location: index.php");
                die();
            } else {
                echo "Falha durante a atualização no banco de dados.";
            }
        } else {
            echo "Dados obrigatórios não foram fornecidos.";
        }
    }

    public function deleteUser()
    {
        if (isset($_GET['id'])) {
            $modelUser = new User();
            $id = $_GET['id'];

            $modelUser->setId($id);

            if ($modelUser->delete()) {
                echo "Registro deletado com sucesso.";
                header("Location: index.php");
                die();
            } else {
                echo "Falha ao deletar o registro.";
            }
        } else {
            echo "ID não fornecido.";
        }
    }
}
