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
<button id="expandir"><i>opções</i></button><br>
    <div id="cabecalho"></div>
    <br><br><br>
<h1>Seu novo Cronograma já foi criado!</h1>
<h2>Dê uma olhada nele:</h2>

<!-- 
    Gerando tabela da nova criação de cronograma do usuario:
 -->
<table>
    <form action="/php/cronograma/adicionarDadosCronograma.php" method="POST">
          <tr>
        <th>Dias:</th>
        <?php foreach($_GET['dias'] as $dias): ?>
            <input type="hidden" id="dias" name="dias[]" value="<?= $dias ?>">
            <td><?= $dias ?></td>
        <?php endforeach ?>
    </tr>
    <tr>
        <th>Disponibilidade:</th>
        <?php foreach($_GET['disponibilidade'] as $disponibilidade): ?>
            <input type="hidden" id="disponibilidade" name="disponibilidade[]" value="<?= $disponibilidade ?>">
            <td><?= $disponibilidade ?></td>
        <?php endforeach ?>
    </tr>
    <tr>
        <th>Tempo:</th>
     <?php foreach($_GET['tempoMateria'] as $tempoMateria): ?>
        <input type="hidden" id="tempomateria" name="tempoMateria[]" value="<?= $tempoMateria ?>">
            <td><?= $tempoMateria ?></td>
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
        <th>Turnos:</th>
    <?php foreach($_GET['turnos'] as $turno): ?>
        <input type="hidden" name="turnos[]" value="<?= $turno ?>">
        <td><?= $turno ?></td>
    <?php endforeach ?>
    </tr>
    <input type="submit" value="Salvar Cronograma">
    </form>
</table>
</body>
</html>