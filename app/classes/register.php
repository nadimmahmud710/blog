<?php

namespace App\classes;
require_once 'C:\xampp\htdocs\blog\vendor\autoload.php';




class Register extends Database
{





public function register($value)
{
    $data= new Database;


		$name = $value['name'];
		$password = $value['password'];
		$email = $value['email'];
		$phone = $value['phone'];
		$address = $value['address'];
    $status = $value['optradio'];



		$query = "SELECT email FROM register WHERE email = '$email'";
		$result=  $data->query($query);

		if(mysqli_num_rows($result))
		{
		    echo "<center><h3><script>alert('Sorry.. This email is already registered !!');</script></h3></center>";
		    header("refresh:0;");
    	}
		else
		{
			$query = "INSERT INTO register (id, name, password, email, phone, address, status) VALUES ('', '$name', '$password', '$email', '$phone', '$address','$status')";
			if(mysqli_query($this->link, $query))
			{
				echo "<center><h3><script>alert('Congrats.. You have successfully registered !!');</script></h3></center>";
				header("refresh:0;url=user_login.php");
			}
			else
			{
				echo "<center><h3><script>alert('Error.. Could Not Register !!');</script></h3></center>";
				header("refresh:0;url=reg.php");
			}
		}
	}
  }

   ?>
