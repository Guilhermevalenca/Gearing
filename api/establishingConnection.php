<?php
$servername = "localhost:3306";
$username = "assiria"; //Nome de usuario do seu mysql
$password = "assiria"; //senha do usuario do mysql
$dbname = "GEARING"; //nome da sua DATABASE

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Conexão bem-sucedida";
} catch (PDOException $e) {
    //echo "Falha na conexão: " . $e->getMessage();
    exit();
