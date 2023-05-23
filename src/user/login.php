<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gearing</title>
    <link rel="stylesheet" href="/css/login.css">
    <link rel="stylesheet" href="/css/global.css">
</head>

<body>

    <section class="sessao_principal">
        <div class="formulario_sessao_principal">
            <form id="form" method="POST" action="/php/user/authenticateUser.php">
                <label>
                    E-mail: <br>
                    <input id="login" type="email" name="login" placeholder="Digite seu email" required>
                </label><br>
                <label>
                    Senha: <br>
                    <input id="senha" type="password" name="senha" placeholder="Digite sua senha" required>
                </label><br>
                <button type="submit">Entrar</button>
                <button id="voltar" onclick="window.location.href = '/' ">Voltar</button>
            </form>
        </div>
    </section>
    <script defer src="/script/user/login.js"></script>

</body>

</html>