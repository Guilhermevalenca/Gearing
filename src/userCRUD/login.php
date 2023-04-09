<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form id="form" method="POST" action="./verificarUser.php">
        <input id="login" type="text" name="login" placeholder="Digite seu email" required><br>
        <input id="senha" type="password" name="senha" placeholder="Digite sua senha" required><br>
        <input type="submit">
    </form>
    <script>
        const form = document.getElementById('form');
        const login = document.getElementById('login');
        const senha = document.getElementById('senha');

        form.addEventListener('submit', (event) => {
            event.preventDefault();
            const teste = new XMLHttpRequest();
            teste.onreadystatechange = function () {
                if(this.readyState === 4 && this.status === 200){
                    if(this.responseText == 'tudoErrado'){
                        alert('você errou sua senha ou seu email!');
                    }else{
                        form.submit();
                    }
                }
            }
            const dados = new FormData();
            dados.append('login',login.value);
            dados.append('senha',senha.value);
            teste.open('POST','./verificarUser.php',true);
            teste.send(dados);
        });
    </script>
    <button onclick="window.location.href = '/' ">Tela de inicio</button>
</body>
</html>
