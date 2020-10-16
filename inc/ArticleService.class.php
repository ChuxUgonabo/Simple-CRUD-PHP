<?php

   class ArticleService implements IArticleService {

   public static $allArticles=array();
    
    static function insertArticle(Article $newArticle) : bool{

         self::$allArticles=self::getArticles();
         self::$allArticles[]=$newArticle;
   
        return self::writeArticles(self::$allArticles);;
     }
    
    static function getArticle(string $aShortName) : Article{
       $status=false;
       //getting AllArticles first, and then select one which shortname is same as paramater
       self::$allArticles=self::getArticles();
       $matchedArticle= new Article();
       try{
          foreach(self::$allArticles as $article){
             if($article->getShortName()==$aShortName){

                $matchedArticle=$article; 
                $status=true;
              }
            }
            if($status==false){
                throw new Exception("There is no matched article here");
            }
         }catch(Exception $ex){
              echo $ex->getMessage();
              error_log($ex->getMessage(),3,"templates/errors_log.log");
         }

        return $matchedArticle; 
     

    }

    static function getArticles(): array{
       //get all string contents from psv,
       $content=FileService::read();
       //convert to array format
       self::$allArticles=self::parse($content);
      
       return self::$allArticles;

    }

    static function deleteArticle(string $shortName) : bool{
      $status=false;
      //convert psv to array of object of article
      self::$allArticles=self::getArticles();
      //initialize an array for store the remainedArticles
      $remainedArticles=array();

      if($shortName=="Home Page"){
         echo "The home page can not be deleted!";
         $remainedArticles=self::$allArticles;
      }
      else{
          try{
              foreach(self::$allArticles as $a){
                 if($a->getShortName()==$shortName){ 
                  //find one , and skip it
                  $status=true;
                  }
                 else{
                   $remainedArticles[]=$a;
                   }
               } 
               if($status==false){
                  throw new Exception("Deleting Problem");
                 }
            }catch(Exception $ex){
             echo $ex->getMessage();
             error_log($ex->getMessage(),3,"templates/errors_log.log");
            }
         }
        //convert array of article to psv, 
          self::writeArticles($remainedArticles);
          self::$allArticles=$remainedArticles;
      

       return $status; 

    }

    static function updateArticle(Article $updatedArticle) : bool{
      $status=false;
      //convert psv to array of object of article
      self::$allArticles=self::getArticles();
      $renewedAllArticles=array();

      if($updatedArticle->getShortName()=="Home Page"){
         echo "The home page can not be edited!";
         $renewedAllArticles=self::$allArticles;
      }
      else{

          try{
              foreach(self::$allArticles as $a){
                 if($a->getShortName()==$updatedArticle->getShortName()){ 
                   // if find one , put update the element 
                   $new=new Article();
                   $new->setShortName($updatedArticle->getShortName());
                   $new->setSummary($updatedArticle->getSummary());
                   $new->setTitle($updatedArticle->getTitle());
                   $new->setContent($updatedArticle->getContent());
                   $new->setLastUpdate($updatedArticle->getLastUpdate());
                   $renewedAllArticles[]=$new;
                   $status=true;
               
                   }
                 else{
                    $renewedAllArticles[]=$a;
               
                    }
                }
                if($status==false){
                    throw new Exception("Updating Problem, Cannot find the same shortName");
                  }
             }catch(Exception $ex){
             echo $ex->getMessage();
             error_log($ex->getMessage(),3,"templates/errors_log.log");
             }
          }
        //convert array of article to psv, 
          self::writeArticles($renewedAllArticles);
          self::$allArticles=$renewedAllArticles;

       return $status; 
        

    }

    static function writeArticles(array $articles) : bool{
   
      $status=false; 
      $content=""; 
     
      for($r=0;$r<count($articles);$r++){

         if($r==(count($articles)-1)){
           $content.=$articles[$r]->getShortName()."|";
           $content.=$articles[$r]->getTitle()."|";
           $content.=$articles[$r]->getSummary()."|";
           $content.=$articles[$r]->getContent()."|";
           $content.=$articles[$r]->getLastUpdate();
        
         }else{
            $content.=$articles[$r]->getShortName()."|";
            $content.=$articles[$r]->getTitle()."|";
            $content.=$articles[$r]->getSummary()."|";
            $content.=$articles[$r]->getContent()."|";
            $content.=$articles[$r]->getLastUpdate();  
            $content.="\n"; 
         }
      
      }
      if(!$content){
         $status=true;
      }
      FileService::write($content);

     return $status;

    }

    static function parse($contents){
      $arrArticles=array();
      $lines=explode("\n", $contents);

      for($i=0;$i<count($lines);$i++){
         try{
          $column=explode("|", $lines[$i]);
             if(count($column)==5){
              $c=new Article();
               $c->setShortName($column[0]);
               $c->setTitle($column[1]);
               $c->setSummary($column[2]);
               $c->setContent($column[3]);
               $c->setLastUpdate($column[4]);
             
              
              $arrArticles[]=$c;
             }
             else{
             throw new Exception("There is a problem on line ".($i+1));
             }
         }catch(Exception $ex){
            echo $ex->getMessage();
            error_log($ex->getMessage(),3,"templates/errors_log.log");
           }
      
      }
      return $arrArticles;

    }

}


?>