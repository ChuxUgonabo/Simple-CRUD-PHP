
<div id="header">
 <!-- Just and example how to put some banner in the header -->
<!--<div style="float: right; padding-top: 15px; padding-right: 32px;">-->

 <!-- End of example -->
      <div >
      <h1><?php echo $adminArticle->getTitle();?></h1>
      <h2><?php echo $adminArticle->getSummary();?> </h2><br><br>
      <h2>home:<?php echo $adminArticle->getShortName();?></h2>
      </div>
       <!---this file contains the Navigation of showing the list -->

      <div id="topwrap"></div>
       <!--<div id="header">-->
       
      <div id="wrap">

      <div id="content">
     
      <div class="left">
      <h3>Navigation</h3><br>
      <ul>
      <?php for($r=1;$r<count($currArticles);$r++){
            echo '<li><a href="'.$_SERVER["PHP_SELF"].'?action=showList&displayShortName='
            .$currArticles[$r]->getShortName().'">'.$currArticles[$r]->getTitle().'</a></li>';
           }
       ?>
     
      </ul>  
      
      </div>
      
      <div class="right">
      
      <h3><?php echo $adminArticle->getTitle();?></h3><br>
      <h4><?php echo $adminArticle->getContent();?></h4><br>
      <hr><br>
      <h3>Last Updated: <?php echo $adminArticle->getLastUpdate();?></h3>

      </div>
      
      </div>
      
      <div id="clear"></div>
      
      </div>
      
      <div id="botwrap"></div>
