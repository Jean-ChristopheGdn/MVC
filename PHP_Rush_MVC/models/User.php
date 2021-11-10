<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
require_once ('Model.php');

class User 
{

    private $_id;
    private $_username;
    private $_password;
    private $_email;
    private $_group;
    private $_userStatus;
    private $_accountStatus;
    private $_creationDate;
    private $_lastModification;
    private $db;

    public function __construct()
    {
        // $this->hydrate($data);
        $connexion = new Model;
        $this->db = $connexion->getBdd();
    }
     
    
    //hydratation

    public function hydrate(array $data)
    {
        foreach ($data as $key => $value)
        {
            $method = 'set'.ucfirst($key);
            if (method_exists($this, $method))
            {
                $this->$method($value);
            }
        }

    }

    public function login($email, $password)
    {
        if(!empty($email) || !empty($password)) 
        { 

            if(empty($email) || empty($password))
            {
                echo "Veuillez remplir les champs.";
            } 
            else
            {

                $sql = 'SELECT * FROM users WHERE email=:email';

                $reqUsers = $this->db->prepare($sql);

                $reqUsers->bindParam(':email', $email);
                $reqUsers->execute();
                $ctrlLog = $reqUsers->fetch(PDO:: FETCH_ASSOC);
                if($ctrlLog == NULL)
                {
                    echo 'Veuillez entrer un mot de passe correct.';
                }
                else
                {

                    if(password_verify($_POST["password"], $ctrlLog['password']))
                    {
                        echo $password;
                        echo 'Les mots de passes sont identiques';
                        require_once('../views/viewAccueil.html');

                         header ('location:Accueil');   

                        if($ctrlLog['group'] != 0)
                        {

                          header ('location:../phpmyadmin'); 
                        }
                        else
                        {
                        require_once('../views/viewAccueil.html');

                         header ('location:Accueil'); 
                        }
                    }
                }
            }
        }
     }



    public function register($username, $email, $password, $password_confirmation)
    {

    if (strlen($username) < 3)
    {
        echo "Le nom est invalide.".PHP_EOL;
    }
    elseif ((filter_var($email, FILTER_VALIDATE_EMAIL)) == false )
    {
        echo "L'email est invalide".PHP_EOL;
    }
    elseif (strlen($password) < 8 )
    {
        echo "Le mot de passe est invalide.".PHP_EOL;
    }
    elseif ($password != $password_confirmation)
    {
        echo "Les mots de passe ne sont pas identiques !";
    }


    else
    {

    $sql = 'SELECT * FROM users WHERE email=:email';
 
        $reqUsers = $this->db->prepare($sql);
        $reqUsers->bindParam(':email', $email);
        $reqUsers->execute()or die(print_r($connection->errorInfo(), true));
        
        $result = $reqUsers->fetchAll();


        

        if($result != NULL)
        {
            echo 'Cette adresse mail est déjà utilisée !';
        }

        else
        {
            
            $password = password_hash($password, PASSWORD_DEFAULT);

            $insert = "INSERT INTO users (username, email, password, creationDate) VALUES (:username, :email, :password, now())";


            $test = $this->db->prepare($insert);
            $test->bindParam(':username', $username);
            $test->bindParam(':email', $email);
            $test->bindParam(':password', $password);
        

            if ($test->execute() == false)
            {
                echo "Error.".PHP_EOL;
            }
            else
            {
                echo "User created.".PHP_EOL;
                require_once('../views/viewAccueil.html');

                header ('location:Login');                 
            }

        }
    }   

    }
    //setters

    public function setId($id)
    {
        $id = (int) $id;
        if ($id > 0)
        {
            $this->_id= $id;
        }
    }


    public function setpassword($password)
    {
        
        if (is_string($password))
        {
            $this->_password= $password;
        }
    }


    public function setEmail($email)
    {
        
        if (is_string($email))
        {
            $this->_email= $email;
        }
    }

    public function setGroup($group)
    {
        $this->_group = $group;
    }

    public function setUserStatus($userStatus)
    {
        $this->_userStatus = $userStatus;
    }

    public function setAccountStatus($accountStatus)
    {
        $this->_accountStatus = $accountStatus;
    }
    

    public function setCreationDate($creationDate)
    {
        $this->_ucreationDate = $creationDate;
    }
    
    
    public function setLastModification($lastModifiction)
    {
        $this->_lastModifiction = $lastModifiction;
    }
    


    //getters

    public function id()
    {
        return $this->_id;
    }

    public function password()
    {
        return $this->_password;
    }

    public function email()
    {
        return $this->_email;
    }

    public function group()
    {
        return $this->_group;
    }

    public function userStatus()
    {
        return $this->_userStatus;
    }

      public function accountStatus()
    {
        return $this->_accountStatus;
    }

    public function creationDate()
    {
        return $this->_creationDate;
    }

    public function lastModification()
    {
        return $this->_lastModification;
    }


}



?>