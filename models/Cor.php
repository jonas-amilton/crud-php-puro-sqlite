<?php

class Cor
{
    private $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function getColorsById($id)
    {
        $query = "
            SELECT colors.name 
            FROM user_colors 
            INNER JOIN colors ON user_colors.color_id = colors.id 
            WHERE user_colors.user_id = :id
        ";

        $statement = $this->connection->prepare($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        $colors = $statement->fetchAll(PDO::FETCH_ASSOC);

        $result = '';
        foreach ($colors as $color) {
            $result = $result . ' - ' . $color['name'];
        }

        return $result;
    }
}