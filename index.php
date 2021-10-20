<?php 


    include "header.php";


?>
    <!-- Hero Section-->
    <section style="background: url(img/hero.jpg); background-size: cover; background-position: center center" class="hero">
      <div class="container">
        <div class="row">
          <div class="col-lg-7">
            <h1>Just_A_Blog is not just a blog. it is the insite you desire. That deep news you want to know.</h1>
          </div>
        </div><a href=".intro" class="continue link-scroll"><i class="fa fa-long-arrow-down"></i> Scroll Down</a>
      </div>
    </section>
    <!-- Intro Section-->
    <!-- <section class="intro">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <h2 class="h3">Some great intro here</h2>
            <p class="text-big">Place a nice <strong>introduction</strong> here <strong>to catch reader's attention</strong>. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderi.</p>
          </div>
        </div>
      </div>
    </section> -->
    <div class="container intro">
      <div class="row">
        <!-- Latest Posts -->
        <main class="post blog-post col-lg-8"> 
            <div class="container">

              <?php 

                $post_read_p = "SELECT * FROM posts";
                $post_result_p = mysqli_query($db,$post_read_p);
                $total_post = mysqli_num_rows($post_result_p);
                $start = 0;
                $post_per_page= 3;
                if ( $total_post%$post_per_page == 0) {
                  $total_page = $total_post/$post_per_page;
                }else{
                  $total_page = intval($total_post/$post_per_page)+1;
                }
                

                if (isset($_GET['no_page'])){
                  $page_num = $_GET['no_page'];
                  if ($page_num == 1) {
                    $start = 0;
                  }else if ($page_num > 1){
                    $start = ($page_num-1) * $post_per_page;
                  }
                }


                $post_read = "SELECT * FROM posts ORDER BY p_id DESC LIMIT $start, $post_per_page";
                $post_result = mysqli_query($db,$post_read);
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
                              <a href="post.php?post_id=<?php echo $p_id;?>">
                                <h2 class="h4">
                                  <?php echo $p_title;?>
                                </h2>
                              </a>
                            </header>
                            <p>
                              <?php echo substr($p_desc, 0,150).'....';?>
                              <a href="post.php?post_id=<?php echo $p_id;?>" class="text-dark">Read more</a>
                            </p>
                            <footer class="post-footer d-flex align-items-center text-center"><a href="#" class="author d-flex align-items-center flex-wrap">

                                <div class="avatar">

                              <?php

                                  $userQurey="SELECT * FROM users WHERE u_id='$user_id'";
                                    $result10 = mysqli_query($db, $userQurey);
                                     while($row = mysqli_fetch_assoc($result10)){

                                       $u_photo = $row['u_photo'];
                                 ?>

                                  <img src="admin/assets/images/users/<?php echo $u_photo;?>" alt="..." class="img-fluid">
                                  
                                 <?php
                                   }
                                ?>
                                </div>
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

    <!-- Divider Section-->
    <!-- <section style="background: url(img/divider-bg.jpg); background-size: cover; background-position: center bottom" class="divider">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</h2><a href="#" class="hero-link">View More</a>
          </div>
        </div>
      </div>
    </section> -->
    <!-- Latest Posts -->
    <!-- <section class="latest-posts"> 
      <div class="container">
        <header> 
          <h2>Latest from the blog</h2>
          <p class="text-big">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
        </header>
        <div class="row">
          <div class="post col-md-4">
            <div class="post-thumbnail"><a href="post.html"><img src="img/blog-1.jpg" alt="..." class="img-fluid"></a></div>
            <div class="post-details">
              <div class="post-meta d-flex justify-content-between">
                <div class="date">20 May | 2016</div>
                <div class="category"><a href="#">Business</a></div>
              </div><a href="post.html">
                <h3 class="h4">Ways to remember your important ideas</h3></a>
              <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
            </div>
          </div>
          <div class="post col-md-4">
            <div class="post-thumbnail"><a href="post.html"><img src="img/blog-2.jpg" alt="..." class="img-fluid"></a></div>
            <div class="post-details">
              <div class="post-meta d-flex justify-content-between">
                <div class="date">20 May | 2016</div>
                <div class="category"><a href="#">Technology</a></div>
              </div><a href="post.html">
                <h3 class="h4">Diversity in Engineering: Effect on Questions</h3></a>
              <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
            </div>
          </div>
          <div class="post col-md-4">
            <div class="post-thumbnail"><a href="post.html"><img src="img/blog-3.jpg" alt="..." class="img-fluid"></a></div>
            <div class="post-details">
              <div class="post-meta d-flex justify-content-between">
                <div class="date">20 May | 2016</div>
                <div class="category"><a href="#">Financial</a></div>
              </div><a href="post.html">
                <h3 class="h4">Alberto Savoia Can Teach You About Interior</h3></a>
              <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
            </div>
          </div>
        </div>
      </div>
    </section> -->
    <!-- Newsletter Section-->
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
          <nav aria-label="Page navigation example">
              <ul class="pagination pagination-template d-flex justify-content-center">
               <!--   -->
                
                <?php 

                // previous btn code start

                if (isset($_GET['no_page'])) {
                  $no_page = $_GET['no_page'];
                  if ($no_page == 1) {
                    // code...
                  }
                  else if ($no_page > 1) {
                    ?>
                      <li class="page-item">
                        <a href="index.php?no_page=<?php echo $no_page-1;?>" class="page-link"> <i class="fa fa-angle-left"></i></a>
                      </li>
                    <?php
                  }
                  else {
                    ?>
                      <li class="page-item">
                        <a href="index.php?no_page=<?php echo $no_page-1;?>" class="page-link"> <i class="fa fa-angle-left"></i></a>
                      </li>
                    <?php
                  }
                }

                // previous btn code end

                  for ($i=1; $i<=$total_page; $i++) { 
                    ?>
                    <li class="page-item">
                      <a href="index.php?no_page=<?php echo $i;?>" class="page-link"><?php echo $i;?></a>
                    </li>

                    <?php
                  }

                  // next btn code

                  if (isset($_GET['no_page'])) {
                    $no_page = $_GET['no_page'];
                    if ($no_page == $total_page) {
                      // code...
                    }
                    else if ($no_page > 0) {
                      ?>
                        <li class="page-item">
                          <a href="index.php?no_page=<?php echo $no_page+1;?>" class="page-link"><i class="fa fa-angle-right"></i></a>
                        </li>
                      <?php
                    }
                    else {
                      ?>
                        <li class="page-item">
                          <a href="index.php?no_page=<?php echo $no_page+1;?>" class="page-link"><i class="fa fa-angle-right"></i></a>
                        </li>
                      <?php
                    }
                  }

                ?>
              </ul>
        </div>
      </div>
    </section>

