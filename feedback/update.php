<?php
session_start();
include '../../dbConnection.php';



$sid=uniqid();
$title=$_POST['title'];
$user_id=$_SESSION['id'];
$user_name=$_SESSION['name'];
$link=$_POST['link'];
$text=$_POST['text'];





$q7=mysqli_query($con ,"INSERT INTO share(sid,title,user_id,user_name,link,text) VALUES('$sid','$title','$user_id','$user_name','$link','$text')" ) or die ("Error 199");
echo "Your shared will be uploaded after getting reviewed by admin";
echo "<script>setTimeout(\"location.href = 'http://www.ketli.in/share';\",1500);</script>";
exit();






?>
