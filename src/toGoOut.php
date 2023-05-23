<?php 
    session_start();
    require('./session/delete.php');
    session_destroy();
    header('location: /');
?>