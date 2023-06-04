<?php 
//accepting request
require '../accept.php';

//establishing connection with the bank
require '../establishingConnection.php';

$receivingJson = file_get_contents('php://input');
$scheduleData = json_decode($receivingJson, true);

$schedule = $scheduleData['schedule'];
$titleSchedule = $scheduleData['title'];
$shift = $scheduleData['shift'];
$id = $scheduleData['id'];

session_write_close();
session_id($id);
session_start();

$email = $_SESSION['email'];
try{
    $sql = "SELECT sche_title,user_email FROM GEA_SCHEDULE 
    WHERE sche_title = '$titleSchedule' AND user_email = '$email';";
    $result = $conn->query($sql);
    foreach($result as $data){
        if($data["sche_title"] && $data['user_email']){
            $response = [
                'result' => 'false',
                'problem' => 'existTitle'
            ];
            echo json_encode($response);
            exit();
        }
    }
}
catch (PDOException $e) {
    exit();
}

try{
    $sql = "INSERT INTO GEA_SHEDULE (sche_title,sche_shifts,user_email) VALUES ('$titleSchedule','$shift','$email');";
    $execute = $conn->exec($sql);
    $response = [
        'result' => 'true'
    ];
    echo json_encode($response);
}catch (PDOException $e){
    $response = [
        'result' => 'false',
        'problem' => $e->getMessage()
    ];
    echo json_encode($response);
}