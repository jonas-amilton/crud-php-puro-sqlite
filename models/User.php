<?php

class User
{
    private $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function getUsers()
    {
        try {
            $query = "SELECT * FROM users";

            $result = $this->connection->getConnection()->query($query);
            $result->setFetchMode(PDO::FETCH_INTO, new stdClass);
            return $result;
        } catch (PDOException $e) {
            echo "Erro ao executar a consulta: " . $e->getMessage();
            return false;
        }
    }
}