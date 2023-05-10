<?php 
    session_start();
    $horario = $_POST['horario'];
    $dia = $_POST['diaSemana'];
    $data = [];
    $data[0] = $_SESSION['username'];
    $data[1] = 'materia';
    foreach($_POST['materia'] as $indice => $materia){
        array_push($data,$materia,$horario[$indice],$dia[$indice]);
    }
    $fp = fopen('cronograma.csv','a');
    fputcsv($fp,$data);
    fclose($fp);
    header('location: /src/cronograma/montandoCronograma.php');
    ?>