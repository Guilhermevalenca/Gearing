<?php 
    require("../dataSource.php");
    session_start();
    session_destroy();
    $user = $_GET['user'];
    $fp = fopen(users,'r');
    $backup = fopen("backup.csv",'w');
    while( ($linha = fgetcsv($fp)) !== false){
                if($linha[0] != $user){
                    fputcsv($backup,$linha);
                }
    }
    fclose($fp);
    fclose($backup);
    rename("backup.csv",users);
    header('location: /');
?>