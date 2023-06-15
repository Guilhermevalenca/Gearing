<?php
//accepting request
require '../accept.php';

//establishing connection with the bank
require '../establishingConnection.php';

$receivingJson = file_get_contents('php://input');
$scheduleData = json_decode($receivingJson, true);

$id = $scheduleData['id'];
$title = $scheduleData['title'];

//altering session
session_write_close();
session_id($id);
session_start();

$email = $_SESSION['email'];

//deleting schedule
$response = [];
try{
    $sql = "DELETE FROM GEA_SCHEDULE WHERE sche_title = '$title' AND sche_user_email = '$email';";
    $result = $conn->query($sql);
}
catch (PDOException $e){
    exit();
}
$response = [
    'result' => 'true'
];

echo json_encode($response);
