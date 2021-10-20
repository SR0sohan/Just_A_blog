
<?php

  include "admin/inc/connection.php";
  ob_start();
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Just_A_Blog</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">

    <!-- favicone -->
    <link rel="shortcut icon" type="image/png" href="img/logo2.png">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Custom icon font-->
    <link rel="stylesheet" href="css/fontastic.css">
    <!-- Google fonts - Open Sans-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
    <!-- Fancybox-->
    <link rel="stylesheet" href="vendor/@fancyapps/fancybox/jquery.fancybox.min.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="favicon.png">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <header class="header">
      <!-- Main Navbar-->
      <nav class="navbar navbar-expand-lg">
        <div class="search-area">
          <div class="search-area-inner d-flex align-items-center justify-content-center">
            <div class="close-btn"><i class="icon-close"></i></div>
            <div class="row d-flex justify-content-center">
              <div class="col-md-8">
                <form action="search.php" method="POST">
                  <div class="form-group">
                    <input type="search" id="search" name="search_text" placeholder="What are you looking for?">
                    <button type="submit" class="submit" name="search"><i class="icon-search-1"></i></button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="container">
          <!-- Navbar Brand -->
          <div class="navbar-header d-flex align-items-center justify-content-between">
            <!-- Navbar Brand --><a href="index.php?no_page=1" class="navbar-brand"><img src="img/logo2.png"> Just A Blog</a>
            <!-- Toggle Button-->
            <button type="button" data-toggle="collapse" data-target="#navbarcollapse" aria-controls="navbarcollapse" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span></span><span></span><span></span></button>
          </div>
          <!-- Navbar Menu -->
          <div id="navbarcollapse" class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
              

                <?php

                  $catCall = "SELECT * FROM category ORDER BY c_name ASC";
                  $cat_rep = mysqli_query($db, $catCall);

                  while ($row = mysqli_fetch_assoc($cat_rep)) {
                    // code...
                     $c_id = $row['c_id'];
                     $c_name = $row['c_name'];
                     $c_desc = $row['c_desc'];
                     ?>


                      <li class="nav-item">
                        <a href="page.php?cat_id=<?php echo $c_id;?>" class="nav-link active "><?php echo $c_name;?></a>
                      </li>



                     <?php

                  }


                ?>



            </ul>
            <div class="navbar-text">
              <a href="#" class="search-btn">
                <i class="icon-search-1"></i>
              </a>
            </div>
          </div>
        </div>
      </nav>
    </header>