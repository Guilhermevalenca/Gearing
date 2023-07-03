<?php
require('../conf/init.php');

$jsonData = file_get_contents('php://input');
$newUserData = json_decode($jsonData, true);

$id = $newUserData['id'];
alterSession($id);
$email = $_SESSION['email'];

//user id
$newEmail = $newUserData['email'];

//new data
$name = $newUserData['name'];
$password = encryption($newUserData['password']);
try{
    $sql = "UPDATE GEA_USER SET user_name = :name, user_password = :password,user_email = :newEmail 
    WHERE user_email = :email ;";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name',$name);
    $stmt->bindParam(':password',$password);
    $stmt->bindParam(':newEmail',$newEmail);
    $stmt->bindParam(':email',$email);
    $stmt->execute();
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
