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
<button onclick="window.location.href='/src/menu.php'">Voltar para o menu</button>
<h1>Seu novo Cronograma ja foi criado!</h1>
<h2>De uma olhada nele:</h2>
<!-- 
    Gerando tabela da nova criação de cronograma do usuario:
 -->
<table>
    <form action="/php/cronograma/adicionarDadosCronograma.php" method="POST">
    <tr>
        <th>Horarios:</th>
        <?php foreach($_GET['horario'] as $horario): ?>
            <input type="hidden" id="horario" name="horario[]" value="<?= $horario ?>">
            <td><?= $horario ?></td>
        <?php endforeach ?>
    </tr>
    <tr>
        <th>Tempo:</th>
     <?php foreach($_GET['tempomateria'] as $tempomateria): ?>
        <input type="hidden" id="tempomateria" name="tempomateria[]" value="<?= $tempomateria ?>">
            <td><?= $tempomateria ?></td>
     <?php endforeach ?>
    </tr>
    <tr>
        <th>Materias:</th>
        <?php foreach($_GET['materia'] as $materia): ?>
            <input type="hidden" id="materia" name="materia[]" value="<?= $materia ?>">
            <td><?= $materia ?></td>
        <?php endforeach ?>
    </tr>   
     <tr>
        <th>Dias:</th>
        <?php foreach($_GET['dias'] as $dias): ?>
            <input type="hidden" id="dias" name="dias[]" value="<?= $dias ?>">
            <td><?= $dias ?></td>
        <?php endforeach ?>
    </tr>
    <input type="submit" value="Salvar Cronogramas">
    </form>
</table>
</body>
</html>