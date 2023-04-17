<?php 
    require("../dataSource.php");
    $fp = fopen(forum,'a');
    fputcsv($fp,array($_GET['user'],$_GET['mensagem']));
    fclose($fp);
    header('location: /src/forum/paginaPrincipal.php');
?>