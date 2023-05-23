<?php
    $user = $_SESSION['username'];
    $id = 0;
    $fp = fopen('cronogram.csv','r');
    while( ($linha = fgetcsv($fp)) !== false){
        if($linha[0] == $user && $linha[1] == $id){
            $id++;
        }
    }
    fclose($fp);
?>