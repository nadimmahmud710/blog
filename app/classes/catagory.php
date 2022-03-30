<?php

namespace App\classes;
require_once 'C:\xampp\htdocs\blog\vendor\autoload.php';


class Catagory extends Database
{

  public function post_catagory()
  {
      $data= new Database;
    	$query = "SELECT * FROM `blog`WHERE `status`= 1";
      	$result=  $data->query($query);
        return $result;
  }
  public function all_catagory()
  {
      $data= new Database;
    	$query = "SELECT DISTINCT `catagory` FROM `blog`WHERE `status`= 1";
      	$result=  $data->query($query);
        return $result;
  }
  public function post_catagory2($limit,$initial_page)
  {
      $data= new Database;
      $query = "SELECT * FROM `blog`WHERE `status`= 1 LIMIT " . $initial_page . ',' . $limit;
        $result=  $data->query($query);
        return $result;
  }

  public function post_catagory3($cat)
  {
      $data= new Database;
      $query = "SELECT * FROM `blog` WHERE `catagory`= '$cat' AND `status`= 1 ";
        $result=  $data->query($query);
        return $result;
  }

  public function search($search)
  {
      $data= new Database;
      $query = "SELECT* FROM `blog` WHERE `title`LIKE '%$search%' ORDER BY `title`";
      $result= $data->query($query);
        return $result;
  }




}




 ?>
