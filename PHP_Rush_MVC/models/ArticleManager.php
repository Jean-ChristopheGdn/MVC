<?php

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

class ArticleManager extends Model
{


    public function getArticles()
    {
        return $this->getAll('articles', 'Article');
    }
}


?>