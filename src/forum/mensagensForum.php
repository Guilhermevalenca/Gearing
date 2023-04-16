<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<script defer src="/script/forum/mensagensForum.js"></script>
<body>
<?php 
    $fp = fopen("chatForum.csv",'r'); ?>
<table>
<?php while( ($linha = fgetcsv($fp)) !== false ): ?>
    <tr>
        <th><?= $linha[0] ?>:</th>
        <td><?= $linha[1] ?></td>
    </tr>
<?php endwhile ?>
</table>  
<table>
    <?php $mostrarusers = fopen('/userCRUD/usuarios.csv','r');?>
    <?php while (($linha = fgetcsv($mostrarusers)) !== false): ?>
        <tr>
            <th><?= $linha[0] ?></th>
        </tr>
    <?php endwhile?>
    </table>  
</body>
</html>