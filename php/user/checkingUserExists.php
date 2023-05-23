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
        if($_POST['login'] == $linha[2] && $_POST['senha'] == $linha[3]){
            echo "tudoCerto";
            exit();
        }
    }
    echo "tudoErrado";
?>