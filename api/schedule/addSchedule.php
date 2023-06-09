<?php 
//accepting request
require '../accept.php';

//establishing connection with the bank
require '../establishingConnection.php';

//schedule data
$receivingJson = file_get_contents('php://input');
$scheduleData = json_decode($receivingJson, true);

//separating data
$schedule = $scheduleData['schedule'];
$titleSchedule = $scheduleData['title'];
$shift = $scheduleData['shift'];
$id = $scheduleData['id'];

//altering session
session_write_close();
session_id($id);
session_start();

//search user email
$email = $_SESSION['email'];

//verifying if exist title 
try{
    $sql = "SELECT sche_title,sche_user_email FROM GEA_SCHEDULE 
    WHERE sche_title = '$titleSchedule' AND sche_user_email = '$email';";
    $result = $conn->query($sql);
    foreach($result as $data){
        if($data["sche_title"] && $data['sche_user_email']){
            $response['existTitle'] = 'true';
            echo json_encode($response);
            exit();
        }
    }
}
catch (PDOException $e) {
    exit();
}

//preparing response
$response = [];

//user created schedule
try{
    $sql = "INSERT INTO GEA_SCHEDULE (sche_title,sche_shifts,sche_user_email) 
    VALUES ('$titleSchedule','$shift','$email');";
    $execute = $conn->exec($sql);
}catch (PDOException $e){
    $response['failedCreatedSchedule'] = $e->getMessage();
    echo json_encode($response);
    exit();
}

//adding subject for schedules
foreach($schedule as $row => $listSubjects){
    foreach($listSubjects as $column => $subject){
        if($subject){
            try{
                $sql = "INSERT INTO GEA_SUBJECT (sub_name, sub_day, sub_hour, sub_sche_title, sub_sche_user_email) 
                VALUE ('$subject','$column','$row','$titleSchedule','$email');";
                $execute = $conn->exec($sql);
            }
            catch (PDOException $e){
                $response['addSubjectFailed'] = $e->getMessage();
            }
        }
    }
}

//send response
$response['success'] = 'true';
echo json_encode($response);