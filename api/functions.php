<?php

function imprimir($element){

    ob_start();
    print_r($element);
    $output = ob_get_clean();
    error_log($output);

}

function alterSession($id) {
    session_write_close();
    session_id($id);
    session_set_cookie_params(7 * 24 * 60 * 60); //time set in seconds
    session_start();
}