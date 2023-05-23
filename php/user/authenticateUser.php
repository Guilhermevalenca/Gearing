<?php 
    if($_SERVER['REQUEST_METHOD'] != 'POST'){
        exit();
    }
    if(!isset($_POST['login']) || !isset($_POST['senha'])){
        exit();
    }
    require('../dataSource.php');
    $fp = fopen(usuarios,'r');
    while( ($linha = fgetcsv($fp)) !== false ){
        if($linha[2] == $_POST['login']){
            session_start();
            $_SESSION['username'] = $linha[0];
            header('location: /src/menu.php');
        }
    }
?>
