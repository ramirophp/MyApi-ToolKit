<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

include_once './Configuracion/Conectar.php';
include_once './Recursos/Etiquetas.php';

$database = new Conectar;
$db = $database->conectar();

$etiqueta = new Etiquetas ($db);

$data = json_decode(file_get_contents("php://input"));

$etiqueta->name = $data->name;

if ( $etiqueta->create() ) {
    echo json_encode([
        'mensaje' => 'Etiqueta Created'
    ]);
} else {
    echo json_encode([
        'mensaje' => 'Etiqueta Not Created'
    ]);
}