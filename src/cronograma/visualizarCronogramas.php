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
</head>
<body>
<button onclick="window.location.href = '/src/menu.php'">Voltar</button>
<?php
    require('../../php/cronograma/visualizarCronogramas.php');
?>
<h2><?= $user ?>, Aqui estão seus cronogramas:</h2>
<!-- 
    Gerando tabelas dos cronograma do usuario
 -->
<?php for($i = 0; $i < $quantasTable; $i++ ): ?>
<table>
    <tr>
    <td>                 </td>
        <?php
     $arrayDeDias = ["Domingo","Segunda","Terça","Quarta","Quinta","Sexta","Sábado"];
     for($j = 0; $j < sizeof($arrayDeDias);$j++):?>
        <td><?= $arrayDeDias[$j] ?></td>
    <?php endfor ?>
    </tr>
    
        <?php
        $arrayMadrugada= ["00:00","01:00","02:00","03:00","04:00","05:00","06:00"];
        $arrayManha= ["06:00","07:00","08:00","09:00","10:00","11:00","12:00"];
        $arrayTarde= ["12:00","13:00","14:00","15:00","16:00","17:00","18:00"];
        $arrayNoite= ["18:00","19:00","20:00","21:00","22:00","23:00","00:00"];

        $ler = fopen("cronograma.csv","r");
        while( ($linha = fgetcsv($ler)) !== false):
            if($linha[2] == "turnos"):
                for($j = 3 ;$j < sizeof($linha);$j++):
                    foreach($arrayManha as $horarioManha):
                    if($linha[$j] == "Manhã"):?>
                            <tr>
            <td> <?= $horarioManha ?></td>
          </tr>


      <?php endif;endforeach; endfor; endif ;endwhile ?>

          <?php $ler = fopen("cronograma.csv","r");
        while( ($linha = fgetcsv($ler)) !== false):
            if($linha[2] == "turnos"):
                for($j = 3 ;$j < sizeof($linha);$j++):
                       foreach($arrayTarde as $horarioTarde):
                    if($linha[$j] == "Tarde"):?>
                              <tr>
            <td> <?= $horarioTarde ?></td>
          </tr>

<?php endif;endforeach; endfor; endif ;endwhile ?>
    <tr>
    
        <td>
            <form action="/php/cronograma/deletarCronograma.php" method="GET">
                <input type="hidden" name="user" value="<?= $user ?>">
                <input type="hidden" name="id" value="<?= $id ?>">
                <input type="submit" value="Deletar este Cronograma">
            </form>
        </td>
    </tr>
</table>
<?php $id++; endfor ?>
</body>
</html>