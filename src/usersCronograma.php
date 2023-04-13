<?php 
    include 'verificacaoExistUser.php';
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
    session_start();
    $user = $_SESSION['username'];
    $id = 1;
?>
<h2><?= $user ?>, Aqui estar seus cronogramas:</h2>
<!-- 
    Gerando tabelas dos cronograma do usuario
 -->
<?php $lendoArquivo = fopen("./userCRUD/dadosUsers.csv",'r') ?>
<?php while( ($table = fgetcsv($lendoArquivo)) !== false ): ?>
<table>
    <tr>
        <th>Horario:</th>
        <?php
        $fp = fopen('./userCRUD/dadosUsers.csv','r'); 
        while( ($linha = fgetcsv($fp)) !== false ): ?>
            <?php if($linha[0] == $user && $linha[1] == $id && $linha[2] == "horario"): ?>
                <?php for($j = 3; $j < sizeof($linha); $j++): ?>
                    <td><?= $linha[$j] ?></td>
                <?php endfor ?>
            <?php endif ?>
        <?php endwhile ?>
    </tr>
    <tr>
        <th>Materias:</th>
        <?php 
        $fp = fopen('./userCRUD/dadosUsers.csv','r');
        while( ($linha = fgetcsv($fp)) !== false ): ?>
            <?php if($linha[0] == $user && $linha[1] == $id && $linha[2] == "materia"): ?>
                <?php for($j = 3; $j < sizeof($linha); $j++): ?>
                    <td><?= $linha[$j] ?></td>
                <?php endfor ?>
            <?php endif ?>
        <?php endwhile ?> 
    </tr>
</table>
<?php $id++; endwhile; fclose($lendoArquivo); ?>
<button onclick="window.location.href = './menu.php'">Voltar</button>
</body>
</html>