<?php

$host = 'localhost';
$dbName = 'eqf_serviceHub';
$dbUser = 'TI';
$dbPassword = '62a85XWZ';

try {
    $connection = new PDO(
        "mysql:host={$host};dbname={$dbName};charset=utf8mb4",
        $dbUser,
        $dbPassword
    );

    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $exception) {
    die('Database connection failed: ' . $exception->getMessage());
}