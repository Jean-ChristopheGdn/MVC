<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

class Article
{

    private $_id;
    private $_title;
    private $_content;
    private $_author;
    private $_date;

    public function __construct(array $data)
    {
        $this->hydrate($data);
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

    //setters

    public function setId($id)
    {
        $id = (int) $id;
        if ($id > 0)
        {
            $this->_id= $id;
        }
    }


    public function setTitle($title)
    {
        
        if (is_string($title))
        {
            $this->_title= $title;
        }
    }


    public function setContent($content)
    {
        
        if (is_string($content))
        {
            $this->_content= $content;
        }
    }

    public function setAuthor($author)
    {
        $this->_author = $author;
    }

    public function setDate($date)
    {
        $this->_date = $date;
    }
    


    //getters

    public function id()
    {
        return $this->_id;
    }

    public function title()
    {
        return $this->_title;
    }

    public function content()
    {
        return $this->_content;
    }

    public function author()
    {
        return $this->_author;
    }

    public function date()
    {
        return $this->_date;
    }


}


?>