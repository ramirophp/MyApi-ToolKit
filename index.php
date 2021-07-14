<?php #error_reporting(0);

require_once('./Respuesta/Respuesta.php');
require_once('./Configuracion/Permitir.php');

$response = new Respuesta;

//asignamos los recursos que seran permitidos en la api v1.4
$response->setRp($rp);

//creamos la url en base ala uri que ingrese el usuario
$response->setUrl();

$response->response($response->getUrl());