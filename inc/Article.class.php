<?php

//References: https://www.elated.com/cms-in-an-afternoon-php-mysql/#step3


class Article implements IArticle
{
    private $shortName;
    private $pDate;
    private $summary;
    private $content;
    private $title;
    
    function getShortName(): string{
        return $this->shortName;

    }
    function setShortName(string $newShortName){
        $this->shortName=$newShortName;
    }

    function getLastUpdate(): string{
        return $this->pDate;
    }

    function setLastUpdate(string $pDate){
       $this->pDate=$pDate;
    }
    function getTitle(): string{
        return $this->title;
    }
    function setTitle(string $title){
        $this->title=$title;
    }

  

    function setSummary(string $summary){
        $this->summary=$summary;
    }

    function getSummary(): string{
        return $this->summary;
    }

    function getContent(): string{
        return $this->content;
    }
    
    function setContent(string $content){

        $this->content=$content;
    }


  
}

?>