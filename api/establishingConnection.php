<?php
$servername = "localhost:3306";
<<<<<<< Updated upstream
$username = "gearing"; //Nome de usuario do seu mysql
$password = "gearing123"; //senha do usuario do mysql
=======
$username = "root"; //Nome de usuario do seu mysql
$password = "35458453aA@"; //senha do usuario do mysql
>>>>>>> Stashed changes
$dbname = "GEARING"; //nome da sua DATABASE

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Conexão bem-sucedida";
} catch (PDOException $e) {
    //echo "Falha na conexão: " . $e->getMessage();
    exit();
}

