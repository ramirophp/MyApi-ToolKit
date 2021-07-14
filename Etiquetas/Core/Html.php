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

    public function __construct ($type = '',$tag = '',$content = [],$attrs = [],$js=false,$on=true) {

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
    ],
    array $deploy = [
        'make' => false,
        'file' => './index.html'
    ]) {

    if(!validarEstructuras($in,$set)) {
        die(var_dump($in,$set));
    }
    
    $head = new Html('oc','head',$in['head'],[],false,$set['on']);

    $body = new Html('oc','body',$in['body'],$set['body'],$set['js'],$set['on']);

    $doctype = new Html('sc','doctype',['!'=>'html'],false,$set['on']);

    $html = new Html('oc','html',[
        $head->element(),
        $body->element()
    ],$set['html'],$set['js'],$set['on']);

    echo implode("",[
        $doctype->element(),
        $html->element()
    ]);

    if ($deploy['make']) {
        $archivo = fopen($deploy['file'], "w") or die("no se pudo abrir el archivo!");
        fwrite($archivo, implode("",[$doctype->element(),$html->element()]));
    }

}

function div ($in = null,array $set = [],$on = true) {
    $div = new Html('oc','div',$in,$set,false,$on);
    return $div->element();
}

function script ($in = null,array $set = [],$on = true) {
    $script = new Html('oc','script',$in,$set,$on);
    return $script->element();
}

function img (array $set = [],$on = true) {
    $img = new Html('sc','img',$set,false,$on);
    return $img->element();
}

function _link (array $set = [],$on = true) {
    $link = new Html('sc','link',$set,false,$on);
    return $link->element();
}

function a ($in = null,array $set = [],$on = true) {
    $a = new Html('oc','a',$in,$set,false,$on);
    return $a->element();
}

function br ($on = true) {
    $br = new Html('sc','br',[],false,$on);
    return $br->element();
}

function hr (array $set = [],$on = true) {
    $hr = new Html('sc','hr',$set,false,$on);
    return $hr->element();
}

function span ($in = null,array $set = [],$on = true) {
    $span = new Html('oc','span',$in,$set,false,$on);
    return $span->element();
}

function meta (array $set = [],$on = true) {
    $link = new Html('sc','meta',$set,false,$on);
    return $link->element();
}

function input (array $set = [],$on = true) {
    $input = new Html('sc','input',$set,false,$on);
    return $input->element();
}

function meta_tags (string $descripcion, array $palabrasClave, string $autor) {
    /**
     * <meta charset="UTF-8">
     * <meta name="description" content="Free Web tutorials">
     * <meta name="keywords" content="HTML, CSS, JavaScript">
     * <meta name="author" content="John Doe">
     * <meta name="viewport" content="width=device-width, initial-scale=1.0">
     */

    $charset = meta(['charset' => 'UTF-8']);

    $description = meta([
        'name' => 'description',
        'content' => $descripcion
    ]);

    $keywords = meta([
        'name' => 'keywords',
        'content' => implode(",",$palabrasClave)
    ]);

    $author = meta([
        'name' => 'author',
        'content' => $autor
    ]);

    $viewport = meta([
        'name' => 'viewport',
        'content' => 'width=device-width, initial-scale=1.0'
    ]);

    $httpEquiv = meta([
        'http-equiv' => 'X-UA-Compatible',
        'content' => 'ie=edge'
    ]);

    return implode("",[
        $charset,
        $description,
        $keywords,
        $author,
        $viewport,
        $httpEquiv
    ]);

}

function h2 ($in = null,array $set = [],$on = true) {
    $h2 = new Html('oc','h2',$in,$set,false,$on);
    return $h2->element();
}

function h1 ($in = null,array $set = [],$on = true) {
    $h1 = new Html('oc','h1',$in,$set,false,$on);
    return $h1->element();
}

function pre ($in = null,array $set = [],$on = true) {
    $pre = new Html('oc','pre',$in,$set,false,$on);
    return $pre->element();
}

function p ($in = null,array $set = [],$on = true) {
    $p = new Html('oc','p',$in,$set,false,$on);
    return $p->element();
}

function section ($in = null,array $set = [],$on = true) {
    $section = new Html('oc','section',$in,$set,false,$on);
    return $section->element();
}

function button ($in = null,array $set = [],$on = true) {
    $button = new Html('oc','button',$in,$set,false,$on);
    return $button->element();
}

function title ($in = null,$on = true) {
    $title = new Html('oc','title',$in,[],false,$on);
    return $title->element();
}

function ul ($in = null,array $set = [],$on = true) {
    $ul = new Html('oc','ul',$in,$set,false,$on);
    return $ul->element();
}