<?php 
require('../accept.php');
require('../establishingConnection.php');

$json = file_get_contents('php://input');
$dataTopic = json_decode($json,true);

$id = $dataTopic['id'];
$email = $dataTopic['searchByEmail'];
$title = $dataTopic['searchByTitle'];
$response = [];
try{
    $sql = "SELECT com_message,com_user_name FROM GEA_COMMENTS 
            WHERE com_top_title = '$title';";
    $result = $conn->query($sql);
    $response['comments'] = [];
    foreach($result as $data) {
        array_push($response['comments'],array(
            "by" => $data['com_user_name'],
            "comment" => $data['com_message']
        ));
    }
    $response['success'] = "true";
}catch (PDOException $e) {
    $response['error'] = $e->getMessage();
}
echo json_encode($response);