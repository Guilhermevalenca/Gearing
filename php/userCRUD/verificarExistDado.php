<?php
    require("../dataSource.php");
    $indice = $_POST['indice'];
    $edicao = $_POST['edicao'];
    $fp = fopen(usuarios,'r');
    while ( ($linha = fgetcsv($fp)) !== false){
        if($linha[$indice] == $edicao){
            echo "naoProssiga";
            return;
        }
    }
    fclose($fp);
?>