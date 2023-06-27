<?php 
require('../conf/init.php');

$json = file_get_contents('php://input');
$dataTopic = json_decode($json,true);

$id = $dataTopic['id'];
$email = $dataTopic['searchByEmail'];
$title = $dataTopic['searchByTitle'];
$response = [];
try{
    $sql = "SELECT com_message,com_user_name,com_date,com_user_email,com_id FROM GEA_COMMENTS 
            WHERE com_top_title = '$title';";
    $result = $conn->query($sql);
    $response['comments'] = [];
    foreach($result as $data) {
        array_push($response['comments'],array(
            "by" => $data['com_user_name'],
            "comment" => $data['com_message'],
            "date" => $data['com_date'],
            "email" => $data['com_user_email'],
            "id" => $data['com_id']
        ));
    }
    $response['success'] = true;
}catch (PDOException $e) {
    $response['success'] = true;
    $response['error'] = $e->getMessage();
}
echo json_encode($response);