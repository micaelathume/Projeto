<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/Database.php';
include_once '../../model/Usuario.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

$usu = new Usuario($db);

// Get raw posted data
$data = json_decode(file_get_contents("php://input"));

$usu->id = $data->id;
$usu->nome = $data->nome;
$usu->cpf = $data->cpf;
$usu->email = $data->email;
$usu->senha = $data->senha;
$usu->endereco = $data->endereco;

// Update evento
if ($usu->update()) {
    echo json_encode(
        array('message' => 'Updated')
    );
} else {
    echo json_encode(
        array('message' => 'Not Updated')
    );
}