<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../model/Usuario.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

$usu = new Usuario($db);

// Get ID
$usu->id = isset($_GET['id']) ? $_GET['id'] : die();

// Get
$usu->read_id();

// Create array
$post_arr = array($usu);

// Make JSON
print_r(json_encode($post_arr));