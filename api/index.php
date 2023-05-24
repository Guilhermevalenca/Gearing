<?php 
    session_start();
    require('./accept.php');
    if($_SESSION['auth']){
        echo true;
    }else{
        echo false;
    }
    $data = json_encode($_SESSION['auth']);
    echo $data;
?>