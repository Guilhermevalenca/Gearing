<?php 
    require('../dataSource.php');
    $editar = $_POST['edicao'];
    $indice = $_POST['indice'];
    $fp = fopen(users,'r');
    while( ($linha = fgetcsv($fp)) !== false){
        if($linha[$indice] == $editar){
            echo "naoProssiga";
            exit();
        }
    }
    echo "prossiga";
?>