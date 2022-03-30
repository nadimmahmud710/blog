<?php

namespace App\classes;
require_once 'C:\xampp\htdocs\blog\vendor\autoload.php';




class Blog extends Database
{


  public function blog_post($value)
  {
      $data= new Database;
      $file_name = $_FILES['photo']['name'];
      $fileex = explode('.',  $file_name);
      $fileex = end($fileex);
      $file_name= date(format:'ymdhis.').$fileex;
  		$title = $value['title'];
  		$cat = $value['catagory'];
  		$content = $value['textarea'];
      $status = 0 ;
      $blogger= $_SESSION['id'];
      $blogger_name= $_SESSION['name'];
      $query = "INSERT INTO blog(id,title,catagory,content,status,blogger,blogger_name,photo) VALUES ('', '	$title ', '$cat', '	$content', '$status', '$blogger','$blogger_name','$file_name')";
      $result=  $data->query($query);

      if ($result) {
        move_uploaded_file($_FILES['photo']['tmp_name'],'uploads/'.$file_name);
        echo "<center><h3><script>alert('Congrats.. You have successfully Posted please wait for Admin Approval !!');</script></h3></center>";
        header("refresh:0;url=home.php");
      }
      else {
          echo "<center><h3><script>alert(' sorry not uploaded');</script></h3></center>";
          header("refresh:0;url=home.php");
      }
}




}










 ?>
