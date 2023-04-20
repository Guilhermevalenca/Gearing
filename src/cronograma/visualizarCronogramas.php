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
<button onclick="window.location.href = '/src/menu.php'">Voltar</button>
<?php
    require('../../php/cronograma/visualizarCronogramas.php');
?>
<h2><?= $user ?>, Aqui estão seus cronogramas:</h2>
<!-- 
    Gerando tabelas dos cronograma do usuario
 -->
<?php for($i = 0; $i < $quantasTable; $i++ ): ?>
<table>
    <tr>
        <?php
        $fp = fopen('cronograma.csv','r'); 
        while( ($linha = fgetcsv($fp)) !== false ): ?>
            <?php if($linha[0] == $user && $linha[1] == $id && $linha[2] == "dias"): ?>
                <?php for($j = 3; $j < sizeof($linha); $j++): ?>
                    <th><td><?= $linha[$j] ?></td></th>
                <?php endfor ?>
            <?php endif ?>
        <?php endwhile ?>
    </tr>
    <tr>
        <th>Horario:</th>
        <?php
        $fp = fopen('cronograma.csv','r'); 
        while( ($linha = fgetcsv($fp)) !== false ): ?>
            <?php if($linha[0] == $user && $linha[1] == $id && $linha[2] == "horario"): ?>
                <?php for($j = 3; $j < sizeof($linha); $j++): ?>
                    <td><?= $linha[$j] ?></td>
                <?php endfor ?>
            <?php endif ?>
        <?php endwhile ?>
    </tr>
    <tr>
        <th>tempo:</th>
        <?php
        $fp = fopen('cronograma.csv','r');
        while( ($linha = fgetcsv($fp)) !== false ): ?>
            <?php if($linha[0] == $user && $linha[1] == $id && $linha[2] == "tempomateria"): ?>
                <?php for($j = 3; $j < sizeof($linha); $j++): ?>
                    <td><?= $linha[$j] ?></td>
                <?php endfor ?>
            <?php endif ?>
        <?php endwhile ?>
    </tr>
    <tr>
        <th>Materias:</th>
        <?php 
        $fp = fopen('cronograma.csv','r');
        while( ($linha = fgetcsv($fp)) !== false ): ?>
            <?php if($linha[0] == $user && $linha[1] == $id && $linha[2] == "materia"): ?>
                <?php for($j = 3; $j < sizeof($linha); $j++): ?>
                    <td><?= $linha[$j] ?></td>
                <?php endfor ?>
            <?php endif ?>
        <?php endwhile ?> 
    </tr>
    <tr>
        <td>
            <form action="/php/cronograma/deletarCronograma.php" method="GET">
                <input type="hidden" name="user" value="<?= $user ?>">
                <input type="hidden" name="id" value="<?= $id ?>">
                <input type="submit" value="Deletar este Cronograma">
            </form>
        </td>
    </tr>
</table>
<?php $id++; endfor ?>
</body>
</html>