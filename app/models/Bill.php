<?php

class Bill
{
    public $connection;

    public function __construct()
    {
        global $dbh;
        $this->connection = $dbh;
    }

    public function getAll()
    {
        $stmt = $this->connection->prepare("SELECT * FROM bills ORDER BY id DESC");
        $stmt->execute();

        return $stmt->fetchAll();
    }
}