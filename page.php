<?php 


    include "header.php";


?>
    <!-- Hero Section-->
    <section style="background: url(img/hero.jpg); background-size: cover; background-position: center center" class="hero">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h1>
              <?php 
                if (isset($_GET['cat_id'])){
                  $c_id_c = $_GET['cat_id'];
                  $catQurey="SELECT * FROM category WHERE c_id='$c_id_c'";
                     $result9 = mysqli_query($db, $catQurey);
                     $isPost = mysqli_num_rows($result9);
                     if($isPost == 0){
                       echo "<span>Uncategorized!</span>";
                     }else{
                        while($row = mysqli_fetch_assoc($result9)){

                          $c_id   = $row['c_id'];
                          $c_name = $row['c_name'];
                          $c_desc = $row['c_desc'];
                        }
                        echo $c_name;
                     } 
                     
                }

              ?>
            </h1>
          </div>
        </div><a href=".intro" class="continue link-scroll"><i class="fa fa-long-arrow-down"></i> Scroll Down</a>
      </div>
    </section>
    <div class="container intro">
      <div class="row">
        <!-- Latest Posts -->
        <main class="post blog-post col-lg-8"> 
            <div class="container">

              <?php 

                if (isset($_GET['cat_id'])) {
                $category_id = $_GET['cat_id'];
                $post_read = "SELECT * FROM posts WHERE cat_id = '$category_id'  ORDER BY p_id DESC";
                $post_result = mysqli_query($db,$post_read);
                $isPost = mysqli_num_rows($post_result);
                if($isPost == 0){
                  echo "<span>No Post Found <a href='index.php'> Go to home</a></span>";
                }
                while ($row = mysqli_fetch_assoc($post_result)) {
                  $p_id = $row['p_id'];
                  $p_title = $row['p_title'];
                  $p_desc = $row['p_desc'];
                  $p_thumbnail = $row['p_thumbnail'];
                  $cat_id = $row['cat_id'];
                  $user_id = $row['user_id'];
                  $p_date = $row['p_date'];
                  $p_status = $row['p_status'];
                  ?>

                  <div class="post-single text-center pt-5">
                        <div class="post-thumbnail">
                          <img src="admin/assets/images/post/<?php echo $p_thumbnail;?>" alt="..." class="img-fluid">
                        </div>
                        <div class="post-details pt-3">
                          <div class="content">
                            <header class="post-header">
                              <a href="post.html">
                                <h2 class="h4">
                                  <?php echo $p_title;?>
                                </h2>
                              </a>
                            </header>
                            <p>
                              <?php echo substr($p_desc, 0,150).'....';?>
                              <a href="#" class="text-dark">Read more</a>
                            </p>
                            <footer class="post-footer d-flex align-items-center text-center"><a href="#" class="author d-flex align-items-center flex-wrap">
                                <div class="avatar"><img src="img/avatar-1.jpg" alt="..." class="img-fluid"></div>
                                <div class="title">
                                  <span>
                                    <?php

                                     $userQurey="SELECT * FROM users WHERE u_id='$user_id'";
                                        $result10 = mysqli_query($db, $userQurey);
                                        while($row = mysqli_fetch_assoc($result10)){

                                            $u_name = $row['u_name'];
                                          
                                        }
                                        echo $u_name;

                                    ?>
                                  </span>
                                </div></a>  
                              <div class="date"><i class="icon-clock"></i><?php echo $p_date;?></div>
                              <div class="comments"><i class="icon-comment"></i>12</div>
                              <div class="category">
                                <a href="#">
                                  <?php

                                         $catQurey="SELECT * FROM category WHERE c_id='$cat_id'";
                                            $result9 = mysqli_query($db, $catQurey);
                                            while($row = mysqli_fetch_assoc($result9)){

                                              $c_id   = $row['c_id'];
                                              $c_name = $row['c_name'];
                                              $c_desc = $row['c_desc'];
                                            }
                                            echo $c_name;

                                        ?>
                                </a>
                              </div>
                            </footer>
                          </div>
                        </div>
                  </div>


                  <?php
                }

                }else{

                }
              ?>


              
          </div>
        </main>
        <aside class="col-lg-4">
          <!-- sidebar code -->
            <?php 

              include "sidebar.php";

            ?>

        </aside>
      </div>
    </div>
    <section class="newsletter no-padding-top">    
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h2>Subscribe to Newsletter</h2>
            <p class="text-big">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          </div>
          <div class="col-md-8">
            <div class="form-holder">
              <form action="#">
                <div class="form-group">
                  <input type="email" name="email" id="email" placeholder="Type your email address">
                  <button type="submit" class="submit">Subscribe</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section>
      <div class="row">
        <div class="col-md-12">
          <nav aria-label="Page navigation ">
            <ul class="pagination justify-content-center">
              <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
              </li>
              <li class="page-item"><a class="page-link text-dark" href="#">1</a></li>
              <li class="page-item"><a class="page-link text-dark" href="#">2</a></li>
              <li class="page-item"><a class="page-link text-dark" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#">Next</a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </section>

<?php 

  include "footer.php";

?>


