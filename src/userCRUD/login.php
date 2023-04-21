<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gearing</title>
    <link rel="stylesheet" href="/css/login.css">
</head>

<body>
    
    <section class="sessao_principal">
        <img class="logo_sessao_principal" src="/logos/eng.gif">
        <div class="formulario_sessao_principal">
            <form id="form" method="POST" action="/php/userCRUD/verificarExistenciaUser.php">
                <input id="login" type="email" name="login" placeholder="Digite seu email" required><br>
                <input id="senha" type="password" name="senha" placeholder="Digite sua senha" required><br>
                <button type="submit">Entrar</button>
                <button onclick="window.location.href = '/' ">Voltar</button>
            </form>
        </div>
    </section>
    <script defer src="/script/userCRUD/login.js"></script>

</body>

</html>