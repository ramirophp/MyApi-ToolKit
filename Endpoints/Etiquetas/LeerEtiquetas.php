<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once './Configuracion/Conectar.php';
include_once './Recursos/Etiquetas.php';

$database = new Conectar;
$db = $database->conectar();

$etiqueta = new Etiquetas ($db);

$result = $etiqueta->read();

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

    echo json_encode ($etiqueta_arr);

} else {

    echo json_encode ([
        'respuesta' => 'No hay Categorias para mostrar'
    ]);

}