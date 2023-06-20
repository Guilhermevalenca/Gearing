<?php
//accepting request
require '../accept.php';

//establishing connection with the bank
require '../establishingConnection.php';

//creating user
$receivingJson = file_get_contents('php://input');
$userData = json_decode($receivingJson, true);

//separating user data
$email = $userData['email'];
$name = $userData['username'];
$password = $userData['password'];

$response = [];
try{
    //adding user data
    $sql = "INSERT INTO GEA_USER (user_email,user_name,user_password) 
            VALUES ('$email','$name','$password');";
    $rowCount = $conn->exec($sql);
    $response['success'] = "true";
}catch (PDOException $e) {
    $response['error'] = $e->getMessage();
    //echo "Dados do usuario não foram adicionados " . $e->getMessage(); 
}
echo json_encode($response);
