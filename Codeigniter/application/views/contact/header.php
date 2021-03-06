<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Contact Us</title>

    <!-- Bootstrap -->
    <link href="<?=base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
    body {
      padding-top: 50px;
    }
    .starter-template {
      padding: 40px 15px;      
    }
    </style>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  </head>
  <body>
    
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li <?=$pageName=="index"?'class="active"':''?>><a href="<?=base_url('contact')?>">Contact</a></li>
            <li <?=$pageName=="manage"?'class="active"':''?>><a href="<?=base_url('manage')?>">Manage</a></li>

            <li <?=$pageName=="report"?'class="active"':''?>><a href="<?=base_url('report')?>">Report</a></li>  

            <li <?=$pageName=="newslist"?'class="active"':''?>><a href="<?=base_url('newslist')?>">News</a></li> 

            <li <?=$pageName=="login"?'class="active"':''?>><a href="<?=base_url('login')?>">Google Login</a></li> 

            <li <?=$pageName=="fblogin"?'class="active"':''?>><a href="<?=base_url('fblogin')?>">FB Login</a></li>  

          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>