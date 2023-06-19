<?php
//accepting request
header("Access-Control-Allow-Origin: http://localhost:8080");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header('Content-Type: application/json');
//starting session
session_set_cookie_params(30 * 24 * 60 * 60);
session_start();
?>