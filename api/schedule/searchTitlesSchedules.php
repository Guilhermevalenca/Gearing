<?php
require('../conf/init.php');

//user data
$receivingJson = file_get_contents('php://input');
$scheduleData = json_decode($receivingJson, true);

//separing data
$id = $scheduleData['id'];

alterSession($id);

//user email
$email = $_SESSION['email'];

//seaching title
$response['title'] = [];
try{
    $sql = "SELECT sche_title FROM GEA_SCHEDULE WHERE sche_user_email = :email;";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email',$email);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
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