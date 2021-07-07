<?php
require_once './ht/all.php';
doctype();
html([
    head([
        title('MyApi-ToolKit')
    ]),
    body([
        headxr([
            h1('Seguridad'),
            ul(li(a('home',['attrs'=>['href'=>'./']])))
        ]),
        main([
            section([
                div([
                    h2('ATAQUE XSS'),
                    h3('CROSS SITE SCRIPTING'),
                    p([
                        "XSS ocurre cuando un atacante es capaz de inyectar un script",br(),
                        "normalmente javascript, en el output de una aplicaci&oacute;n web de",br(),
                        "forma que se ejecuta en el navegador del cliente. Los ataques se $br",
                        "producen principalmente por validar incorrectamente datos de usuario, $br",
                        "y se suelen inyectar mediante un formulario web o mediante un enlace alterado."
                    ])
                ])
            ])
        ]),
        require_once './includes/ftr.php'
    ],['js' => true])
],[
    'attrs' => [
        'lang' => 'es'
    ]
]);