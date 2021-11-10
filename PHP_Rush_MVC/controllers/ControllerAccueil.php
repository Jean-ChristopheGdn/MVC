<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
require_once ('../vendor/autoload.php');

class ControllerAccueil
{

    private $_articleManager;
    private $_view;
    private $_loader;
    private $_twig;

    public function __construct()
    {
     
        $this->_loader = new \Twig\Loader\FilesystemLoader(__DIR__. '/../views');
        $this->_twig = new \Twig\Environment($this->_loader,[
            
            'cache' => false,
            
            ]);


       if(isset($url) && count($url) > 1)
        {
            throw new \Exception("Page introuvable", 1);
        }
        else
        {
            $this->articles();
        }

    }

    private function articles()
    {
        $this->_articleManager = new ArticleManager();
        $articles = $this->_articleManager->getArticles();
        echo $this->_twig->render('viewAccueil.html', ['articles' => $articles]);

    }


}

    




?>