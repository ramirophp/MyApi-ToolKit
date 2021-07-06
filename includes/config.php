<?php

$user = 'root';
$pass = '';
$name = 'piezas';

$conectar = new PDO('mysql:host=localhost;dbname='.$name.'charset=utf-8',$user,$pass);