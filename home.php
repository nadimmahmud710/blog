<?php
session_start();
//session_destroy();
if(!isset($_SESSION['user_id']))
{
  header('Location:index.php');
}
require_once 'C:\xampp\htdocs\blog\vendor\autoload.php';
$user = new App\classes\Catagory();
$limit=2;

$data= $user->post_catagory();
$data1= $user->all_catagory();






$total_rows = mysqli_num_rows($data);
$total_pages = ceil ($total_rows / $limit);

if (!isset ($_GET['page']) ) {

      $page_number = 1;

  } else {

      $page_number = $_GET['page'];

  }
  $initial_page = ($page_number-1)*$limit;
  $data2= $user->post_catagory2($limit,$initial_page);

  if (isset ($_GET['cat'])){
    $cat=$_GET['cat'];
    $data2= $user->post_catagory3($cat);

  }
  if(isset($_POST['submit'])){
    $search= $_POST['search'];
    $data2= $user->search($search);
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

        <link href="assets/css/styles.css" rel="stylesheet" />

    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#!">Blogs</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="home.php">All Blog</a></li>
                        <?php
                           if($_SESSION['status']==1 )
                           {
                             ?>
                              <li class="nav-item"><a class="nav-link" href="blog_post.php">Post Blogs</a></li>
                              <?php
                           }
                           else {
                                echo "";
                           }
                         ?>
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
        <!-- Page header with logo and tagline-->
        <header  class="py-5 bg-light border-bottom mb-4">
            <div style="height:50px;" class="container">
                <div  class="text-center my-5">
                    <h2 class="fw-bolder">Welcome to Blog Page</h2>
                    <p class="lead mb-0">Best field of blogs</p>
                </div>
            </div>
        </header>
        <!-- Page content-->
        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                  <?php
                   while ($row= mysqli_fetch_assoc($data2))
                    {
                    ?>

                    <div class="card mb-4">
                        <a href="#!"><img style="width:735px; height:220px;" class="card-img-top" src="uploads/<?= ucwords($row['photo']) ?>" alt="..." /></a>
                        <div style="height:150px; overflow: hidden;" class="card-body">


                            <p class="card-title"> Post Catagory : <?= ucwords($row['create_time']) ?></p>
                            <p class="card-title"> Post Catagory : <?= ucwords($row['catagory']) ?></p>
                            <p class="card-title">Post Title: <?= ucwords($row['title']) ?></p>
                            <p class="card-text"> Post:  <?= ucwords($row['content']) ?></p>

                            <br>
                            <br>

                        </div>

                    <a class="btn btn-primary btn-sm" href="singlepost.php? id=<?= ucwords($row['id']) ?>">Read more →</a>
                        </div>
                    <?php
                      }
                     ?>

                    <!-- Pagination-->
                    <nav aria-label="Pagination">
                        <hr class="my-0" />
                        <ul class="pagination justify-content-center my-4">


                            <?php
                              for($page_number=1; $page_number<=$total_pages; $page_number++)
                              {
                              ?>

                             <li class="page-item active"><a class="page-link" href = "home.php?page=<?= ucwords($page_number) ?>"> &ensp;<?= ucwords($page_number) ?></a></li>


                            <?php
                              }
                             ?>
                        </ul>
                    </nav>
                </div>
                <!-- Side widgets-->
                <div class="col-lg-4">
                    <!-- Search widget-->
                    <div class="card mb-4">
                        <div class="card-header">Search</div>
                        <div class="card-body">
                            <div class="input-group">
                              <form action="home.php" method="post">
                                <input class="form-control" name="search" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                                <br>  <button class="btn btn-primary btn-block btn-sm" name="submit" >Submit</button>
                                  </form>
                            </div>
                        </div>
                    </div>

                    <!-- Categories widget-->
                    <div class="card mb-4">
                        <div class="card-header">Categories</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">

                                  <?php
                                  while ($row= mysqli_fetch_assoc($data1))
                                   {
                                    ?>
                                  <?php    $row1 =ucwords($row['catagory']);

                                  ?>
                                    <ul class="list-unstyled mb-0">
                                      <li><a href="home.php?cat=<?=ucwords($row['catagory'])?>"><?= $row1 ?></a></li>
                                    </ul>

                                    <?php
                                      }

                                     ?>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- Side widget-->

                </div>
            </div>
        </div>
        <!-- Footer-->
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
