<?php 
    require("./verifyUserAuthentication.php");
    if($_SESSION['executeOne']){
        require("./session/session.php");
        $_SESSION['executeOne'] = false;
    }
    
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/menu.css">
    <link rel="stylesheet" href="/css/global.css">
</head>
<body>
    <?php
        $user = $_SESSION['username'];
    ?>
    <h1 class="Titulo">Seja bem vindo a nossa plataforma <?= $user ?>!</h1>
    <section class="sessao_principal">
    <div class="botao_sessao_principal">
        <button onclick="window.location.href = '/src/metodologias/metodologias.php' ">Questionário de Metodologias</button>
        <br>
        <button onclick="window.location.href = '/src/cronograma/criarCronograma.php'">Crie aqui seu cronograma</button>
        <br>
        <button onclick="window.location.href = '/src/cronograma/visualizarCronogramas.php' " >Ver meus cronogramas</button>
        <br>
        <button onclick="window.location.href = '/src/user/showData.php' ">Informações da conta</button>
        <br>
        <button onclick="window.location.href = '/src/forum/paginaPrincipal.php' ">Acesse o forum</button>
        <br>
        <button onclick="window.location.href = '/src/toGoOut.php' ">Sair da conta</button>
    </section>
    <h1 class="listaUsuarios">Usuarios logados rescentemente:</h1>
    <table class="listaUsuarios">
    <?php 
        $fp = fopen('./session/session.csv','r');
        while( ($linha = fgetcsv($fp)) !== false):
    ?>
    <tr>
        <th>Username:</th>
        <th>Data:</th>
        <th>Hora:</th>
    </tr>
    <tr>
        <td><?= $linha[0] ?></td>
        <td><?= $linha[1] ?></td>
        <td><?= $linha[2] ?></td>
    </tr>
    <?php endwhile ?>
    </table>
</body>
</html>