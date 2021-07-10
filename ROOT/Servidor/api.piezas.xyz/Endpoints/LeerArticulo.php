<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once './Configuracion/Conectar.php';
include_once './Recursos/Articulos.php';

$database = new Conectar;
$db = $database->conectar();

$post = new Articulos ($db);

$post->id = isset($_GET['id']) ? $_GET['id'] : die('id not found');

$post->read_single();

if ($post->title == null) {

    echo json_encode([
        'respuesta' => 'No existe el Articulo'
    ]);
    
} else {

    $post_arr = [
        'id' => $post->id,
        'title' => $post->title,
        'body' => $post->body,
        'author' => $post->author,
        'category_id' => $post->category_id,
        'category_name' => $post->category_name
    ];
    
    print_r(json_encode($post_arr));

}