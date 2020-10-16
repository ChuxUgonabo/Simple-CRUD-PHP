
<div id="header">
 <!-- Just and example how to put some banner in the header -->
<!--<div style="float: right; padding-top: 15px; padding-right: 32px;">-->
 <!-- End of example -->
        <div >
        <h1><a href="#"><?php echo $editArticle->getTitle();?></a></h1>
        <h2><?php echo $editArticle->getSummary();?></h2><br><br>
        <h2>home:<?php echo $editArticle->getShortName();?></h2>
        </div>
      
      
    <!-- this file builds for dispalying the selected Acticle-->
       <div id="topwrap"></div>
        <!--<div id="header">-->
        
        
       <div id="wrap">
       
        <!-- Just and example how to put some banner in the header -->
       <div id="content">
       
       <div class="left">
       <h3>Admin Menu</h3><br>
       <h4>Please pick from one of the admin options below:</h4><br>
       <ul>
       <li><a href="<?php echo $_SERVER["PHP_SELF"].'?action=showList';?>">List Articles</a></li>
       <li><a href="<?php echo $_SERVER["PHP_SELF"].'?action=showNew';?>">New Article</a></li>
       
       </ul>
       
       </div>
       
       <div class="right">
       
       <h3>Editing Article:<?php echo $editArticle->getTitle();?></h3><br>
       <form method="POST" ACTION="<?php echo $_SERVER["PHP_SELF"];?>" >
       <label style="width:100px;"><h3> shortName:</h3></label><?php echo $editArticle->getShortName();?><input hidden type="text" name="shortName" value="<?php echo $editArticle->getShortName();?>"><br><br>
       <label style="width:100px;"><h3>Title</h3></label><input type="text" name="title" value="<?php echo $editArticle->getTitle();?>"><br><br>
      
       <label style="width:100px;"><h3>summary</h3></label><textarea name="summary"  rows="2"  cols="50"><?php echo $editArticle->getSummary();?></textarea><br><br>
       <label style="width:100px;"><h3>content</h3></label><textarea name="content"  rows="4"  cols="50"><?php echo $editArticle->getContent();?></textarea><br><br>
       <input hidden type="text" name="lastUpdate" value="<?php echo date('D,d-F-Y h:i:s');?>">
       <input type="submit" name="submit" value="Edit Article"><br>
       <form>
       </div>
       
       </div>
       
       <div id="clear"></div>
       
       </div>
       
       <div id="botwrap"></div>



