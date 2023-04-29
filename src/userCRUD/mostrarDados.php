<?php 
    require('../verificacaoExistSession.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script defer src="/script/cabecalho.js"></script>
</head>
<body>
    <div id="cabecalho"></div><br>
<?php 
    $user = $_SESSION['username'];
?>
    <h1>Aqui estão suas informações:</h1>
    <table>
    <?php
        $fp = fopen('usuarios.csv','r');
        while( ($linha = fgetcsv($fp)) !== false ): ?>
        <?php if($linha[0] == $user): ?>
            <tr>
                <th>Username:</th>
                <td><?= $linha[0] ?></td>
                <td>
                    <form id="formularioUser" action="/php/userCRUD/editarDadosUser.php" method="POST">
                    <input id="editarUser" type="text" name='userNovo' placeholder="Escreva aqui para editar" required>
                    <input type="submit" value="editar">
                </form>
            </td>
            </tr>
            <tr>
                <th>Seu nome:</th>
                <td><?= $linha[1] ?></td>
                <td>
                    <form action="/php/userCRUD/editarDadosUser.php" method="POST">
                    <input type="hidden" name="nomeAtual" value="<?= $linha[1] ?>">
                    <input type="text" name='nomeNovo' placeholder="Escreva aqui para editar" required>
                    <input type="submit" value="editar">
                </form>
                </td>
            </tr>
            <tr>
                <th>Seu email:</th>
                <td><?= $linha[2] ?></td>
                <td>
                    <form id="formularioEmail" action="/php/userCRUD/editarDadosUser.php" method="POST">
                    <input type="hidden" name="emailAtual" value="<?= $linha[2] ?>">
                    <input id="editarEmail" type="email" name='emailNovo' placeholder="Escreva aqui para editar" required>
                    <input type="submit" value="editar">
                </form>
                </td>
            </tr>
        <?php endif ?>
        <?php endwhile ?>
    </table>
    <script defer src="/script/userCRUD/mostrarDados.js"></script>
    <h2>Deseja apaga sua conta? 
        <button id="buttonApagaConta" onclick="window.location.href='/php/userCRUD/deletarUser.php?user=<?= $user ?>'">Apagar sua conta</button>
    </h2>
</body>
</html>
