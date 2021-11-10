<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
require_once ('../vendor/autoload.php');

class ControllerRegister 
{

    private $_RegisterManager;
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
            $this->registers();
        }

    }

    private function registers()
    {
            
        $viewPath = $_SERVER['DOCUMENT_ROOT']."/PHP_Rush_MVC/views/viewRegister.html";

            if (file_exists($viewPath))
               {
                  
                //On lance la class en question avec tous les parametres url
                require_once($viewPath);
                $this->ctrl = new Register;
               }

    }


}

    