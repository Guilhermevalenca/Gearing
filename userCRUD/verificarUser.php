<?php 
    if($_SERVER['REQUEST_METHOD'] != 'POST'){
        exit();
    }
    $fp = fopen('usuarios.csv','r');
    while ( ($linha = fgetcsv($fp)) !== false){
        if ($linha[2] == $_POST['login'] && $linha[3] == $_POST['senha']) {
            setcookie("user",$linha[0]);
            header("location: /src/menu.php");
            exit();
        }
    }
?>
<h1>Login ou senha incorreta</h1>
<a href="./login.html">Voltar</a>