<?php
$user = $_SESSION['username'];
    $quantasTable = 0;
    $id = 1;
    $fp = fopen('cronograma.csv','r');
    while( ($linha = fgetcsv($fp)) !== false){
        if($linha[0] == $user && $linha[1] == $id){
            $quantasTable++;
            $id++;
        }
    }
    fclose($fp);
    $id = 1;
?>