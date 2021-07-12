<?php

return [

    div([

        div([
            div('1 / 3',['class' => 'numbertext']),
            img([
                'src' => './Etiquetas/Piezas/Slideshow/imagenes/imagen1.jpg',
                'style' => 'width:100%'
            ]),
            div('Caption Text',['class' => 'text'])
        ],['class' => 'mySlides fade']),

        div([
            div('2 / 3',['class' => 'numbertext']),
            img([
                'src' => './Etiquetas/Piezas/Slideshow/imagenes/imagen2.jpg',
                'style' => 'width:100%'
            ]),
            div('Caption Text',['class' => 'text'])
        ],['class' => 'mySlides fade']),

        div([
            div('3 / 3',['class' => 'numbertext']),
            img([
                'src' => './Etiquetas/Piezas/Slideshow/imagenes/imagen3.jpg',
                'style' => 'width:100%'
            ]),
            div('Caption Text',['class' => 'text'])
        ],['class' => 'mySlides fade']),

        a('&#10094;',[
            'class' => 'prev',
            'onclick' => 'plusSlides(-1)'
        ]),
        a('&#10095;',[
            'class' => 'next',
            'onclick' => 'plusSlides(1)'
        ])

    ],['class' => 'slideshow-container']),

    br(),

    div([

        span(null,[
            'class' => 'dot',
            'onclick' => 'currentSlide(1)'
        ]),
        span(null,[
            'class' => 'dot',
            'onclick' => 'currentSlide(2)'
        ]),
        span(null,[
            'class' => 'dot',
            'onclick' => 'currentSlide(3)'
        ])

    ],['style' => 'text-align:center'])

];