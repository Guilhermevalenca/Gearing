<?php 
    session_start();
    require('./accept.php');
    if(!isset($_SESSION['auth'] || !$_SESSION['auth'])){
        echo "unauthenticated user";
    }
?>