<?php
function imprimir($element){

    ob_start();
    print_r($element);
    $output = ob_get_clean();
    error_log($output);

}
function encryption($value){
    return base64_encode($value);
}
function decryption($value) {
    return base64_decode($value);
}
function alterSession($idCrip) {
    session_write_close();
    $id = decryption($idCrip);
    session_id($id);
    session_set_cookie_params(7 * 24 * 60 * 60); //time set in seconds
    session_start();
}
