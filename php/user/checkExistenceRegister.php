<?php
    if($_SERVER['REQUEST_METHOD'] != 'POST'){
        exit();
    }
    require("../dataSource.php");
    $email = $_POST['email'];
    $user = $_POST['user'];
    $fp = fopen(usuarios,'r');
    while( ($linha = fgetcsv($fp)) !== false){
        if($linha[2] == $email || $linha[0] == $user){
            echo 'jaCadastrado';
            exit();
        }
    }
?>