<?php
//accepting request
require '../accept.php';

//establishing connection with the bank
require '../establishingConnection.php';

require('../functions.php');

//decoding data
$json = file_get_contents('php://input');
$switchingSession = json_decode($json,true);

//changing session to user session
alterSession($switchingSession['id']);

if(!isset($_SESSION['AUTH']) || !$_SESSION['AUTH'] || $_SERVER['REQUEST_METHOD'] != 'POST'){
    echo "NOT AUTH";
    session_destroy();
    exit();
}

$email = $_SESSION['email'];

$responseData = [];

try{
    $sql = "SELECT user_email,user_name FROM GEA_USER WHERE user_email = '$email';";
    $result = $conn->query($sql);
    if(isset($result)){
        foreach($result as $userData){
            $responseData['user'] = [
                'username' => $userData['user_name'],
                'email' => $userData['user_email'],
                'auth' => true
            ];
            $_SESSION['email'] = $userData['user_email'];
            $responseData['success'] = true;
        }
    }
}catch (PDOException $e){
    $responseData['error'] = $e->getMessage();
}
imprimir($responseData);
echo json_encode($responseData);