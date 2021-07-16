<?php session_start();

if (!isset($_SESSION['user'])) {
    header('Location: ../API_Login/logIn.php');
}

require_once '../API_Build/Html.php';
require_once '../API_Build/Tags.php';

$activate = false;
if(isset($_GET['JS']) && $_GET['JS'] == 'true') {
    $activate = true;
}else{
    $activate = false;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $php = '<?php ';
    $path = './PAGES/';
    $name = htmlspecialchars($_POST['name']);
    $name .= '.php';
    $path .= $name;
    $page = $_POST['myPage'];
    $page = str_replace('\n','',$page);
    $page = str_replace('\t','',$page);
    $php .= $page;
    $file = fopen($path, "w") or die("no se pudo abrir el archivo!");
    fwrite($file, $php);
    header('Location: '.$path);
}

doctype();
html([
    head([
        linx([
            'rel' => 'shortcut icon',
            'type' => 'image/png',
            'href' => './assets/favicon.png'
        ]),
        linx([
            'rel' => 'stylesheet',
            'type' => 'text/css',
            'href' => '../API_View/editor.css'
        ]),
        title('MY API')
    ]),
    body([
        form([
            input([
                'type' => 'text',
                'name' => 'name',
                'placeholder' => 'add a name to your page: ',
                '!' => 'required'
            ]),
            textarea([
                "require_once '../../API_Build/Html.php';",
                "require_once '../../API_Build/Tags.php';",
                "\$activate = false;",
                "if(isset(\$_GET['JS']) && \$_GET['JS'] == 'true') {",
                "   \$activate = true;",
                "}else{",
                    "\$activate = false;",
                "}",
                "doctype();\n",
                "html([\n",
                "\thead([\n\n",
                "\t]),\n",
                "\tbody([\n\n",
                "\t],['js'=>\$activate])\n",
                "],\n",
                "[\n",
                "\t'js'=>\$activate,\n",
                "\t'attrs' => [\n",
                "\t\t'lang' => 'es-LA'\n",
                "\t]\n",
                "]);"
            ],[
                'js' => $activate,
                'attrs' => [
                    'class' => 'editor',
                    'name' => 'myPage'
                ]
            ]),
            input([
                'type' => 'submit',
                'value' => 'crear'
            ])
        ],[
            'js' => $activate,
            'attrs' => [
                'action' => './APIHtml.php',
                'method' => 'POST'
            ]
        ])
    ],['js'=>$activate])
],
[
    'js'=>$activate,
    'attrs' => [
        'lang' => 'es-LA'
    ]
]);