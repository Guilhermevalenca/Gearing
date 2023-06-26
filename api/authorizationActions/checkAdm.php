<?php
require('../accept.php');
require('../establishingConnection.php');
require('../functions.php');

$json = file_get_contents('php://input');
$data = json_decode($json,true);

$id = $data['id'];
alterSession($id);

$email = $_SESSION['email'];

$response = [];

$sql = "SELECT user_controller FROM GEA_USER WHERE user_email = '$email';";
try{
    $conn->exec($sql);
    $response['success'] = true;
} catch(PDOException $e) {
    $response['error'] = $e->getMessage();
}
echo json_encode($response);