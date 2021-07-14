<?php

require_once '../Etiquetas/Core/Html.php';

html([
    'head' => [
        title('Chrome Extension'),
        _link([
            'rel' => 'stylesheet',
            'type' => 'text/css',
            'href' => '../Etiquetas/Piezas/Extension/chrome.css'
        ])
    ],
    'body' => [
        input([
            'type' => 'text',
            'id' => 'input-el'
        ]),
        button('SAVE INPUT',['id' => 'input-btn']),
        ul(null,['id' => 'ul-el']),
        script(null,['src' => '../Etiquetas/Piezas/Extension/chrome.js'])
    ]
],[
    'html' => ['lang' => 'en'],
    'body' => [],
    'js' => true,
    'on' => true
],['make'=>true,'file'=>'../Etiquetas/Piezas/Extension/index.html']);