<?php 

  include "footer.php";

?>








    <!-- Gallery Section-->
    <!-- <section class="gallery no-padding">    
      <div class="row">
        <div class="mix col-lg-3 col-md-3 col-sm-6">
          <div class="item"><a href="img/gallery-1.jpg" data-fancybox="gallery" class="image"><img src="img/gallery-1.jpg" alt="..." class="img-fluid">
              <div class="overlay d-flex align-items-center justify-content-center"><i class="icon-search"></i></div></a></div>
        </div>
        <div class="mix col-lg-3 col-md-3 col-sm-6">
          <div class="item"><a href="img/gallery-2.jpg" data-fancybox="gallery" class="image"><img src="img/gallery-2.jpg" alt="..." class="img-fluid">
              <div class="overlay d-flex align-items-center justify-content-center"><i class="icon-search"></i></div></a></div>
        </div>
        <div class="mix col-lg-3 col-md-3 col-sm-6">
          <div class="item"><a href="img/gallery-3.jpg" data-fancybox="gallery" class="image"><img src="img/gallery-3.jpg" alt="..." class="img-fluid">
              <div class="overlay d-flex align-items-center justify-content-center"><i class="icon-search"></i></div></a></div>
        </div>
        <div class="mix col-lg-3 col-md-3 col-sm-6">
          <div class="item"><a href="img/gallery-4.jpg" data-fancybox="gallery" class="image"><img src="img/gallery-4.jpg" alt="..." class="img-fluid">
              <div class="overlay d-flex align-items-center justify-content-center"><i class="icon-search"></i></div></a></div>
        </div>
      </div>
    </section> -->
