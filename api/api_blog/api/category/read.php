<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/DataBase.php';
include_once '../../models/Category.php';

$database = new DataBase;
$db = $database->connect();

$category = new Category ($db);

$result = $category->read();

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

    echo json_encode ($category_arr);

} else {

    echo json_encode ([
        'mensaje' => 'No hay Categorias para mostrar'
    ]);

}