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
            h1('PDO Crash Course'),
            h2('Api urls'),
            ul([
                li(a('home',['attrs'=>[
                    'href'=>'./index.php'
                ]])),
                li(a('api v1',['attrs'=>['href'=>'./info.php']]))
            ])
        ]),
        main([
            
        ]),
        require_once './includes/ftr.php'
    ])
],[
    'js' => false,
    'attrs' => [
        'lang' => 'es'
    ]
]);