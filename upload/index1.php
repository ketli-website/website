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
<title>Ketli || Upload Image</title>
<script src="//cdn.ckeditor.com/4.5.3/standard/ckeditor.js"></script>
 <script>
function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","getuser.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>
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
 <center><p class="title2"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;&nbsp;Upload Assignment</p></center>
 <hr>
   
   <p style="color:green"><span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>&nbsp;&nbsp;Please first login with facebook to continue. Thank you!!</p>
 </div></div>';
   }
else
{

echo '<div class="panel panel-default">
 <div class="panel-body">
 <center><p class="title2"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;&nbsp;Upload Assignment</p></center>
 <hr>';
 
 
 echo '<form method="post" action="update1.php" enctype="multipart/form-data">
<div class="form-group">
    <label for="title">Title of Test Paper :</label>
    <input type="text" class="form-control" name="title" id="title" placeholder="Enter title of Assignment" required>
  </div>

<!--select category start-->
<div class="form-group">
     <label for="college">Select College :</label>
<select id="college" name="college_id" placeholder="Select College" class="form-control input-md" onchange="showUser(this.value)" required>
   <option value="">Select College</option>
   ';
  
   $q=mysqli_query($con,"SELECT * FROM college");
   while($row=mysqli_fetch_array($q))
   {
   $college_id=$row['college_id'];
   $college_name=$row['college_name'];
  echo '<option value="'.$college_id.'">'.$college_name.'</option>';
  }
 
 echo ' </select>      
  </div>  
<!--select categories end-->
<div id="txtHint"><b>Branch info will be listed here...</b></div>
  
  <div class="form-group">
     <label for="type">Select Year :</label>
<select id="year" name="year" placeholder="Select Year" class="form-control input-md" required>
   <option value="1">I-Year</option>
   <option value="2">II-Year</option>
   <option value="3">III-Year</option>
   <option value="4">IV-Year</option>
 
  </select>      
  </div>  

<!--select categories end-->
<!--Upload Image-->
<div class="form-group">
    <label for="file">Upload&nbsp;Photo of Test paper<span style="color:red">*(Its Required)</span></label>
    <input type="file" name="files[]" multiple id="file" style="color:#8f40a5;" required><br />
    <p class="help-block"><span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span>&nbsp;&nbsp;Only .jpg ,.jpeg,.png or .gif format is allowed.<br/><span style="color:red">File size is must be less than 200Kb</span></p>
  </div>
  

<!--Upload Image end-->






<center><button type="submit" class="btn btn-primary sub" style="background:#8f40a5; border-radius:0px;">Submit&nbsp;&nbsp;<span class="glyphicon glyphicon-send" aria-hidden="true"></span></button></center>
</form>


<!------------------------------------------------------------------------------------------------->
</div>
  </div><!--panel end-->';
  }
  ?>
  </div><div></div></div></div>
  <?php
  include ('../footer.php');
  ?>
</body>
</html>
