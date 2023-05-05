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
<?php
    require('../../php/cronograma/visualizarCronogramas.php');
?>
<h2><?= $user ?>, Aqui estão seus cronogramas:</h2>
<!-- 
    Gerando tabelas dos cronograma do usuario
 -->
<?php
    $arrayDeDias = ["Domingo","Segunda","Terça","Quarta","Quinta","Sexta","Sábado"];
    $arrayMadrugada = ["00:00","01:00","02:00","03:00","04:00","05:00"];
    $arrayManha= ["06:00","07:00","08:00","09:00","10:00","11:00"];
    $arrayTarde= ["12:00","13:00","14:00","15:00","16:00","17:00"];
    $arrayNoite= ["18:00","19:00","20:00","21:00","22:00","23:00"];

?>
<?php for($i = 1; $i <= $quantasTable; $i++): ?>
<table>
    <tr>
    <td>                 </td>
        <?php
     for($j = 0; $j < sizeof($arrayDeDias);$j++):?>
        <td><?= $arrayDeDias[$j] ?></td>
    <?php endfor ?>
    </tr>
    
        <?php
        $ler = fopen('cronograma.csv','r');
        while( ($linha = fgetcsv($ler)) !== false):
            if( $linha[2] == "turnos" && $linha[1] == $i && $linha[0] == $_SESSION['username'] ):
                for($j = 3 ;$j < sizeof($linha);$j++):
                    if($linha[$j] == "Manhã"):
                    foreach($arrayManha as $horarioManha):
                    ?>
                                     <tr>
            <td> <?= $horarioManha ?></td>
          </tr>
          <?php endforeach ?>
          <?php elseif($linha[$j] == "Tarde"):
            foreach($arrayTarde as $horarioTarde): ?>
                                 <tr>
            <td> <?= $horarioTarde ?></td>
          </tr>
          <?php endforeach ?>
          <?php elseif($linha[$j] == "Noite"):
          foreach($arrayNoite as $horarioNoite): ?>
                                 <tr>
            <td> <?= $horarioNoite ?></td>
          </tr>
          <?php endforeach ?>
          <?php elseif($linha[$j] == "Madrugada"):
          foreach($arrayMadrugada as $horarioMadrugada): ?>
                                 <tr>
            <td> <?= $horarioMadrugada ?></td>
          </tr>
          <?php endforeach ?>
      <?php endif; endfor; endif; endwhile; fclose($ler); ?>
    <tr>
    
        <td>
            <form action="/php/cronograma/deletarCronograma.php" method="GET">
                <input type="hidden" name="user" value="<?= $user ?>">
                <input type="hidden" name="id" value="<?= $i ?>">
                <input type="submit" value="Deletar este Cronograma">
            </form>
        </td>
    </tr>
</table>
<?php endfor ?>
</body>
</html>