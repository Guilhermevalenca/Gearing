<?php 
    require( '../verificacaoExistSession.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/cronograma.css">
    <script defer src="/script/cabecalho.js"></script>
</head>
<body>
<div id="expandir"></div>
<div id="cabecalho"></div><br><br><br>
<?php
    require('../../php/cronograma/visualizarCronogramas.php');
?>
<h2><?= $user ?>, Aqui estão seus cronogramas:</h2>
<!-- 
    Gerando tabelas dos cronograma do usuario
 -->
<?php for($i = 0; $i < $id; $i++): ?>
    <button onclick="window.location.href='./montandoCronograma.php?id=<?= $i ?>'">Cronograma <?= $i + 1 ?></button>
<?php endfor ?>
</body>
</html>