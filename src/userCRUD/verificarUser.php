<?php 
    if($_SERVER['REQUEST_METHOD'] != 'POST'){
        exit();
    }
    $fp = fopen('usuarios.csv','r');
    while ( ($linha = fgetcsv($fp)) !== false){
        if ($linha[2] == $_POST['login'] && $linha[3] == $_POST['senha']) {
            session_start();
            $_SESSION['username'] = $linha[0];
            header("Location: /src/menu.php");
            exit();
        }
    }
?>
<h1>Login ou senha incorreta</h1>
<a href="./login.php">Voltar</a>