<?php 
    require("../dataSource.php");
    session_start();
    $novoTopico = geraTopico . $_SESSION['username'] . ".csv";
    $fp = fopen($novoTopico,"w");
    fclose($fp);
    
    $fp = fopen(topics,"a");
    fputcsv($fp,array($_SESSION['username'],$_POST['topico']));
    fclose($fp);
    header("location: /src/forum/home.php");
    ?>