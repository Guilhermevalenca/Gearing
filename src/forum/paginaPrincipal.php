<?php
require('../verificacaoExistSession.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $_SESSION['username'] ?></title>
    <link rel="stylesheet" href="/css/forum.css">
    <script defer src="/script/cabecalho.js"></script>
</head>

<body>
    <section class="conteudo-principal">
        <div id="cabecalho"></div><br><br><br>
        <!-- funcionalidades:
        criar topicos:
    -->
        <h2 class="topico-titutlo">Crie seu proprio topico:</h2>
        <form id="form" action="/php/forum/addNovoTopico.php" method="POST">
            <input type="text" placeholder="Qual assunto você deseja aborda?" name="topico">
            <input type="submit">
        </form>
        <script defer src="/script/forum/verificacaoUserCreateTopico.js"></script>
        <table>
            <?php if (file_exists("./vizualizarTopicos/" . $_SESSION['username'] . ".csv")) : ?>
                <?php $fp = fopen("topicos.csv", 'r') ?>
                <tr>
                    <th>Seu topico:</th>
                    <?php while (($linha = fgetcsv($fp)) !== false) : ?>
                        <?php if ($linha[0] == $_SESSION['username']) : ?>
                            <td><button onclick="window.location.href='./topicos.php?user=<?= $linha[0] ?>&topico=<?= $linha[1] ?>' "><?= $linha[1] ?></button></td>
                        <?php endif ?>
                    <?php endwhile ?>
                    <td>
                        <button onclick="window.location.href='/php/forum/apagarTopico.php' ">Deletar Topico</button>
                    </td>
                </tr>
            <?php endif ?>
        </table>
        <h1>Aqui estão os topicos criados por outros usuarios:</h1>
        <table>
            <?php
            $fp = fopen("topicos.csv", 'r');
            while (($linha = fgetcsv($fp)) !== false) :
            ?>
                <?php if ($linha[0] != $_SESSION['username']) : ?>
                    <tr>
                        <th>Topico criado por <?= $linha[0] ?>:</th>
                        <td>
                            <button class="topico-botao" onclick="window.location.href = './topicos.php?user=<?= $linha[0] ?>&topico=<?= $linha[1] ?>' "><?= $linha[1] ?></button>
                        </td>
                    </tr>
                <?php endif ?>
            <?php endwhile;
            fclose($fp); ?>

        </table>
        <h2>Veja aqui topicos gerenciados pelos criadores/administradores:</h2>
        <button onclick="window.location.href = '../userCRUD/listarUsuarios.php' ">Listar usuarios</button>
        <button id="voltar" onclick="window.location.href = '/src/menu.php' ">Voltar</button>
    </section>
</body>

</html>