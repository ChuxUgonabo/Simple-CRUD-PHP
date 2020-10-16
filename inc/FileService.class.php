<?php



class FileService implements IFileService {
 
    static function read(){
      try{
        $fh= fopen(ARTICLE_FILE, 'r');
        $fileContents=fread($fh, filesize(ARTICLE_FILE));
        fclose($fh);
         if(!$fh){
            throw new Exception("File of ".ARTICLE_FILE." cound't be found");
          }
      }catch(Execption $ex){
         echo $ex->getMessage();
        }
    return $fileContents;

    }

  
    static function write($content){
        $status=false;
      //assume $contents is a string
       try{
           //if using 'a', add content to the last line 
            $fh=fopen(ARTICLE_FILE,'w');
            fwrite($fh,$content);
            fclose($fh);

           if(!$fh){
               throw new Exception("File ".ARTICLE_FILE." Articles cound not be written");            
           }
           else{
               $status= true;
           }


       }catch(Exception $ex){

        echo $ex->getMessage();
       }

        return $status;
    }
}
?>