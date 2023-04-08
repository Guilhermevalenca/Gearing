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
    $quantidadeTable = 0;
    $fp = fopen('dadosUsers.csv','r');
    while( ($linha = fgetcsv($fp)) !== false ){
        if($quantidadeTable < $linha[1] && $linha[0] == $_GET['user']){
            $quantidadeTable++;
        }
    }
    fclose($fp);
    $id = 1;
?>
<h2><?= $_GET['user'] ?>, Aqui estar seus cronogramas:</h2>
<?php for($i = 0; $i < $quantidadeTable; $i++): ?>
<table>
    <tr>
        <th>Horario:</th>
        <?php
        $fp = fopen('dadosUsers.csv','r'); 
        while( ($linha = fgetcsv($fp)) !== false ): ?>
            <?php if($linha[0] == $_GET['user'] && $linha[1] == $id && $linha[2] == "horario"): ?>
                <?php for($j = 3; $j < sizeof($linha); $j++): ?>
                    <td><?= $linha[$j] ?></td>
                <?php endfor ?>
            <?php endif ?>
        <?php endwhile ?>
    </tr>
    <tr>
        <th>Materias:</th>
        <?php 
        $fp = fopen('dadosUsers.csv','r');
        while( ($linha = fgetcsv($fp)) !== false ): ?>
            <?php if($linha[0] == $_GET['user'] && $linha[1] == $id && $linha[2] == "materia"): ?>
                <?php for($j = 3; $j < sizeof($linha); $j++): ?>
                    <td><?= $linha[$j] ?></td>
                <?php endfor ?>
            <?php endif ?>
        <?php endwhile ?> 
    </tr>
</table>
<?php $id++; endfor ?>
<button onclick="window.location.href = './menu.php'">Voltar</button>
</body>
</html>