<?php

require_once './Etiquetas/Html.php';

html([
    'head' => [],
    'body' => [
        div("hello world.",['class' => 'myDiv']),
        script()
    ]
],[
    'html' => [],
    'body' => [],
    'js' => true,
    'on' => true
]);