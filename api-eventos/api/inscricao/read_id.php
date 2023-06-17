<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../model/Inscricao.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

$inscr = new Inscricao($db);

// Get ID
$inscr->usuario = isset($_GET['usuario']) ? $_GET['usuario'] : die();
$inscr->evento = isset($_GET['evento']) ? $_GET['evento'] : die();

// Get
$inscr->read_id();

// Make JSON
print_r(json_encode($inscr));