<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>ketli || Students hub</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="ketli, ketli.in, test paper, assignment,knit sultanpur,ketli.com, etc.">
  <meta name="description" content="Engineering student portal.">
  <meta property="fb:app_id" content="755332954577256"/>
  <link rel="shortcut icon" href="http://ketli.in/img/favicon.png">
  <link  rel="stylesheet" href="http://ketli.in/css/bootstrap.min.css"/>
  <link  rel="stylesheet" href="http://ketli.in/css/bootstrap-theme.min.css"/>
  <link rel="stylesheet" href="http://ketli.in/css/main.css"/>
  <link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
  <script type="text/javascript" src="http://ketli.in/js/jquery-1.11.3.min.js"></script>
  <script src="http://ketli.in/js/bootstrap.min.js"  type="text/javascript"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
  <script>
  $(function () {
    $(document).on( 'scroll', function(){
      console.log('scroll top : ' + $(window).scrollTop());
      if($(window).scrollTop()>=$(".logo").height())
      {
       $(".navbar").addClass("navbar-fixed-top");
     }

     if($(window).scrollTop()<$(".logo").height())
     {
       $(".navbar").removeClass("navbar-fixed-top");
     }
   });
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
  <header>
    <div class="logo">
      <div class="row">
        <div class="col-md-6"></br>
          &nbsp;&nbsp;&nbsp;&nbsp;<img src="http://ketli.in/img/klogo.png" height="50" width="200" />
          <p style="color:#ffffff ;margin-top:-5px;font-size:15px;margin-left:60px;">&nbsp;&nbsp;Engineering Students Portal</p>
        </div>
        <div class="col-md-6">
          <a href="http://ketli.in/share"><span style="float:right;color:#ffffff;margin-top:8px;font-size:15px;margin-right:30px;"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>&nbsp;&nbsp;Share board</span></a>
        </div>
      </div>
    </div>
    <!--nav bar start-->
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li> <a  href="http://ketli.in/"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;&nbsp;Home</a></li>
            <li><a href="http://ketli.in/aboutus"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>&nbsp;&nbsp;About&nbsp;Us</a>
            </li>
            <li><a href="http://ketli.in/dashboard"><span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span>&nbsp;My&nbsp;Dashboard</a>
            </li>
            <?php
            if(!isset($_SESSION['id']))
            {
             echo '
             <li><a href="'.$loginUrl.'"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>&nbsp;&nbsp;Log&nbsp;in&nbsp;with&nbsp;facebook</a>
             ';
           }
           else{
            $name=$_SESSION['name'];
            $id=$_SESSION['id'];
            echo ' <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img  height="30" width="30" style="margin:-10px;" src="https://graph.facebook.com/'.$id.'/picture"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$name.'<span class="caret"></span></a>
            <ul class="dropdown-menu">
            <li><a href="http://ketli.in/logout.php">&nbsp;&nbsp;<span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;&nbsp;Logout</a></li>
            </ul>

            </li></ul>
            ';
          }
          ?>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    <!--nav bar closed-->
  </header>
