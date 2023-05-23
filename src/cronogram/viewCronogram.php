<?php 
    require("../verifyUserAuthentication.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/cronogram.css">
    <script defer src="/script/header.js"></script>
</head>
<body>
<div id="cabecalho"></div><br><br><br>
<?php
    require('../../php/cronogram/viewCronogram.php');
?>
<h2><?= $user ?>, Aqui estar seu cronograma:</h2>
<!-- 
    Gerando tabelas dos cronograma do usuario
 -->
 <?php for($i = 0; $i < $id; $i++): ?>
    <button class="mostrarCronograma">Cronograma <?= $i + 1 ?></button>
<?php endfor ?>
<div class="cronograma"></div>
<script>
    const buttons = document.querySelectorAll('.mostrarCronograma');
    buttons.forEach( (button,indice) => {
        button.addEventListener('click', () => {
            fetch(`./settingUpCronogram.php?id=${indice}`)
            .then(response => response.text())
            .then(data => {
                document.querySelector('.cronograma').innerHTML = data;
            })
        })
    })
</script>
</body>
</html>