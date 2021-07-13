<?php

require_once '../Etiquetas/Core/Html.php';

html([
    'head' => [
        title('BlackJack'),
        _link([
            'rel' => 'stylesheet',
            'type' => 'text/css',
            'href' => '../Etiquetas/Piezas/Blackjack/Blackjack.css'
        ])
    ],
    'body' => [
        div([
            h1([
                'Black Jack',
                button('Start Game',['onclick' => 'startGame();'])
            ]),
            p('Want to play a round ?',['id' => 'message-el']),
            p([
                span('Cards : ',['id' => 'cards-el']),
                button('New Card',['id' => 'newCard-el', 'onclick' => 'newCard();'])
            ],['id' => 'cards-el-p']),
            div([
                p('Player : $200',['id' => 'player-el']),
                p('Sum : ',['id' => 'sum-el'])
            ],['class' => 'bottom'])
        ],['class' => 'content']),
        script(null,['src' => '../Etiquetas/Piezas/Blackjack/Blackjack.js'])
    ]
],[
    'html' => ['lang' => 'en'],
    'body' => ['class' => 'body'],
    'js' => true,
    'on' => true
]);