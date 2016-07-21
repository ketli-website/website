<?php

include('../fblogin.php');

include('../header.php');

include('../dbConnection.php');

?>

<!doctype html>

<html>

<head>

<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Ketli || Dashboard</title>



 

</head>

<body>

<div style="margin-left:30px; margin-right:30px;">

<div class="row">

<div class="col-md-9">

<div class="panel panel-default ">

  <div class="panel-body">

 

                                             <!--test paper upload-->



<?php

if(!isset($_SESSION['id']))

{

echo '<div class="panel panel-default" style="height:100px">

 <div class="panel-body">



   

    <center><p style="color:green"><span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>&nbsp;&nbsp;Please first login with facebook to continue. Thank you!!</p>
</center>
 </div></div>';

   }

else
{
$user_id=$_SESSION['id'];

echo '<center><p class="title2" style="font-size:25px; line-height:35px;"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;&nbsp;My Test Paper Uploads</p></center>

<hr>

<div class="row">';
$q=mysqli_query($con ,"SELECT * FROM paper  where user_id='$user_id' ORDER BY time DESC ") or die ("Error");

while($row=mysqli_fetch_array($q))

{

$pid=$row['pid'];

$title=$row['title'];

$user_name=$row['user_name'];

$time=$row['time'];

$photo=$row['photo'];

$paper_folder=$row['paper_folder'];

$view=$row['view'];



echo '
<a href="'.$paper_folder.'/"><div class="col-md-4">

<div class="panel panel-default hoverable">

  <div class="panel-body">';?>

<!--  

$array=explode("|", $photo);

$str="";

for($i=0;$i<1;$i++){

    

   

echo '<div style="height:120px; overflow:hidden; margin:0px; padding:0px;"><img src="'.$array[$i].'" height="120" width="100%"/></div>';

}-->



  <?php

echo '

 <div  id="fitin" >'.$title.'</div>

<hr />

&nbsp;&nbsp;&nbsp;views<span style="float:left;color:#8f40a5;">'.$view.'</span></br>

ON

<span style="float:left;color:#1d9d74;">'.$time.'</span>

<span style="float:right"><a style="float:right" target="_blank" href="https://facebook.com/'.$user_id.'">

</div></div>



</div></a>

<!--panel end-->';}
echo '</div><center><p class="title2" style="font-size:25px; line-height:35px;"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;&nbsp;My Assignment Uploads</p></center>

<hr>

<div class="row">';


$q=mysqli_query($con ,"SELECT * FROM assignment  where user_id='$user_id' ORDER BY time DESC ") or die ("Error");

while($row=mysqli_fetch_array($q))

{

$aid=$row['aid'];

$title=$row['title'];

$user_name=$row['user_name'];

$time=$row['time'];

$photo=$row['photo'];

$paper_folder=$row['paper_folder'];

$view=$row['view'];



echo '

<a href="'.$paper_folder.'/"><div class="col-md-4">

<div class="panel panel-default hoverable">

  <div class="panel-body">';?>

<!--  

$array=explode("|", $photo);

$str="";

for($i=0;$i<1;$i++){

    

   

echo '<div style="height:120px; overflow:hidden; margin:0px; padding:0px;"><img src="'.$array[$i].'" height="120" width="100%"/></div>';

}-->



  <?php

echo '

 <div  id="fitin" >'.$title.'</div>

<hr />

&nbsp;&nbsp;&nbsp;views<span style="float:left;color:#8f40a5;">'.$view.'</span></br>

ON

<span style="float:left;color:#1d9d74;">'.$time.'</span>

<span style="float:right"><a style="float:right" target="_blank" href="https://facebook.com/'.$user_id.'">

</div></div>



</div></a>

<!--panel end-->';}

}

?></div>

</div>

</div></div>

</div>

</div>

</body>

</html>

