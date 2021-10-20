<?php
    include "connection.php";
    ob_start();
    session_start();
    if(empty($_SESSION['u_email'])){
        header('location:index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Just A Blog- Admin page</title>
    
    <!-- favicone -->
    <link rel="shortcut icon" type="image/png" href="../img/logo2.png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    
    <link rel="stylesheet" href="assets/vendors/simple-datatables/style.css">
    <link rel="stylesheet" href="assets/vendors/iconly/bold.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/profile.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
    <div class="sidebar-header">
        <div class="d-flex justify-content-between">
            <div class="logo">
                <a href="dashboard.php"><img src="assets/images/logo/logo.png" alt="Logo" srcset=""></a>
            </div>
            <div class="toggler">
                <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
            </div>
        </div>
    </div>
    <div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Menu</li>
            
            <li class="sidebar-item active ">
                <a href="dashboard.php" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            
            <li class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-stack"></i>
                    <span>Categoties</span>
                </a>
                <ul class="submenu ">
                    <li class="submenu-item ">
                        <a href="category.php">View All category</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="category.php">Add New  Category</a>
                    </li>
                </ul>
            </li>

            <?php
                 if ($_SESSION['u_role'] !=1) {
                     // code...
                  ?>

                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>Users</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item ">
                                <a href="users.php?do=add">Add New  Users</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="users.php?do=manage">View All Users </a>
                            </li>
                        </ul>
                    </li>

                  <?php
                 }
            ?>

            

            <li class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-stack"></i>
                    <span>Posts</span>
                </a>
                <ul class="submenu ">
                    <li class="submenu-item">
                        <a href="posts.php?do=add">Add New posts</a>
                    </li>
                    <li class="submenu-item">
                        <a href="posts.php?do=manage">View All posts</a>
                    </li>
                </ul>
            </li>


            <li class="sidebar-item  ">
                <a href="https://github.com/zuramai/mazer/blob/main/CONTRIBUTING.md" class='sidebar-link'>
                    <i class="bi bi-puzzle"></i>
                    <span>Settings</span>
                </a>
            </li>
            <li class="sidebar-item  ">
                <a href="profile.php" class='sidebar-link'>
                    <i class="bi bi-puzzle"></i>
                    <span>Profile</span>
                </a>
            </li>

            <li class="sidebar-item  ">
                <a href="inc/logout.php" class='sidebar-link'>
                    <i class="bi bi-puzzle"></i>
                    <span>Log out</span>
                </a>
            </li>
        </ul>
    </div>
    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>