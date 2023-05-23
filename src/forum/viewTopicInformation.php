<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/inframe.css">
    <title>Document</title>

</head>

<body>
    <table>
        <?php
        $caminhoDoArquivo = "./viewTopic/" . $_GET['user'] . ".csv";
        $fp = fopen($caminhoDoArquivo, 'r');
        while (($linha = fgetcsv($fp)) !== false) :
        ?>
            <tr>
                <th class="userName"><?= $linha[0] ?>:</th>
                <td class="message"><?= $linha[1] ?></td>
            </tr>
        <?php endwhile ?>
    </table>
</body>

</html>