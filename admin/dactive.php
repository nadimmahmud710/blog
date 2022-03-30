<?php

require_once 'C:\xampp\htdocs\blog\vendor\autoload.php';

$admin = new App\classes\Manage_Blog();




if (isset( $_GET['id']));
{
   $id = $_GET['id'];
   $data= $admin->dactive($id);
   header('Location:manage_post.php');


}


 ?>
