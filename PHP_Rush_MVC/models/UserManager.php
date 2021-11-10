<?php

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

class UserManager extends Model
{
    //création de la fonction qui va récupérer tous les articles dans la bdd

    public function getUsers()
    {
        return $this->getAll('users', 'User');
    }
}


?>