<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

include_once './Configuracion/Conectar.php';
include_once './Recursos/Articulos.php';

$database = new Conectar;
$db = $database->conectar();

$post = new Articulos ($db);

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