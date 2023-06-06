<?php 
//accepting request
require '../accept.php';

//establishing connection with the bank
require '../establishingConnection.php';

//schedule data
$receivingJson = file_get_contents('php://input');
$scheduleData = json_decode($receivingJson, true);

$id = $scheduleData['id'];
$title = $scheduleData['title'];

//altering session
session_write_close();
session_id($id);
session_start();

//user email
$email = $_SESSION['email'];

//preparing response
$response = [];

//save response subjects
$response['subject'] = [];

try{
    $sql = "SELECT * FROM GEA_SUBJECT WHERE sub_sche_title = '$title' AND sub_sche_user_email = '$email';";
    $result = $conn->query($sql);
    if(isset($result)){
        foreach($result as $dataSubjects){
            //save hour
            $row = $dataSubjects['sub_hour'];
            //save day
            $column = $dataSubjects['sub_day'];
            //save respective subject
            $response['subject'][$row][$column] = $dataSubjects['sub_name'];
        }
    }
}catch (PDOException $e){
    exit();
}

//save response turn
$response['turn'] = [];

try{
    $sql = "SELECT sche_shifts FROM GEA_SCHEDULE WHERE sche_user_email = '$email' AND sche_title = '$title';";
    $result = $conn->query($sql);
    if(isset($result)){
        foreach($result as $turn){
            $response['turn'] = $turn['sche_shifts'];
        }
    }
}catch (PDOException $e){
    exit();
}



//responsing
echo json_encode($response);