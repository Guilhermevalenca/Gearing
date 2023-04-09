<?php 
    session_start();
    if($_SESSION['username'] != ''){
    header('location: /src/menu.php');
    exit();
} ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gearing</title>
    <link rel="stylesheet" href="/css/index.css">
</head>
<body>
    <img src="./css/archive/logo.gif" class="logo">
    <h1 class="titulo">Gearing</h1>
    <div class="apresentacao">
        <ul>Bem-vindos ao Gearing!</ul>
        <ul class="descricao">Olá, sou o Gearing! Estou aqui para te ajudar a encontrar um método de estudo que mais se aplique a você; vou te apresentar algumas formas de começar e/ou complementar seus estudos, sinta-se a vontade para compartilhar as sugestões de metodologias de aprendizagem que você conhece em nosso fórum, e assim, ajudar outros estudantes a montar seu próprio cronograma de estudos.
        </ul>
    
    </div>
        <button class="criarRealizarLogin" onclick="window.location.href = './src/userCRUD/login.php' ">Login</button>
        <button id="criarConta" class="criarRealizarLogin" onclick="window.location.href = './src/userCRUD/criandoNovoUser.html' ">Criar Conta</button>
</body>
</html>
