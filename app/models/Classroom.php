<?php

class Classroom
{
    public $connection;

    public function __construct()
    {
        global $dbh;
        $this->connection = $dbh;
    }

    public function getAll()
    {
        $stmt = $this->connection->prepare("SELECT * FROM classrooms ORDER BY id ASC");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}