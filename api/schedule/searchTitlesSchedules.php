<?php
//accepting request
require '../accept.php';

//establishing connection with the bank
require '../establishingConnection.php';

//user data
$receivingJson = file_get_contents('php://input');
$scheduleData = json_decode($receivingJson, true);

//separing data
$id = $scheduleData['id'];

//altering session
session_write_close();
session_id($id);
session_start();

//user email
$email = $_SESSION['email'];

//seaching title
$response['title'] = [];
try{
    $sql = "SELECT sche_title FROM GEA_SCHEDULE WHERE sche_user_email = '$email';";
    $result = $conn->query($sql);
    if(isset($result)){
        foreach($result as $titleSchedules){
            array_push($response['title'],$titleSchedules['sche_title']);
        }
    }
    echo json_encode($response);
    exit();
}catch (PDOException $e){
    exit();
}