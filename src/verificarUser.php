<?php 
    if($_SERVER['REQUEST_METHOD'] != 'POST'){
        exit();
    }
    $fp = fopen('./userCRUD/usuarios.csv','r');
    while ( ($linha = fgetcsv($fp)) !== false){
        if ($linha[2] == $_POST['login'] && $linha[3] == $_POST['senha']) {
            session_start();
            $_SESSION['username'] = $linha[0];
            $_SESSION['nome'] = $linha[1];
            $_SESSION['email'] = $linha[2];
            header("Location: /src/menu.php");
            exit();
        }
    }
?>
<h1>Login ou senha incorreta</h1>
<a href="./userCRUD/login.php">Voltar</a>