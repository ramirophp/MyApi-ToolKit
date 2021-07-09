<?php

require_once('./Respuesta/respuesta.php');
require_once('./configuracion/RecursosPermitidos.php');

$response = new Respuesta;

//asignamos los recursos que seran permitidos en la api v1.4
$response->setRp($rp);

//creamos la url en base ala uri que ingrese el usuario
$response->setUrl();

$response->response($response->getUrl());