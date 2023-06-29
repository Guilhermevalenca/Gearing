<?php
require('../conf/init.php');

//creating user
$receivingJson = file_get_contents('php://input');
$userData = json_decode($receivingJson, true);

//separating user data
$email = $userData['email'];
$name = $userData['username'];
$password = $userData['password'];

$cripPass = encryption($password);

$response = [];
try{
    //adding user data
    $sql = "INSERT INTO GEA_USER (user_email,user_name,user_password,user_controller) 
            VALUES ('$email','$name','$cripPass',false);";
    $rowCount = $conn->exec($sql);
    $response['success'] = "true";
}catch (PDOException $e) {
    $response['error'] = $e->getMessage();
    //echo "Dados do usuario não foram adicionados " . $e->getMessage(); 
}
echo json_encode($response);
