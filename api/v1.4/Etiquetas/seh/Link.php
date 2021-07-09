<?php

class Link extends Base implements TagInterface {

    public function whatItIs(char|string $char){
        return match($char){
            "H" => "href=\"",
            "R" => "rel=\"",
            "T" => "type=\""
        };
    }

    public function createOpenTag(array $attVal){
        $string = implode(" ",$attVal);
        return "<link ".$string." />";
    }

    public function createCloseTag(array|string|null $content){
        //none, Not Necesario para las selfclosing tags
    }

    public function tag(string|null $attrib=null, string|array|null $func=null){

        $array=[];

        if($this->args === null){
            if($attrib !== null){
                $array = explode(" ", $attrib);
            }
        }else{
            $array = explode(" ", $this->getArgs());
        }

        $this->setArgs($this->createOpenTag($this->addAttrib($this->walkArray($array))));
        return $this->getArgs();
        
    }
    
    public function setAttributes(string|array $attributes){
        $this->setArgs($attributes);
    }

    public function getAttributes(){
        $this->getArgs();
    }

}