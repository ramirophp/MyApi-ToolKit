<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/DataBase.php';
include_once '../../models/Post.php';

$database = new DataBase;
$db = $database->connect();

$post = new Post ($db);

$post->id = isset($_GET['id']) ? $_GET['id'] : die('id not found');

$post->read_single();

$post_arr = [
    'id' => $post->id,
    'title' => $post->title,
    'body' => $post->body,
    'author' => $post->author,
    'category_id' => $post->category_id,
    'category_name' => $post->category_name
];

print_r(json_encode($post_arr));