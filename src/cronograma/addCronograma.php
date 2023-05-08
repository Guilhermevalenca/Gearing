<?php 
    $horario = $_POST['horario'];
    $dia = $_POST['diaSemana'];
    $data = [];
    $data[0] = $_SESSION['username'];
    foreach($_POST['materia'] as $indice => $materia){
        array_push($data,$materia,$horario[$indice],$dia[$indice]);
    }
    $fp = fopen('cronograma.csv','a');
    fputcsv($fp,$data);
    fclose($fp);
    $diasDaSemana = ["Domingo","Segunda","Terça","Quarta","Quinta","Sexta","Sabado"];
    $turnoMadrugada = ["00:00","01:00","02:00","03:00","04:00","05:00"];
    $turnoManha= ["06:00","07:00","08:00","09:00","10:00","11:00"];
    $turnoTarde= ["12:00","13:00","14:00","15:00","16:00","17:00"];
    $turnoNoite= ["18:00","19:00","20:00","21:00","22:00","23:00"];
?>
<h2>Seu cronograma:</h2>
<table>
    <thead>
    <?php foreach($diasDaSemana as $dia): ?>
        <th><?= $dia ?></th>
    <?php endforeach ?>
    </thead>
</table>