<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once './Configuracion/Conectar.php';
include_once './Recursos/Atributos.php';

$database = new Conectar;
$db = $database->conectar();

$atributo = new Atributos ($db);

$atributo->id = isset($_GET['id']) ? $_GET['id'] : die('id not found');

$atributo->read_single();

if ($atributo->id == null) {
    echo json_encode([
        'respuesta' => 'La etiqueta no existe'
    ]);
} else {

    $atributo_arr = [
        'id' => $atributo->id,
        'name' => $atributo->name
    ];
    
    print_r(json_encode($atributo_arr));

}