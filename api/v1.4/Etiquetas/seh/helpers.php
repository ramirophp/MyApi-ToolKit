<?php

if(!function_exists('doctype')) {
    function doctype (string|array|null $args = "H") {
        $doctype = new Doctype($args);
        echo $doctype->tag();
    }
}

if(!function_exists('html')) {
    function html (string|array|null $args = null, string|array|null $func = null) {
        $html = new Html($args, $func);
        echo $html->tag();
    }
}

if(!function_exists('head')) {
    function head (string|array|null $args = null, string|array|null $func = null) {
        $head = new Head($args, $func);
        return $head->tag();
    }
}

if(!function_exists('body')) {
    function body (string|array|null $args = null, string|array|null $func = null) {
        $body = new Body($args, $func);
        return $body->tag();
    }
}

if(!function_exists('div')) {
    function div (string|array|null $args = null, string|array|null $func = null) {
        $div = new Div($args, $func);
        return $div->tag();
    }
}

if(!function_exists('address')) {
    function address (string|array|null $args = null, string|array|null $func = null) {
        $address = new Address($args, $func);
        return $address->tag();
    }
}

if(!function_exists('title')) {
    function title (string|array|null $args = null, string|array|null $func = null) {
        $title = new Title($args, $func);
        return $title->tag();
    }
}
#esta funcion se redujo de header a hdr para evitar conflicto con la funcion header de php
if(!function_exists('hdr')) {
    function hdr (string|array|null $args = null, string|array|null $func = null) {
        $header = new Header($args, $func);
        return $header->tag();
    }
}

if(!function_exists('main')) {
    function main (string|array|null $args = null, string|array|null $func = null) {
        $main = new Main($args, $func);
        return $main->tag();
    }
}

if(!function_exists('section')) {
    function section (string|array|null $args = null, string|array|null $func = null) {
        $section = new Section($args, $func);
        return $section->tag();
    }
}

if(!function_exists('footer')) {
    function footer (string|array|null $args = null, string|array|null $func = null) {
        $footer = new Footer($args, $func);
        return $footer->tag();
    }
}

if(!function_exists('style')) {
    function style (string|array|null $args = null, string|array|null $func = null) {
        $style = new Style($args, $func);
        return $style->tag();
    }
}

if(!function_exists('p')) {
    function p (string|array|null $args = null, string|array|null $func = null) {
        $p = new P($args, $func);
        return $p->tag();
    }
}

if(!function_exists('a')) {
    function a (string|array|null $args = null, string|array|null $func = null) {
        $a = new A($args, $func);
        return $a->tag();
    }
}

if(!function_exists('h1')) {
    function h1 (string|array|null $args = null, string|array|null $func = null) {
        $h1 = new H1($args, $func);
        return $h1->tag();
    }
}

if(!function_exists('h2')) {
    function h2 (string|array|null $args = null, string|array|null $func = null) {
        $h2 = new H2($args, $func);
        return $h2->tag();
    }
}

if(!function_exists('h3')) {
    function h3 (string|array|null $args = null, string|array|null $func = null) {
        $h3 = new H3($args, $func);
        return $h3->tag();
    }
}

if(!function_exists('h4')) {
    function h4 (string|array|null $args = null, string|array|null $func = null) {
        $h4 = new H4($args, $func);
        return $h4->tag();
    }
}

if(!function_exists('h5')) {
    function h5 (string|array|null $args = null, string|array|null $func = null) {
        $h5 = new H5($args, $func);
        return $h5->tag();
    }
}

if(!function_exists('h6')) {
    function h6 (string|array|null $args = null, string|array|null $func = null) {
        $h6 = new H6($args, $func);
        return $h6->tag();
    }
}

if(!function_exists('span')) {
    function span (string|array|null $args = null, string|array|null $func = null) {
        $span = new Span($args, $func);
        return $span->tag();
    }
}

if(!function_exists('button')) {
    function button (string|array|null $args = null, string|array|null $func = null) {
        $button = new Button($args, $func);
        return $button->tag();
    }
}

if(!function_exists('script')) {
    function script (string|array|null $args = null, string|array|null $func = null) {
        $script = new Script($args, $func);
        return $script->tag();
    }
}

if(!function_exists('table')) {
    function table (string|array|null $args = null, string|array|null $func = null) {
        $table = new Table($args, $func);
        return $table->tag();
    }
}

if(!function_exists('tr')) {
    function tr (string|array|null $args = null, string|array|null $func = null) {
        $tr = new Tr($args, $func);
        return $tr->tag();
    }
}

if(!function_exists('td')) {
    function td (string|array|null $args = null, string|array|null $func = null) {
        $td = new Td($args, $func);
        return $td->tag();
    }
}

