<?php
require('../conf/init.php');

$json = file_get_contents('php://input');
$data = json_decode($json,true);

$id = $data['id'];

alterSession($id);
$email = $_SESSION['email'];
$message = $data['message'];
$title = $data['title'];

$response = [];

$sql = "UPDATE GEA_TOPIC SET top_description = :message WHERE top_user_email = :email AND top_title = :title;";
try{
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':message',$message);
    $stmt->bindParam(':email',$email);
    $stmt->bindParam(':title',$title);
    $stmt->execute();

    $response['success'] = true;
}catch (PDOException $e) {
    $response['error'] = $e->getMessage();
}

echo json_encode($response);