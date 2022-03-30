<?php

namespace App\classes;
require_once 'C:\xampp\htdocs\blog\vendor\autoload.php';


/**
 *
 */
class User_Login extends Database
{




public function user_login_check($data)
{
  $db= new Database;
  $email= $data['email'];
  $password= $data['password'];
  $sql= "SELECT * FROM `register` WHERE `email`='$email' AND `password`='$password'";
  $result = $db->query($sql);

  if ($result) {
    if ( mysqli_num_rows ( $result )==1) {
        $row= mysqli_fetch_assoc($result);

         session_start();
         $_SESSION['user_id']= $row['id'];
          $_SESSION['name']= $row['name'];
          $_SESSION['status']= $row['status'];

          header('Location:home.php');
    }
    else {
           $error="Invalid Username or password";
           return $error;
}


}
else {
   die();
 }
}
}

?>
