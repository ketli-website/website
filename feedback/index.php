<?php
include('../../fblogin.php');
include('../../header.php');
include('../../dbConnection.php');
?>
<!doctype html>
<html>
<head>
<meta name="keywords" content="ketli, ketli.in, test paper, assignment,knit sultanpur,ketli.com, etc.">
 <meta name="description" content="Engineering student portal.">
<meta property="fb:app_id" content="755332954577256"/>
</head>
<body>
<div style="margin-left:30px; margin-right:30px;">
<div class="row">
<div class="col-md-8 col-md-offset-2">
                                             <!--test paper upload-->

<?php
if(!isset($_SESSION['id']))
{
echo '<div class="panel panel-default" style="height:200px">
 <div class="panel-body">
 <center><p class="title2"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;&nbsp;Upload Paper</p></center>
 <hr>
   
   <p style="color:green"><span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>&nbsp;&nbsp;Please first login with facebook to continue. Thank you!!</p>
 </div></div>';
   }
else
{
echo '<div class="panel panel-default">
 <div class="panel-body">
 <center><p class="title2"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;&nbsp;Upload Paper</p></center>
 <hr>';
 
 
 echo '<form method="post" action="update.php" enctype="multipart/form-data">
<div class="form-group">
    <label for="title">Title :</label>
    <input type="text" class="form-control" maxlength="50" name="title" id="title" placeholder="Enter title" required>
 
  <label for="link">Link :</label>
    <input type="text" class="form-control" maxlength="400" name="link" value="http://" id="text" placeholder="Enter link for shared" required>
      <label for="text">Enter Text :</label>
    <textarea class="form-control" rows="3" maxlength="200" name="text" id="text" placeholder="Enter description" required></textarea>
   <p class="help-block"><span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span>&nbsp;&nbsp;Word limit is equal to 200 words.<br/></p>
  
  
  
  </div>







<center><button type="submit" class="btn btn-primary sub" style="background:#8f40a5; border-radius:0px;">Submit&nbsp;&nbsp;<span class="glyphicon glyphicon-send" aria-hidden="true"></span></button></center>
</form>


<!------------------------------------------------------------------------------------------------->
</div>
  </div><!--panel end-->';
}

  ?>
  </div><div></div></div></div>
  <?php
  include ('../../footer.php');
  ?>


</body>
</html>