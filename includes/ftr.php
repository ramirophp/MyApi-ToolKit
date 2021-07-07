<?php

return footer([
    h2('LICENSE'),
    div([
        div(
            a(img([
                'alt' => 'Creative Commons License',
                'style' => 'border-width:0',
                'src' => 'https://i.creativecommons.org/l/by-nc-nd/4.0/80x15.png'
            ]),[
                    'rel' => 'license',
                    'href' => 'http://creativecommons.org/licenses/by-nc-nd/4.0/'
            ])
        ),
        div([
            h6('This work is licensed under a'),
            a('Creative Commons Attribution-NonCommercial-NoDerivatives 4.0 International License',[
                'rel' => 'license',
                'href' => 'http://creativecommons.org/licenses/by-nc-nd/4.0/'
            ])
        ])
    ])
]);