<?php
ini_set('display_errors', 'on');
 class Model
{

    private static $_bdd;

    //connexion a la base de données


    private static function setBdd()

    {
        self::$_bdd = new PDO('mysql:host=localhost;dbname=php_mvc;port=3306', 'Jean', 'coding');

        //on utilise les constantes de PDO pour gérer les erreurs
        self::$_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
       
    }

    //fonction de connexion par défault à la base de données

    public function getBdd()
    {
        if(self::$_bdd == NULL)
        {
            self::setBdd();
            return self::$_bdd;
        }
    }

    //on créer une méthode de récupération de liste d'éléments dans la base de données

    protected function getAll($table, $obj)
    {
        $this->getBdd();
        $var = [];
        $req = self::$_bdd->prepare('SELECT * FROM '.$table.' ORDER BY id desc');
        $req->execute();
        

        //on créer une variable data qui va contenir les données de la table cible

        while ($data = $req->fetch(PDO::FETCH_ASSOC))
        {   
            //var contiendra les données sous forme d'objets
            $var[] = new $obj($data);
            
        }

        return $var;
        $req->closeCursor();
    }



}

?>
