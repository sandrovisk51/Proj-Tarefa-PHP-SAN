<?php
require_once 'vendor/autoload.php';
require_once 'funcao/temperaturas.php';
require_once 'funcao/datas.php';

$paginas  = new \Twig\Loader\FilesystemLoader('templates');
$twig     = new \Twig\Environment($paginas, ['cache' => 'cache', 'debug' => true]);

$pagina = (isset($_GET['pag']))? $_GET['pag'] : NULL;

if($pagina == 'temperaturas'){
  $temperaturas = temperaturas();
  echo $twig->render('temperaturas.html', ['temperaturas' => $temperaturas]);
}elseif ($pagina == 'datas') {
  $datas = datas();
  echo $twig->render('datas.html', ['datas' => $datas]);
}else{
	echo $twig->render('index.html');
}

?>