<?php

if (isset($_POST['Submit'])) { 
session_start();
$_SESSION['branch'] = $_POST['branch_id'];
$_SESSION['college']=$_POST['college_id'];
$_SESSION['year']=$_POST['year'];
}

header('location:../assignment/');
exit();
?>