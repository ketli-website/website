<?php
include '../fblogin.php';
include '../header.php';
 include('../dbConnection.php');

?>

<!doctype html>
<html>
<head>
<title>Ketli || Assignment</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />



<style>
.title2
{
color:#8f40a5;
font-size:20px;
font-weight:200;
}

</style>
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
<div class="panel panel-default ">
  <div class="panel-body">
 <center><p class="title2" style="font-size:25px; line-height:35px;"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;&nbsp;Assignment</p></center>
<hr>
<div class="row">


<?php 
$college_id=$_POST['college_id'];
$branch_id=$_POST['branch_id'];
$year=$_POST['year'];
if ($year==1)
{
$q=mysqli_query($con ,"SELECT * FROM assignment  where college_id='$college_id' and year='$year' ORDER BY time DESC ") or die ("Error");
}
else
{
$q=mysqli_query($con ,"SELECT * FROM assignment  where college_id='$college_id' and branch_id='$branch_id' and year='$year' ORDER BY time DESC ") or die ("Error");
}
while($row=mysqli_fetch_array($q))
{
$aid=$row['aid'];
$title=$row['title'];
$user_id=$row['user_id'];
$user_name=$row['user_name'];
$time=$row['time'];
$photo=$row['photo'];
$paper_folder=$row['paper_folder'];
$view=$row['view'];

echo '
<a href="'.$paper_folder.'/"><div class="col-md-4">
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
<span style="float:left;color:#8f40a5;">'.$time.'</span>
<span style="float:right"><a style="float:right" target="_blank" href="https://facebook.com/'.$user_id.'"><span style="color:#1d9d74;">By&nbsp;:&nbsp;</span>'.$user_name.'</a></span>
</div></div>

</div></a>
<!--panel end-->';}
?>










</div><!--row end-->
</div></div>
</div>

<!----------------------------------------------------------------------------------------------------------------------------->
<div class="col-md-3 side">
<div class="panel panel-default">
 <div class="panel-body"><a href="../upload/index1.php">
 <center><p class="title2"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;&nbsp;Upload Assignment</p></center></a>
 </div></div>
<div class="panel panel-default">
  <div class="panel-body">
<div class="fb-page" data-href="https://www.facebook.com/ketliforstudent" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/ketliforstudent"><a href="https://www.facebook.com/ketliforstudent">KETLI.in</a></blockquote></div></div>
</div></div>

</div>











</div></div><!--container closed-->
<?php
include '../footer.php';
include_once("../analyticstracking.php");
?>
 </body>
</html>