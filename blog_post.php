<?php

require_once 'C:\xampp\htdocs\blog\vendor\autoload.php';

$user = new App\classes\Blog();
session_start();
//session_destroy();
if(!$_SESSION['status']==1)
{
  header('Location:home.php');
}




if(isset($_POST['submit']))
{

  $data=$user->blog_post($_POST);
}


 ?>


 <!DOCTYPE html>
 <html lang="en">
     <head>
         <meta charset="utf-8" />
         <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
         <meta name="description" content="" />
         <meta name="author" content="" />
         <title>Blog</title>
         <!-- Favicon-->
         <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
         <!-- Core theme CSS (includes Bootstrap)-->
          <link href="admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
         <link href="assets/css/styles.css" rel="stylesheet" />
         <link href="admin/assets/summernote/dist/summernote.css" rel="stylesheet">

     </head>
     <body>
         <!-- Responsive navbar-->
         <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
             <div class="container">
                 <a class="navbar-brand" href="#!">Blogs</a>
                 <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                 <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                         <li class="nav-item"><a class="nav-link" aria-current="page" href="home.php">All Blog</a></li>
                         <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                         <li class="nav-item"><a class="nav-link" href="#!">Contact</a></li>

                     </ul>

                     <ul class="nav pull-right top-menu">

                         <!-- user login dropdown start-->
                         <li class="dropdown">
                             <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                 <img alt="" src="">
                                 <span style=" margin-left:200px;color:white" class="username"><?= $_SESSION['name'] ?></span>
                                 <b class="caret"></b>
                             </a>
                             <ul style="margin-left:200px" class="dropdown-menu extended logout dropdown-menu-right">
                                 <div  class="log-arrow-up"></div>
                                 <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                                 <li><a style="" href="user_logout.php"><i class="fa fa-key"></i> Log Out</a></li>
                             </ul>
                         </li>
                         <li class="sb-toggle-right">
                             <i class="fa  fa-align-right"></i>
                         </li>

                     </ul>
                 </div>
             </div>
         </nav>

<div style="width: 700px;padding: 30px 40px;margin: auto;"class="">


    <form action="" method="post" enctype="multipart/form-data" style="height:800px;">
  <div class="form-group">
    <label for="exampleFormControlInput1">blog Title</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="title" placeholder="Blog title">
  </div>
  <br>
  <div class="form-group">
    <label for="exampleFormControlInput1">blog Catagory</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="catagory" placeholder="Blog Catagory">
  </div>
  <br>

  <div class="form-group">
    <label for="photo">Choose a photo</label>
    <input type="file" name="photo"  id="photo" >
  </div>
  <br>

  <div class="form-group">
    <label for="content"> textarea</label>
    <textarea class="summernote" id="exampleFormControlTextarea1" name="textarea" rows="3"></textarea>
  </div>
  <br>
  <br>
  <div class="col-lg-6">
   <button class="btn btn-primary btn-block btn-lg" name="submit">Submit</button>
  </div>
</form>
</div>























         <footer class="py-5 bg-dark">
             <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p></div>
         </footer>
         <!-- Bootstrap core JS-->
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
         <!-- Core theme JS-->
         <script src="admin/js/scripts.js"></script>
         <script src="admin/js/jquery.js"></script>
         <script src="admin/js/bootstrap.bundle.min.js"></script>
         <script class="include" type="text/javascript" src="admin/js/jquery.dcjqaccordion.2.7.js"></script>
         <script src="admin/js/jquery.scrollTo.min.js"></script>
         <script src="admin/js/jquery.nicescroll.js" type="text/javascript"></script>
         <script src="admin/js/jquery.sparkline.js" type="text/javascript"></script>
         <script src="admin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
         <script src="admin/js/owl.carousel.js" ></script>
         <script src="admin/js/jquery.customSelect.min.js" ></script>
         <script src="admin/js/respond.min.js" ></script>

         <!--right slidebar-->
         <script src="admin/js/slidebars.min.js"></script>
         <script src="admin/assets/summernote/dist/summernote.min.js"></script>
         <script>

        jQuery(document).ready(function(){

            $('.summernote').summernote({
                height: 200,                 // set editor height

                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor

                focus: true                 // set focus to editable area after initializing summernote
            });
        });

    </script>

         <!--common script for all pages-->
         <script src="admin/js/common-scripts5e1f.js?v=2"></script>

         <!--script for this page-->
         <script src="admin/js/sparkline-chart.js"></script>
         <script src="admin/js/easy-pie-chart.js"></script>
         <script src="admin/js/count.js"></script>

       <script>

           //owl carousel

           $(document).ready(function() {
               $("#owl-demo").owlCarousel({
                   navigation : true,
                   slideSpeed : 300,
                   paginationSpeed : 400,
                   singleItem : true,
             autoPlay:true

               });
           });

           //custom select box

           $(function(){
               $('select.styled').customSelect();
           });

           $(window).on("resize",function(){
               var owl = $("#owl-demo").data("owlCarousel");
               owl.reinit();
           });

       </script>

     </body>
 </html>
