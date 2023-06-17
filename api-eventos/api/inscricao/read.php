<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../model/Inscricao.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate object
$inscr = new Inscricao($db);

$result = $inscr->read();

// Get row count
$num = $result->rowCount();

if ($num > 0) {
    $posts_arr = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        array_push($posts_arr, $row);
    }

    // Turn to JSON & output
    echo json_encode($posts_arr);

} else {
    // No Posts
    echo json_encode(
        array('message' => 'No register found')
    );
}