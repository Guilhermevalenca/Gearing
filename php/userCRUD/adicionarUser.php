<?php 
    if($_SERVER['REQUEST_METHOD'] != 'POST'){
        exit();
    }
    require("../dataSource.php");
    $nome = $_POST['nome'] . " " . $_POST['sobrenome'];
    $fp = fopen(usuarios,'a');
    fputcsv($fp,array($_POST['user'],$nome,$_POST['email'],$_POST['senha']));
    fclose($fp);
    session_start();
    $_SESSION['username'] = $_POST['user'];
    header('location: /src/menu.php');
?>