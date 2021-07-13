<?php

require_once '../Etiquetas/Core/Html.php';

html([
    'head' => [
        title('passenger counter'),
    ],
    'body' => [
        h1('People entered:'),
        h2('0',['id' => 'count-el']),
        button('increment',['id' => 'increment-btn', 'onclick' => 'increment();']),
        button('save',['id' => 'save-btn', 'onclick' => 'save();']),
        p('Previous entries: ',['id' => 'save-el']),
        script(null,['src' => '../Etiquetas/Piezas/Contador/counter.js'])
    ]
],[
    'html' => ['lang' => 'en'],
    'body' => [],
    'js' => true,
    'on' => true
]);