<?php 
    include '../verificacaoExistSession.php';
?>
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
                    <form id="formulario" action="/php/userCRUD/editarDadosUser.php" method="POST">
                    <input id="editar" type="text" name='userNovo' placeholder="Escreva aqui para editar" required>
                    <input type="submit" value="editar">
                </form>
            </td>
            </tr>
            <tr>
                <th>Seu nome:</th>
                <td><?= $linha[1] ?></td>
                <td>
                    <form id="formulario" action="/php/userCRUD/editarDadosUser.php" method="POST">
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
                    <form id="formulario" action="/php/userCRUD/editarDadosUser.php" method="POST">
                    <input type="hidden" name="emailAtual" value="<?= $linha[2] ?>">
                    <input id="editar" type="email" name='emailNovo' placeholder="Escreva aqui para editar" required>
                    <input type="submit" value="editar">
                </form>
                </td>
            </tr>
        <?php endif ?>
        <?php endwhile ?>
    </table>
    <script defer src="/script/userCRUD/mostrarDados.js"></script>
    <button onclick="window.location.href = '/src/menu.php'">Voltar</button>
    <h2>Deseja apaga sua conta? 
        <button id="buttonApagaConta" value="<?= $_SESSION['username'] ?>" onclick="apagarConta()">Sair da conta</button>
    </h2>
    <script>
        function apagarConta(){
            const button = document.getElementById("buttonApagaConta");
            button.addEventListener('click', (event) => {
                const apagar = new XMLHttpRequest();
                apagar.onreadystatechange = () => {
                    if(this.readyState === 4 && this.status === 200){
                        if(this.responseText == "usuario apagado"){
                            alert("Sua conta foi apaga, com sucesso!");
                            window.location.href = "/";    
                        }
                    }
                }
                const dados = new FormData;
                dados.append("user",button.value);
                apagar.open("POST","/php/userCRUD/deletarUser.php",true);
                apagar.send(dados);
            });
        }
    </script>
</body>
</html>
