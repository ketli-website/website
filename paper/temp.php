<?php
include('../../../../../dbConnection.php');
$q=mysqli_query($con ,"SELECT * FROM paper  where pid='$pid'") or die ("Error");
while($row=mysqli_fetch_array($q))
{
$title=$row['title'];
$user_id=$row['user_id'];
$user_name=$row['user_name'];
$photo=$row['photo'];
$branch_id=$row['branch_id'];
$college_id=$row['college_id'];
$paper_folder=$row['paper_folder'];
$time=$row['time'];
$year=$row['year'];
$view=$row['view'];
}
include '../../../../../fblogin.php';
include '../../../../../header.php';

$ogurl='http://ketli.in'.$_SERVER['REQUEST_URI'];


?>
<!doctype html>
<html>
<head>
<title><?php echo $title ; ?></title>
 <meta property="og:url"           content="<?php echo $ogurl; ?>">
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="<?php echo $title ; ?>" />
    <meta property="og:description"   content="<?php echo $title ; ?>" />
    <meta property="og:image"         content="<?php echo $photo ; ?>" />

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />


        <link href="../../../../../dist/css/lightgallery.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../../../../../dist/css/lg.css" />
   
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		
<script>
$(function() {
    while( $('#fitin div').height() > $('#fitin').height() ) {
        $('#fitin div').css('font-size', (parseInt($('#fitin div').css('font-size')) - 1) + "px" );
    }
});
</script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.4&appId=755332954577256";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
</head>

<body>

<div style="margin-left:30px; margin-right:30px;">
<div class="row">
<div class="col-md-9">
<div class="panel panel-default content">
  <div class="panel-body">
  
 <!--title of article---------------------------------------------------------------------------------------------------------------------> 
<center> <p class="title2"><?php echo $title ; ?></p></center>
 <!--------------------------------------------------------------------------------------------------------------------------------------->
 
 <hr>
<div class="row">
<div class="col-md-2" style="font-size:13px;">
<?php echo '<center><img  height="70" width="60" class="img-responsive img-circle"  src="https://graph.facebook.com/'.$user_id.'/picture?type=large"/></center>';?>
<br /><br />
<center><p ><span style="color:#1d9d74; "> By&nbsp;:&nbsp;</span><a target="_blank" title="submitted on <?php echo $time ; ?>" href="https://facebook.com/<?php echo $user_id ; ?>"><?php echo $user_name ; ?></a><br />
</center>
<hr >
</div>
<div class="col-md-3 article"  style="overflow-x:hidden">
<!-----------------------------------------------content of article-------------------------------------------------------------------->
<div class="demo-gallery">
            <ul id="lightgallery" class="list-unstyled row">
<?php

	$dir = opendir( "thumb/");
	$counter = 0;
  	while (false !== ($fname = readdir($dir)))
  	{
    	if ($fname != '.' && $fname != '..') 
    	{
     	 echo "<li class=\"col-xs-6 col-sm-4 col-md-3\" data-src=\"{$fname}\" data-sub-html=\"<h4>Heading</h4><p>Discription</p>\">\n";
		 echo "<a href=\"\">\n";
		 echo "<img class=\"img-responsive\" src=\"thumb/{$fname}\">\n";
		 echo "</a></li>\n";
    	}
  	}
		echo "</ul>\n";
          echo '&nbsp;&nbsp;&nbsp;views<span style="float:left;color:#8f40a5;">'.$view.'</span></br>';
		$view++;
		$q5=mysqli_query($con ,"UPDATE paper set view='$view' where pid='$pid'") or die ("Error");
	?>      
         </div>

<!---------------------------------------------------------------closing of content---------------------------------------------------------->
</div><div class="col-md-2">
<?php
		if($user_id==$_SESSION['id'])
		{
			echo '<form action="../../../../delete.php" method="post">
				<input type="hidden" name="pid" value="'.$pid.'"> 
				<input type="hidden" name="paper_folder" value="'.$paper_folder.'"> 
				
			<button type="submit" name="Submit" class="btn btn-primary sub" style="background:#8f40a5; border-radius:0px;">Delete&nbsp;&nbsp;<span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></form>';
		} ?>

