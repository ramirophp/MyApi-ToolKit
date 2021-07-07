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
            h1('ETIQUETAS HTML COMO FUNCIONES EN PHP (html tags as php functions)'),
            h2('Api urls'),
            ul([
                li(a('api v1',['href'=>'./info.php'])),
                li(a('pdo course',['href'=>'./pdoCourse.php'])),
                li(a('seguridad',['href'=>'./seguridad.php'])),
                li('Cursos relacionados :'),
                ul([
                    li(a('ToolKit Version anterior PART 1:',[
                        'href'=>'https://www.udemy.com/course/php-construyendo-mi-primer-caja-de-herramientas-part-1/'
                    ])),
                    li(a('ToolKit Version anterior PART 2:',[
                        'href'=>'https://www.udemy.com/course/curso-de-php-construyendo-mi-primer-caja-de-herramientas/'
                    ])),
                    li(a('ToolKit Version anterior PART 3:',[
                        'href'=>'https://www.udemy.com/course/php-construyendo-mi-primer-caja-de-herramientas-part-3/'
                    ])),
                    li(a('ToolKit Version anterior PART 4:',[
                        'href'=>'https://www.udemy.com/course/php-construyendo-mi-primer-caja-de-herramientas-part-4/'
                    ]))
                ]),
                li('Repositorios relacionados :'),
                ul([
                    li('Versiones 0 : '),
                    ul([
                        li(a('01',[
                            'href' => 'https://github.com/rgg7888/SEH'
                        ])),
                        li(a('02',[
                            'href' => 'https://github.com/rgg7888/htmlTags'
                        ]))
                    ]),
                    li(a('Latest Versions',[
                        'href' => 'https://github.com/ramirophp/MyApi-ToolKit'
                    ]))
                ])
            ])
        ]),
        main([
            h2('Argumentos por funcion del tipo apertura y cierre'),
            ol([
                li('$in string|array'),
                li('$set array asociativo')
            ]),
            h3('Estructura de $in'),
            pre('
            $in puede ser $in = ""; o $in = \'\';
            o tambien $in = [\'\',"",\'etc...\'];
            solo dos niveles de arrays asi :
            [[\'string\'],\'string\',[\'string\']]
            tres niveles ya no sera procesado por ejemplo:
            [\'string\',[\'string\',[\'array\']]]
            el tercer array se mostrara como Array
            '),
            h3('Estructura de $set'),
            pre('
            $set = [
                \'js\' => false,
                \'attrs\' => [
                    \'key\' => \'value\'
                ]
            ];
            '),
            h3('$set Para etiquetas self closing'),
            pre('
            $set = [
                \'key\' => \'value\'
            ];
            '),
            h2('Funciones auto imprimibles'),
            ol([
                li('doctype();'),
                li('html();')
            ]),
            h2('Funciones sin argumentos'),
            ol([
                li('doctype();'),
                li('hr();'),
                li('br();')
            ]),
            h2('Prototipos'),
            ol([
                li('functionName (string|array $in, array $set);'),
                li('functionName (array $set);'),
                li('functionName ();')
            ])
        ]),
        hr(),
        require_once './includes/ftr.php'
    ])
],[
    'lang' => 'es'
]);