<?php

require_once '../API_Build/Html.php';
require_once '../API_Build/Tags.php';

doctype();
html([
    head([
        linx([
            'rel' => 'shorcut icon',
            'type' => 'image/png',
            'href' => '../API_Public/assets/favicon.png'
        ]),
        title("Sign Up")
    ]),
    body([
        ul([
            li(a("home",[
                'attrs' => [
                    'href' => '../index.php'
                ]
            ])),
            li(a("login",[
                'attrs' => [
                    'href' => './logIn.php'
                ]
            ]))
        ]),
        h2("Sign Up",[
            'attrs' => [
                'id' => 'up'
            ]
        ]),
        section(
            form([
                label([
                    span("Full Name : "), 
                    input([
                        'type' => "text",
                        'name' => "name",
                        'id' => "name",
                        'placeholder' => "your full name please: "
                    ])
                ],[
                    'attrs' => [
                        'for' => 'name'
                    ]
                ]),
                label([
                    span("User Name : "), 
                    input([
                        'type' => "text",
                        'name' => "usrname",
                        'id' => "usrname",
                        'placeholder' => "your user name please: "
                    ])
                ],[
                    'attrs' => [
                        'for' => 'usrname'
                    ]
                ]),
                div(null,[
                    'attrs' => [
                        'id' => 'errors'
                    ]
                ]),
                input([
                    'type' => "submit",
                    'value' => "sign up"
                ])
            ],[
                'attrs' => [
                    'action' => htmlspecialchars($_SERVER['PHP_SELF']),
                    'method' => 'POST'
                ]
            ])
        ),
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