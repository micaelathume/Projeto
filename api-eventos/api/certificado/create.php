<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/Database.php';
include_once '../../model/Certificado.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate object
$cert = new Certificado($db);

// Get raw posted data
$data = json_decode(file_get_contents("php://input"));
$cert->usuario = $data->usuario;
$cert->evento = $data->evento;
$cert->data_emissao = $data->data_emissao;
$cert->conteudo = $data->conteudo;

// Create evento
if ($cert->create()) {
    echo json_encode(
        array('message' => 'Created')
    );
} else {
    echo json_encode(
        array('message' => 'Error')
    );
}
