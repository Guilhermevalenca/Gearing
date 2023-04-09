<?php 
    include '/src/verificacaoExistUser.php';
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
<?php session_start();?>
    <h1>Aqui estão suas informações:</h1>
    <table>
    <?php
        if(isset($_SESSION["user"])){
            $user = $_SESSION['user'];
        } 
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $user = $_POST['user'];
        }
        $fp = fopen('usuarios.csv','r');
        while( ($linha = fgetcsv($fp)) !== false ): ?>
        <?php if($linha[0] == $user): ?>
            <tr>
                <th>Username:</th>
                <td><?= $linha[0] ?></td>
                <td><form action="./editarDados.php" method="POST">
                    <input type="hidden" name="userAtual" value="<?= $linha[0] ?>">
                    <input type="text" name='userNovo' placeholder="Escreva aqui para editar" required>
                    <button>Editar</button>
                </form></td>
            </tr>
            <tr>
                <th>Seu nome:</th>
                <td><?= $linha[1] ?></td>
                <td><form action="./editarDados.php" method="POST">
                    <input type="hidden" name="nomeAtual" value="<?= $linha[1] ?>">
                    <input type="text" name='nomeNovo' placeholder="Escreva aqui para editar" required>
                    <button>Editar</button>
                </form></td>
            </tr>
            <tr>
                <th>Seu email:</th>
                <td><?= $linha[2] ?></td>
                <td><form action="./editarDados.php" method="POST">
                    <input type="hidden" name="emailAtual" value="<?= $linha[2] ?>">
                    <input type="hidden" name="userAtual" value="<?= $linha[0] ?>">
                    <input type="text" name='emailNovo' placeholder="Escreva aqui para editar" required>
                    <button>Editar</button>
                </form></td>
            </tr>
        <?php endif ?>
        <?php endwhile ?>
    </table>
    <button onclick="window.location.href = '/src/menu.php'">Voltar</button>
    <?php if($_SESSION['mensagem'] != ''): ?>
        <h2>Alerta: <?= $_SESSION['mensagem'] ?></h2>
    <?php $_SESSION['mensagem'] = ''; endif ?>
</body>
</html>