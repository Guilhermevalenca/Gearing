<?php
require('../conf/init.php');

//decoding data
$json = file_get_contents('php://input');
$switchingSession = json_decode($json,true);

//changing session to user session
$id = $switchingSession['id'];
alterSession($id);

$responseData = [
    'user' => [
        'email' => $_SESSION['email'],
        'username' => $_SESSION['name'],
        'auth' => true
    ],
    'success' => true
];

echo json_encode($responseData);