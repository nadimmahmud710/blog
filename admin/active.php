<?php
require_once 'C:\xampp\htdocs\blog\vendor\autoload.php';

$admin = new App\classes\Manage_Blog();


   $id = $_GET['id'];

   $data= $admin->active($id);
   header('Location:manage_post.php');




 ?>
