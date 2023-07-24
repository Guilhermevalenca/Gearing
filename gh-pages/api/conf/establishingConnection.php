<?php
$host = $_SERVER['DB_HOST'] ?? 'localhost';
$port = $_SERVER['DB_PORT'] ?? "3306";
$username = $_SERVER['DB_USERNAME'] ?? "gearing"; //Nome de usuario do seu mysql
$password = $_SERVER['DB_PASSWORD'] ?? "gearing123"; //senha do usuario do mysql
$dbname = $_SERVER['DB_DBNAME'] ?? "GEARING"; //nome da sua DATABASE

try {
    $conn = new PDO("mysql:host=$host:$port;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Conexão bem-sucedida";
} catch (PDOException $e) {
    //echo "Falha na conexão: " . $e->getMessage();
    exit();
}
