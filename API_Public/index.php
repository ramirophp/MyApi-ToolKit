<?php session_start();

if (!isset($_SESSION['user'])) {
    header('Location: ../API_Login/logIn.php');
}

    require_once '../API_Build/Html.php';
    require_once '../API_Build/Tags.php';

doctype();
html([
    head([
        linx([
            'rel' => 'shortcut icon',
            'type' => 'image/png',
            'href' => './assets/favicon.png'
        ]),
        linx([
            'rel' => 'stylesheet',
            'type' => 'text/css',
            'href' => '../API_View/index.css'
        ]),
        title("API REST")
    ]),
    body([
        h1("Future Developer",[
            'attrs' => [
                'id' => 'up'
            ]
        ]),
        headxr(
            ul([
                li(a("Tags html pagination API test",[
                    'attrs' => [
                        'href' => './pagTags.php'
                    ]
                ])),
                li(a("Attributes html pagination API test",[
                    'attrs' => [
                        'href' => './pagAttrs.php'
                    ]
                ])),
                li(a("add tags",[
                    'attrs' => [
                        'href' => './addTags.php'
                    ]
                ])),
                li(a("add attrs",[
                    'attrs' => [
                        'href' => './addAttrs.php'
                    ]
                ])),
                li(a("Create SomeThing",[
                    'attrs' => [
                        'href' => './APIHtml.php'
                    ]
                ])),
                li(a("LogOut",[
                    'attrs' => [
                        'href' => './close.php'
                    ]
                ]))
            ])
        ),
        main([
            h2("Como Funciona Esta API ?"),
            p([
                b("Nota*"),br(),
                "para obtener informacion sobre total de registros",br(),
                "utiliza la peticion tipo paginacion."
            ],[
                'attrs' => [
                    'class' => 'firstP'
                ]
            ]),

            section([
                h2("Request Tipo paginacion"),
                p([
                    "Para crear Una paginacion con los datos disponibles de las etiquetas html :",
                    br(),
                    h6("Inicie desde la pagina 1 para evitar mensajes 404 como respuesta"),
                    h5([
                        "http://localhost/API_Paginacion/routerSrvPg.php/tags/1",
                        a("Test it",['attrs'=>[
                            'href' => 'http://localhost/API_Paginacion/routerSrvPg.php/tags/1'
                        ]])
                    ])
                ]),
                p([
                    "Para crear Una paginacion con los datos disponibles de los atributos de etiquetas html :",
                    br(),
                    h6("Inicie desde la pagina 1 para evitar mensajes 404 como respuesta"),
                    h5([
                        "http://localhost/API_Paginacion/routerSrvPg.php/attrs/1",
                        a("Test it",['attrs'=>[
                            'href' => 'http://localhost/API_Paginacion/routerSrvPg.php/attrs/1'
                        ]])
                    ])
                ])
            ]),

            section([
                h2("Request a Recursos forma Tradicional"),
                p([
                    "Para Obtener todos los datos disponibles de las etiquetas html :",
                    br(),
                    h6("Cambie el recurso a tag"),
                    h5([
                        "http://localhost/API_Paginacion/routerSrvPg.php/tag",
                        a("Test it",[
                            'attrs' => [
                                'href' => 'http://localhost/API_Paginacion/routerSrvPg.php/tag'
                            ]
                        ])
                    ]),
                    h6("Si quiere obtener un registro en particular agregue el id"),
                    h5([
                        "http://localhost/API_Paginacion/routerSrvPg.php/tag/1", 
                        a("Test it",[
                            'attrs' => [
                                'href' => 'http://localhost/API_Paginacion/routerSrvPg.php/tag/1'
                            ]
                        ])
                    ])
                ]),
                p([
                    "Para Obtener todos los datos disponibles de los atributos de etiquetas html :",br(),
                    h6("Cambie el recurso a attr"),
                    h5(["http://localhost/API_Paginacion/routerSrvPg.php/attr", 
                        a("Test it",[
                            'attrs' => [
                                'href' => 'http://localhost/API_Paginacion/routerSrvPg.php/attr'
                            ]
                        ])
                    ]),
                    h6("Si quiere obtener un registro en particular agregue el id"),
                    h5([
                        "http://localhost/API_Paginacion/routerSrvPg.php/attr/1",
                        a("Test it",[
                            'attrs' => [
                                'href' => 'http://localhost/API_Paginacion/routerSrvPg.php/attr/1'
                            ]
                        ])
                    ])
                ])
            ]),

            section([
                h2("Request Tipo POST"),
                p([
                    "Peticiones post se hacen a traves",
                    "de las url con final tag o attr respectivamente.",
                    br(),br(),
                    "Utiliza los formularios addTag o addAttr segun lo", 
                    "necesite, tenga en cuenta que las tags y atributos", 
                    "que agregue aqui estaran disponibles para la API_Build", 
                    "de esta caja de herramientas, esto para que pueda", 
                    "agregar sus web components a la lista de tags validas."
                ])
            ]),

            section([
                h5([
                    "Aprenda a crear una caja de herramientas base aqui :",
                    a("Click",[
                        'attrs' => [
                            'href' => 'https://www.udemy.com/course/curso-de-php-construyendo-mi-primer-caja-de-herramientas/'
                        ]
                    ])
                ]),

                h2("How To"),

                section(
                    video(null,[
                        'attrs' => [
                            'src' => "./assets/howTo.mp4",
                            'width' => "100%",
                            '!' => 'controls autoplay loop'
                        ]
                    ])
                )
            ])
            
        ]),
        footer([
            "WELCOME TO &copy;  My Web Site",
            a(i(null,[
                'attrs' => [
                    'class' => 'fas fa-arrow-circle-up upIcon'
                ]
            ]),['attrs'=>[
                'href' => '#up'
            ]]),
            a('Back',[
                'attrs' => [
                    'href' => 'http://localhost',
                    'class' => 'back'
                ]
            ])
        ]),
        script(null,[
            'attrs' => [
                'src' => 'https://kit.fontawesome.com/60163d706b.js',
                '!' => 'defer',
                'crossorigin' => 'anonymous'
            ]
        ])
    ],['js'=>true])
],[
    'attrs' => [
        'lang' => 'es'
    ],
    'js' => true
]);

