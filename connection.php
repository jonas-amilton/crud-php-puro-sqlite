<?php

class Connection
{
    private $databaseFile;
    private $connection;

    public function __construct()
    {
        $this->databaseFile = realpath(__DIR__ . "/database/db.sqlite");
        $this->connect();
    }

    private function connect()
    {
        return $this->connection = new PDO("sqlite:{$this->databaseFile}");
    }

    public function getConnection()
    {
        return $this->connection ?: $this->connection = $this->connect();
    }

    public function query($query)
    {
        $result = $this->getConnection()->query($query);
        $result->setFetchMode(PDO::FETCH_INTO, new stdClass);
        return $result;
    }

    public function insert($table, $data)
    {
        $columns = implode(", ", array_keys($data));
        $placeholders = ":" . implode(", :", array_keys($data));

        $sql = "INSERT INTO {$table} ({$columns}) VALUES ({$placeholders})";
        $stmt = $this->getConnection()->prepare($sql);

        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        return $stmt->execute();
    }
}
