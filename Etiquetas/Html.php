<?php class Html {

    private array $tag = [
        'type' => null,
        'tag' => null,
        'content' => null,
        'attrs' => null,
        'result' => null
    ];

    private function type (string $type) {

        if ($type === 'oc' || $type === 'sc') {

            $this->tag['type'] = $type;

        } else {

            die($type);

        }
    }

    private function tag (string $tag, array $tags) {

        $tag = htmlspecialchars($tag);

        if($tag === 'doctype') {

            $tag = '!DOCTYPE';

        }

        $valid = false;
        
        for ($i = 0; $i < count($tags['data']); $i++) {

            if ($tag === $tags['data'][$i]['name']) {

                $this->tag['tag'] = $tags['data'][$i]['name'];

                $valid = true;

                break;

            }

        }

        if(!$valid) {

            die($tag);

        }

    }

    private function _tag (string $tag) {

        $tag = htmlspecialchars($tag);

        if($tag === 'doctype') {

            $tag = '!DOCTYPE';

        }

        $this->tag['tag'] = $tag;

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

                die('script');

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

            die('script');

        }

    }

    private function attrs (array $attrs, array $validAttrs) {

        foreach ($attrs as $key => $value) {

            $key = htmlspecialchars($key);

            $value = htmlspecialchars($value);

            if ($key === '!') {

                $valid = false;

                $tmpAttrs = explode(' ',$value);

                for($i = 0; $i < count($tmpAttrs); $i++) {

                    for($j = 0; $j < count($validAttrs['data']); $j++) {

                        if ($tmpAttrs[$i] === $validAttrs['data'][$j]['name']) {

                            $valid = true;

                            break;

                        }else{

                            $valid = false;

                        }

                    }
                    if($valid) {

                        $this->tag['attrs'] .= ' ' . $tmpAttrs[$i];

                    }else{

                        die($tmpAttrs[$i]);

                    }
                }

            } else {

                for($i = 0; $i < count($validAttrs['data']); $i++) {

                    if($key === $validAttrs['data'][$i]['name']) {

                        $valid = true;

                        break;

                    }else{

                        $valid = false;

                    }

                }

                if($valid) {

                    $this->tag['attrs'] .= ' '.$key.'="'.$value.'"';

                }else{

                    die($key);

                }

            }

        }

    }

    private function _attrs (array $attrs) {

        foreach ($attrs as $key => $value) {

            $key = htmlspecialchars($key);

            $value = htmlspecialchars($value);

            if ($key === '!') {

                $tmpAttrs = explode(' ',$value);

                for($i = 0; $i < count($tmpAttrs); $i++) {

                    $this->tag['attrs'] .= ' ' . $tmpAttrs[$i];
                }

            } else {

                $this->tag['attrs'] .= ' '.$key.'="'.$value.'"';

            }

        }

    }

    public function __construct ($type = '',$tag = '',$content = [],$attrs = [],$js=false,$on=false) {

        $this->type($type);

        if($type === 'sc') {

            $attrs = $content;

        }

        if ($on) {

            $sesionCurl = curl_init();

            curl_setopt($sesionCurl,CURLOPT_URL,'http://localhost/ceerr.php/etiquetas/registros');

            curl_setopt($sesionCurl,CURLOPT_RETURNTRANSFER,true);

            $response = curl_exec($sesionCurl);

            if(curl_errno($sesionCurl)) {

                die(curl_error($sesionCurl));

            }

            $this->tag($tag,json_decode($response,true));

            curl_close($sesionCurl);
            
            $sesionCurl = curl_init();

            curl_setopt($sesionCurl,CURLOPT_URL,'http://localhost/ceerr.php/atributos/registros');

            curl_setopt($sesionCurl,CURLOPT_RETURNTRANSFER,true);

            $response = curl_exec($sesionCurl);

            if(curl_errno($sesionCurl)) {

                die(curl_error($sesionCurl));

            }

            $this->attrs($attrs,json_decode($response,true));

            curl_close($sesionCurl);

        } else {

            $this->_tag($tag);

            $this->_attrs($attrs);

        }

        if($this->tag['type'] === 'oc') {

            if($this->tag['tag'] == 'body' || $this->tag['tag'] == 'html') {

                $this->content($content,$js);

            }else{

                $this->_content($content);

            }

            $this->tag['result'] = '<'.$this->tag['tag'].$this->tag['attrs'].'>'.
            $this->tag['content'].'</'.$this->tag['tag'].'>';

        }else{

            $this->tag['result'] = '<'.$this->tag['tag'].$this->tag['attrs'].'>';

        }

    }

    public function element () {

        return $this->tag['result'];

    }

}

function validarEstructuras (array $in, array $set) {
    if (
        array_key_exists('head',$in) &&
        array_key_exists('body',$in) &&
        array_key_exists('html',$set) &&
        array_key_exists('body',$set) &&
        array_key_exists('js',$set) &&
        array_key_exists('on',$set)
        ) {
            return true;
    } else {
        return false;
    }
}

function html (array $in = [
        'head' => [],
        'body' => []
    ],
    array $set = [
        'html' => [],
        'body' => [],
        'js' => true,
        'on' => true
    ]) {

    if(!validarEstructuras($in,$set)) {
        die(var_dump($in,$set));
    }
    
    $head = new Html('oc','head',$in['head'],[],false,$set['on']);

    $body = new Html('oc','body',$in['body'],$set['body'],$set['js'],$set['on']);

    $doctype = new Html('sc','doctype',['!'=>'html'],false,$set['on']);

    $html = new Html('oc','html',[
        $body->element(),
        $head->element()
    ],$set['html'],$set['js'],$set['on']);

    echo implode("",[
        $doctype->element(),
        $html->element()
    ]);

}

function div ($in = null,array $set = [],$on = true) {
    $div = new Html('oc','div',$in,$set,false,$on);
    return $div->element();
}

function script ($in = null,array $set = [],$on = true) {
    $script = new Html('oc','script',$in,$set,$on);
    return $script->element();
}