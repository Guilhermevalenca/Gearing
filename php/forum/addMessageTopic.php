<?php 
    require("../dataSource.php");
    session_start();
    $caminhoDoArquivo = geraTopico . $_POST['arquivo'] . ".csv";
    $fp = fopen($caminhoDoArquivo,'a');
    fputcsv($fp,array($_SESSION['username'],$_POST['mensagem']));
    fclose($fp);
    $user = $_POST['arquivo'];
    $topico = $_POST['topico'];
    header("location: /src/forum/topics.php?user=$user&topico=$topico");
?>