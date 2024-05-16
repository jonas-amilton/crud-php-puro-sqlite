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
        return $this->connection ?: $this->connect();
    }

    public function query($query)
    {
        $result = $this->getConnection()->query($query);
        $result->setFetchMode(PDO::FETCH_INTO, new stdClass);
        return $result;
    }

    public function prepare($query)
    {
        return $this->getConnection()->prepare($query);
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

    public function update($table, $data, $condition)
    {
        $setClause = implode(", ", array_map(fn ($key) => "$key = :$key", array_keys($data)));

        $sql = "UPDATE {$table} SET {$setClause} WHERE {$condition}";
        $stmt = $this->getConnection()->prepare($sql);

        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        return $stmt->execute();
    }

    public function delete($table, $condition)
    {
        $sql = "DELETE FROM {$table} WHERE {$condition}";
        $stmt = $this->getConnection()->prepare($sql);
        return $stmt->execute();
    }
}
