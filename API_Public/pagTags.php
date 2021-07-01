<?php

require_once '../API_Build/Html.php';
require_once '../API_Build/Tags.php';

doctype();
html([
    head([
        linx([
            'rel' => 'shorcut icon',
            'type' => 'image/png',
            'href' => './assets/favicon.png'
        ]),
        linx([
            'rel' => 'stylesheet',
            'type' => 'text/css',
            'href' => '../API_View/loader.css'
        ]),
        title("Paginacion AJAX")
    ]),
    body([
        ul(
            li(a("home",[
                'attrs' => [
                    'href' => './index.php'
                ]
            ]))
        ),
        h2("Html Tags"),
        section([
            div(null,[
                'attrs' => [
                    'id' => 'pagControls'
                ]
            ]), 
            div(null,[
                'attrs' => [
                    'id' => 'resultBox'
                ]
            ]), 
            div(null,[
                'attrs' => [
                    'id' => 'loader'
                ]
            ])
        ],[
            'attrs' => [
                'class' => 'paginacion'
            ]
        ]),
        script(null,[
            'attrs' => [
                'src' => '../API_View/request_page.js',
            ]
        ]),
        script("request_page('tags',1);")
    ],[
        'js' => true
    ])
],[
    'js' => true,
    'attrs' => [
        'lang' => 'es'
    ]
]);

/*
<!DOCTYPE html>
<html>
    <head>
        <script src="../API_View/request_page.js"></script>
        <link rel="shortcut icon" type="image/png" href="./assets/favicon.png"/>
        <link rel="stylesheet" type="text/css" href="../API_View/loader.css">
        <title>Paginacion AJAX</title>
    </head>
    <body>

        <ul>
            <li><a href="./index.php">home</a></li>
        </ul>

        <h2>Html Tags</h2>

        <section class="paginacion">
            <div id="pagControls"></div>
            <div id="resultBox"></div>
            <div id="loader"></div>
        </section>
     
        <script>request_page('tags',1);</script>
    </body>
</html>
*/