<?php 
    session_start();
    session_destroy();
    $user = $_POST['user'];
    $fp = fopen("../../src/userCRUD/usuarios.csv",'r');
    $backup = fopen("backup.csv",'w');
    while( ($linha = fgetcsv($fp)) !== false){
                if($linha[0] != $user){
                    fputcsv($backup,$linha);
                }else{
                    echo "usuario apagado";
                }
    }
    fclose($fp);
    fclose($backup);
    rename("backup.csv",'../../src/userCRUD/usuarios.csv');
?>