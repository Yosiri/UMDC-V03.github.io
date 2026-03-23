<?php
$host = 'localhost';
$db   = 'umdc';
$user = 'root';
$pass = 'Malijan321';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('DB ERROR: ' . $e->getMessage());
}
?>