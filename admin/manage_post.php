<?php
  session_start();
  //session_destroy();
  if(!isset($_SESSION['admin_id']))
  {
    header('Location:../index.php');
  }

  require_once 'C:\xampp\htdocs\blog\vendor\autoload.php';

  $admin = new App\classes\Manage_Blog();

  $data= $admin->all_blog();





 ?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.html">

    <title>Manage post</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">

    <!--right slidebar-->
    <link href="css/slidebars.css" rel="stylesheet">

    <!-- Custom styles for this template -->

    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

  </head>

  <body>

  <section id="container">
      <!--header start-->
      <header class="header white-bg">
              <div class="sidebar-toggle-box">
                  <i class="fa fa-bars"></i>
              </div>
            <!--logo start-->
            <a href="" class="logo">Admin<span>Pannel</span></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">



                <!--  notification end -->
            </div>
            <div class="top-nav ">
                <!--search & user info start-->
                <ul class="nav pull-right top-menu">

                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <img alt="" src="">
                            <span class="username"><?= $_SESSION['name'] ?></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout dropdown-menu-right">
                            <div class="log-arrow-up"></div>

                            <li><a href="admin_logout.php"><i class="fa fa-key"></i> Log Out</a></li>
                        </ul>
                    </li>
                    <li class="sb-toggle-right">
                        <i class="fa  fa-align-right"></i>
                    </li>

                </ul>

            </div>
        </header>
      <!--header end-->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
                  <li>
                      <a class="active" href="index.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-laptop"></i>
                          <span>Layouts</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="">Manage Post</a></li>


                      </ul>
                  </li>

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!--state overview start-->
              <div class="row state-overview">
                <table class="table table-bordered ">



   <thead>
     <tr>
       <th scope="col">Blogger Name</th>
       <th scope="col">Blog Title</th>
       <th scope="col">Blog Catagory</th>
       <th scope="col">Blog Image</th>
       <th scope="col">content</th>
       <th scope="col">Post Date</th>

       <th scope="col">Action</th>
     </tr>
   </thead>
   <?php
    while ($row= mysqli_fetch_assoc($data))
     {
     ?>
   <tbody>
     <tr>
       <td><?= ucwords($row['blogger_name']) ?></td>
       <td><?= ucwords($row['title']) ?></td>
       <td><?= ucwords($row['catagory']) ?></td>
       <td><img style="width:100px; height:100px;" class="card-img-top" src="../uploads/<?= ucwords($row['photo']) ?>" alt="..." /></td>
       <td style="width:300px;" ><?= ucwords($row['content']) ?></td>
       <td><?= ucwords($row['create_time']) ?></td>
       <td>
         <?php
               if($row['status']==1)
               {
                   ?>
                 <a class="btn btn-primary btn-sm" href="dactive.php? id=<?=ucwords($row['id']) ?>">Deactive</a>
                 <?php
               }
          ?>

          <?php
                if($row['status']==0)
                {
                    ?>
                  <a class="btn btn-primary btn-sm"  href="active.php? id=<?=ucwords($row['id']) ?>">Active</a>
                  <?php
                }
           ?>
         <a class="btn btn-primary btn-sm" href="delete.php? id=<?= ucwords($row['id']) ?>">Delete</a>

         </td>
     </tr>

   </tbody>

   <?php
     }
    ?>
 </table>








                  </div>
              </div>
              <!--state overview end-->





      <footer style="margin-top:412px" class="site-footer">
          <div class="text-center">
              @ 2022 Blogpage Admin
              <a href="#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="js/owl.carousel.js" ></script>
    <script src="js/jquery.customSelect.min.js" ></script>
    <script src="js/respond.min.js" ></script>

    <!--right slidebar-->
    <script src="js/slidebars.min.js"></script>

    <!--common script for all pages-->
    <script src="js/common-scripts5e1f.js?v=2"></script>

    <!--script for this page-->
    <script src="js/sparkline-chart.js"></script>
    <script src="js/easy-pie-chart.js"></script>
    <script src="js/count.js"></script>





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
