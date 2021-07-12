<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

include_once './Configuracion/Conectar.php';
include_once './Recursos/Atributos.php';

$database = new Conectar;
$db = $database->conectar();

$atributo = new Atributos ($db);

$data = json_decode(file_get_contents("php://input"));

$atributo->name = $data->name;

if ( $atributo->create() ) {
    echo json_encode([
        'mensaje' => 'Atributo Created'
    ]);
} else {
    echo json_encode([
        'mensaje' => 'Atributo Not Created'
    ]);
}