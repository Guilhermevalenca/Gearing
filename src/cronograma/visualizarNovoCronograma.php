<?php 
    require( '../verificacaoExistSession.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/cronograma.css">
    <script defer src="/script/cabecalho.js"></script>
    
</head>
<body>
<button id="expandir"><i>opções</i></button><br>
    <div id="cabecalho"></div>
<h1>Seu novo Cronograma já foi criado!</h1>
<h2>Dê uma olhada nele:</h2>

<!-- 
    Gerando tabela da nova criação de cronograma do usuario:
 -->
<?php 
    print_r($_GET['materia']);
?>
<table>
    <tr>
        <th>Domingo</th>
        <th>Segunda</th>
        <th>Terça</th>
        <th>Quarta</th>
        <th>Quinta</th>
        <th>Sexta</th>
        <th>Sabado</th>
    </tr>
</table>
<div id="infoTable">

</div>
</body>
</html>