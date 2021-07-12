<?php 

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once './Configuracion/Conectar.php';
include_once './Recursos/Categorias.php';
require_once './Configuracion/Paginacion.php';

$database = new Conectar;
$db = $database->conectar();

$category = new Categorias ($db);

$result = $category->paginacion($inicia_desde,$articulos_por_pagina)['categorias'];
$paginas_en_total = $category->paginacion($inicia_desde,$articulos_por_pagina)['paginas_en_total'];
$registros_en_total = $category->paginacion($inicia_desde,$articulos_por_pagina)['registrosEnTotal'];


$num = $result->rowCount();

if ( $num > 0 ) {

    $category_arr = [];
    $category_arr['data'] = [];

    while ( $row = $result->fetch(PDO::FETCH_ASSOC) ) {

        extract ($row);

        $category_item = [
            'id' => $id,
            'name' => $name
        ];

        array_push ( $category_arr['data'], $category_item );

    }

    echo json_encode ([
        'categorias' => $category_arr,
        'paginaActual' => $int,
        'inicia_desde' => $inicia_desde,
        'categorias_por_pagina' => $articulos_por_pagina,
        'paginas_en_total' => $paginas_en_total,
        'registros_encontrados' => $registros_en_total
    ]);

} else {

    echo json_encode ([
        'respuesta' => 'No hay Categorias para mostrar'
    ]);

}