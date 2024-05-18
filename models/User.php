<?php
require_once './connection.php';


class User
{

    public function __construct()
    {
    }

    public function getUsers()
    {
        try {
            $connection = new Connection();

            $query = "SELECT * FROM users";

            $result = $connection->getConnection()->query($query);
            $result->setFetchMode(PDO::FETCH_INTO, new stdClass);
            return $result;
        } catch (PDOException $e) {
            echo "Erro ao executar a consulta: " . $e->getMessage();
            return false;
        }
    }

    public function insert($name, $email)
    {
        try {
            $connection = new Connection();

            $sql = "INSERT INTO users (name, email) VALUES (:name, :email)";
            $stmt = $connection->getConnection()->prepare($sql);
            $stmt->bindValue(":name", $name);
            $stmt->bindValue(":email", $email);

            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erro ao inserir usuário: " . $e->getMessage();
            return false;
        }
    }

    public function delete($id)
    {
        try {
            $connection = new Connection();

            $stmt = $connection->prepare("DELETE FROM users WHERE id = :id");
            $stmt->bindValue(":id", $id, PDO::PARAM_INT);

            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo "Erro ao deletar usuário: " . $e->getMessage();
            return false;
        }
    }
}
