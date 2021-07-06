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
            h2('Api home'),
            ul(li(a('api v1',['attrs'=>['href'=>'./index.php']])))
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
        footer([
            h2('LICENSE'),
            div([
                div(
                    a(img([
                        'alt' => 'Creative Commons License',
                        'style' => 'border-width:0',
                        'src' => 'https://i.creativecommons.org/l/by-nc-nd/4.0/80x15.png'
                    ]),[
                        'attrs' => [
                            'rel' => 'license',
                            'href' => 'http://creativecommons.org/licenses/by-nc-nd/4.0/'
                        ]
                    ])
                ),
                div([
                    h6('This work is licensed under a'),
                    a('Creative Commons Attribution-NonCommercial-NoDerivatives 4.0 International License',[
                        'attrs' => [
                            'rel' => 'license',
                            'href' => 'http://creativecommons.org/licenses/by-nc-nd/4.0/'
                        ]
                    ])
                ])
            ])
        ])
    ])
],[
    'js' => false,
    'attrs' => [
        'lang' => 'es'
    ]
]);