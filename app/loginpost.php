<?php
include('../dbConnection.php');


$username = $_POST['username'];
$password = $_POST['password'];
$result = mysqli_query($con,"SELECT Role FROM table1 where 
Username='$username' and Password='$password'");
$row = mysqli_fetch_array($result);
$data = $row[0];

if($data){
echo $data;
}

?>