<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

include_once './Configuracion/Conectar.php';
include_once './Recursos/Etiquetas.php';

$database = new Conectar;
$db = $database->conectar();

$etiqueta = new Etiquetas ($db);

$data = json_decode(file_get_contents("php://input"));

$etiqueta->id = $data->id;

if ( $etiqueta->delete() ) {
    echo json_encode([
        'mensaje' => 'Etiqueta Deleted'
    ]);
} else {
    echo json_encode([
        'mensaje' => 'Etiqueta Not Deleted'
    ]);
}