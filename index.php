<?php

require_once('./ht/Html.php');
require_once('./ht/Tags.php');

doctype();
html([
    'js' => false,
    'attrs' => [
        '!' => 'hello'
    ]
]);