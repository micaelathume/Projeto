<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/Database.php';
include_once '../../model/Usuario.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate object
$usu = new Usuario($db);

// Get raw posted data
$data = json_decode(file_get_contents("php://input"));
$usu->nome = $data->nome;
$usu->cpf = $data->cpf;
$usu->email = $data->email;
$usu->senha = $data->senha;
$usu->endereco = $data->endereco;

// Create evento
if ($usu->create()) {
    echo json_encode(
        array('message' => 'Created')
    );
} else {
    echo json_encode(
        array('message' => 'Error')
    );
}
