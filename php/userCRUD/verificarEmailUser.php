<?php 
    $email = $_POST['email'];
    $user = $_POST['user'];
    $fp = fopen('../../src/userCRUD/usuarios.csv','r');
    while( ($linha = fgetcsv($fp)) !== false){
        if($linha[2] == $email || $linha[0] == $user){
            echo 'jaCadastrado';
            return;
        }
    }
?>