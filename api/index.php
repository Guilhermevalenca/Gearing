<?php
require './accept.php';

session_start();
$response = [];
$response['id'] = session_id();
$response['message'] = 'vai se fuder';
echo json_encode($response);
