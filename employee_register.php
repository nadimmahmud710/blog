<?php



require_once 'C:\xampp\htdocs\blog\vendor\autoload.php';

$user = new App\classes\Register();

if(isset($_POST['submit']))
{

  $data=$user->register($_POST);
}


?>











<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Blog Registration Form</title>
	<link rel="stylesheet" href="reg.css" />
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>

	<div style="width: 500px" class="container"><br><br>

  	<h1 class="text-center">Registration Form</h1><br>

  	<form method="post" action="">
  		<fieldset class="form-group">

  			<div class="form-group">
  				<label class="form-control-label">Name:</label>
  				<input class="form-control" type="text" name="name" placeholder="Write your name" required>
  			</div>
        <div class="form-group">
  				<label class="form-control-label">Password:</label>
  				<input class="form-control" type="password" name="password" placeholder="Enter password" required>
  			</div>

  		</fieldset>

  		<fieldset class="form-group">
  			<legend>Contact Info:</legend>

  			<div class="form-group">
  				<label class="form-control-label">Email:</label>
  				<input class="form-control" type="email" name="email" placeholder="Email" required>
  			</div>
  			<div class="form-group">
  				<label class="form-control-label">Phone Number:</label>
  				<input class="form-control" type="number" name="phone" placeholder="Phone Number" required>
  			</div>
				<div class="form-group">
  				<label class="form-control-label">Address:</label>
  				<textarea class="form-control" rows="5" name="address" required></textarea>
  			</div>
        <div class="radio">
              <label><input type="radio" name="optradio" value='1' checked>As a blogger</label>
              </div>
			  <br>
              <div class="radio">
               <label><input type="radio" name="optradio" value='0'>Reader</label>
             </div>
  		</fieldset>



        <br>
        <button class="btn btn-primary btn-block btn-lg" name="submit">Submit</button>

  	</form>

	</div>

  <div style="margin-top:200px;"></div>


</body>
</html>
