<?php

class Base {

    public function __construct(
        public string|array|null $args = null,
        public string|array|null $func = null
    ){}

    public function getArgs(){
        return $this->args;
    }

    public function setArgs(string|array $args){
        $this->args = $args;
    }

    public function clean(string $cadena, string $separador = "_"){
        return str_replace($separador," ",$cadena);
    }

    public function setFunc(string|array $func){
        $this->func = $func;
    }

    public function getFunc(){
        return $this->func;
    }
    
    public function whatItIs(char|string $char){
        return match($char){
            "C" => "class=\"",
            "I" => "id=\""
        };
    }

    public function walkArray(array $chunks){

        $attrib = [];
        $values = [];

        for($i = 0; $i < count($chunks); $i++){
            $string = $chunks[$i];
            $char = $string[0];
            $att = $this->whatItIs($char);
            array_push($attrib, $att);
            $value = substr($string,1);
            array_push($values, $value."\"");
        }

        return [$attrib,$values];
    }

    public function addAttrib(array $attVal){
        
        $array = $attVal;
        $attribVal = [];

        for($i = 0; $i < count($array[0]); $i++){
            array_push($attribVal, $array[0][$i].$array[1][$i]);
        }

        return $attribVal;
    }

}