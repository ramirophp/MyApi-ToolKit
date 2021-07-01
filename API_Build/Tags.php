<?php

function html ($in = null,array $set = ['attrs' => [],'js' => false]) {
    $auxJs = false;
    $auxAttrs = [];
    if(array_key_exists('attrs',$set)) {
        $auxAttrs = $set['attrs'];
    }
    if(array_key_exists('js',$set)) {
        $auxJs = $set['js'];
    }
    $tag = new Html('oc','html',$in,$auxAttrs,$auxJs);
    echo $tag->htg();
}

function body ($in = null,array $set = ['attrs' => [],'js' => false]) {
    $auxJs = false;
    $auxAttrs = [];
    if(array_key_exists('attrs',$set)) {
        $auxAttrs = $set['attrs'];
    }
    if(array_key_exists('js',$set)) {
        $auxJs = $set['js'];
    }
    $tag = new Html('oc','body',$in,$auxAttrs,$auxJs);
    return $tag->htg();
}

function h1 ($in = null,array $set = ['attrs' => [],'js' => false]) {
    $auxJs = false;
    $auxAttrs = [];
    if(array_key_exists('attrs',$set)) {
        $auxAttrs = $set['attrs'];
    }
    if(array_key_exists('js',$set)) {
        $auxJs = $set['js'];
    }
    $tag = new Html('oc','h1',$in,$auxAttrs,$auxJs);
    return $tag->htg();
}

function h2 ($in = null,array $set = ['attrs' => [],'js' => false]) {
    $auxJs = false;
    $auxAttrs = [];
    if(array_key_exists('attrs',$set)) {
        $auxAttrs = $set['attrs'];
    }
    if(array_key_exists('js',$set)) {
        $auxJs = $set['js'];
    }
    $tag = new Html('oc','h2',$in,$auxAttrs,$auxJs);
    return $tag->htg();
}

function p ($in = null,array $set = ['attrs' => [],'js' => false]) {
    $auxJs = false;
    $auxAttrs = [];
    if(array_key_exists('attrs',$set)) {
        $auxAttrs = $set['attrs'];
    }
    if(array_key_exists('js',$set)) {
        $auxJs = $set['js'];
    }
    $tag = new Html('oc','p',$in,$auxAttrs,$auxJs);
    return $tag->htg();
}

function a ($in = null,array $set = ['attrs' => [],'js' => false]) {
    $auxJs = false;
    $auxAttrs = [];
    if(array_key_exists('attrs',$set)) {
        $auxAttrs = $set['attrs'];
    }
    if(array_key_exists('js',$set)) {
        $auxJs = $set['js'];
    }
    $tag = new Html('oc','a',$in,$auxAttrs,$auxJs);
    return $tag->htg();
}

function footer ($in = null,array $set = ['attrs' => [],'js' => false]) {
    $auxJs = false;
    $auxAttrs = [];
    if(array_key_exists('attrs',$set)) {
        $auxAttrs = $set['attrs'];
    }
    if(array_key_exists('js',$set)) {
        $auxJs = $set['js'];
    }
    $tag = new Html('oc','footer',$in,$auxAttrs,$auxJs);
    return $tag->htg();
}

function pre ($in = null,array $set = ['attrs' => [],'js' => false]) {
    $auxJs = false;
    $auxAttrs = [];
    if(array_key_exists('attrs',$set)) {
        $auxAttrs = $set['attrs'];
    }
    if(array_key_exists('js',$set)) {
        $auxJs = $set['js'];
    }
    $tag = new Html('oc','pre',$in,$auxAttrs,$auxJs);
    return $tag->htg();
}

function form ($in = null,array $set = ['attrs' => [],'js' => false]) {
    $auxJs = false;
    $auxAttrs = [];
    if(array_key_exists('attrs',$set)) {
        $auxAttrs = $set['attrs'];
    }
    if(array_key_exists('js',$set)) {
        $auxJs = $set['js'];
    }
    $tag = new Html('oc','form',$in,$auxAttrs,$auxJs);
    return $tag->htg();
}

