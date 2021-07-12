<?php

require_once './Etiquetas/Html.php';

html([
    'head' => [],
    'body' => [
        div("hello world.",['class' => 'myDiv']),
        script()
    ]
],[
    'html' => ['lang' => 'es'],
    'body' => ['class' => 'container'],
    'js' => true,
    'on' => true
]);