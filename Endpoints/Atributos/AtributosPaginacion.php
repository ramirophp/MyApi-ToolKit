<?php 

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once './Configuracion/Conectar.php';
include_once './Recursos/Atributos.php';
require_once './Configuracion/Paginacion.php';

$database = new Conectar;
$db = $database->conectar();

$atributo = new Atributos ($db);

$result = $atributo->paginacion($inicia_desde,$articulos_por_pagina)['atributos'];
$paginas_en_total = $atributo->paginacion($inicia_desde,$articulos_por_pagina)['paginas_en_total'];
$registros_en_total = $atributo->paginacion($inicia_desde,$articulos_por_pagina)['registrosEnTotal'];


$num = $result->rowCount();

if ( $num > 0 ) {

    $atributo_arr = [];
    $atributo_arr['data'] = [];

    while ( $row = $result->fetch(PDO::FETCH_ASSOC) ) {

        extract ($row);

        $atributo_item = [
            'id' => $id,
            'name' => $name
        ];

        array_push ( $atributo_arr['data'], $atributo_item );

    }

    echo json_encode ([
        'atributos' => $atributo_arr,
        'paginaActual' => $int,
        'inicia_desde' => $inicia_desde,
        'etiquetas_por_pagina' => $articulos_por_pagina,
        'paginas_en_total' => $paginas_en_total,
        'registros_encontrados' => $registros_en_total
    ]);

} else {

    echo json_encode ([
        'respuesta' => 'No hay Atributos para mostrar'
    ]);

}