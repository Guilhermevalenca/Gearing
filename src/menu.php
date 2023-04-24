<?php 
    require("./verificacaoExistSession.php");
?>
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
        $user = $_SESSION['username'];
    ?>
    <h1>Seja bem vindo a nossa plataforma <?= $user ?> !</h1>
    <button onclick="window.location.href = './metodologias/metodologias.php' ">Questionário de Metodologias</button>
    <br>
    <button onclick="window.location.href = './cronograma/criarCronograma.php'">Crie aqui seu cronograma</button>
    <br>
    <button onclick="window.location.href = './cronograma/visualizarCronogramas.php' " >Ver meus cronogramas</button>
    <br>
    <button onclick="window.location.href = './userCRUD/mostrarDados.php' ">Informações da conta</button>
    <br>
    <button onclick="window.location.href = './forum/paginaPrincipal.php' ">Acesse o forum</button>
    <br>
    <form action="./sair.php">
        <input type="submit" value="Sair da conta">
    </form>
</body>
</html>