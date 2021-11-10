<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
require_once ('../vendor/autoload.php');
require_once('../models/User.php');
require_once('Router.php');

class ControllerUser
{

    private $_userManager;
    private $_view;
    private $_loader;
    private $_twig;

    public function __construct()
    {

        
        $this->_loader = new \Twig\Loader\FilesystemLoader(__DIR__. '/../views');
        $this->_twig = new \Twig\Environment($this->_loader,[
            
            'cache' => false,
            
            ]);

        $r = parse_url($_SERVER['REQUEST_URI']);
        $url = substr($r['path'], strrpos($r['path'], '/'));
        $url = explode('/', filter_var($url, FILTER_SANITIZE_URL));

        if (!empty ($_POST))
        {
        if($url[1] == 'Login')
        {

            $email = $_POST['email'];
            $password = $_POST['password'];
            $modelUser = new User;
            $modelUser->login($email, $password);
            $this->users();
        }
        else if ($url[1] == 'Register')
        {

            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $password_confirmation = $_POST['password_confirmation'];
            $modelUser = new User;
            $modelUser->register($username, $email, $password, $password_confirmation);
            $this->users();
        }

        else
        {
            echo 'Page introuvable';
        }
        }
    }

    public function logins()
    {   

        $viewPath = $_SERVER['DOCUMENT_ROOT']."/PHP_Rush_MVC/views/viewLogin.html";

            if (file_exists($viewPath))
               {
                require_once($viewPath);
                $this->ctrl = new User;
               }

    }

    public function registers()
    {
            
        $viewPath = $_SERVER['DOCUMENT_ROOT']."/PHP_Rush_MVC/views/viewRegister.html";

            if (file_exists($viewPath))
               {
 
                require_once($viewPath);
                $this->ctrl = new User;
               }

    }

    private function users()
    {
        $this->_userManager = new UserManager();
        $users = $this->_userManager->getUsers();
        echo $this->_twig->render('viewUser.html', ['users' => $users]);

    }


}

    




?>