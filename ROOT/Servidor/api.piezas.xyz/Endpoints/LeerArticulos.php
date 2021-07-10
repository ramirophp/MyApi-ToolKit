<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once './Configuracion/Conectar.php';
include_once './Recursos/Articulos.php';

$database = new Conectar;
$db = $database->conectar();

$post = new Articulos ($db);

$result = $post->read();

$num = $result->rowCount();

if ( $num > 0 ) {

    $posts_arr = [];
    $posts_arr['data'] = [];

    while ( $row = $result->fetch(PDO::FETCH_ASSOC) ) {

        extract ($row);

        $post_item = [
            'id' => $id,
            'title' => $title,
            'body' => html_entity_decode ($body),
            'author' => $author,
            'category_id' => $category_id,
            'category_name' => $category_name
        ];

        array_push ( $posts_arr['data'], $post_item );

    }

    echo json_encode ($posts_arr);

} else {

    echo json_encode ([
        'mensaje' => 'No hay Posts'
    ]);

}