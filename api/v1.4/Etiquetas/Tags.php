<?php

function title ($in = null) {
    $tag = new Html('oc','title',$in);
    return $tag->htg();
}

function div ($in = null,array $set = []) {
    $tag = new Html('oc','div',$in,$set);
    return $tag->htg();
}

function h1 ($in = null,array $set = []) {
    $tag = new Html('oc','h1',$in,$set);
    return $tag->htg();
}

function p ($in = null,array $set = []) {
    $tag = new Html('oc','p',$in,$set);
    return $tag->htg();
}

function h2 ($in = null,array $set = []) {
    $tag = new Html('oc','h2',$in,$set);
    return $tag->htg();
}

function h3 ($in = null,array $set = []) {
    $tag = new Html('oc','h3',$in,$set);
    return $tag->htg();
}

function h4 ($in = null,array $set = []) {
    $tag = new Html('oc','h4',$in,$set);
    return $tag->htg();
}

function h5 ($in = null,array $set = []) {
    $tag = new Html('oc','h5',$in,$set);
    return $tag->htg();
}

function h6 ($in = null,array $set = []) {
    $tag = new Html('oc','h6',$in,$set);
    return $tag->htg();
}

function a ($in = null,array $set = []) {
    $tag = new Html('oc','a',$in,$set);
    return $tag->htg();
}

function footer ($in = null,array $set = []) {
    $tag = new Html('oc','footer',$in,$set);
    return $tag->htg();
}

function pre ($in = null,array $set = []) {
    $tag = new Html('oc','pre',$in,$set);
    return $tag->htg();
}

function form ($in = null,array $set = []) {
    $tag = new Html('oc','form',$in,$set);
    return $tag->htg();
}

function textarea ($in = null,array $set = []) {
    $tag = new Html('oc','textarea',$in,$set);
    return $tag->htg();
}

function headxr ($in = null,array $set = []) {
    $tag = new Html('oc','header',$in,$set);
    return $tag->htg();
}

function ul ($in = null,array $set = []) {
    $tag = new Html('oc','ul',$in,$set);
    return $tag->htg();
}

function ol ($in = null,array $set = []) {
    $tag = new Html('oc','ol',$in,$set);
    return $tag->htg();
}

function li ($in = null,array $set = []) {
    $tag = new Html('oc','li',$in,$set);
    return $tag->htg();
}

function main ($in = null,array $set = []) {
    $tag = new Html('oc','main',$in,$set);
    return $tag->htg();
}

function script ($in = null,array $set = []) {
    $tag = new Html('oc','script',$in,$set);
    return $tag->htg();
}

function i ($in = null,array $set = []) {
    $tag = new Html('oc','i',$in,$set);
    return $tag->htg();
}

function b ($in = null,array $set = []) {
    $tag = new Html('oc','b',$in,$set);
    return $tag->htg();
}

function section ($in = null,array $set = []) {
    $tag = new Html('oc','section',$in,$set);
    return $tag->htg();
}

function label ($in = null,array $set = []) {
    $tag = new Html('oc','label',$in,$set);
    return $tag->htg();
}

function span ($in = null,array $set = []) {
    $tag = new Html('oc','span',$in,$set);
    return $tag->htg();
}

function video ($in = null,array $set = []) {
    $tag = new Html('oc','video',$in,$set);
    return $tag->htg();
}

function table ($in = null,array $set = []) {
    $tag = new Html('oc','table',$in,$set);
    return $tag->htg();
}

function thead ($in = null,array $set = []) {
    $tag = new Html('oc','thead',$in,$set);
    return $tag->htg();
}

function tbody ($in = null,array $set = []) {
    $tag = new Html('oc','tbody',$in,$set);
    return $tag->htg();
}

function tfoot ($in = null,array $set = []) {
    $tag = new Html('oc','tfoot',$in,$set);
    return $tag->htg();
}

function tr ($in = null,array $set = []) {
    $tag = new Html('oc','tr',$in,$set);
    return $tag->htg();
}

function th ($in = null,array $set = []) {
    $tag = new Html('oc','th',$in,$set);
    return $tag->htg();
}

function td ($in = null,array $set = []) {
    $tag = new Html('oc','td',$in,$set);
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

function br () {
    $tag = new Html('sc','br');
    return $tag->htg();
}