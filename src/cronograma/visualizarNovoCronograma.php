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
    <!-- Não sei o objetivo disso por enquanto mas não ta fazendo sentido na tabela 
    <tr>
        <th>Tempo:</th>
     <?php foreach($_POST['tempo'] as $tempo): ?>
            <td><?= $tempo ?></td>
     <?php endforeach ?>
    </tr>
-->
    <tr>
        <th>Materias:</th>
        <?php foreach($_POST['materia'] as $materia): ?>
            <td><?= $materia ?></td>
        <?php endforeach ?>
    </tr>
     <tr>
        <th>Dias:</th>
        <?php foreach($_POST['dias'] as $dias): ?>
            <td><?= $dias ?></td>
        <?php endforeach ?>
    </tr>
</table>
<form action="/php/cronograma/adicionarDadosCronograma.php" method="POST">
    <input type="hidden" name="horario[]" value="<?= $_POST['horario'] ?>">
    <input type="hidden" name="tempo[]" value="<?= $_POST['tempo'] ?>">
    <input type="hidden" name="materia[]" value="<?= $_POST['materia'] ?>">
    <input type="hidden" name="dias[]" value="<?= $_POST['dias'] ?>">
    <input type="submit" value="Salvar Cronograma!!!">
</form>
<button onclick="window.location.href='/src/menu.php'">Voltar para o menu</button>
</body>
</html>