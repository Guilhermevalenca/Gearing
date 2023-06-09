<?php 
require('../conf/init.php');

//schedule data
$receivingJson = file_get_contents('php://input');
$scheduleData = json_decode($receivingJson, true);

$id = $scheduleData['id'];
$title = $scheduleData['title'];

alterSession($id);

//user email
$email = $_SESSION['email'];

//preparing response
$response = [];

//save response subjects
$response['subject'] = [];
//save response turn
$response['turn'] = [];

try{
    $sql = "SELECT sub_hour, sub_day, sub_name, sche_shifts FROM GEA_SUBJECT,GEA_SCHEDULE WHERE sche_user_email = :email AND sche_title = :title AND sub_sche_title = sche_title AND sub_sche_user_email = sche_user_email;";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email',$email);
    $stmt->bindParam(':title',$title);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    imprimir($e);
    exit();
}
//responsing
echo json_encode($response);