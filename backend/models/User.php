<?php
require_once './connection.php';


class User
{
    private $name;
    private $email;
    private $id;

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

    public function insert()
    {
        try {
            $connection = new Connection();

            $sql = "INSERT INTO users (name, email) VALUES (:name, :email)";
            $stmt = $connection->getConnection()->prepare($sql);
            $stmt->bindValue(":name", $this->name);
            $stmt->bindValue(":email", $this->email);

            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erro ao inserir usuário: " . $e->getMessage();
            return false;
        }
    }

    public function delete()
    {
        try {
            $connection = new Connection();

            $stmt = $connection->prepare("DELETE FROM users WHERE id = :id");
            $stmt->bindValue(":id", $this->id, PDO::PARAM_INT);

            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo "Erro ao deletar usuário: " . $e->getMessage();
            return false;
        }
    }

    public function update()
    {
        try {
            $connection = new Connection();

            $sql = "UPDATE users SET name = :name, email = :email WHERE id = :id";
            $stmt = $connection->getConnection()->prepare($sql);

            $stmt->bindValue(":name", $this->name);
            $stmt->bindValue(":email", $this->email);
            $stmt->bindValue(":id", $this->id);

            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erro ao atualizar usuário: " . $e->getMessage();
            return false;
        }
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
}
