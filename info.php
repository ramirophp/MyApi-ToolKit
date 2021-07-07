<?php
require_once('./ht/Html.php');
require_once('./ht/Tags.php');
doctype();
html([
    head([
        title('MyApi-ToolKit')
    ]),
    body([
        headxr([
            h1('Api urls - EndPoints'),
            ul(li(a('home',['href'=>'./'])))
        ]),
        main([
            h3('Lista de etiquetas e informacion adicional
            Dividida Por paginas (page 1-n)'),

            h4('http://localhost/api/v1.php/tags/1'),

            h3('Lista de Atributos e informacion adicional
            Dividida Por paginas (page 1-n)'),

            h4('http://localhost/api/v1.php/attrs/1'),

            h3('Lista de etiquetas'),

            h4('http://localhost/api/v1.php/tag'),

            h3('Obtener una etiqueta por id (1-n)'),

            h4('http://localhost/api/v1.php/tag/1'),

            h3('Lista de atributos'),

            h4('http://localhost/api/v1.php/attr'),

            h3('Obtener un atributo por id (1-n)'),

            h4('http://localhost/api/v1.php/attr/1')
        ]),
        hr(),
        require_once './includes/ftr.php'
    ])
],[
    'lang' => 'es'
]);