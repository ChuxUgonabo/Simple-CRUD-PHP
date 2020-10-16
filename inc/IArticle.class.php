<?php

interface IArticle {



    function getShortName(): string;
   
    function setShortName(string $newShortName);
  
    function getLastUpdate(): string;
   
    function setLastUpdate(string $pDate);
   
    function getTitle(): string;
   
    function setTitle(string $title);
   
    function setSummary(string $summary);
  
    function getSummary(): string;
 
    function getContent(): string;
    
    function setContent(string $content);

    

  
    
}

?>