if(!function_exists('th')) {
    function th (string|array|null $args = null, string|array|null $func = null) {
        $th = new Th($args, $func);
        return $th->tag();
    }
}

if(!function_exists('thead')) {
    function thead (string|array|null $args = null, string|array|null $func = null) {
        $thead = new Thead($args, $func);
        return $thead->tag();
    }
}

if(!function_exists('tbody')) {
    function tbody (string|array|null $args = null, string|array|null $func = null) {
        $tbody = new Tbody($args, $func);
        return $tbody->tag();
    }
}

if(!function_exists('tfoot')) {
    function tfoot (string|array|null $args = null, string|array|null $func = null) {
        $tfoot = new Tfoot($args, $func);
        return $tfoot->tag();
    }
}

if(!function_exists('b')) {
    function b (string|array|null $args = null, string|array|null $func = null) {
        $b = new B($args, $func);
        return $b->tag();
    }
}

if(!function_exists('article')) {
    function article (string|array|null $args = null, string|array|null $func = null) {
        $article = new Article($args, $func);
        return $article->tag();
    }
}

if(!function_exists('ul')) {
    function ul (string|array|null $args = null, string|array|null $func = null) {
        $ul = new Ul($args, $func);
        return $ul->tag();
    }
}

if(!function_exists('ol')) {
    function ol (string|array|null $args = null, string|array|null $func = null) {
        $ol = new Ol($args, $func);
        return $ol->tag();
    }
}

if(!function_exists('li')) {
    function li (string|array|null $args = null, string|array|null $func = null) {
        $li = new Li($args, $func);
        return $li->tag();
    }
}

#javascript functions

if(!function_exists('changeContentOf')) {
    function changeContentOf (string $elementId, string $fileName) {
        $changeContent = new JsFuncMaker("loadDoc");
        return $changeContent->make($changeContent->changeContent($elementId,$fileName));
    }
}

if(!function_exists('jfm')) {
    function jsm (string $functionName) {
        return $changeContent = new JsFuncMaker($functionName);
    }
}

#selfClosing Tags

if(!function_exists('img')) {
    function img (string|array|null $args = null) {
        $img = new Img($args);
        return $img->tag();
    }
}

if(!function_exists('meta')) {
    function meta (string|array|null $args = null) {
        $meta = new Meta($args);
        return $meta->tag();
    }
}
#para evitar conflictos con la funcion link de php utilizamos el nombre lk
if(!function_exists('lk')) {
    function lk (string|array|null $args = null) {
        $link = new Link($args);
        return $link->tag();
    }
}

#css functions

if(!function_exists('vars')) {
    function vars (array|null $vars = null) {
        $vars = new Variables($vars);
        return $vars->create();
    }
}

if(!function_exists('sltr')) {
    function sltr (string|null $id, array|null $rules = null) {
        $selector = new Selector($id, $rules);
        return $selector->create();
    }
}

if(!function_exists('sltr2')) {
    function sltr2 (string|null $id, array|null $rules = null) {
        $selector = new Sp2($id, $rules);
        return $selector->create();
    }
}

if(!function_exists('unirStyles')) {
    function unirStyles(array $styles) {
        
        $sltr = new Sp2();
        
        return $sltr->unirStyles($styles);
    }
}

if(!function_exists('mq')) {
    function mq (string|null $size, array|null $selectores = null) {
        $mq = new MQuerie($size, $selectores);
        return $mq->set();
    }
}

#clean function 

if(!function_exists('cls')) {
    function cls (string $cadena, string $separador = "_") {
        $clean = new Base();
        return $clean->clean($cadena, $separador);
    }
}

#data base functions

if(!function_exists('mysqli')) {
    function mysqli(string $server, string $username, string $password){
        $mysqli = new DataBase($server,$username,$password,"mysqli");
        $mysqli->connect();
        return $mysqli->getConexion();
    }
}

if(!function_exists('createDbM')) {
    function createDbM(string $server, string $username, string $password, string $dbname){
        $mysqli = new DataBase($server,$username,$password,"mysqli");
        $mysqli->connect();
        $conn = $mysqli->getConexion();
        $mysqli->createDb($conn,$dbname);
    }
}

if(!function_exists('pdo')) {
    function pdo(string $server, string $dbname, string $username, string $password){
        $pdo = new DataBase($server,$username,$password,"pdo");
        $pdo->connect($dbname);
        return $pdo->getConexion();
    }
}

if(!function_exists('createDbP')) {
    function createDbP(string $server, string $username, string $password, string $dbname){
        $pdo = new DataBase($server,$username,$password,"pdo");
        $pdo->connect();
        $conn = $pdo->getConexion();
        $pdo->createDb($conn,$dbname);
    }
}