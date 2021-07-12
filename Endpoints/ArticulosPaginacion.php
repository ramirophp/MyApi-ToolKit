<?php 

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once './Configuracion/Conectar.php';
include_once './Recursos/Articulos.php';
require_once './Configuracion/Paginacion.php';

$database = new Conectar;
$db = $database->conectar();

$post = new Articulos ($db);

$result = $post->paginacion($inicia_desde,$articulos_por_pagina)['posts'];
$paginas_en_total = $post->paginacion($inicia_desde,$articulos_por_pagina)['paginas_en_total'];
$registros_en_total = $post->paginacion($inicia_desde,$articulos_por_pagina)['registrosEnTotal'];


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

    echo json_encode ([
        'articulos' => $posts_arr,
        'paginaActual' => $int,
        'inicia_desde' => $inicia_desde,
        'articulos_por_pagina' => $articulos_por_pagina,
        'paginas_en_total' => $paginas_en_total,
        'registros_encontrados' => $registros_en_total
    ]);

} else {

    echo json_encode ([
        'mensaje' => 'No hay Posts'
    ]);

}