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
            $div = new self('oc','div',[
                'defina el tipo -oc || sc-',
                ' de etiqueta por favor'
            ]);
            $title = new self('oc','title','Erorr 404');
            $head = new self('oc','head',$title->htg());
            $body = new self('oc','body',$div->htg());
            $doctype = new self('sc','!DOCTYPE',['!'=>'html']);
            $html = new self('oc','html',[
                $head->htg(),
                $body->htg()
            ],['lang'=>'es']);
            die($doctype->htg().$html->htg());
        }
    }

    private function tag (string $tag) {
        $tag = htmlspecialchars($tag);
        if($tag === 'doctype') {
            $tag = '!DOCTYPE';
        }
        $valid = false;
        $tags = $this->get('http://localhost/api/v1.php/tag');

        $mensaje = array_key_exists('mensaje',$tags);
        
        if($mensaje) {
            die('Rellene la tabla tags por favor.');
        }
        
        for ($i = 0; $i < count($tags['tags']); $i++) {
            if ($tag === $tags['tags'][$i]['name']) {
                $this->tag['tag'] = $tags['tags'][$i]['name'];
                $valid = true;
                break;
            }
        }
        if(!$valid) {
            $div = new self('oc','div',[
                'La etiqueta -',
                $tag,
                '- no existe'
            ]);
            $title = new self('oc','title','Erorr 404');
            $head = new self('oc','head',$title->htg());
            $body = new self('oc','body',$div->htg());
            $doctype = new self('sc','!DOCTYPE',['!'=>'html']);
            $html = new self('oc','html',[
                $head->htg(),
                $body->htg()
            ],['lang'=>'es']);
            die($doctype->htg().$html->htg());
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
            if(strpos($this->tag['content'] , '<script>') !== false){
                die("Active js.");
            }
        }
    }

    private function _content ($content) {
        if(is_array($content)) {
            $aux = [];
            for($i = 0; $i < count($content); $i++) {
                array_push($aux,(is_array($content[$i])) ? implode("",$content[$i]) : $content[$i]);
            }
            $this->tag['content'] = implode("",$aux);
        }else{
            $this->tag['content'] = $content;
        }
        if(strpos($this->tag['content'] , '<script>') !== false){
            die("Solamente en el body se permite javascript.");
        }
    }

    private function htmlcontent ($content) {
        if(is_array($content)) {
            $aux = [];
            for($i = 0; $i < count($content); $i++) {
                array_push($aux,(is_array($content[$i])) ? implode("",$content[$i]) : $content[$i]);
            }
            $this->tag['content'] = implode("",$aux);
        }else{
            $this->tag['content'] = $content;
        }
    }

    private function attrs (array $attrs) {
        $validAttrs = $this->get('http://localhost/api/v1.php/attr');
        $mensaje = array_key_exists('mensaje',$validAttrs);
        
        if($mensaje) {
            die('Rellene la tabla attrs por favor.');
        }

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
                        $div = new self('oc','div',[
                            'El atributo -',
                            $tmpAttrs[$i],
                            '- no existe'
                        ]);
                        $title = new self('oc','title','Erorr 404');
                        $head = new self('oc','head',$title->htg());
                        $body = new self('oc','body',$div->htg());
                        $doctype = new self('sc','!DOCTYPE',['!'=>'html']);
                        $html = new self('oc','html',[
                            $head->htg(),
                            $body->htg()
                        ],['lang'=>'es']);
                        die($doctype->htg().$html->htg());
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
                    $div = new self('oc','div',[
                        'El atributo -',
                        $key,
                        '- no existe'
                    ]);
                    $title = new self('oc','title','Erorr 404');
                    $head = new self('oc','head',$title->htg());
                    $body = new self('oc','body',$div->htg());
                    $doctype = new self('sc','!DOCTYPE',['!'=>'html']);
                    $html = new self('oc','html',[
                        $head->htg(),
                        $body->htg()
                    ],['lang'=>'es']);
                    die($doctype->htg().$html->htg());
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
            if($this->tag['tag'] == 'body') {
                $this->content($content,$js);
            }elseif($this->tag['tag'] == 'html'){
                $this->htmlcontent($content);
            }else{
                $this->_content($content);
            }
            $this->tag['result'] = '<'.$this->tag['tag'].$this->tag['attrs'].'>'.$this->tag['content'].'</'.$this->tag['tag'].'>';
        }else{
            $this->tag['result'] = '<'.$this->tag['tag'].$this->tag['attrs'].'>';
        }
    }

    public function htg () {
        return $this->tag['result'];
    }

}