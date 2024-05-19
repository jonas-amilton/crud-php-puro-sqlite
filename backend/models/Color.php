<?php
require_once './connection.php';

class Color
{
    private $colorId;
    private $userId;

    public function __construct()
    {
    }

    public function getColorsByIdUser($id)
    {
        try {
            $connection = new Connection();
            $query = "
            SELECT colors.name 
            FROM user_colors 
            INNER JOIN colors ON user_colors.color_id = colors.id 
            WHERE user_colors.user_id = :id
        ";

            $statement = $connection->prepare($query);
            $statement->bindParam(':id', $id, PDO::PARAM_INT);
            $statement->execute();

            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            echo "Erro ao executar a consulta: " . $e->getMessage();
            return false;
        }
    }

    public function getColors()
    {
        try {
            $connection = new Connection();

            $query = "SELECT * FROM colors";

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

            $sql = "INSERT INTO user_colors (user_id, color_id) VALUES (:user_id, :color_id)";
            $stmt = $connection->getConnection()->prepare($sql);
            $stmt->bindValue(":user_id", $this->userId);
            $stmt->bindValue(":color_id", $this->colorId);

            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erro ao vicular cor à usuário: " . $e->getMessage();
            return false;
        }
    }

    public function setColorId($colorId)
    {
        $this->colorId = $colorId;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
    }
}
