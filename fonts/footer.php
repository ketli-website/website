<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Ketli</title>
</head>

<body >
<?php
include 'dbConnection.php';
?>
     <footer class="page-footer" style="background:#202020;">
          <div class="container">
            <div class="row">
              <div class="col-md-6">
                <a href="http://ketli.in"><h4 class="title" style="color:#8f40a5;">KETLI.in</h4></a>
                <div class="row">
                <div class="col-md-6">
                <p class="footerleft"><a  href="http://ketli.in/about_knit/">About&nbsp;KATLI</a></p>
                
                <!--<p class="footerleft"><a  href="#!">Alumni&nbsp;Portal</a></p>
                <p class="footerleft"><a  href="http://ketli.in/submit_photo">Submit&nbsp;Photo</a></p>-->
                
                </div>
                <div class="col-md-6">
                
				<?php
				if(isset($_SESSION['email']))
				{
				$email=$_SESSION['email'];
				$q=mysqli_query($con,"SELECT * FROM admin WHERE email='$email' ") or die ("Error 32");
				$count=mysqli_num_rows($q);
				if($count>0)
				{
				echo ' <p class="footerleft"><a  href="http://ketli.in/dashboard/">Admin&nbsp;Login</a></p>';
				}
				}
				?>
				
              
                  <!--<p class="footerleft"><a  href="http://ketli.in/feedback/">Feedback</a></p>-->
                </div></div>
              </div>
              <div class="col-md-4 col-md-offset-2 footerright">
             
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            <div class="row">
            <div class="col-md-6">
            © 2015 Copyright Ketli Web Development Team
             </div>
            <div class="col-md-6">
             <a style="float:right; color:#fff;" class="footerleft right" href="http://ketli.in/developer/">Developer</a>
            </div></div>
          </div></div>
        </footer>
</body>
</html>