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
    <button onclick = "window.location.href='/src/menu.php' ">Voltar</button><br>
    <!-- funcionalidades:
        criar topicos:
    -->
    <h2>Crie seu proprio topico:</h2>
    <form id="form" action="/php/forum/addNovoTopico.php" method="POST">
        <input type="text" placeholder="Qual assunto você deseja aborda?" name="topico">
        <input type="submit">
    </form>
    <script defer src="/script/forum/verificacaoUserCreateTopico.js"></script>
    <h2>Aqui estão os topicos criados por outros usuarios:</h2>
    <?php 
        $fp = fopen("topicos.csv",'r');
        while( ($linha = fgetcsv($fp)) !== false):
    ?>
    <h4>Topico criado por <?= $linha[0] ?>:</h4>
    <button onclick = "window.location.href = './topicos.php?user=<?= $linha[0] ?>&topico=<?= $linha[1] ?>' "><?= $linha[1] ?></button>
    <?php endwhile; fclose($fp); ?>
    <h2>Veja aqui topicos gerenciados pelos criadores/administradores:</h2>
    <button onclick= "window.location.href = '../userCRUD/listarUsuarios.php' ">Listar usuarios</button>
</body>
</html>