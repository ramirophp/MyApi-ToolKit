<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

include_once './Configuracion/Conectar.php';
include_once './Recursos/Atributos.php';

$database = new Conectar;
$db = $database->conectar();

$atributo = new Atributos ($db);

$data = json_decode(file_get_contents("php://input"));

$atributo->id = $data->id;

if ( $atributo->delete() ) {
    echo json_encode([
        'mensaje' => 'Atributo Deleted'
    ]);
} else {
    echo json_encode([
        'mensaje' => 'Atributo Not Deleted'
    ]);
}