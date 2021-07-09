<?php

class Variables {

    public function __construct(
        public array|null $vars = null
    ){}

    public function setVars(array $vars){
        $this->vars = $vars;
    }

    public function getVars(){
        return $this->vars;
    }

    public function create(){
        $start = ":root{";
        $names = array_keys($this->getVars());
        $values = array_values($this->getVars());
        $vars = [];
        $var = '';
        
        for($i = 0; $i < count($names); $i++){
            $var = "--".$names[$i].": ".$values[$i].";";
            array_push($vars, $var);
        }
        $variables = $start.implode("",$vars)."}";
        return $variables;
    }

}