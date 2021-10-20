<?php 


    include "header.php";


?>

    <div class="container">
      <div class="row">
        <!-- Latest Posts -->
        <main class="posts-listing col-lg-8"> 
          <div class="container">
            <div class="row">
              <!-- post -->

              <?php 

                if (isset($_POST['search'])) {
                  $search_text = $_POST['search_text'];
                  $post_read = "SELECT * FROM posts WHERE p_title LIKE '%$search_text%' OR p_desc LIKE '%$search_text%'";
                      $post_result = mysqli_query($db,$post_read);

                      $post_count = mysqli_num_rows($post_result);
                      if ($post_count == 0) {
                        header('location:404.php');
                      }else{
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
                          <div class="post col-xl-6">
                            <div class="post-thumbnail"><a href="post.php?post_id=<?php echo $p_id;?>">
                              <img src="admin/assets/images/post/<?php echo $p_thumbnail;?>" alt="..." class="img-fluid"></a></div>
                            <div class="post-details">
                              <div class="post-meta d-flex justify-content-between">
                                
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
                                  </a></div>
                              </div><a href="post.html">
                                <h3 class="h4"><?php echo $p_title;?></h3></a>
                              <p class="text-muted"><?php echo substr($p_desc, 0,70).'....';?></p>
                              <footer class="post-footer d-flex align-items-center"><a href="#" class="author d-flex align-items-center flex-wrap">
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
                              </footer>
                            </div>
                          </div>

                          <?php
                        }
                      }
                }
              ?>  
            </div>
            </nav>
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
    <!-- Page Footer-->
<?php 

  include "footer.php";

?>