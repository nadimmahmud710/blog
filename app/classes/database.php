<?php

 namespace App\classes;


class Database
{


   public function __construct()
  {
    $host="localhost";
    $user="root";
    $password= "";
    $database="blog";
    $this->link = mysqli_connect($host,$user,$password,$database);
   }



   public function query($query)
   {
     $query= $query;

     	$result= mysqli_query($this->link,$query);
      return $result;

   }














}




?>
