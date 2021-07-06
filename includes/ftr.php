<?php

return footer([
    pre("
        Esta licensia aplica solo para 
        el codigo fuente que genera 
        el html de estas paginas
        pero php como tal es open source y por lo tanto
        la extension pdo tambien y usted puede usar pdo
        en todos sus proyectos php sin ningun problema.
    "),
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
]);