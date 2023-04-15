<?php
    $fp = fopen('/src/userCRUD/usuarios.csv','r');
    while ( $linha = fgetcsv($fp) !== false){
        if($linha[$_POST['indice']] == $_POST['edicao']){
            echo "Realize o alert";
        }
    }

?>