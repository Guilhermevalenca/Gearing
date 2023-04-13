<?php 
    include 'verificacaoExistUser.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/cronograma.css">
</head>
<body>
<?php
    $user = $_SESSION['username'];
    if($_SERVER['REQUEST_METHOD'] != 'POST'){
        header('location:menu.php');
        exit();
    }
    //function para adicionar dados:
    function addUsersDados($dadosAlocacao,$alocacao){
        $user = $_SESSION['username'];
        $dados = array();
        array_push($dados,$user);
        $id = 1;
        $fp = fopen('./userCRUD/dadosUsers.csv','r');
        while( ($linha = fgetcsv($fp)) !== false){
            if($linha[0] == $user && $linha[1] == $id && $linha[2] == $alocacao){
                $id++;
            }
        }
        fclose($fp);
        array_push($dados,$id);
        array_push($dados,$alocacao);
        foreach ($dadosAlocacao as $novosElementos) {
            array_push($dados,$novosElementos);
        }
        $fp = fopen('./userCRUD/dadosUsers.csv','a');
        fputcsv($fp,$dados);
        fclose($fp);
    }
    //adicionar dados:
    addUsersDados($_POST['horario'],"horario");
    addUsersDados($_POST['tempo'],"tempo");
    addUsersDados($_POST['materia'],"materia");
?>
<h1>Seu novo Cronograma ja foi criado!</h1>
<h2>De uma olhada nele:</h2>
<!-- 
    Gerando tabela da nova criação de cronograma do usuario:
 -->
<table>
    <tr>
        <th>Horarios:</th>
        <?php foreach($_POST['horario'] as $horario): ?>
            <td><?= $horario ?></td>
        <?php endforeach ?>
    </tr>
    <tr>
        <th>Tempo:</th>
        <?php foreach($_POST['tempo'] as $tempo): ?>
            <td><?= $tempo ?></td>
        <?php endforeach ?>
    </tr>
    <tr>
        <th>Materias:</th>
        <?php foreach($_POST['materia'] as $materia): ?>
            <td><?= $materia ?></td>
        <?php endforeach ?>
    </tr>
</table>
<button onclick="window.location.href='./menu.php'">Voltar para o menu</button>
</body>
</html>