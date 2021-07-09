<?php

class MQuerie {

    public function __construct(
        public string|null $size = null,
        public array|null $selectores = null
    ){}

    public function setSize(string $size){
        $this->size = $size;
    }

    public function setSelectores(array $selectores){
        $this->selectores = $selectores;
    }

    public function getSize(){
        return $this->size;
    }

    public function getSelectores(){
        return $this->selectores;
    }

    public function set(){
        return "@media screen and (min-width: ".$this->getSize()."px) {".implode("",$this->getSelectores())."}";
    }

}