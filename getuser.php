<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = intval($_GET['q']);
include('dbConnection.php');
$sql=mysqli_query($con,"SELECT * FROM college WHERE college_id = '".$q."'");
$row = mysqli_fetch_assoc($sql);
$branch=$row["branch"];

$array=explode(",", $branch);
$str="";
echo'
 <!--select category start-->
<div class="form-group">
     <label for="type">Select Branch :</label>
<select id="branch" name="branch_id" placeholder="Select Branch" class="form-control input-md" required>';
for($i=0;$i<sizeof($array);$i++)
{
    
   


  
   $sqli=mysqli_query($con,"SELECT * FROM branch where branch_id = '".$array[$i]."'");
   while($row=mysqli_fetch_array($sqli))
   {
   $branch_name=$row['branch_name'];
  echo '<option value="'.$array[$i].'">'.$branch_name.'</option>';
  }
 
}
 echo ' </select>';

mysqli_close($con);
?>
</body>
</html>