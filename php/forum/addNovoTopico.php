<?php 
    require("../dataSource.php");
    session_start();
    $novoTopico = geraTopico . $_SESSION['username'] . ".csv";
    if(file_exists($novoTopico)){
        echo "Cada usuario so pode criar um unico topico!!!";
        exit();
    }else{
        $fp = fopen($novoTopico,"w");
        fclose($fp);
    }
    $fp = fopen(topicos,"a");
    fputcsv($fp,array($_SESSION['username'],$_POST['topico']));
    fclose($fp);
    header("location: /src/forum/paginaPrincipal.php");
    ?>