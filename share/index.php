<?php
include('../fblogin.php');
include('../header.php');
include('../dbConnection.php');
?>
<!doctype html>

<html>
<head>
</head>
<body>
<div style="margin-left:30px; margin-right:30px;">
<div class="row">
<div class="col-md-1">
</div>
<div class="col-md-8">
<div class="panel panel-default ">
  <div class="panel-body">
 <center><p class="title2" style="font-size:25px; line-height:35px;"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;&nbsp;Shared</p></center>
<hr>
<div class="row">
<?php
$q=mysqli_query($con ,"SELECT * FROM share ORDER BY time DESC ") or die ("Error");
while($row=mysqli_fetch_array($q))
{
$sid=$row['sid'];
$title=$row['title'];
$user_id=$row['user_id'];
$user_name=$row['user_name'];
$time=$row['time'];
$text=$row['text'];
$view=$row['view'];
$flag=$row['flag'];
$link=$row['link'];
echo '
<a href="'.$link.'"><div class="col-md-12">
<div class="panel panel-default hoverable">
  <div class="panel-body">
  <span style="float:left;font-size:20px;">'.$title.'</span></br>
  <span style="float:left;color:#8f40a5;font-size:15px;">'.$text.'</span></br>
<span style="float:left;font-size:15px;">'.$link.'</span></br></br></br>

<span style="font-size:13px;">ON</span>&nbsp;&nbsp;
<span style="color:#8f40a5;font-size:13px;">'.$time.'</span>
<span style="float:right;font-size:13px;"><a style="float:right" target="_blank" href="https://facebook.com/'.$user_id.'"><span style="color:#8f40a5;font-size:12px;">By&nbsp;:&nbsp;'.$user_name.'</span></a></span>
</div></div>

</div></a>
<!--panel end--> ';

}

?>
<?php
echo'
</div></div></div></div>
<div class="col-md-3">
<div class="panel panel-default">
 <div class="panel-body"><a href="upload">
 <center><p class="title2"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;&nbsp;Share</p></center></a>
 </div></div>
<div class="panel panel-default">
  <div class="panel-body">
<div class="fb-page" data-href="https://www.facebook.com/Ketli-1185306158150113" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/Ketli-1185306158150113"><a href="https://www.facebook.com/Ketli-1185306158150113">KETLI.in</a></blockquote></div></div>
</div>
</div></div></div></div>
';
?>

<?php
include('../footer.php');
?>
</body>
</html>