function textarea ($in = null,array $set = ['attrs' => [],'js' => false]) {
    $auxJs = false;
    $auxAttrs = [];
    if(array_key_exists('attrs',$set)) {
        $auxAttrs = $set['attrs'];
    }
    if(array_key_exists('js',$set)) {
        $auxJs = $set['js'];
    }
    $tag = new Html('oc','textarea',$in,$auxAttrs,$auxJs);
    return $tag->htg();
}

function headxr ($in = null,array $set = ['attrs' => [],'js' => false]) {
    $auxJs = false;
    $auxAttrs = [];
    if(array_key_exists('attrs',$set)) {
        $auxAttrs = $set['attrs'];
    }
    if(array_key_exists('js',$set)) {
        $auxJs = $set['js'];
    }
    $tag = new Html('oc','header',$in,$auxAttrs,$auxJs);
    return $tag->htg();
}

function ul ($in = null,array $set = ['attrs' => [],'js' => false]) {
    $auxJs = false;
    $auxAttrs = [];
    if(array_key_exists('attrs',$set)) {
        $auxAttrs = $set['attrs'];
    }
    if(array_key_exists('js',$set)) {
        $auxJs = $set['js'];
    }
    $tag = new Html('oc','ul',$in,$auxAttrs,$auxJs);
    return $tag->htg();
}

function li ($in = null,array $set = ['attrs' => [],'js' => false]) {
    $auxJs = false;
    $auxAttrs = [];
    if(array_key_exists('attrs',$set)) {
        $auxAttrs = $set['attrs'];
    }
    if(array_key_exists('js',$set)) {
        $auxJs = $set['js'];
    }
    $tag = new Html('oc','li',$in,$auxAttrs,$auxJs);
    return $tag->htg();
}

function main ($in = null,array $set = ['attrs' => [],'js' => false]) {
    $auxJs = false;
    $auxAttrs = [];
    if(array_key_exists('attrs',$set)) {
        $auxAttrs = $set['attrs'];
    }
    if(array_key_exists('js',$set)) {
        $auxJs = $set['js'];
    }
    $tag = new Html('oc','main',$in,$auxAttrs,$auxJs);
    return $tag->htg();
}

function script ($in = null,array $set = ['attrs' => [],'js' => false]) {
    $auxJs = false;
    $auxAttrs = [];
    if(array_key_exists('attrs',$set)) {
        $auxAttrs = $set['attrs'];
    }
    if(array_key_exists('js',$set)) {
        $auxJs = $set['js'];
    }
    $tag = new Html('oc','script',$in,$auxAttrs,$auxJs);
    return $tag->htg();
}

function i ($in = null,array $set = ['attrs' => [],'js' => false]) {
    $auxJs = false;
    $auxAttrs = [];
    if(array_key_exists('attrs',$set)) {
        $auxAttrs = $set['attrs'];
    }
    if(array_key_exists('js',$set)) {
        $auxJs = $set['js'];
    }
    $tag = new Html('oc','i',$in,$auxAttrs,$auxJs);
    return $tag->htg();
}

function head ($in = null) {
    $tag = new Html('oc','head',$in);
    return $tag->htg();
}

function title ($in = null) {
    $tag = new Html('oc','title',$in);
    return $tag->htg();
}

function img ($set = []) {
    $tag = new Html('sc','img',$set);
    return $tag->htg();
}

function input ($set = []) {
    $tag = new Html('sc','input',$set);
    return $tag->htg();
}

function linx ($set = []) {
    $tag = new Html('sc','link',$set);
    return $tag->htg();
}

function hr ($set = []) {
    $tag = new Html('sc','hr',$set);
    return $tag->htg();
}

function doctype () {
    $tag = new Html('sc','doctype',['!'=>'html']);
    echo $tag->htg();
}

function br () {
    $tag = new Html('sc','br');
    return $tag->htg();
}