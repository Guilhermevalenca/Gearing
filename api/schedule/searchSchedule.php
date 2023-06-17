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
//save response turn
$response['turn'] = [];

try{
    $sql = "SELECT sub_hour, sub_day, sub_name, sche_shifts FROM GEA_SUBJECT,GEA_SCHEDULE 
    WHERE sub_sche_user_email = '$email' AND sub_sche_title = '$title' AND sche_title = sub_sche_title AND
    sche_user_email = sub_sche_user_email;";
    $result = $conn->query($sql);
    if(isset($result)){
        foreach($result as $data){
            //save hour
            $row = $data['sub_hour'];
            //save day
            $column = $data['sub_day'];
            //save respective subject
            $response['subject'][$row][$column] = $data['sub_name'];
            $response['turn'] = $data['sche_shifts'];
        }
    }
}catch (PDOException $e){
    exit();
}
//responsing
echo json_encode($response);