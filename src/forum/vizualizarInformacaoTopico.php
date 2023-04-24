<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
    <?php 
        $caminhoDoArquivo = "./vizualizarTopicos/" . $_GET['user'] . ".csv";
        $fp = fopen($caminhoDoArquivo,'r');
        while( ($linha = fgetcsv($fp)) !== false):
    ?>
    <tr>
        <th><?= $linha[0] ?>:</th>
        <td><?= $linha[1] ?></td>
    </tr>
    <?php endwhile ?>
    </table>
</body>
</html>