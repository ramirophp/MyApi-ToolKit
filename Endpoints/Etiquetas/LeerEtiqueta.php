<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once './Configuracion/Conectar.php';
include_once './Recursos/Etiquetas.php';

$database = new Conectar;
$db = $database->conectar();

$etiqueta = new Etiquetas ($db);

$etiqueta->id = isset($_GET['id']) ? $_GET['id'] : die('id not found');

$etiqueta->read_single();

if ($etiqueta->id == null) {
    echo json_encode([
        'respuesta' => 'La etiqueta no existe'
    ]);
} else {

    $etiqueta_arr = [
        'id' => $etiqueta->id,
        'name' => $etiqueta->name
    ];
    
    print_r(json_encode($etiqueta_arr));

}