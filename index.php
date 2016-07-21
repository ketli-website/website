<?php
include('fblogin.php');
include('header.php');
include('dbConnection.php');
?>
<html>
<head>
<meta name="keywords" content="ketli, ketli.in, test paper, assignment,knit sultanpur,ketli.com, etc.">
 <meta name="description" content="Engineering student portal.">
<meta property="fb:app_id" content="755332954577256"/>
<title>ketli || Students hub</title>
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
				document.getElementById("txtHint1").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","getuser.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>
</head>
<body>
<div class="row">
<div class="col-md-6">
</div>
<div class="col-md-5">

<?php
echo '<div class="panel-body">
<div class="panel panel-default">
<div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#paper" aria-controls="paper" role="tab" data-toggle="tab">Test Paper</a></li>
    <li role="presentation"><a href="#assignment" aria-controls="assignment" role="tab" data-toggle="tab">Assignment</a></li>
    
  </ul>';
echo '<div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="paper" style="padding:10px"><p>
<div class="panel panel-default">
 <div class="panel-body">
 <center><p class="title2"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;&nbsp;Test Paper</p></center>
 <hr>';
 
 
 echo '<form method="post" action="paper/log.php">

<!--select category start-->
<div class="form-group">
     <label for="college">Select College :</label>
<select id="college" name="college_id" placeholder="Select College" class="form-control input-md" onchange="showUser(this.value)" required>
   <option value="">select college</option>
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
  <div id="txtHint"><b>Branch info will be listed here...</b></div>
<!--select categories end-->
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





<center><button type="submit" name="Submit" class="btn btn-primary sub" style="background:#8f40a5; border-radius:0px;">Submit&nbsp;&nbsp;<span class="glyphicon glyphicon-send" aria-hidden="true"></span></button></center>
</form>
<!------------------------------------------------------------------------------------------------->
</div>
  </div><!--panel end--></div>';
  echo '<div role="tabpanel" class="tab-pane" id="assignment" style="padding:10px"><p>
<div class="panel panel-default">
 <div class="panel-body">
 <center><p class="title2"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;Assignment</p></center>
 <hr>';
 
 
 echo '<form method="post" action="assignment/">

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
  <div id="txtHint1"><b>Branch info will be listed here...</b></div>
<!--select categories end-->
<!--select category start-->


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




<center><button type="Submit" name="Submit" class="btn btn-primary sub" style="background:#8f40a5; border-radius:0px;">Submit&nbsp;&nbsp;<span class="glyphicon glyphicon-send" aria-hidden="true"></span></button></center>
</form>


<!------------------------------------------------------------------------------------------------->
</div>
  </div><!--panel end-->
  </div></div></div>';
 
?> 
  
  <script type="text/javascript"> var infolinks_pid = 2576158; var infolinks_wsid = 0; </script> <script type="text/javascript" src="//resources.infolinks.com/js/infolinks_main.js"></script>

</div>
</div></div></div>
<?php
include('footer.php');
include_once("analyticstracking.php");

?>

</body>
</html>
