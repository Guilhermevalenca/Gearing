<?php  
    $fp = fopen('chatForum.csv','a');
    fputcsv($fp,array($_GET['user'],$_GET['mensagem']));
    fclose($fp);
    header('location: ./paginaPrincipal.php');
?>