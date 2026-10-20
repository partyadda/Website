<?php

/**
*   Basic directory listing for PHP's built-in web server.
*   Provides Apache-like directory browsing functionality.
*   Place in the document root of your project.
*   Run the server with: php -S localhost:1234
*/

const defoIndex = 'index.php';
const title = 'Index of /';

$up_url=null;
$dir="*";
$l=null;
$i=-1;

if (!empty($_GET['path'])) {
    $l = $_GET['path'];
    $b = explode('/', $l);
    $i = count($b)-2;
    $c=null;
    if($i>=0) {
        $b=array_slice($b, 0, -1);
        $c=implode('/', $b);
    }
    $up_url=defoIndex;
    if(!empty($c))$up_url.='?path=' . $c;
    $dir = $l."/*";
}

//404
if( ! file_exists( __DIR__ . '/' . $l) ) {
    if($i===-1)$l=defoIndex;
    header("location: ".$l);
    die;
}

function base64_IMG($data, $type) {  
    return ('data:image/'.$type.';base64,'.$data);
}

//base64 icon
$im = "iVBORw0KGgoAAAANSUhEUgAAAAoAAAAKCAYAAACNMs+9AAAACXBIWXMAABIjAAASIwE6F+ykAAAAIGNIUk0AAHolAACAgwAA+f8AAIDpAAB1MAAA6mAAADqYAAAXb5JfxUYAAABCSURBVHjavM+xEQAgDEJRlnIn98uA30rvglE7CxruFaDWQ60HFgEpE8mC9yeoP7DC+0ageo3jCXV5zgsm/IJr/xgAB5aui1KJ86AAAAAASUVORK5CYII=";

?>
<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta charset="UTF-8" />
<title><?= title.$l ?></title>
<style>
body{padding:20px;margin:0;font-size:15px;font-family:sans-serif,verdana,arial;}
.icon{display:inline-block;height:10px;width:10px;background-image:url("<?= base64_IMG($im, "png") ?>");}
</style>
</head>
<body>
<h2><?= title.$l ?></h2><hr/><pre>
<?php

$g = glob($dir);

if(!empty($up_url))echo '<p><a href="'.$up_url.'">&larr;Back</a></p>';

usort($g,function($a,$b) {
    if(is_dir($a) == is_dir($b))
        return strnatcasecmp($a,$b);
    else
        return is_dir($a) ? -1 : 1;
});

function printElement($a) {
    $out = null;
    $f =  basename($a);
    
    if (is_dir($a)) {
        //$out = '<span class="icon"></span>&nbsp;<a href="?path='. $a.'">' . $f . '</a><br/>';
        
        $out = '<span class="icon">Test1</span>&nbsp;<img src=="?path='. $a.'">' . $f . '</img><br/>';
        
        
    } else {
       // $out = '<span>&bull; Tis </span>&nbsp;<a href="'.$a.'">' . $f . '</a><br/>';
         $out = '<img src="https://partyadda.com/public/uploads/'. $a.'">' . $f . '<br/>';

    }
    if($f===defoIndex) {
        if( empty($_GET['path'])) {
            $out=null;
        } else {
            $url = ( empty($_SERVER['HTTPS']) ? 'http' : 'https' ) . "://$_SERVER[HTTP_HOST]/" . $_GET['path'];
            header("location: ".$url);
            die;
        }
    }
    return $out;
}

$files = implode('',array_map(function($a) {return printElement($a);},$g));
if(empty($files))$files='<i><mark style="font-size:0.7em">Folder is empty !</mark></i>';
echo $files;

?>
</pre>
<hr/>

Nice one 
</body>
</html>