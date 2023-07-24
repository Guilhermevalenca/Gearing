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
    $sql = 'INSERT INTO GEA_USER (user_email,user_name,user_password,user_controller) 
            VALUES (:email,:name,:password,false);';
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email',$email);
    $stmt->bindParam(':name',$name);
    $stmt->bindParam(':password',$cripPass);
    $stmt->execute();
    $response['success'] = "true";
}catch (PDOException $e) {
    $response['error'] = [
        'code' => $e->getCode(),
        'other' => $e
    ];
    //echo "Dados do usuario não foram adicionados " . $e->getMessage(); 
}
echo json_encode($response);
