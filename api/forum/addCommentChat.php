<?php 
require('../conf/init.php');
header("Access-Control-Allow-Methods: POST");

$json = file_get_contents('php://input');
$commentData = json_decode($json,true);

$id = $commentData['id'];
$name = $commentData['name'];
$message = $commentData['message'];
$title = $commentData['title'];

alterSession($id);

$email = $_SESSION['email'];

$response = [];

try{
    $sql = "INSERT INTO GEA_COMMENTS (com_message,com_user_name,com_top_title,com_user_email) 
    VALUES ('$message','$name','$title','$email');";
    $conn->exec($sql);
    $response['success'] = true;
}catch (PDOException $e) {
    $response['success'] = false;
    $response['error'] = $e->getMessage();
}
echo json_encode($response);