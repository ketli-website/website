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
$time=$row['time'];
}
include '../../../../../fblogin.php';
include '../../../../../header.php';

$ogurl='http://localhost/papa'.$_SERVER['REQUEST_URI'];


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



<style>

</style>
<script>
$(function() {
    while( $('#fitin div').height() > $('#fitin').height() ) {
        $('#fitin div').css('font-size', (parseInt($('#fitin div').css('font-size')) - 1) + "px" );
    }
});
</script>

</head>

<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4&appId=900138460052258";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

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
<?php
$array=explode("|", $photo);
$str="";
for($i=0;$i<sizeof($array);$i++){
    
   
echo '<div class="panel-body"><div class="panel panel-default"><img src="'.$array[$i].'" height=200 width=200/></div></div></br></br>';
} ?>


<!---------------------------------------------------------------closing of content---------------------------------------------------------->
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
  <div class="panel-body">
<center> <p class="titles"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>&nbsp;&nbsp;Suggested Paper</p></center>
</div></div>
<?php 
$q=mysqli_query($con ,"SELECT * FROM paper  where branch_id='$branch_id'  AND college_id='$college_id' ORDER BY rand() LIMIT 3 ") or die ("Error");

while($row=mysqli_fetch_array($q))
{
$pid=$row['pid'];
$title=$row['title'];
$user_id=$row['user_id'];
$user_name=$row['user_name'];
$time=$row['time'];
$photo=$row['photo'];
$paper_folder=$row['paper_folder'];

echo '
<a href="'.$paper_folder.'/"><div class="row">
<div class="panel panel-default hoverable">
  <div class="panel-body">
  <div style="height:120px; overflow:hidden; margin:0px; padding:0px;"><img height="120" width="100%" src="http://localhost/papa/paper/100001/101/2123123/5606eca201836/20150920031552.jpg" /></div>
 <div  id="fitin" >'.$title.'</div>
<hr />
ON
<span style="float:left;color:#1d9d74;">'.$time.'</span>
<span style="float:right"><a style="float:right" target="_blank" href="https://facebook.com/'.$user_id.'"><span style="color:#1d9d74;">By&nbsp;:&nbsp;</span>'.$user_name.'</a></span>
</div></div>

</div></a>
<!--panel end-->';}
?>

<div class="panel panel-default">
  <div class="panel-body">
<div class="fb-page" data-href="https://www.facebook.com/DrishtICONeKNIT" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/DrishtICONeKNIT"><a href="https://www.facebook.com/DrishtICONeKNIT">DrishtICONe - KNIT Newsletter</a></blockquote></div></div>
</div></div>



</div>

</div><!--row closed-->
</div><!--container closed-->
<?php
include '../../../../../footer.php';
?>
 </body>
</html>
