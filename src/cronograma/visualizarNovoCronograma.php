<?php 
    include '../verificacaoExistSession.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/cronograma.css">
</head>
<body>
<?php
    include '../../php/cronograma/adicionarDadosCronograma.php';
?>
<h1>Seu novo Cronograma ja foi criado!</h1>
<h2>De uma olhada nele:</h2>
<!-- 
    Gerando tabela da nova criação de cronograma do usuario:
 -->
<table>
    <tr>
        <th>Horarios:</th>
        <?php foreach($_POST['horario'] as $horario): ?>
            <td><?= $horario ?></td>
        <?php endforeach ?>
    </tr>
    <tr>
        <th>Tempo:</th>
        <?php foreach($_POST['tempo'] as $tempo): ?>
            <td><?= $tempo ?></td>
        <?php endforeach ?>
    </tr>
    <tr>
        <th>Materias:</th>
        <?php foreach($_POST['materia'] as $materia): ?>
            <td><?= $materia ?></td>
        <?php endforeach ?>
    </tr>
</table>
<button onclick="window.location.href='/src/menu.php'">Voltar para o menu</button>
</body>
</html>