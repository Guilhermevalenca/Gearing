<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        session_start();
        $user = $_SESSION['username'];
        $nome = $_SESSION['nome'];
        $email = $_SESSION['email'];
    ?>
    <h1>Seja bem vindo a nossa plataforma: <?= $user ?></h1>
    <a href="/">Deseja voltar para o inicio?</a>
    <button onclick="window.location.href = './cronograma.html'">Crie aqui seu cronograma</button>

</body>
</html>