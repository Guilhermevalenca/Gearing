<?php
//accepting request
require '../accept.php';

require('../functions.php');
//decoding data
$json = file_get_contents('php://input');
$switchingSession = json_decode($json,true);

//changing session to user session
$id = $switchingSession['id'];
alterSession("$id",$encryptionKey);

//deleting session
session_destroy();
$response['success'] = true;
echo json_encode($response);