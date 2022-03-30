<?php

namespace App\classes;
require_once 'C:\xampp\htdocs\blog\vendor\autoload.php';




class Admin extends Database
{

  public function visitor()
  {
      $data= new Database;
    $query = "SELECT * FROM `register` WHERE `status`= 0 ";
     $result=  $data->query($query);
     $rowcount=mysqli_num_rows($result);

      return $rowcount;

  }
          public function blogger()
          {
              $data= new Database;
            $query = "SELECT * FROM `register` WHERE `status`= 1 ";
             $result=  $data->query($query);
             $rowcount=mysqli_num_rows($result);

              return $rowcount;



          }


          public function post()
          {
              $data= new Database;
            $query = "SELECT * FROM `blog` WHERE `status`= 0 ";
             $result=  $data->query($query);
             $rowcount=mysqli_num_rows($result);

              return $rowcount;

          }






}
?>
