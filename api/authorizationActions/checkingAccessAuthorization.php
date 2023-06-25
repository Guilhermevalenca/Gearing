<?php
//accepting request
require '../accept.php';

//establishing connection with the bank
require '../establishingConnection.php';

require('../functions.php');

//decoding data
$json = file_get_contents('php://input');
$switchingSession = json_decode($json,true);

//changing session to user session
$id = $switchingSession['id'];
alterSession("$id",$encryptionKey);

$email = $_SESSION['email'];

$responseData = [
    'user' => [
        'email' => encryption($email,$encryptionKey),
        'username' => $_SESSION['name'],
        'auth' => true
    ]
];

echo json_encode($responseData);