<?php
//accepting request
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header('Content-Type: application/json');
//Ainda a ser personalizado para requisição 
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
//starting session
session_start();
