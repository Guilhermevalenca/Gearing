<?php
    $fp = fopen('../../src/userCRUD/usuarios.csv','r');
    $indice = $_POST['indice'];
    while ( $linha = fgetcsv($fp) !== false){
        if($linha[$indice] == $_POST['edicao']){
            echo "Realize o alert";
            return;
        }
    }
?>