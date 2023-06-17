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
$usu->email = isset($_GET['email']) ? $_GET['email'] : die();
$usu->senha = isset($_GET['senha']) ? $_GET['senha'] : die();

// Get
$usu->login();

// Make JSON
if (is_null($usu->email)){
    http_response_code(404);
    echo json_encode(
        array('message' => 'Usuário inválido')
    );
} else {
    http_response_code(200);
    print_r(json_encode($usu));
}