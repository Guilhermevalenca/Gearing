<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Aqui estão suas informações:</h1>
    <table>
    <?php 
        $fp = fopen('usuarios.csv','r');
        while( ($linha = fgetcsv($fp)) !== false ): ?>
        <?php if($linha[0] == $_POST['user']): ?>
            <tr>
                <th>Username:</th>
                <td><?= $linha[0] ?></td>
                <td><form action="./editarDados.php" method="POST">
                    <input type="hidden" name="userAtual">
                    <input type="text" name='userNovo' placeholder="Escreva aqui para editar" required>
                    <button>Editar</button>
                </form></td>
            </tr>
            <tr>
                <th>Seu nome:</th>
                <td><?= $linha[1] ?></td>
                <td><form action="./editarDados.php" method="POST">
                    <input type="hidden" name="nomeAtual">
                    <input type="text" name='nomeNovo' placeholder="Escreva aqui para editar" required>
                    <button>Editar</button>
                </form></td>
            </tr>
            <tr>
                <th>Seu email:</th>
                <td><?= $linha[2] ?></td>
                <td><form action="./editarDados.php" method="POST">
                    <input type="hidden" name="emailAtual">
                    <input type="text" name='emailNovo' placeholder="Escreva aqui para editar" required>
                    <button>Editar</button>
                </form></td>
            </tr>
        <?php endif ?>
        <?php endwhile ?>
    </table>
    <button onclick="window.location.href = '/src/menu.php'">Voltar</button>
</body>
</html>