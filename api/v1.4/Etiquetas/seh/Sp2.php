<?php

class Sp2 {

    public function __construct(
        public string|null $id = null,
        public array|null $rules = null
    ){}

    public function setId(string $id){
        $this->id = $id;
    }

    public function setRules(array $rules){
        $this->rules = $rules;
    }

    public function getId(){
        return $this->id;
    }

    public function getRules(){
        return $this->rules;
    }

    public function whatItIs(char|string $char){
        return match($char){
            "0" => "scroll-snap-align: ",
            "1" => "vertical-align: ",
            "2" => "overflow-x: ",
            "3" => "overflow-y: ",
            "4" => "overflow: ",
            "5" => "overscroll-behavior-x: ",
            "6" => "scroll-snap-type: ",
            "7" => "scroll-snap-align: ",
            "8" => "align-items: ",
            "9" => "list-style: ",
            "A" => "flex-wrap: ",
            "B" => "transition: "/*,
            "C" => "width: ",
            "D" => "min-width: ",
            "E" => "height: ",
            "F" => "text-align: ",
            "G" => "margin-top: ",
            "H" => "align-self: ",
            "I" => "max-width: ",
            "J" => "background: ",
            "K" => "top: ",
            "L" => "background-color: ",
            "M" => "box-shadow: ",
            "N" => "border: ",
            "O" => "border-radius: ",
            "P" => "text-decoration: ",
            "Q" => "left: ",
            "R" => "margin-left: ",
            "S" => "background-image: ",
            "T" => "padding-top: ",
            "U" => "padding-bottom: ",
            "V" => "margin-bottom: ",
            "X" => "background-size: ",
            "Y" => "background-position: ",
            "Z" => "background-repeat: "*/
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
            array_push($values, $value.";");
        }

        return [$attrib,$values];
    }

    public function addAttrib(array $attVal){
        
        $array = $attVal;
        $attribVal = [];

        for($i = 0; $i < count($array[0]); $i++){
            array_push($attribVal, $array[0][$i].$array[1][$i]);
        }

        return implode("",$attribVal);
    }

    public function create(){
        return $this->getId()."{".$this->addAttrib($this->walkArray($this->getRules()))."}";
    }

    public function unirStyles(array $styles){
        $strings = [];
        $selector = '';
        $start = '';
        $merged = '';

        if(count($styles) === 2){

            for($i = 0; $i < count($styles); $i++){
                array_push($strings, explode("{",$styles[$i]));
            }

            $selector = $strings[0][0];
    
            $start = explode("}",$strings[0][1]);
            
            $merged = $selector."{".implode("",$start).$strings[1][1];
    
            return $merged;

        }else{
            return "solo puede unir dos selectores a la vez";
        }

    }

}