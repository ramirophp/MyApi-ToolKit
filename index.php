<?php

require_once './Etiquetas/Core/Html.php';

html([
    'head' => [
        _link([
            'rel' => 'stylesheet',
            'type' => 'text/css',
            'href' => './Etiquetas/Piezas/Slideshow/Slideshow.css'
        ]),
        meta_tags('Free Base Code',[
            'PHP','HTML','CSS','JAVASCRIPT'
        ],'Ramiro Garcia Gonzalez')
    ],
    'body' => [
        hr(),
        section([
            button('GET Data xhr',['id' => 'get-btn']),
            button('POST Data xhr',['id' => 'post-btn']),
            hr(),
            button('GET Data fetch',['id' => 'get-btn-fetch']),
            button('POST Data fetch',['id' => 'post-btn-fetch']),
            hr(),
            button('GET Data axios',['id' => 'get-btn-axios']),
            button('POST Data axios',['id' => 'post-btn-axios'])
        ],['id' => 'control-center']),
        hr(),
        div([
            h2(span('API URLS')),
            br(),
            div([
                div([
                    h2(span('Articulos')),
                    br(),
                    h2(span('Para Get')),
                    br(),
                    "https://api.piezas.xyz/ceerr.php/articulos/registros",
                    br(),
                    "https://api.piezas.xyz/ceerr.php/articulos/registros/#id(1-n) <--- replace it with the number",
                    br(),
                    "https://api.piezas.xyz/ceerr.php/articulos/paginacion/#page(1-n) <--- replace it with the number",
                    div([
                        h2(span("Para Post")),
                        br(),
                        h2("Envie un json de esta forma :"),
                        pre('
                        {
                            "title":"your title",
                            "body":"content",
                            "author":"your author",
                            "category_id":"the id of the category"
                        }
                        '),
                        br(),
                        h2(span('A la url :')),
                        br(),
                        "https://api.piezas.xyz/ceerr.php/articulos/registros"
                    ]),
                    div([
                        h2(span("Para Put")),
                        br(),
                        h2("Envie un json de esta forma :"),
                        pre('
                        {
                            "id":"the id",
                            "title":"your title",
                            "body":"content",
                            "author":"your author",
                            "category_id":"the id of the category",
                        }
                        '),
                        br(),
                        h2(span('A la url :')),
                        br(),
                        "https://api.piezas.xyz/ceerr.php/articulos/registros"
                    ]),
                    div([
                        h2(span('Para Delete')),
                        br(),
                        h2("Envie un json de esta forma :"),
                        pre('
                        {
                            "id":"the id"
                        }
                        '),
                        br(),
                        h2(span('A la url :')),
                        br(),
                        "https://api.piezas.xyz/ceerr.php/articulos/registros"
                    ])
                ])
            ]),
            div([
                div([
                    h2(span('Categorias')),
                    br(),
                    h2(span('Para Get')),
                    br(),
                    "https://api.piezas.xyz/ceerr.php/categorias/registros",
                    br(),
                    "https://api.piezas.xyz/ceerr.php/categorias/registros/#id(1-n) <--- replace it with the number",
                    br(),
                    "https://api.piezas.xyz/ceerr.php/categorias/paginacion/#page(1-n) <--- replace it with the number",
                    div([
                        h2(span("Para Post")),
                        br(),
                        h2("Envie un json de esta forma :"),
                        pre('
                        {
                            "name":"your category"
                        }
                        '),
                        br(),
                        h2(span('A la url :')),
                        br(),
                        "https://api.piezas.xyz/ceerr.php/categorias/registros"
                    ]),
                    div([
                        h2(span("Para Put")),
                        br(),
                        h2("Envie un json de esta forma :"),
                        pre('
                        {
                            "id":"the id",
                            "name":"your category update"
                        }
                        '),
                        br(),
                        h2(span('A la url :')),
                        br(),
                        "https://api.piezas.xyz/ceerr.php/categorias/registros"
                    ]),
                    div([
                        h2(span('Para Delete')),
                        br(),
                        h2("Envie un json de esta forma :"),
                        pre('
                        {
                            "id":"the id"
                        }
                        '),
                        br(),
                        h2(span('A la url :')),
                        br(),
                        "https://api.piezas.xyz/ceerr.php/categorias/registros"
                    ])
                ])
            ]),
            div([
                div([
                    h2(span('Etiquetas')),
                    br(),
                    h2(span('Para Get')),
                    br(),
                    "https://api.piezas.xyz/ceerr.php/etiquetas/registros",
                    br(),
                    "https://api.piezas.xyz/ceerr.php/etiquetas/registros/#id(1-n) <--- replace it with the number",
                    br(),
                    "https://api.piezas.xyz/ceerr.php/etiquetas/paginacion/#page(1-n) <--- replace it with the number",
                    div([
                        h2(span("Para Post")),
                        br(),
                        h2("Envie un json de esta forma :"),
                        pre('
                        {
                            "name":"your tag"
                        }
                        '),
                        br(),
                        h2(span('A la url :')),
                        br(),
                        "https://api.piezas.xyz/ceerr.php/etiquetas/registros"
                    ]),
                    div([
                        h2(span("Para Put")),
                        br(),
                        h2("Envie un json de esta forma :"),
                        pre('
                        {
                            "id":"the id",
                            "name":"your tag update"
                        }
                        '),
                        br(),
                        h2(span('A la url :')),
                        br(),
                        "https://api.piezas.xyz/ceerr.php/etiquetas/registros"
                    ]),
                    div([
                        h2(span('Para Delete')),
                        br(),
                        h2("Envie un json de esta forma :"),
                        pre('
                        {
                            "id":"the id"
                        }
                        '),
                        br(),
                        h2(span('A la url :')),
                        br(),
                        "https://api.piezas.xyz/ceerr.php/etiquetas/registros"
                    ])
                ])
            ]),
            div([
                div([
                    h2(span('Atributos')),
                    br(),
                    h2(span('Para Get')),
                    br(),
                    "https://api.piezas.xyz/ceerr.php/atributos/registros",
                    br(),
                    "https://api.piezas.xyz/ceerr.php/atributos/registros/#id(1-n) <--- replace it with the number",
                    br(),
                    "https://api.piezas.xyz/ceerr.php/atributos/paginacion/#page(1-n) <--- replace it with the number",
                    div([
                        h2(span("Para Post")),
                        br(),
                        h2("Envie un json de esta forma :"),
                        pre('
                        {
                            "name":"your attr"
                        }
                        '),
                        br(),
                        h2(span('A la url :')),
                        br(),
                        "https://api.piezas.xyz/ceerr.php/atributos/registros"
                    ]),
                    div([
                        h2(span("Para Put")),
                        br(),
                        h2("Envie un json de esta forma :"),
                        pre('
                        {
                            "id":"the id",
                            "name":"your attr update"
                        }
                        '),
                        br(),
                        h2(span('A la url :')),
                        br(),
                        "https://api.piezas.xyz/ceerr.php/atributos/registros"
                    ]),
                    div([
                        h2(span('Para Delete')),
                        br(),
                        h2("Envie un json de esta forma :"),
                        pre('
                        {
                            "id":"the id"
                        }
                        '),
                        br(),
                        h2(span('A la url :')),
                        br(),
                        "https://api.piezas.xyz/ceerr.php/atributos/registros"
                    ])
                ])
            ])
        ]),
        hr(),
        require_once('./Etiquetas/Piezas/Slideshow/Slideshow.php'),
        script(null,['src' => './Etiquetas/Piezas/Slideshow/Slideshow.js']),
        script(null,['src' => './Etiquetas/Piezas/XMLHttpRequest/xhr.js']),
        script(null,['src' => './Etiquetas/Piezas/XMLHttpRequest/fetch.js']),
        script(null,['src' => 'https://unpkg.com/axios/dist/axios.min.js']),
        script(null,['src' => './Etiquetas/Piezas/XMLHttpRequest/axios.js'])
    ]
],[
    'html' => ['lang' => 'es'],
    'body' => ['class' => 'container'],
    'js' => true,
    'on' => true
]);