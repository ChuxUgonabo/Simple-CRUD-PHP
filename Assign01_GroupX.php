<?php

/*  CSIS 3280-Assignemt #1 - File-based CMS
    Students names(ID):
            S M Saif Newaz(300278907)
            Shi Wei Jun(300108357)
*/

//Reference https://www.elated.com/cms-in-an-afternoon-php-mysql/#step5

//Require the files
require_once("inc/Config.inc.php");
require_once("inc/IFileService.class.php");
require_once("inc/FileService.class.php");

require_once("inc/IArticle.class.php");
require_once("inc/Article.class.php");
require_once("inc/IArticleService.class.php");
require_once("inc/ArticleService.class.php");

//call function to get the array of acticles;
$currArticles=ArticleService::getArticles();  
//call function to get a specific array to show on the homepage
$adminArticle=ArticleService::getArticle("Home Page");


//var_dump($_POST);
//var_dump($_GET);
if(isset($_GET["action"])){
       //Run a case statement to see what was requested.
      switch($_GET["action"]){
         case "showList":
          // include TEMPLATE_PATH."/viewArticle.php";       
         include TEMPLATE_PATH."/adminView.php";    
         break;

         case "showNew":
             include TEMPLATE_PATH."/editNewView.php";
         break;

         case "edit":
             //get the specific editArticle for display via keyword of shortName
             $shortName=$_GET["shortName"];
             $editArticle=ArticleService::getArticle($shortName); 
             $currArticles=ArticleService::$allArticles;             
             include TEMPLATE_PATH."/editView.php";
         break;

         case "delete":
             //get the string of shortName and pass to delete funciont 
             $shortName=$_GET["shortName"];
             ArticleService::deleteArticle($shortName);
             $currArticles=ArticleService::$allArticles;
             include TEMPLATE_PATH."/adminView.php";
         break;
         
         default:
         break;
       }
  }

if (isset($_POST['submit'])){
       //See if the articleShortName was passed in 
        switch($_POST['submit']){
         case 'Edit Article':
         $na=new Article();
         $na->setShortName($_POST["shortName"]);
         $na->setTitle($_POST["title"]);
         $na->setSummary($_POST["summary"]);
         $na->setContent($_POST["content"]);
         $na->setLastUpdate($_POST["lastUpdate"]);

         ArticleService::updateArticle($na);
         $currArticles=ArticleService::$allArticles;
         include TEMPLATE_PATH."/adminView.php";
         //echo "editing is done";
         break;
         //var_dump($allArticles);
        
         case 'Add New Article':
         $n=new Article();
         $n->setShortName($_POST["shortName"]);
         $n->setTitle($_POST["title"]);
         $n->setSummary($_POST["summary"]);
         $n->setContent($_POST["content"]);
         $n->setLastUpdate($_POST["lastUpdate"]);

         ArticleService::insertArticle($n);
         $currArticles=ArticleService::$allArticles;
         //var_dump($currArticles);

         //echo "adding new is done";
         include TEMPLATE_PATH."/adminView.php";
         break;
         
         default:
         break;
         } 
   
}
if(empty($_GET["action"])&&empty($_POST["submit"])){
      //initially show the homepage as viewArticle.php
      include TEMPLATE_PATH."/viewArticle.php";  

    }
 


?>