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
<?php session_start();
    if($_SERVER['REQUEST_METHOD'] != 'POST'){
        exit();
    } 
    if(!isset($_POST['horario']) || !isset($_POST['materia'])):
        $_SESSION['mensagem'] = "Exite ou existem perguntas sem respostas!!!";
        header('location: ./criarCronograma.php');
        exit();
    endif;
    $id = 1;
    $dadosHorario = [];
    $dadosMateria = [];
    $dadosHorario[0] = $_POST['user'];
    $dadosMateria[0] = $_POST['user'];
    $fp = fopen('dadosUsers.csv','r');
    while( ($linha = fgetcsv($fp)) !== false ){
        if($linha[1] == $id && $linha[0] == $dadosHorario[0]){
            $id++;
        }
    }
    fclose($fp);
    $dadosHorario[1] = $id;
    $dadosHorario[2] = "horario";
    $i = 3;
    foreach($_POST['horario'] as $horario){
        $dadosHorario[$i] = $horario;
        $i++; 
    }
    $dadosMateria[1] = $id;
    $dadosMateria[2] = "materia";
    $i = 3;
    foreach($_POST['materia'] as $materia){
        $dadosMateria[$i] = $materia;
        $i++; 
    }
    $fp = fopen('dadosUsers.csv','a');
    fputcsv($fp,$dadosHorario);
    fputcsv($fp,$dadosMateria);
    fclose($fp);
?>
<h1>Seu novo Cronograma ja foi criado!</h1>
<h2>De uma olhada nele:</h2>
<table>
    <tr>
        <th>Horarios:</th>
        <?php foreach($_POST['horario'] as $horario): ?>
            <td><?= $horario ?></td>
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