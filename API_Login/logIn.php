<?php session_start();

if(isset($_SESSION['user'])) {
    header('Location: ../index.php');
}

require_once '../API_Build/Html.php';
require_once '../API_Build/Tags.php';
require_once './procesaLog.php';

doctype();
html([
    head([
        linx([
            'rel' => 'shorcut icon',
            'type' => 'image/png',
            'href' => '../API_Public/assets/favicon.png'
        ]),
        linx([
            'rel' => 'stylesheet',
            'type' => 'text/css',
            'href' => '../API_View/loginSignup.css'
        ]),
        title("Log In")
    ]),
    body([
        ul([
            li(a("home",[
                'attrs' => [
                    'href' => '../index.php'
                ]
            ])),
            li(a("signup",[
                'attrs' => [
                    'href' => './signUp.php'
                ]
            ]))
        ]),
        h2("Log In",[
            'attrs' => [
                'id' => 'up'
            ]
        ]),
        section(
            form([
                label([
                    span("User Name : "), 
                    input([
                        'type' => "text",
                        'name' => "usrname",
                        'id' => "usrname",
                        'placeholder' => "your user name please: "/*,
                        '!' => 'required'*/
                    ])
                ],[
                    'attrs' => [
                        'for' => 'usrname'
                    ]
                ]),
                label([
                    span("Password : "), 
                    input([
                        'type' => "password",
                        'name' => "password",
                        'id' => "password",
                        'placeholder' => "your Password please: "/*,
                        '!' => 'required'*/
                    ])
                ],[
                    'attrs' => [
                        'for' => 'password'
                    ]
                ]),
                div(ul($errors,[
                    'attrs' => [
                        'title' => 'Errors Box'
                    ]
                ]),[
                    'attrs' => [
                        'id' => 'errors'
                    ]
                ]),
                input([
                    'type' => "submit",
                    'value' => "log in"
                ])
            ],[
                'attrs' => [
                    'action' => htmlspecialchars($_SERVER['PHP_SELF']),
                    'method' => 'POST'
                ]
            ])
        ),
        footer([
            "WELCOME TO &copy; My Web Site",
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
    ],[
        'js' => true
    ])
],[
    'js' => true,
    'attrs' => [
        'lang' => 'es'
    ]
]);