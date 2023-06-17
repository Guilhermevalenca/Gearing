<?php
$servername = "localhost:3307";
$username = "gearing"; //Nome de usuario do seu mysql
$password = "gearing123"; //senha do usuario do mysql
$dbname = "GEARING"; //nome da sua DATABASE

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Conexão bem-sucedida";
} catch (PDOException $e) {
    //echo "Falha na conexão: " . $e->getMessage();
    exit();
}

function imprimir($element){

    ob_start();
    print_r($element);
    $output = ob_get_clean();
    error_log($output);

}
