<?php
namespace App\classes;
require_once 'C:\xampp\htdocs\blog\vendor\autoload.php';



class Admin_Login extends Database
{




public function admin_login_check($data)
{
  $data1 = new Database();
  $username= $data['username'];
  $password= $data['password'];
  $sql= "SELECT * FROM `admin` WHERE `username`='$username' AND `password`='$password'";
  $result = $data1->query($sql);

  if ($result) {
    if ( mysqli_num_rows ( $result )==1) {
        $row= mysqli_fetch_assoc($result);

         session_start();
         $_SESSION['admin_id']= $row['id'];
         $_SESSION['username']= $row['username'];
          $_SESSION['name']= $row['name'];

          header('Location:index.php');
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
