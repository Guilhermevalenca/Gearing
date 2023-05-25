<?php 
    session_start();
    require('./session/deleteSession.php');
    session_destroy();
    header('location: /');
?>