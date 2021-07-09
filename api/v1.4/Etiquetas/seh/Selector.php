<?php

class Selector {

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
        return match($char){#cua cua cuacua cua cua cuacua cua cuara ra cua cua.
            "0" => "box-sizing: ",
            "1" => "margin: ",
            "2" => "padding: ",
            "3" => "font-size: ",
            "4" => "font-family: ",
            "5" => "font-weight: ",
            "6" => "line-height: ",
            "7" => "color: ",
            "8" => "position: ",
            "9" => "display: ",
            "A" => "flex-direction: ",
            "B" => "justify-content: ",
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
            "Z" => "background-repeat: "
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

}