<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel= "stylesheet" type="text/css" href= "../css/login.css/" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form id="form" method="POST" action="/php/userCRUD/verificarExistenciaUser.php">
        <input id="login" type="text" name="login" placeholder="Digite seu email" required><br>
        <input id="senha" type="password" name="senha" placeholder="Digite sua senha" required><br>
        <input type="submit">
    </form>
    <script defer src="/script/userCRUD/login.js"></script>
    <button onclick="window.location.href = '/' ">Tela de inicio</button>
</body>
</html>
