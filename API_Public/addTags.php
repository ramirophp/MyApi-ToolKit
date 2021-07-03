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
            'rel' => 'shorcut icon',
            'type' => 'image/png',
            'href' => './assets/favicon.png'
        ]),
        linx([
            'rel' => 'stylesheet',
            'type' => 'text/css',
            'href' => '../API_View/loader.css'
        ]),
        title("Add Tags POST")
    ]),
    body([
        ul(
            li(a("home",[
                'attrs' => [
                    'href' => '../index.php'
                ]
            ]))
        ),
        h2("ADD Html Tags",[
            'attrs' => [
                'id' => 'up'
            ]
        ]),
        section([
            section(
                form([
                    label([
                        span("ADD TAG : "), 
                        input([
                            'type' => "text",
                            'name' => "tag",
                            'id' => "tag",
                            'placeholder' => "add tag"
                        ])
                    ],[
                        'attrs' => [
                            'for' => 'tag'
                        ]
                    ]),
                    div(null,[
                        'attrs' => [
                            'id' => 'result'
                        ]
                    ]),
                    input([
                        'type' => "submit",
                        'value' => "SAVE"
                    ])
                ])
            )
        ],[
            'attrs' => [
                'class' => 'paginacion'
            ]
        ]),
        footer([
            "WELCOME TO &copy; futuredeveloper.xyz",
            a(i(null,[
                'attrs' => [
                    'class' => 'fas fa-arrow-circle-up upIcon'
                ]
            ]),['attrs'=>[
                'href' => '#up'
            ]])
        ]),
        script("var recurso = 'tags';"),
        script(null,[
            'attrs' => [
                'src' => '../API_View/post_dato.js',
            ]
        ]),
        script(null,[
            'attrs' => [
                'src' => 'https://kit.fontawesome.com/60163d706b.js',
                '!' => 'defer',
                'crossorigin' => 'anonymous'
            ]
        ])
    ],[
        'js' => true
    ])
],[
    'js' => true,
    'attrs' => [
        'lang' => 'es'
    ]
]);

/*
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" type="image/png" href="./assets/favicon.png"/>
        <title>Add Tags POST</title>
        <script>
            var recurso = 'tags';
        </script>
    </head>
    <body>

        <ul>
            <li><a href="./index.php">home</a></li>
        </ul>

        <h2>ADD Html Tags</h2>

        <section class="form">
            <form>
                <label for="tag">
                    ADD TAG : 
                    <input type="text" name="tag" id="tag" placeholder="add tag">
                </label>
                <input type="submit" value="SAVE">
            </form>
        </section>

        <div id="result"></div>
 
        <script src="../API_View/post_dato.js"></script>
    </body>
</html>
*/