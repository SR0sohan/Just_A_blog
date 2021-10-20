<?php

  include "admin/inc/connection.php"

?>


<!-- Widget [Search Bar Widget]-->
          <div class="widget search">
            <header>
              <h3 class="h6">Search the blog</h3>
            </header>
            <form class="search-form" action="search.php" method="POST">
              <div class="form-group">
                <input type="search" name="search_text" placeholder="What are you looking for?">
                <button type="submit" class="submit" name="search"><i class="icon-search"></i></button>
              </div>
            </form>
          </div>
          <!-- Widget [Latest Posts Widget]        -->
          <div class="widget latest-posts">
              <header>
                <h3 class="h6">Latest Posts</h3>
              </header>
              <div class="blog-posts">
                <?php

                  $query = "SELECT * FROM posts ORDER BY p_id DESC LIMIT 3";
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
                            <!-- <div class="comments"><i class="icon-comment"></i>12</div> -->
                          </div>
                        </div>
                      </div></a>

                    <?php
                  }

                ?>
            </div>
           </div>
          
          <!-- Widget [Categories Widget]-->
          <div class="widget categories">
            <header>
              <h3 class="">Categories</h3>
            </header> 
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
                     <div class="item d-flex justify-content-between"><a href="page.php?cat_id=<?php echo $c_id;?>"><?php echo $c_name;?></a><span><?php echo $postcount;?></span></div>
                     <?php
                   }
            ?>
          </div>
          <!-- Widget [Tags Cloud Widget]-->
          <div class="widget tags">       
            <header>
              <h3 class="h6">Tags</h3>
            </header>
            <ul class="list-inline">
              <li class="list-inline-item"><a href="#" class="tag">#Business</a></li>
              <li class="list-inline-item"><a href="#" class="tag">#Technology</a></li>
              <li class="list-inline-item"><a href="#" class="tag">#Fashion</a></li>
              <li class="list-inline-item"><a href="#" class="tag">#Sports</a></li>
              <li class="list-inline-item"><a href="#" class="tag">#Economy</a></li>
            </ul>
          </div> 