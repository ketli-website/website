<?php
$nav=8;
include '../fblogin.php';
include '../header.php';
 include('../dbConnection.php');
?>

<!doctype html>
<html>
<head>
<title>Ketli || About Us</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
 


<style>
.title2
{
color:#8f40a5;
font-size:20px;
font-weight:200;
}

.caption{
color:#666666;
}

.green
{
color:#8f40a5;
font-size:17px;
font-weight:150;
}
.mid
{
text-align:center;
padding:20px;
}

</style>
<script>
$(function() {
    while( $('#fitin div').height() > $('#fitin').height() ) {
        $('#fitin div').css('font-size', (parseInt($('#fitin div').css('font-size')) - 1) + "px" );
    }
});
</script>
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
<div class="col-md-2">
</div>
<div class="col-md-8">
<div class="panel panel-default">
 <div class="panel-body">
 <center><p class="title2"><span class="glyphicon glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;About Us</p></center>
<hr>
<p style="font-size:17px; line-height:30px; padding:5px; letter-spacing:1.2px;">
Ketli.in is built to provide paper free solution sharing of test paper and notes. Here one can share and download question paper and notes. Student can built there own dashboard where they can keep important paper and assignments. This will be give you an effective way to manage and keep log of your data. We have categories the data BY college and year for ease in search.  <b>Ketli is still in Beta version and getting developed, Soon we will be coming with final version.</b> Your comments and reviews are valuable for us. ContactUs at <a href="mailto:contactus@ketli.in">contactus@ketli.in</a> .
</p>

</div></div></div></div></div><!--col-md-12,row,container closed-->
<?php
include '../footer.php';
?>
 </body>
</html>
