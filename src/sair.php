<?php 
    session_start();
    session_destroy();
    echo "Você saiu da conta";
    header('location: /');
?>