/* HTML CODE WITHOUT USING THE API_Build
<html>
    <head>
        <link rel="shortcut icon" type="image/png" href="./assets/favicon.png"/>
        <link rel="stylesheet" type="text/css" href="../API_View/index.css">
        <title>API REST</title>
    </head>
    <body>
        <h2 id="up">future developer</h2>

        <header>
            <ul>
                <li><a href="./pagTags.html">Tags html pagination API test</a></li>
                <li><a href="./pagAttrs.html">Attributes html pagination API test</a></li>
                <li><a href="./addTags.html">add tags</a></li>
                <li><a href="./addAttrs.html">add attrs</a></li>
                <li><a href="./APIHtml.php">Create SomeThing</a></li>
            </ul>
        </header>

        <main>
            <h1>Como funciona esta api ?</h1>
           
            <p>
                Para crear Una paginacion con los datos disponibles de las etiquetas html :<br>
                <h6>Inicie desde la pagina 1 para evitar mensajes 404 como respuesta</h6>
                <h5>http://localhost/API_Paginacion/routerSrvPg.php/tags/1 
                <a href="http://localhost/API_Paginacion/routerSrvPg.php/tags/1">Test it</a>
                </h5>
            </p>

            <p>
                Para crear Una paginacion con los datos disponibles de los atributos de etiquetas html :<br>
                <h6>Inicie desde la pagina 1 para evitar mensajes 404 como respuesta</h6>
                <h5>http://localhost/API_Paginacion/routerSrvPg.php/attrs/1 
                    <a href="http://localhost/API_Paginacion/routerSrvPg.php/attrs/1">Test it</a>
                </h5>
            </p>

            <p>
                Para Obtener todos los datos disponibles de las etiquetas html :<br>
                <h6>Cambie el recurso a tag</h6>
                <h5>http://localhost/API_Paginacion/routerSrvPg.php/tag 
                    <a href="http://localhost/API_Paginacion/routerSrvPg.php/tag">Test it</a>
                </h5>
                <h6>Si quiere obtener un registro en particular agregue el id</h6>
                <h5>http://localhost/API_Paginacion/routerSrvPg.php/tag/1 
                    <a href="http://localhost/API_Paginacion/routerSrvPg.php/tag/1">Test it</a>
                </h5>
            </p>

            <p>
                Para Obtener todos los datos disponibles de los atributos de etiquetas html :<br>
                <h6>Cambie el recurso a attr</h6>
                <h5>http://localhost/API_Paginacion/routerSrvPg.php/attr 
                    <a href="http://localhost/API_Paginacion/routerSrvPg.php/attr">Test it</a>
                </h5>
                <h6>Si quiere obtener un registro en particular agregue el id</h6>
                <h5>http://localhost/API_Paginacion/routerSrvPg.php/attr/1 
                    <a href="http://localhost/API_Paginacion/routerSrvPg.php/attr/1">Test it</a>
                </h5>
            </p>

            <p>

                <b>Nota*</b><br>
                para obtener informacion sobre total de registros
                utiliza la peticion tipo paginacion.
            </p>

            <p>
                Peticiones post se hacen a traves
                de las url con final tag o attr respectivamente.
                <br><br>
                Utiliza los formularios addTag o addAttr segun lo 
                necesite, tenga en cuenta que las tags y atributos 
                que agregue aqui estaran disponibles para la API_Build 
                de esta caja de herramientas, esto para que pueda 
                agregar sus web components a la lista de tags validas.
            </p>

            <h5>
                Aprenda a crear una caja de herramientas base aqui : 
                <a href="https://www.udemy.com/course/curso-de-php-construyendo-mi-primer-caja-de-herramientas/">
                    Click
                </a>
            </h5>

            <h2>How To</h2>

            <section>
                <video src="./assets/howTo.mp4" width="100%" controls autoplay loop></video>
            </section>
            
        </main>
        
        <footer>WELCOME <a href="#up">UP</a></footer>
    </body>
</html>
*/