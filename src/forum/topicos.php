<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script defer src="/script/cabecalho.js"></script>
</head>
<body>
<button id="expandir"><i>opções</i></button><br>
    <div id="cabecalho"></div>
<?php 
    $user = $_GET['user'];
    $topico = $_GET['topico'];
?>
<h1>Topico: <?= $topico ?></h1>
<iframe src="./vizualizarInformacaoTopico.php?user=<?= $user ?>" frameborder="0"></iframe>
<form action="/php/forum/adicionarMensagemTopico.php" method="POST">
    <input type="text" placeholder="Escreva sua mensagem" name="mensagem">
    <input type="hidden" name='topico' value="<?= $topico ?>">
    <input type="hidden" name="arquivo" value="<?= $user ?>">
    <input type="submit">
</form>
</body>
</html>