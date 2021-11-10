<?php
ini_set('display_errors', 'on');

require_once('../controllers/Router.php');

require('../vendor/autoload.php');


$router = new Router();

$router->routeReq();



/*
$loader = new \Twig\Loader\FilesystemLoader(__DIR__. '/../views');
$twig = new \Twig\Environment($loader,[
    
    'cache' => false,
    
    ]);
 $template = $twig->load('viewsAccueil.twig');
//echo $template->render();
*/
?>