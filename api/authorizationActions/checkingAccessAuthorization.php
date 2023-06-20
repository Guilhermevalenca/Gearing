<?php
//accepting request
require '../accept.php';

//establishing connection with the bank
require '../establishingConnection.php';

//decoding data
$json = file_get_contents('php://input');
$switchingSession = json_decode($json,true);

//changing session to user session
session_write_close();
session_id($switchingSession['id']);
session_set_cookie_params(7 * 24 * 60 * 60); //time set in seconds
session_start();

if( (!isset($_SESSION['AUTH']) || !$_SESSION['AUTH']) && $_SERVER['REQUEST_METHOD'] != 'POST'){
    session_destroy();
    exit();
}

$email = $_SESSION['email'];

try{
    $sql = "SELECT user_email,user_name FROM GEA_USER WHERE user_email = '$email';";
    $result = $conn->query($sql);
    if(isset($result)){
        foreach($result as $userData){
            $responseData = [
                'username' => $userData['user_name'],
                'email' => $userData['user_email'],
                'auth' => true
            ];
            $_SESSION['email'] = $userData['user_email'];
            echo json_encode($responseData);
            exit();
        }
    }
}catch (PDOException $e){
    exit();
}
