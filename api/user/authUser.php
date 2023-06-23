<?php 
//accepting request
require '../accept.php';

//establishing connection with the bank
require '../establishingConnection.php';

//functions global
require('../functions.php');

//authenticate user
$receivingJson = file_get_contents('php://input');
$testingData = json_decode($receivingJson, true);

//reserving user data
$email = $testingData['email'];
$password = $testingData['password'];

$cripPass = encryption($password);
$cripEmail = encryption($email);

$responseData = [];

//looking for user
try{
    $sql = "SELECT user_email,user_name FROM GEA_USER WHERE user_email = '$cripEmail' AND user_password = '$cripPass';";
    $result = $conn->query($sql);
    if(isset($result)){
        foreach($result as $userData){
            $responseData['user'] = [
                'username' => $userData['user_name'],
                'email' => $userData['user_email'],
                'id' => encryption(session_id()),
                'auth' => true
            ];
            $_SESSION['AUTH'] = true;
            $_SESSION['email'] = $userData['user_email'];
        }
    }
}
catch (PDOException $e) {
    $responseData['error'] = $e->getMessage();
}

echo json_encode($responseData);