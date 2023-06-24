<?php
//biblioteca de criptografia
require './vendor/autoload.php';

use ParagonIE\HiddenString\HiddenString;
use ParagonIE\Halite\Symmetric\EncryptionKey;
use ParagonIE\Halite\Symmetric\Crypto as SymmetricCrypto;

$keyMaterial = 'chave_não_definida_ç@..@#$_key';
$hiddenString = new HiddenString($keyMaterial);
$encryptionKey = new EncryptionKey($hiddenString);

function encryption($value, $encryptionKey){
    $hiddenValue = new HiddenString($value);
    return SymmetricCrypto::encrypt($hiddenValue, $encryptionKey);
}

function decryption($value, $encryptionKey) {
    $decryptedValue = SymmetricCrypto::decrypt($value, $encryptionKey);
    return $decryptedValue->getString();
}

function imprimir($element){
    ob_start();
    print_r($element);
    $output = ob_get_clean();
    error_log($output);
}

function alterSession($idCrip,$encryptionKey) {
    session_write_close();
    $id = decryption($idCrip,$encryptionKey);
    session_id($id);
    session_set_cookie_params(7 * 24 * 60 * 60); //time set in seconds
    session_start();
    if(!isset($_SESSION['AUTH']) || !$_SESSION['AUTH'] || $_SERVER['REQUEST_METHOD'] != 'POST'){
        echo json_encode(array('error' => 'usuario não autenticado'));
        session_destroy();
        exit();
    }
}

