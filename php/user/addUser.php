<?php 
    if($_SERVER['REQUEST_METHOD'] != 'POST'){
        exit();
    }
    require("../dataSource.php");
    $fp = fopen(usuarios,'a');
    fputcsv($fp,array($_POST['user'],$_POST['nome'],$_POST['email'],$_POST['senha']));
    fclose($fp);
    session_start();
    $_SESSION['username'] = $_POST['user'];
    $_SESSION['executeOne'] = true;
    header('location: /src/menu.php');
?>