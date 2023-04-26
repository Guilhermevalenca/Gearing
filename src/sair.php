<?php 
    session_start();
    require('./session/apagarSession.php');
    session_destroy();
    header('location: /');
?>