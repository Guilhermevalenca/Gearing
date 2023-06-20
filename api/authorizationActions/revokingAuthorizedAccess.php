<?php
//accepting request
require '../accept.php';

require('../functions.php');
//decoding data
$json = file_get_contents('php://input');
$switchingSession = json_decode($json,true);

//changing session to user session
alterSession($switchingSession['id']);

//deleting session
session_destroy();
$response['success'] = true;
echo json_encode($response);