</div></div><!--closing of col-md-8 and row-->
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8">
<hr>
<div class="fb-send" data-href="<?php echo $ogurl; ?>"></div><br><br>


<div class="fb-like" data-href="<?php echo $ogurl; ?>" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
<div class="fb-comments" data-href="<?php echo $ogurl; ?>" data-numposts="5"></div>

</div></div>
</div></div>






</div><!--col-md-9 closed-->
<div class="col-md-3">
<div class="panel panel-default">
 <div class="panel-body"><a href="../../../../../../upload/">
 <center><p class="titles"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;&nbsp;Upload Paper</p></center></a>
 </div></div>
<div class="panel panel-default">
  <div class="panel-body">
<center> <p class="titles"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>&nbsp;&nbsp;Suggested Paper</p></center>
</div></div>
<?php 
if ($year==1)
{
$q=mysqli_query($con ,"SELECT * FROM paper  where college_id='$college_id' and year='$year' ORDER BY rand() LIMIT 2 ") or die ("Error");
}
else
{
$q=mysqli_query($con ,"SELECT * FROM paper  where college_id='$college_id' and branch_id='$branch_id' and year='$year' ORDER BY rand() LIMIT 2 ") or die ("Error");
}
while($row=mysqli_fetch_array($q))
{
$pid=$row['pid'];
$title=$row['title'];
$user_id=$row['user_id'];
$user_name=$row['user_name'];
$time=$row['time'];
$photo=$row['photo'];
$paper_folder=$row['paper_folder'];
$view=$row['view'];

echo '
<a href="'.$paper_folder.'/">
<div class="panel panel-default hoverable">
  <div class="panel-body">';

$array=explode("|", $photo);
$str="";
for($i=0;$i<1;$i++){
    
   
echo '<div style="height:120px; overflow:hidden; margin:0px; padding:0px;"><img src="'.$array[$i].'" height="120" width="100%"/></div>';
} 
echo '
 <div  id="fitin" >'.$title.'</div>
<hr />
&nbsp;&nbsp;&nbsp;views<span style="float:left;color:#8f40a5;">'.$view.'</span></br>
ON
<span style="float:left;color:#1d9d74;">'.$time.'</span>
<span style="float:right"><a style="float:right" target="_blank" href="https://facebook.com/'.$user_id.'"><span style="color:#1d9d74;">By&nbsp;:&nbsp;</span>'.$user_name.'</a></span>
</div></div>

</a>
<!--panel end-->';}
?>

<div class="panel panel-default">
  <div class="panel-body">
<div class="fb-page" data-href="https://www.facebook.com/ketliforstudent" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/ketliforstudent"><a href="https://www.facebook.com/ketliforstudent">KETLI</a></blockquote></div></div>
</div></div>



</div>

</div><!--row closed-->
</div><!--container closed-->
<?php
include '../../../../../footer.php';
include_once("../../../../../analyticstracking.php");
?>
<script type="text/javascript">
        $(document).ready(function(){
            $('#lightgallery').lightGallery();
        });
        </script>
        <script src="https://cdn.jsdelivr.net/picturefill/2.3.1/picturefill.min.js"></script>
        <script src="../../../../../dist/js/lightgallery.js"></script>
        <script src="../../../../../dist/js/lg-fullscreen.js"></script>
        <script src="../../../../../dist/js/lg-thumbnail.js"></script>
        <script src="../../../../../dist/js/lg-video.js"></script>
        <script src="../../../../../dist/js/lg-autoplay.js"></script>
        <script src="../../../../../dist/js/lg-zoom.js"></script>
        <script src="../../../../../dist/js/lg-hash.js"></script>
        <script src="../../../../../dist/js/lg-pager.js"></script>
        <script src="../../../../../lib/jquery.mousewheel.min.js"></script>

 </body>
</html>
