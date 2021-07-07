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
                li(a('api v1',['attrs'=>['href'=>'./info.php']])),
                li(a('pdo course',['attrs'=>['href'=>'./pdoCourse.php']])),
                li(a('seguridad',['attrs'=>['href'=>'./seguridad.php']])),
                li(a('aprender m&aacute;s',['attrs'=>[
                    'href'=>'https://www.udemy.com/course/curso-de-php-construyendo-mi-primer-caja-de-herramientas/'
                ]]))
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
        require_once './includes/ftr.php'
    ])
],[
    'js' => false,
    'attrs' => [
        'lang' => 'es'
    ]
]);