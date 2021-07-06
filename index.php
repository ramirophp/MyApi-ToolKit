<?php

require_once('./ta/Html.php');
require_once('./ta/Tags.php');

doctype();
html([
    'js' => false,
    'attrs' => [
        '!' => 'hello'
    ]
]);