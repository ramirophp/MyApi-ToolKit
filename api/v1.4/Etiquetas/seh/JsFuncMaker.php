<?php

class JsFuncMaker {

    public function __construct(
        public string|null $func = null
    ){}
    
    public function setFunc(string $func){
        $this->func = $func;
    }

    public function getFunc(){
        return $this->func;
    }

    public function changeContent(string $id, string $fileName){
        return "var xhttp = new XMLHttpRequest();xhttp.onreadystatechange = function() {if (this.readyState == 4 && this.status == 200) {document.getElementById(\"".$id."\").innerHTML = this.responseText;}};xhttp.open(\"GET\", \"".$fileName."\", true);xhttp.send();";
    }

    public function httpObject(string $objectName){
        return "var ".$objectName." = new XMLHttpRequest();";
    }

    public function ors(string $objectName, string|null $functionContent = null ){
        return $objectName.".onreadystatechange = function() {".$functionContent."};";
    }

    public function si(string $conditions, string|null $siContent = null){

        return "if (".$conditions.") {".$siContent."}";

    }

    public function ihr(string $elementId){
        return "document.getElementById(\"".$elementId."\").innerHTML = this.responseText;";
    }

    public function abrir(string $objectName, string $method, string $fileName, string $x){

        return $objectName.".open(\"".$method."\", \"".$fileName."\", ".$x.");";

    }

    public function enviar(string $objectName){
        return $objectName.".send();";
    }

    public function make(string $functionContent){
        return "function ".$this->getFunc()."(){".$functionContent."}";
    }
}