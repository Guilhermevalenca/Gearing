<?php
require('../conf/init.php');
//header("Access-Control-Allow-Methods: POST");

//decoding data
$json = file_get_contents('php://input');
$switchingSession = json_decode($json,true);

//changing session to user session
$id = $switchingSession['id'];
alterSession($id);

//deleting session
session_destroy();
$response['success'] = true;
echo json_encode($response);