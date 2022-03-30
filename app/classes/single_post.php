<?php




namespace App\classes;
require_once 'C:\xampp\htdocs\blog\vendor\autoload.php';




class Single_Post extends Database
{

  public function single_post($id)
  {
      $data= new Database;
    $query = "SELECT * FROM `blog` WHERE `id`='$id' ";
     $result=  $data->query($query);
      return  $result;

  }






}
?>
