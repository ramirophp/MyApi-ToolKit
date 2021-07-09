<?php

require_once('./Respuesta/respuesta.php');

$response = new Respuesta;

//asignamos los recursos que seran permitidos en la api v1.4
$response->setRp([
    'etiquetas' => [
        'paginacion',
        'registros'
    ],
    'atributos' => [
        'paginacion',
        'registros'
    ],
    'articulos' => [
        'paginacion',
        'registros'
    ],
    'categorias' => [
        'paginacion',
        'registros'
    ]
]);

//creamos la url en base ala uri que ingrese el usuario
$response->setUrl();

$response->response($response->getUrl());