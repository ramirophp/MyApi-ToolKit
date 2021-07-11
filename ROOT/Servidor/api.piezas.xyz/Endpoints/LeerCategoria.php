<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once './Configuracion/Conectar.php';
include_once './Recursos/Categorias.php';

$database = new Conectar;
$db = $database->conectar();

$category = new Categorias ($db);

$category->id = isset($_GET['id']) ? $_GET['id'] : die('id not found');

$category->read_single();

if ($category->id == null) {
    echo json_encode([
        'respuesta' => 'La categoria no existe'
    ]);
} else {

    $category_arr = [
        'id' => $category->id,
        'name' => $category->name
    ];
    
    print_r(json_encode($category_arr));

}