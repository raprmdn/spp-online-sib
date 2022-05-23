<?php

$dsn = 'mysql:dbname=spp_online;host=localhost;port=3306';
$username = 'root';
$password = '123456';

try {
    $dbh = new PDO($dsn, $username, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}