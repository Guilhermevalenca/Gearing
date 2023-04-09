<?php 
    include '/src/verificacaoExistUser.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $_SESSION['username'] ?></title>
    <link rel="stylesheet" href="/css/forum.css">
</head>
<body>
    <?php session_start(); ?>
    <iframe src="./mensagensForum.php" width="700vw" height="500vw"></iframe>
    <form action="./adicionar.php" method="GET">
        <input class="escreverMensagem" type="text" name="mensagem" placeholder="Digite aqui sua mensagem" required>
        <input type="hidden" name="user" value="<?= $_SESSION['username'] ?>">
        <button>Enviar</button>
    </form>
    <h2>As mensagens são atualizadas a cada 5 segundos</h2>
    <button onclick="window.location.href='/src/menu.php'">Voltar</button>
</body>
</html>