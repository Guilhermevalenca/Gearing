<?php
//accepting request
require '../accept.php';

//establishing connection with the bank
require '../establishingConnection.php';

require('../functions.php');

$jsonData = file_get_contents('php://input');
$dataUser = json_decode($jsonData,true);

$email = $dataUser['email'];
$id = $dataUser['idSession'];
$userId = hash('sha256',$email);


//deleting database data
try{
$sql = "DELETE FROM GEA_USER WHERE user_email = '$userId'";
    $execute = $conn->exec($sql);
    $responseData = [
        'result' => 'deleted user'
    ];
    echo json_encode($responseData);
} catch (PDOException $e){

    $messageErro = $e->getMessage();
    $responseData = [
        'result' => 'user not deleted',
        'problem' => "$messageErro"
    ];
    echo json_encode($responseData);

    exit();
}


//deleting session
session_write_close(); //close session current or actual
session_id($id); //setting id session for user
session_start(); // starting session
session_destroy();//destroy session user
