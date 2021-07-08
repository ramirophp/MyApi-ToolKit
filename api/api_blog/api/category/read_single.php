<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/DataBase.php';
include_once '../../models/Category.php';

$database = new DataBase;
$db = $database->connect();

$category = new Category ($db);

$category->id = isset($_GET['id']) ? $_GET['id'] : die('id not found');

$category->read_single();

$category_arr = [
    'id' => $category->id,
    'name' => $category->name
];

print_r(json_encode($category_arr));