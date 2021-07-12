<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

include_once './Configuracion/Conectar.php';
include_once './Recursos/Categorias.php';

$database = new Conectar;
$db = $database->conectar();

$category = new Categorias ($db);

$data = json_decode(file_get_contents("php://input"));

$category->id = $data->id;

$category->name = $data->name;

if ( $category->update() ) {
    echo json_encode([
        'mensaje' => 'Category Updated'
    ]);
} else {
    echo json_encode([
        'mensaje' => 'Category Not Updated'
    ]);
}