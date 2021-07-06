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
    ])
],[
    'js' => false,
    'attrs' => [
        'lang' => 'es'
    ]
]);