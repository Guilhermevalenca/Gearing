<?php

function imprimir($element){
    ob_start();
    print_r($element);
    $output = ob_get_clean();
    error_log($output);
}

function alterSession($idCrip) {
    session_write_close();
    $id = $idCrip;
    session_id($id);
    session_set_cookie_params(7 * 24 * 60 * 60); //time set in seconds
    session_start();
    if(!isset($_SESSION['AUTH']) || !$_SESSION['AUTH'] || $_SERVER['REQUEST_METHOD'] != 'POST'){
        echo json_encode(array('error' => 'usuario não autenticado'));
        session_destroy();
        exit();
    }
}
