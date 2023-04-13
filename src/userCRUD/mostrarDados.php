<?php 
    include '../verificacaoExistUser.php';
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
                <td><form id="form" action="./editarDados.php" method="POST">
                    <input id="editar" type="text" name='userNovo' placeholder="Escreva aqui para editar" required>
                    <input type="submit" value="editar">
                </form></td>
            </tr>
            <tr>
                <th>Seu nome:</th>
                <td><?= $linha[1] ?></td>
                <td><form id="form" action="./editarDados.php" method="POST">
                    <input type="hidden" name="nomeAtual" value="<?= $linha[1] ?>">
                    <input type="text" name='nomeNovo' placeholder="Escreva aqui para editar" required>
                    <input type="submit" value="editar">
                </form></td>
            </tr>
            <tr>
                <th>Seu email:</th>
                <td><?= $linha[2] ?></td>
                <td><form id="form" action="./editarDados.php" method="POST">
                    <input type="hidden" name="emailAtual" value="<?= $linha[2] ?>">
                    <input id="editar" type="text" name='emailNovo' placeholder="Escreva aqui para editar" required>
                    <input type="submit" value="editar">
                </form></td>
            </tr>
        <?php endif ?>
        <?php endwhile ?>
    </table>
    <script>
        const form = getElementById("form");
        const editar = getElementById("editar");
        
        form.addEventListener('submit', (event) => {
            event.preventDefault();
            const validandoRecurso = new XMLHttpRequest();
            validandoRecurso.onreadystatechange = () => {
                if(this.readyState === 4 && this.status === 200){
                    if(this.ResponseText == "Realize o alert"){
                        alert("A informação que voce quer editar ela ja esta sendo utilizada em outra conta");
                    }else{
                        form.submit();
                    }
                }
            }
            const enviarDados = new FormData();
            enviarDados.append('edicao',editar.value);
            if(editar.name == "emailNovo"){
                enviarDados.append('numeracao',2);
            }else if(editar.name == "userNovo"){
                enviarDados.append('numeracao',0);
            }
            validandoRecurso.open("POST",'./editarDados.php',true);
            validandoRecurso.send(enviarDados);
        })
    </script>
    <button onclick="window.location.href = '/src/menu.php'">Voltar</button>
</body>
</html>
