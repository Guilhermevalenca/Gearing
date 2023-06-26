<?php
//accepting request
require '../accept.php';

//establishing connection with the bank
require '../establishingConnection.php';

$jsonData = file_get_contents('php://input');
$newUserData = json_decode($jsonData, true);

$id = $newUserData['id'];
alterSession($id);
$email = $_SESSION['email'];

//user id
$newEmail = hash('sha256',$newUserData['email']);

//new data
$name = $newUserData['name'];
$password = hash('sha256',$newUserData['password']);
try{
    $sql = "UPDATE GEA_USER SET user_name = '$name', user_password = '$password',user_email = '$newEmail' 
    WHERE user_email = '$email' ;";
    $execute = $conn->exec($sql);
    $responseData = [
        'result' => 'true'
    ];
    $_SESSION['email'] = $newEmail;
}catch (PDOException $e){
    $problem = $e->getMessage();
    $responseData = [
        'problem' => "$problem"
    ];
}
echo json_encode($responseData);
