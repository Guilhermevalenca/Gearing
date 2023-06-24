<?php
require('../accept.php');
require('../establishingConnection.php');
require('../functions.php');

$json = file_get_contents('php://input');
$data = json_decode($json,true);

alterSession($data['id'],$encryptionKey);
$email = $_SESSION['email'];
$message = $data['message'];
$title = $data['title'];

$response = [];

$sql = "UPDATE GEA_TOPIC SET top_description = '$message' WHERE top_user_email = '$email' AND top_title = '$title';";
try{
    $conn->exec($sql);
    $response['success'] = true;
}catch (PDOException $e) {
    $response['error'] = $e->getMessage();
}

echo json_encode($response);
