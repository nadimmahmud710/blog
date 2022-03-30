<?php
session_start();
if(isset($_SESSION['user_id']))
{
  header('Location:home.php');
}


require_once 'C:\xampp\htdocs\blog\vendor\autoload.php';

$user = new App\classes\User_Login();

  if(isset($_POST['save']))
  {

    $massage=$user->user_login_check($_POST);
  }



 ?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.html">

    <title>Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="admin/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="admin/css/style.css" rel="stylesheet">
    <link href="admin/css/style-responsive.css" rel="stylesheet" />


</head>

  <body class="login-body">

    <div class="container">

      <form class="form-signin"  method="post">
        <h2 class="form-signin-heading">sign in now</h2>

        <div class="login-wrap">
          <p>Enter your admin username and password</p>
            <input type="email" class="form-control" name="email" placeholder="email" >
            <input type="password" class="form-control"name="password" placeholder="Password">
            <h2 class="form-signin-heading"><?= isset($massage)? $massage:'' ?></h2>
            <br>
            <input name="save"  type="submit">

        </div>



      </form>

    </div>



    <!-- js placed at the end of the document so the pages load faster -->
    <script src="admin/js/jquery.js"></script>
    <script src="admin/js/bootstrap.bundle.min.js"></script>


  </body>

</html>
