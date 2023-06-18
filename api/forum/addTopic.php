<?php 
//accepting request
require '../accept.php';

//establishing connection with the bank
require '../establishingConnection.php';

$json = file_get_contents('php://input');
$topicData = json_decode($json, true);

$id = $topicData['id'];
$name = $topicData['name'];
$description = $topicData['description'];
$title = $topicData['title'];

session_write_close();
session_id($id);
session_start();

$email = $_SESSION['email'];

$response = [];

try{
    $sql = "INSERT INTO GEA_TOPIC (top_title,top_description,top_user_email,top_user_name)
            VALUES ('$title','$description', '$email','$name');";
    $result = $conn->exec($sql);
    $response['success'] = 'true';
}catch (PDOException $e){
    $response['error'] = 'true';
    $response['problem'] =$e->getMessage();
}
echo json_encode($response);
