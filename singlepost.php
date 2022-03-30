<?php
session_start();
//session_destroy();
if(!isset($_SESSION['user_id']))
{
  header('Location:index.php');
}

require_once 'C:\xampp\htdocs\blog\vendor\autoload.php';
$user = new App\classes\Single_Post();

if (isset($_GET['id']))
{
   $id= $_GET['id'];

   $dat = $user->single_post($id);
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
        <link rel="stylesheet" href="assets/css/pro.css" />
        <link href="assets/css/styles.css" rel="stylesheet" />

    </head>
    <body>
      <div style="height: 100px; width:100%"class="container">
        <div class="fix container header_bg">
          <header id="header">
            <div class="logo_left">
              <h1 > blog Page</h1>
            </div>
            <div style='margin-bottom:2px' class="admin-login">
              <a href="home.php"><button class="btn btn-dark btn-sm" style='margin-left:900px;margin-top:-100px;font-size:12px' > Back to previous page </button><a/>

            </div>
          </header>
        </div>
      </div>

        <?php
         while ($row= mysqli_fetch_assoc($dat))
          {
          ?>
        <div style=" margin: 0 auto; padding:10px; " class="card mb-4">
            <a style=" margin: 0 auto;" href="#!"><img style="width:735px; height:255px;" class="card-img-top" src="uploads/<?= ucwords($row['photo']) ?>" alt="..." /></a>
            <div style=" margin: 0 auto;width:735px;" class="card-body">


                <p class="card-title"> Post Catagory : <?= ucwords($row['catagory']) ?></p>
                <p class="card-title"> title : <?= ucwords($row['title']) ?></p>
                <p class="card-title">Post Title: <?= ucwords($row['create_time']) ?></p>
                <p class="card-text"> Post:  <?= ucwords($row['content'])?></p>


                <br>
                <br>

            </div>
        </div>
        <?php
          }
         ?>




        <footer style="height: 100px;" class="py-5 bg-dark">
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
