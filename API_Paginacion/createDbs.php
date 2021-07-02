<?php

$llenarTablas = false;

$link = mysqli_connect('localhost', 'root', '');
if (!$link) {
    echo json_encode(['Could not connect: ' => mysqli_error()]);
}
$db_selected = mysqli_select_db($link,'futuredeveloper');
if (!$db_selected) {
    $sql = 'CREATE DATABASE futuredeveloper';
    if (mysqli_query($link,$sql)) {
        /**
         * aqui puedo checar si las tablas 
         * existen o no y si no existen que se
         * creen
         */
        $db_selected = mysqli_select_db($link,'futuredeveloper');
        $query = "SELECT id FROM tags";
        /**
         * con las lineas anteriores
         * primero selecciono la base de datos
         * que acabo de crear despues creo 
         * el query, a continuacion
         * verifico si he obtenido 
         * resultados de la consulta sino
         * creo la tabla
         */
        $result = mysqli_query($link, $query);
        if(empty($result)) {
            $query = "CREATE TABLE tags (
            id int(11) AUTO_INCREMENT,
            name varchar(25) NOT NULL UNIQUE,
            PRIMARY KEY  (id)
            )";
            mysqli_query($link, $query);
        }
        /**
         * hago el mismo proceso pero para la tabla
         * de los atributos
         */
        $query = "SELECT id FROM attrs";
        $result = mysqli_query($link, $query);
        if(empty($result)) {
            $query = "CREATE TABLE attrs (
            id int(11) AUTO_INCREMENT,
            name varchar(25) NOT NULL UNIQUE,
            PRIMARY KEY  (id)
            )";
            mysqli_query($link, $query);
        }

        /**
         * igual para la tabla users
         */

        $query = "SELECT id FROM users";
        $result = mysqli_query($link, $query);
        if(empty($result)) {
            $query = "CREATE TABLE users (
            id int(11) AUTO_INCREMENT,
            fullname varchar(50) NOT NULL,
            username varchar(50) NOT NULL UNIQUE,
            password varchar(200) NOT NULL,
            PRIMARY KEY  (id)
            )";
            mysqli_query($link, $query);
        }
        $llenarTablas = true;
    } else {
        echo json_encode(['Error creating database: ' => mysqli_error()]);
    }
}
mysqli_close($link);