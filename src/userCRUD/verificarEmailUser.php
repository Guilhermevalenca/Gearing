<?php 
    $email = $_GET['email'];
    $user = $_GET['user'];
    $fp = fopen('usuarios.csv','r');
    while( ($linha = fgetcsv($fp)) !== false){
        if($linha[2] == $email || $linha[0] == $user){
            http_response_code(200);
            echo 'jaCadastrado';
            return;
        }
    }
?>