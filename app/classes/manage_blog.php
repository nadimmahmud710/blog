<?php

namespace App\classes;
require_once 'C:\xampp\htdocs\blog\vendor\autoload.php';




class Manage_Blog extends Database
{



public function all_blog()
{
    $data= new Database;
  $query = "SELECT * FROM `blog`";
   $result=  $data->query($query);


    return $result;

}

public function active($id)
{
    $data= new Database;
  $query = "UPDATE blog SET status='1' WHERE id = '$id'";
   $result=  $data->query($query);

}

public function dactive($id)
{
    $data= new Database;
  $query = "UPDATE blog SET status='0' WHERE id = '$id'";
   $result=  $data->query($query);

}

public function delete($id)
{
    $data= new Database;
  $query = "DELETE FROM blog WHERE id = '$id'";
   $result=  $data->query($query);

}




}

?>
