<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once './Configuracion/Conectar.php';
include_once './Recursos/Atributos.php';

$database = new Conectar;
$db = $database->conectar();

$atributo = new Atributos ($db);

$result = $atributo->read();

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

    echo json_encode ($atributo_arr);

} else {

    echo json_encode ([
        'respuesta' => 'No hay Atributos para mostrar'
    ]);

}