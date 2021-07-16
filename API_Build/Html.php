<?php class Html {

    private function get(string $url) {
        $sesionCurl = curl_init();
        curl_setopt($sesionCurl,CURLOPT_URL,$url);
        curl_setopt($sesionCurl,CURLOPT_RETURNTRANSFER,true);
        $response = curl_exec($sesionCurl);
        if(curl_errno($sesionCurl)) {
            die(curl_error($sesionCurl));
        }
        $arreglo = json_decode($response,true);
        curl_close($sesionCurl);
        return $arreglo;
    }

    private array $tag = [
        'type' => null,
        'tag' => null,
        'content' => null,
        'attrs' => null,
        'result' => null
    ];

    private function type (string $type) {
        if ($type === 'oc' || $type === 'sc') {
            /*oc = open and close tag
            sc = self closing tag*/
            $this->tag['type'] = $type;
        } else {
            die("
            <div style='border:1px solid #FFA62F;padding:10px;background-color:#306754;text-align:center;width:100%;'>
                &#10060; 
                <span style='color:#FFA62F;'>Set</span> 
                <span style='color:#FFFF00;'>'oc'</span> 
                <span style='color:#FFA62F;'>OR</span> 
                <span style='color:#FFFF00;'>'sc'</span> 
                <span style='color:#FFA62F;'>Please</span> 
                &#128113;
            </div>
            ");
        }
    }

    private function tag (string $tag) {
        $tag = htmlspecialchars($tag);
        if($tag === 'doctype') {
            $tag = '!DOCTYPE';
        }
        $valid = false;
        $tags = $this->get('http://localhost/MyApi-ToolKit/API_Paginacion/routerSrvPg.php/tag');
        
        if(array_key_exists('respuesta',$tags)) {
            header('Location: ../index.php');
        }

        for ($i = 0; $i < count($tags['tags']); $i++) {
            if ($tag === $tags['tags'][$i]['name']) {
                $this->tag['tag'] = $tags['tags'][$i]['name'];
                $valid = true;
                break;
            }
        }
        if(!$valid) {
            die("
            <div style='border:1px solid #FFA62F;padding:10px;background-color:#306754;text-align:center;width:100%;'>
                &#10060; 
                <span style='color:#FFA62F;'>Set</span> 
                <span style='color:#FFFF00;'>a</span> 
                <span style='color:#FFA62F;'>Valid</span> 
                <span style='color:#FFFF00;'>tag</span> 
                <span style='color:#FFA62F;'>Please add it here 
                <a href='http://localhost/MyApi-ToolKit/API_Public/addTags.php' style='text-decoration:none;color:#FFFF00;'>
                addTag ('".$tag."')</a></span> 
                &#128113;
            </div>
            ");
        }
    }

    private function content ($content,bool $js = false) {
        if ($js) {
            if(is_array($content)) {
                $aux = [];
                for($i = 0; $i < count($content); $i++) {
                    array_push($aux,(is_array($content[$i])) ? implode("",$content[$i]) : $content[$i]);
                }
                $this->tag['content'] = implode("",$aux);
            }else{
                $this->tag['content'] = $content;
            }
        }else{
            if(is_array($content)) {
                $aux = [];
                for($i = 0; $i < count($content); $i++) {
                    array_push($aux,(is_array($content[$i])) ? implode("",$content[$i]) : $content[$i]);
                }
                $this->tag['content'] = implode("",$aux);
            }else{
                $this->tag['content'] = $content;
            }
            if(strpos($this->tag['content'] , 'script') !== false){
                die("
                <div style='border:1px solid #FFA62F;padding:10px;background-color:#306754;text-align:center;width:100%;'>
                    &#10060; 
                    <span style='color:#FFA62F;'>Js</span> 
                    <span style='color:#FFFF00;'>is</span> 
                    <span style='color:#FFA62F;'>Not</span> 
                    <span style='color:#FFFF00;'>allowed</span> 
                    <span style='color:#FFA62F;'>Change the js arg to true<br>
                    <a href='./".basename($_SERVER["SCRIPT_FILENAME"])."?JS=true' style='text-decoration:none;color:#FFFF00;'>
                    Change It</a>
                    </span> 
                    &#128113;
                </div>
                ");
            }
        }
    }

    private function attrs (array $attrs) {
        $validAttrs = $this->get('http://localhost/MyApi-ToolKit/API_Paginacion/routerSrvPg.php/attr');
        foreach ($attrs as $key => $value) {
            $key = htmlspecialchars($key);
            $value = htmlspecialchars($value);
            if ($key === '!') {
                $valid = false;
                $tmpAttrs = explode(' ',$value);
                for($i = 0; $i < count($tmpAttrs); $i++) {
                    for($j = 0; $j < count($validAttrs['attrs']); $j++) {
                        if ($tmpAttrs[$i] === $validAttrs['attrs'][$j]['name']) {
                            $valid = true;
                            break;
                        }else{
                            $valid = false;
                        }
                    }
                    if($valid) {
                        $this->tag['attrs'] .= ' ' . $tmpAttrs[$i];
                    }else{
                        die("
                        <div style='border:1px solid #FFA62F;padding:10px;background-color:#306754;text-align:center;width:100%;'>
                            &#10060; 
                            <span style='color:#FFA62F;'>".$tmpAttrs[$i]."</span> 
                            <span style='color:#FFFF00;'>is</span> 
                            <span style='color:#FFA62F;'>Not</span> 
                            <span style='color:#FFFF00;'>a valid</span> 
                            <span style='color:#FFA62F;'>Attribute add it here 
                            <a href='http://localhost/MyApi-ToolKit/API_Public/addAttrs.php' style='text-decoration:none;color:#FFFF00;'>
                            addAttr ('".$tmpAttrs[$i]."')</a></span> 
                            &#128113;
                        </div>
                        ");
                    }
                }
            } else {
                for($i = 0; $i < count($validAttrs['attrs']); $i++) {
                    if($key === $validAttrs['attrs'][$i]['name']) {
                        $valid = true;
                        break;
                    }else{
                        $valid = false;
                    }
                }
                if($valid) {
                    $this->tag['attrs'] .= ' '.$key.'="'.$value.'"';
                }else{
                    die("
                    <div style='border:1px solid #FFA62F;padding:10px;background-color:#306754;text-align:center;width:100%;'>
                        &#10060; 
                        <span style='color:#FFA62F;'>".$key."</span> 
                        <span style='color:#FFFF00;'>is</span> 
                        <span style='color:#FFA62F;'>Not</span> 
                        <span style='color:#FFFF00;'>a valid</span> 
                        <span style='color:#FFA62F;'>Attribute add it here 
                        <a href='http://localhost/MyApi-ToolKit/API_Public/addAttrs.php' style='text-decoration:none;color:#FFFF00;'>
                        addAttr ('".$key."')</a></span> 
                        &#128113;
                    </div>
                    ");
                }
            }
        }
    }

    public function __construct ($type = '',$tag = '',$content = [],$attrs = [],$js=false) {
        $this->type($type);
        if($type === 'sc') {
            $attrs = $content;
        }
        $this->tag($tag);
        $this->attrs($attrs);
        if($this->tag['type'] === 'oc') {
            $this->content($content,$js);
            $this->tag['result'] = '<'.$this->tag['tag'].$this->tag['attrs'].'>'.$this->tag['content'].'</'.$this->tag['tag'].'>';
        }else{
            $this->tag['result'] = '<'.$this->tag['tag'].$this->tag['attrs'].'>';
        }
    }

    public function htg () {
        return $this->tag['result'];
    }

}