<?php

require_once './Etiquetas/Core/Html.php';

html([
    'head' => [
        _link([
            'rel' => 'stylesheet',
            'type' => 'text/css',
            'href' => './Etiquetas/Piezas/Slideshow/Slideshow.css'
        ])
    ],
    'body' => [
        require_once('./Etiquetas/Piezas/Slideshow/Slideshow.php'),
        script(null,['src' => './index.js'])
    ]
],[
    'html' => ['lang' => 'es'],
    'body' => ['class' => 'container'],
    'js' => true,
    'on' => true
]);