<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
require_once('ControllerUser.php');
require_once('ControllerAccueil.php');


class Router
{
  private $ctrl;
  private $view;

  public function routeReq()
  {
    try
    {

      spl_autoload_register(function($class)
      {
        require_once('../models/'.$class.'.php');
      });

          $r = parse_url($_SERVER['REQUEST_URI']);
          $url = substr($r['path'], strrpos($r['path'], '/'));
          $url = explode('/', filter_var($url, FILTER_SANITIZE_URL)); 

        if (isset($url[1]) && !empty($url[1]))
        { 
          $controller = ucfirst(strtolower($url[1]));

          if ($url[1] == 'Login' || $url[0]) 
          {

              $ControllerUser = new ControllerUser;  
              $ControllerUser->logins();
          }
          else if ($url[1] == 'Register')
          {
            $ControllerUser = new ControllerUser;
            $ControllerUser->registers();
          }

          else
          {
            $controllerClass = "Controller".$controller;

            $controllerFile = './'.$controllerClass.".php";
            $controllerPath = $_SERVER['DOCUMENT_ROOT']."/PHP_Rush_MVC/controllers/".$controllerFile;

            if (file_exists($controllerPath))
            {

                require_once($controllerPath);
                $this->ctrl = new $controllerClass($url);
            }

            } 
        }


        else
        {
            
        require_once('../views/viewLogin.html');

        header ('location:Login');

        }
    }

    catch(\Exception $e)
    {
           $errorMsg = $e->getMessage();


    }
  }
}

?>