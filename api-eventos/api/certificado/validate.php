<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../model/Certificado.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

$cert = new Certificado($db);

// Get ID
$cert->codigo = isset($_GET['codigo']) ? $_GET['codigo'] : die();

// Get
$cert->validate();

// Create array
$post_arr = array($cert);

if (is_null($cert->usuario)){
    http_response_code(405);
    echo json_encode(
        array('message' => 'Certificado inválido')
    );
} else {
    http_response_code(200);
    echo json_encode(
        array('message' => 'Certificado válido')
    );
}