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

//checking if the user is already registered
$sql = "SELECT user_email FROM GEA_USER WHERE user_email = '$email';";
$result = $conn->query($sql);
foreach($result as $comparing){
    //if the user already exists
    if($comparing['user_email']){
        exit();
    }
}

try{
    //adding user data
    $sql = "INSERT INTO GEA_USER (user_email,user_name,user_password) VALUES ('$email','$name','$password');";
    $rowCount = $conn->exec($sql);
    echo "Dados adicionados com sucesso";
}catch (PDOException $e) {
    exit();
    //echo "Dados do usuario não foram adicionados " . $e->getMessage(); 
}
