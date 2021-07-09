<?php

class Doctype extends Base implements TagInterface {

    public function whatItIs(char|string $char){
        return match($char){
            "H" => "html"
        };
    }

    public function createOpenTag(array $attVal){
        $string = implode(" ",$attVal);
        return "<!DOCTYPE ".$string."/>";
    }

    public function createCloseTag(array|string|null $content){
        //en esta ocacion utilizare este metodo para eliminar "
        return str_replace('"'," ",$content);
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
        return $this->createCloseTag($this->getArgs());
        
    }
    
    public function setAttributes(string|array $attributes){
        $this->setArgs($attributes);
    }

    public function getAttributes(){
        $this->getArgs();
    }

}