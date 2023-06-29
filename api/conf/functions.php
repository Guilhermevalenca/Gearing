<?php
$key = 'chave_personalizada_ainda_há_ser_definida_@ç321`,ç~^::^~ç,`;ç:';

function encryption($value) {
    global $key;
    $encrypted = openssl_encrypt($value, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, '0123456789abcdef');
    return base64_encode($encrypted);
}

function decryption($value) {
    global $key;
    $crip = base64_decode($value);
    $decrypted = openssl_decrypt($crip, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, '0123456789abcdef');
    return $decrypted;    
}

function imprimir($element){
    ob_start();
    print_r($element);
    $output = ob_get_clean();
    error_log($output);
}

function alterSession($idCrip) {
    session_write_close();
    $id = decryption($idCrip);
    session_id($id);
    session_set_cookie_params(7 * 24 * 60 * 60); //time set in seconds
    session_start();
    if(!isset($_SESSION['AUTH']) || !$_SESSION['AUTH']){
        echo json_encode(array('error' => 'usuario não autenticado'));
        session_destroy();
        exit();
    }
}
