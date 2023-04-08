<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        session_start();
        $user = $_SESSION['username'];
        $nome = $_SESSION['nome'];
        $email = $_SESSION['email'];
    ?>
    <h1>Seja bem vindo a nossa plataforma: <?= $user ?></h1>
    <button onclick="window.location.href = '/'">Pagina Inicial</button><br>
    <button onclick="window.location.href = './criarCronograma.php'">Crie aqui seu cronograma</button>
    <form action="./usersCronograma.php" method="GET">
        <input type="hidden" name='user' value="<?= $user ?>">
        <button>Ver meus cronogramas</button>
    </form>

</body>
</html>