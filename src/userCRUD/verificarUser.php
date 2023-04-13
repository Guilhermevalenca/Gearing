<?php 
    if($_SERVER['REQUEST_METHOD'] != 'POST'){
       exit();
    }
    $fp = fopen('usuarios.csv','r');
    while ( ($linha = fgetcsv($fp)) !== false){
        if ($linha[2] == $_POST['login'] && $linha[3] == $_POST['senha']) {
            session_start();
            $_SESSION['username'] = $linha[0];
            header("location: /src/menu.php");
            exit();
        }
    }
    echo "tudoErrado";
    return;
?>
