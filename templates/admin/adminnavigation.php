

<div id="header">
 <!-- Just and example how to put some banner in the header -->
<!--<div style="float: right; padding-top: 15px; padding-right: 32px;">-->
 <!-- End of example -->


<div >
 <h1>Admin-Article</h1>
 <h2>Page for Editing Articles</h2><br><br>
 <h2>home:</h2>
 </div>

 <!-- this file is showing the adminView-->
<div id="topwrap"></div>
<!--<div id="header">-->

<div id="wrap">
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

<h3>Admin Page</h3><br>
<form method="POST" ACTION="<?php echo $_SERVER["PHP_SELF"];?>" >
<table style="border-spacing:0 15px;">
<tr>
     <th style="text-align: left; vertical-align: middle;" >Article ShortName</th>
     <th style="text-align: left; vertical-align: middle;">Title</th>
     <th style="text-align: left; vertical-align: middle;">Edit</th>
     <th style="text-align: left; vertical-align: middle;">Delete</th>
</tr>
<?php for($r=1;$r<count($currArticles);$r++){
 echo '<h4><tr>
<td style="width:60px;">'.$currArticles[$r]->getShortName().'</td>
<td style="width:150px;">'.$currArticles[$r]->getTitle().'</td>
<td style="width:50px;"><a href="'.$_SERVER["PHP_SELF"].'?action=edit&shortName='.$currArticles[$r]->getShortName().'">Edit</a></td>
<td style="width:50px;"><a href="'.$_SERVER["PHP_SELF"].'?action=delete&shortName='.$currArticles[$r]->getShortName().'">Delete</a></td>
</tr></h4>';
}?>
</table>
</form>
</div>

</div>

<div id="clear"></div>

</div>

<div id="botwrap"></div>
