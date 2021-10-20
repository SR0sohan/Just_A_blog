    <!-- Page Footer-->
    <footer class="main-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <div class="logo">
              <h6 class="text-white">Bootstrap Blog</h6>
            </div>
            <div class="contact-details">
              <p>Debiganj, Panchagarh, Bangladesh</p>
              <p>Phone: (+880) 0131 4980 421</p>
              <p>Email: <a href="mailto:fi304134@gmail.com">fi304134@gmail.com</a></p>
              <ul class="social-menu">
                <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fa fa-behance"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fa fa-pinterest"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-2">
            <div class="menus">
              <?php 

            $catCalls = "SELECT * FROM category";
                  $catRep = mysqli_query($db, $catCalls);

                  while ($row = mysqli_fetch_assoc($catRep)) {
                    // code...
                     $c_id = $row['c_id'];
                     $c_name = $row['c_name'];
                     $c_desc = $row['c_desc'];

                     $pquery = "SELECT * FROM posts WHERE cat_id='$c_id'";
                     $view_results = mysqli_query($db,$pquery);
                     $postcount = mysqli_num_rows($view_results);


                     ?>
                     <div class="item d-flex justify-content-between"><a href="page.php?cat_id=<?php echo $c_id;?>"><?php echo $c_name;?></a><span>(<?php echo $postcount;?>)</span></div>
                     <?php
                   }
            ?>
            </div>
          </div>
          <div class="col-md-3"></div>
          <div class="col-md-3">
            <div class="latest-posts">
              <div class="">
                <?php

                  $query = "SELECT * FROM posts ORDER BY p_id DESC LIMIT 4";
                  $view_result = mysqli_query($db,$query);
                  $count = 0;
                  while ($row = mysqli_fetch_assoc($view_result)) {
                    $p_id = $row['p_id'];
                    $p_title = $row['p_title'];
                    $p_desc = $row['p_desc'];
                    $p_thumbnail = $row['p_thumbnail'];
                    $cat_id = $row['cat_id'];
                    $user_id = $row['user_id'];
                    $p_date = $row['p_date'];
                    $p_status = $row['p_status'];
                    ?>

                      <a href="post.php?post_id=<?php echo $p_id;?>">
                      <div class="item d-flex align-items-center">
                        <div class="image"><img src="admin/assets/images/post/<?php echo $p_thumbnail;?>" alt="..." class="img-fluid"></div>
                        <div class="title"><strong><?php echo substr($p_title, 0, 40).'....';?></strong>
                          <div class="d-flex align-items-center">
                            <div class="views"> <?php echo $p_date;?></div>
                            <div class="comments"><i class="icon-comment"></i>12</div>
                          </div>
                        </div>
                      </div></a>

                    <?php
                  }

                ?>
            </div>
              </div>
          </div>
        </div>
      </div>
      <div class="copyrights">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <p>&copy; 2021. All rights reserved.</p>
            </div>
            <div class="col-md-6 text-right">
              <p>Desinged and developed By <a href="#" class="text-white">Sohan</a>
                <!-- Please do not remove the backlink to Bootstrap Temple unless you purchase an attribution-free license @ Bootstrap Temple or support us at http://bootstrapious.com/donate. It is part of the license conditions. Thanks for understanding :)                         -->
              </p>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/@fancyapps/fancybox/jquery.fancybox.min.js"></script>
    <script src="js/front.js"></script>

    <?php ob_end_flush();?>
  </body>
</html>