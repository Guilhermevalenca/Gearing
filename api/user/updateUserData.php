<?php
//accepting request
require '../accept.php';

//establishing connection with the bank
require '../establishingConnection.php';

$jsonData = file_get_contents('php://input');
$newUserData = json_decode($jsonData, true);

//show data in terminal
ob_start();
print_r($newUserData);
$output = ob_get_clean();
error_log($output);

//user id
$email = $newUserData['email'];

//new data
$name = $newUserData['name'];
$password = $newUserData['password'];
try{
$sql = "UPDATE GEA_USER SET user_name = '$name', user_password = '$password' WHERE user_email = '$email' ;";
$execute = $conn->exec($sql);
$responseData = [
    'result' => 'true'
];
}catch (PDOException $e){
    $problem = $e->getMessage();
    $responseData = [
        'result' => 'false',
        'problem' => "$problem"
    ];
}
echo json_encode($responseData);
