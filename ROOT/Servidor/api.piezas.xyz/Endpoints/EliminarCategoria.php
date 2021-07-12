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

if ( $category->delete() ) {
    echo json_encode([
        'mensaje' => 'Category Deleted'
    ]);
} else {
    echo json_encode([
        'mensaje' => 'Category Not Deleted'
    ]);
}