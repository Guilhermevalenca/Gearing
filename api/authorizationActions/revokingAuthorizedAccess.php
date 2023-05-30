<?php
//accepting request
require '../accept.php';

//decoding data
$json = file_get_contents('php://input');
$switchingSession = json_decode($json,true);

//changing session to user session
session_write_close();
session_id($switchingSession['id']);
session_start();

//deleting session
session_destroy();