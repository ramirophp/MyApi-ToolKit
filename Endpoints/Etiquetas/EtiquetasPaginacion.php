<?php 

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once './Configuracion/Conectar.php';
include_once './Recursos/Etiquetas.php';
require_once './Configuracion/Paginacion.php';

$database = new Conectar;
$db = $database->conectar();

$etiqueta = new Etiquetas ($db);

$result = $etiqueta->paginacion($inicia_desde,$articulos_por_pagina)['etiquetas'];
$paginas_en_total = $etiqueta->paginacion($inicia_desde,$articulos_por_pagina)['paginas_en_total'];
$registros_en_total = $etiqueta->paginacion($inicia_desde,$articulos_por_pagina)['registrosEnTotal'];


$num = $result->rowCount();

if ( $num > 0 ) {

    $etiqueta_arr = [];
    $etiqueta_arr['data'] = [];

    while ( $row = $result->fetch(PDO::FETCH_ASSOC) ) {

        extract ($row);

        $etiqueta_item = [
            'id' => $id,
            'name' => $name
        ];

        array_push ( $etiqueta_arr['data'], $etiqueta_item );

    }

    echo json_encode ([
        'etiquetas' => $etiqueta_arr,
        'paginaActual' => $int,
        'inicia_desde' => $inicia_desde,
        'etiquetas_por_pagina' => $articulos_por_pagina,
        'paginas_en_total' => $paginas_en_total,
        'registros_encontrados' => $registros_en_total
    ]);

} else {

    echo json_encode ([
        'respuesta' => 'No hay Etiquetas para mostrar'
    ]);

}