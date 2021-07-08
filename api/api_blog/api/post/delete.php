<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

include_once '../../config/DataBase.php';
include_once '../../models/Post.php';

$database = new DataBase;
$db = $database->connect();

$post = new Post ($db);

$data = json_decode(file_get_contents("php://input"));

$post->id = $data->id;

if ( $post->delete() ) {
    echo json_encode([
        'mensaje' => 'Post Deleted'
    ]);
} else {
    echo json_encode([
        'mensaje' => 'Post Not Deleted'
    ]);
}