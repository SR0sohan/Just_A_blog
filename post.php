<?php 


    include "header.php";


?>
    <div class="container">
      <div class="row">
        <!-- Latest Posts -->
        <main class="post blog-post col-lg-8"> 
          <div class="container">

            <?php 
              if (isset($_GET['post_id'])) {

                $post_id = $_GET['post_id'];

                $post_read = "SELECT * FROM posts WHERE p_id = '$post_id'";
                $post_result = mysqli_query($db,$post_read);
                $v_post = mysqli_num_rows($post_result);

                if ($v_post == 0) {
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
                  }
                  ?>

                    <!-- post section strat -->
                    <div class="post-single">
                      <div class="post-thumbnail"><img src="admin/assets/images/post/<?php echo $p_thumbnail;?>" alt="..." class="img-fluid"></div>
                      <div class="post-details">
                        <div class="post-meta d-flex justify-content-between">
                          <div class="category"><a href="#">
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
                        </div>
                        <h2><?php echo $p_title;?><a href="#"></a></h2>
                        <div class="post-footer d-flex align-items-center flex-column flex-sm-row"><a href="#" class="author d-flex align-items-center flex-wrap">
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
                            <div class="title"><span>
                              
                              <?php

                               $userQurey="SELECT * FROM users WHERE u_id='$user_id'";
                                  $result10 = mysqli_query($db, $userQurey);
                                  while($row = mysqli_fetch_assoc($result10)){

                                      $u_name = $row['u_name'];
                                    
                                  }
                                  echo $u_name;

                              ?>
                            </span></div></a>
                          <div class="d-flex align-items-center flex-wrap">       
                            <div class="date"><i class="icon-clock"></i><?php echo $p_date;?></div>
                            <!-- <div class="views"><i class="icon-eye"></i> 500</div> -->
                            <div class="comments meta-last"><i class="icon-comment"></i>12</div>
                          </div>
                        </div>
                        <div class="post-body">
                          <p class="lead text-dark font-weight-normal"><?php echo $p_desc;?></p>
                          
               <!-- <p> <img src="img/featured-pic-3.jpeg" alt="..." class="img-fluid"></p> -->
                          
                        </div>
                        <div class="post-tags">
                          <a href="#" class="tag">#Business</a>
                          <a href="#" class="tag">#Tricks</a>
                          <a href="#" class="tag">#Financial</a>
                          <a href="#" class="tag">#Economy</a></div>
                          <!-- <div class="posts-nav d-flex justify-content-between align-items-stretch flex-column flex-md-row"><a href="#" class="prev-post text-left d-flex align-items-center">
                              <div class="icon prev"><i class="fa fa-angle-left"></i></div>
                              <div class="text"><strong class="text-primary">Previous Post </strong>
                                <h6>I Bought a Wedding Dress.</h6>
                              </div></a><a href="#" class="next-post text-right d-flex align-items-center justify-content-end">
                              <div class="text"><strong class="text-primary">Next Post </strong>
                                <h6>I Bought a Wedding Dress.</h6>
                              </div>
                              <div class="icon next"><i class="fa fa-angle-right">   </i></div></a>
                          </div> -->
                      </div>
                    </div>
                    <!-- post section end -->
                  <?php
                }
                
              }

            ?>    
          </div>


          <div class="post-comments">
            <header>
              <h3 class="h6">Post Comments
                <?php 

                $query_cm = "SELECT id FROM comments ORDER BY id";
                $cm_run = mysqli_query($db, $query_cm);
                $cm_count = mysqli_num_rows($cm_run);
                ?>
                  <span class="no-of-comments">(<?php echo $cm_count;?>)</span>
                <?php

                ?>
                
              </h3>
            </header>
            <?php 

                  $sql = "SELECT * FROM comments WHERE post_id = '$post_id'";
                  $result = mysqli_query($db, $sql);
                  if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $name = $row['name'];
                        $cmnt_date = $row['cmnt_date'];
                        $cmnt = $row['cmnt'];
                        $post_id = $row['post_id'];
                  ?>
                  <div class="comment">
                    <div class="comment-header ">
                      <div class="user d-flex align-items-center">
                        <!-- <div class="image"><img src="img/user.svg" alt="..." class="img-fluid rounded-circle"></div> -->
                        <div class="title"><strong><?php echo $name;?></strong>
                          <span class="date"><?php echo $cmnt_date; ?></span></div>
                      </div>
                    </div>
                    <div class="comment-body">
                      <p><?php echo $cmnt;?></p>
                    </div>
                  </div>
                  <?php

                    }
                  }  
                  ?>
            
          </div>
          <div class="add-comment">
            <header>
              <h3 class="h6">Leave a Comment</h3>
            </header>
            <form action="" class="commenting-form" method="POST">
              <div class="row">
                <div class="form-group col-md-6">
                  <input type="text" name="username" id="username" placeholder="Name" class="form-control">
                </div>
                <div class="form-group col-md-6">
                  <input type="email" name="useEmail" id="useremail" placeholder="Email Address (will not be published)" class="form-control">
                </div>
                <div class="form-group col-md-12">
                  <textarea name="usercomment" id="usercomment" placeholder="Type your comment" class="form-control"></textarea>
                </div>
                <div class="form-group col-md-12">
                  <button type="submit" name="submit" class="btn btn-secondary">Submit Comment</button>
                </div>
              </div>

              <?php 
                if (isset($_POST['submit'])) { 
                  $username = $_POST['username']; 
                  $useEmail = $_POST['useEmail']; 
                  // $post_id = $_POST['post_id']; 
                  // $comment_date = date("y-m-d");
                  $usercomment = $_POST['usercomment']; 
                  echo $username;
                  $cmnt_query = "INSERT INTO comments (name, email, cmnt_date, cmnt,  post_id)
                      VALUES ('$username', '$useEmail',now(),'$usercomment','$post_id')";
                  $result_c = mysqli_query($db, $cmnt_query);
                  if ($result_c) {
                    $location = "/just_A_blog/post.php?post_id=$p_id";
                    header("Location: $location");
                  } else {
                    die("MySQLi Query Failed." . mysqli_error($db));
                  }
                }
              ?>
            </form>
          </div>
        </main>
        <aside class="col-lg-4">
          <!-- Widget [Search Bar Widget]-->
          <?php 

              include "sidebar.php";

            ?>
        </aside>
      </div>
    </div>
<?php 


    include "footer.php";


?>