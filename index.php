<?php 
    session_start();
    if(isset($_SESSION['username'])){
        header('location: ./src/menu.php');
        exit();
    }else{
        session_destroy();
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gearing</title>
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/global.css">
</head>
<body>
<img src="./logos/gearingLogo.gif" class="logo">
<h1 class="titulo">Gearing</h1>
<div class="apresentacao">
    <ul>Bem Vindos!</ul>
    <ul class="descricao">Olá, sou o Gearing! Estou aqui para te ajudar a encontrar um método de estudo que mais se aplique a você; vou te apresentar algumas formas de começar e/ou complementar seus estudos, sinta-se a vontade para compartilhar as sugestões de metodologias de aprendizagem que você conhece em nosso fórum, e assim, ajudar outros estudantes a montar seu próprio cronograma de estudos.
    </ul>

</div>
<div class="relacaoCRUD">
    <button class="criarRealizarLogin" onclick="window.location.href = './src/user/login.php' ">Login</button>
    <button class="criarRealizarLogin" onclick="window.location.href = './src/user/createUser.php' ">Criar Conta</button>
</div> 
</body>
</html>