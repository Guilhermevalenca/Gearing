<?php 
require('../accept.php');
require('../establishingConnection.php');

$json = file_get_contents('php://input');
$commentData = json_decode($json,true);

$id = $commentData['id'];
$name = $commentData['name'];
$message = $commentData['message'];
$title = $commentData['title'];

session_write_close();
session_id($id);
session_start();

$email = $_SESSION['email'];

$response = [];

try{
    $sql = "INSERT INTO GEA_COMMENTS (com_message,com_user_name,com_top_title,com_top_user_email) 
    VALUES ('$message','$name','$title','$email');";
    $result = $conn->exec($sql);
    $response['success'] = "true";
}catch (PDOException $e) {
    $response['error'] = $e->getMessage();
}
echo json_encode($response);