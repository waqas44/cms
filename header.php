<?php session_start(); 

?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title> User Signup / Login</title>
<!-- Latest compiled and minified JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>


<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<style type="text/css">

.label_in{
	width:200px;
	}
.wrapper{
	
	border:1px solid #ccc;}
</style>

</head>

<body>


<div class="container wrapper">

<div class="col-sm-12">
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">HOME</a>
    </div>
    <ul class="nav navbar-nav ">
        <li><a href="new-post.php">New Post</a></li>
         <li><a href="#">Link</a></li>
     
        </ul>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
     
      <?php // checking if user is login 
      
      
      if(isset($_SESSION['name'])
		){?>  <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['name'] ?><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="admin.php">Dashboard</a></li>
            
            <li><a href="#">Change Email</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </li>
        <?php }else{ ?>
        <li><a href="signup.php">Sign up</a></li>
           <li><a href="login.php">Login</a></li>
           
           
             <?php } ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
 <?php include "connect.php";

?>
<div class="row">
<div class="col-sm-8">
