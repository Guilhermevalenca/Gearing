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

</head>
<body>
    <!-- 
        iframe utilizado para a modelagem do forum e atualização de mensagens
    -->
    <iframe src="./mensagensForum.php" width="700vw" height="500vw"></iframe>
    <!-- 
        Formulario para enviar mensagens para o forum
    -->
    <form action="/php/forum/adicionarDadosForum.php" method="GET">
        <input class="escreverMensagem" type="text" name="mensagem" placeholder="Digite aqui sua mensagem" required>
        <input type="hidden" name="user" value="<?= $_SESSION['username'] ?>">
        <button>Enviar</button>
    </form>
    <h2>As mensagens são atualizadas a cada 5 segundos</h2>
    <button onclick="window.location.href='/src/menu.php'">Voltar</button>

    <!--
    Listando Usuários na pagina do fórum (não funcional);
     -->

    <table>
        <h1>Usuários</h1><br>
    <?php $mostrarusers = fopen('../userCRUD/usuarios.csv','r');?>
    <?php while (($linha = fgetcsv($mostrarusers)) !== false): ?>
        <tr>
            <td><?= $linha[0] ?></td>
        </tr>
    <?php endwhile?>
    </table>
</body>
</html>