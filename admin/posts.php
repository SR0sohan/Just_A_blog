<?php
    include "inc/header.php";
?>

            <?php

                    /* if(isset($_GET['do'])){
                        $do = $_GET['do'];
                    }else{
                        $do = 'manage';
                    } */
                $do = isset($_GET['do']) ? $_GET['do'] : 'manage';
                
                if($do == 'manage'){

                    if ($_SESSION['u_role'] ==2) {
                        // code...
                    }else{
                        header('location: dashboard.php');
                    }
                    // manage 
            ?>
            
            <div class="page-heading">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-6 order-md-1 order-last">
                                <h3>All posts information</h3>
                                <p class="text-subtitle text-muted">For user to check they list</p>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">User</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <section class="section">
                        <div class="card">
                            <div class="card-header">
                                User Datatable
                            </div>
                            <div class="card-body">
                                <table class="table table-striped" id="table1">
                                    <thead>
                                        <tr>
                                            <th>N0</th>
                                            <th>Date</th>
                                            <th>Photo</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Category</th>
                                            <th>Author</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                  <?php
                                      
                                      $query = "SELECT * FROM posts";
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
                                        $count++;

                                          ?>
                                        
                                        <tr>
                                            <td><?php echo $count;?></td>
                                            <td><?php echo $p_date?></td>
                                            <td>
                                                <img src="assets/images/post/<?php echo $p_thumbnail;?>" class="" width="80" height="80" alt="" style="border-radius:6px">
                                            </td>
                                            <td><?php echo $p_title?></td>
                                            <td><?php echo substr($p_desc, 0,100) .'....'?></td>
                                            <td>
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
                                                    
                                         </td>
                                            <td>
                                                
                                                <?php

                                                 $userQurey="SELECT * FROM users WHERE u_id='$user_id'";
                                                    $result10 = mysqli_query($db, $userQurey);
                                                    while($row = mysqli_fetch_assoc($result10)){

                                                        $u_name = $row['u_name'];
                                                      
                                                    }
                                                    echo $u_name;

                                                ?>

                                            </td>
                                            <td>
                                                <?php
                                                  if($p_status == 0){
                                                    echo'<span class= "badge bg-danger">Inactive</span>';
                                                 }
                                                 if($p_status == 1){
                                                    echo'<span class= "badge bg-success">Active</span>';
                                                 }
                                                
                                                ?>
                                            </td>
                                            <td>
                                                <!-- <a href="" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="profile">
                                                  <i class="far fa-eye ms-2 text-success"></i>
                                                </a> -->
                                                <a href="posts.php?do=edit&edit_id=<?php echo $p_id;?>"type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                                  <i class="far fa-edit ms-2 text-warning"></i>
                                                </a>
                                            
                                                <a href="posts.php?do=delete&d_id=<?php echo $p_id;?>"type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                                  <i class="far fa-trash-alt ms-2 text-danger"></i>
                                                </a>
                                            </td>
                                        </tr>  
                                        <?php
                                      }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </section>
                </div>
            
            <?php
           }

        if($do == 'add'){
            // add  
            
            ?>
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Add a new post</h3>
                        <p class="text-subtitle text-muted">Give textual form controls like input upgrade with custom styles,
                            sizing, focus states, and more.</p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Input</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Fill up the form....</h4>
                    </div>

                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- <div class="form-group">
                                        <label for="valid-state">Valid State</label>
                                                <input type="text" class="form-control is-valid" id="valid-state" placeholder="Valid"
                                                    value="Valid" required>
                                                <div class="valid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    This is valid state.
                                                </div>
                                        </div>

                                        <div class="form-group">
                                        <label for="invalid-state">Invalid State</label>
                                                <input type="text" class="form-control is-invalid" id="invalid-state"
                                                    placeholder="Invalid" value="Invalid" required>
                                                <div class="invalid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    This is invalid state.
                                                </div>
                                        </div> -->

                                        <div class="form-group">
                                            <label for="title">Post tiltle</label>
                                            <input type="text" id="title" class="form-control" placeholder="Post Title" name="posttitle" required="required">
                                            <p><small class="text-muted">Insert your post title.</small></p>
                                        </div>


                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea class="form-control" id="description" name="description" rows="10" placeholder="Description"></textarea>
                                            <label>Your post</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="category">Select category</label>
                                                <select class="form-select" id="category" name="PostCategory">

                                                    <?php

                                                    $readCat =  "SELECT * FROM category";
                                                    $result11 = mysqli_query($db, $readCat);
                                                    while($row = mysqli_fetch_assoc($result11)){

                                                      $c_id = $row['c_id'];
                                                      $c_name = $row['c_name'];
                                                      $c_desc = $row['c_desc'];
                                                      ?>

                                                      <option value='<?php echo $c_id;?>'><?php echo $c_name;?></option>

                                                    <?php
                                                    }
                                                    ?> 
                                                </select>
                                        </div>

                                        <div class="form-group">
                                                <label for="photo">Selct post thumbnail</label>
                                                <input class="form-control" type="file" id="photo" name="image">
                                                <p><small class="text-muted">Please use a square size photo(png,jpg,jpeg)</small></p>
                                        </div>

                                        <div class="col-sm-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-lg btn-primary me-2 mb-1" name="add_post">Submit</button>
                                            <button type="reset" class="btn btn-lg btn-light-secondary me-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>

                        <!-- user data add  -->
                            <?php
                                
                                $current_user = $_SESSION['u_id'];
                                $currect_date = date("y-m-d");
                                if(isset($_POST['add_post'])){

                                    $posttitle = mysqli_real_escape_string($db, $_POST['posttitle']);
                                    $description = mysqli_real_escape_string($db, $_POST['description']);
                                    $PostCategory = $_POST['PostCategory'];
                                    $file_name = $_FILES['image']['name'];
                                    $tmp_name = $_FILES['image']['tmp_name'];

                                    $extn_array = explode('.', $_FILES['image']['name']);
                                    $extn = strtolower(end($extn_array));
                                    $extensions = array('jpg','png','jpeg');

                                
                                        if(in_array($extn, $extensions) === false){
                                            echo 'plz insert jpg, png or jpeg format file!';
                                        }else{

                                            $random = rand();
                                            $update_name = $random.$file_name;
                                            // image transfer to a folder

                                            move_uploaded_file($tmp_name, 'assets/images/post/'.$update_name);
                                            

                                            $postAddQuery = "INSERT INTO posts (p_title,p_desc,p_thumbnail,cat_id,user_id,p_date,p_status) VALUES ('$posttitle','$description','$update_name','$PostCategory','$current_user','$currect_date','1')";
            
                                            $postAdd = mysqli_query($db,$postAddQuery);
                                            if($postAdd){
                                                header('Location:posts.php');
                                            }else{
                                                die('post add error!'.mysqli_error($db));
                                            }
                                        }
                                }
                            ?>

                </div>
            </section>
        </div>
            <?php
             }

                    if($do == 'edit'){
                        // edit 

                        if(isset($_GET['edit_id'])){
                            $edit_id = $_GET['edit_id']; 
                            // read users info 
                            $query = "SELECT * FROM posts WHERE p_id = '$edit_id'";
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
                                    }
             ?>
                            
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>edit user</h3>
                        
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Input</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit the post insformation</h4>
                    </div>

                        <form action="posts.php?do=update" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="p_title">User Name</label>
                                            <input type="text" id="p_title" class="form-control" placeholder="User Name" name="p_title" required="required" value="<?php echo $p_title;?>">
                                            <p><small class="text-muted">Insert your post title.</small></p>
                                        </div>

                                        <div class="form-group">
                                            <label for="p_description">Post description</label>
                                            <textarea class="form-control" id="p_description"
                                             name="p_description" rows="10" placeholder="Address" value="<?php echo $p_desc;?>"><?php echo $p_desc;?></textarea>
                                            <label>Post Description</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="post_cat">Select Category</label>
                                            <select class="form-select" id="post_cat" name="post_cat">
                                                <?php 

                                                    $query4 =  "SELECT * FROM category";
                                                    $result4 = mysqli_query($db, $query4);
                                                    while($row = mysqli_fetch_assoc($result4)){

                                                      $c_id = $row['c_id'];
                                                      $c_name = $row['c_name'];
                                                      $c_desc = $row['c_desc'];
                                                    ?>
                                                    <option value="<?php echo $c_id;?>"
                                                        <?php 
                                                         if ($cat_id == $c_id) {
                                                             // code...
                                                            echo "selected";
                                                         }
                                                        ?>

                                                        ><?php echo  $c_name;?></option>
                                                    <?php
                                                    }


                                                ?>   
                                            </select>
                                        </div>

                                        
                                        <div class="form-group">
                                            <label for="p_status">post status</label>
                                                <select class="form-select" id="p_status" name="p_status">
                                                    <option value='0' <?php if($p_status == '0') echo "selected";?>>Inactive</option>
                                                    <option value='1' <?php if($p_status == '1') echo "selected";?>>Active</option> 
                                                </select>
                                        </div>

                                        <div class="form-group">
                                                <img src="assets/images/post/<?php echo $p_thumbnail;?>" width="200" alt=""> <br><br><br>
                                                <label for="photo">Select your Post Thumbnail</label>
                                                <input class="form-control" type="file" id="photo" name="image">
                                                <p><small class="text-muted">Please use a square size photo(png,jpg,jpeg)</small></p>
                                        </div>

                                        

                                        <div class="col-sm-12 d-flex justify-content-end">
                                            <input type="hidden" class="form-control" name="edit_post_id" value="<?php echo $edit_id;?>">
                                            <!-- <input type="submit" name="editUser" value="upadte"> -->
                                            <button type="submit" class="btn btn-lg btn-primary me-2 mb-1" name="add_post">Submit</button>
                                            
                                                <button type="reset" class="btn btn-lg  btn-light-secondary me-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>

                </div>
            </section>
        </div>         
      <?php

                        }
                    }

                    if ( $do == 'update' ){
                    
                    // Update Start
                    if ( $_SERVER['REQUEST_METHOD'] == 'POST' ){

                            $edit_id        = $_POST['edit_post_id'];
                            $p_title       = $_POST['p_title'];
                            $p_description      =mysqli_real_escape_string($db, $_POST['p_description']);
                            $post_cat       = $_POST['post_cat'];
                            $p_status          = $_POST['p_status'];
                            $file_name      = $_FILES['image']['name'];
                            $file_tmp_name  = $_FILES['image']['tmp_name'];

                            // user updates both password and image 
                            if (!empty($file_name)) {
                                # code...

                                $extn_array = explode('.', $_FILES['image']['name']);
                                $extn = strtolower(end($extn_array));
                                $extensions = array('jpg','png','jpeg');

                                if(in_array($extn,$extensions) == true){

                                    $random = rand();
                                     $update_name = $random.$file_name;
                                    // image transfer to a folder

                                     move_uploaded_file($file_tmp_name, 'assets/images/post/'.$update_name);
                                    $p_updateQuery = "UPDATE posts SET p_title='$p_title', p_desc='$p_description',p_thumbnail  ='$update_name', cat_id='$post_cat', p_status='$p_status' WHERE p_id='$edit_id'";
                                    $p_update_res = mysqli_query($db,$p_updateQuery);   
                                    if ($p_update_res) {
                                        # code...
                                        header('location:posts.php');
                                    }else {
                                        
                                        die("user update error (1).".mysql_error($db));
                                    }
                                    

                                }else{
                                    echo '<span class="alert alert-danger">Please select an image(jpg,jpeg,png)</span>';
                                }

                            }
                                  
                            // user updates nothing
                            else {
                                # code...
                                $q_updateQuery = "UPDATE posts SET p_title='$p_title', p_desc='$p_description', cat_id='$post_cat', p_status='$p_status' WHERE p_id='$edit_id'";
                                $q_update_res = mysqli_query($db,$q_updateQuery);   
                                if ($q_update_res) {
                                    # code...
                                    header('location:posts.php');
                                }else {
                                    
                                    die("user update error (4).".mysql_error($db));
                                }
                            }
                            
                        }
                    }

                    if($do == 'delete'){
                            if(isset($_GET['d_id'])){
                            
                                $delete_id = $_GET['d_id'];

                            $thumbQuery = "SELECT p_thumbnail FROM posts WHERE p_id = '$delete_id'";
                                        $thumbRes = mysqli_query($db,$thumbQuery);
                                        while($row = mysqli_fetch_assoc($thumbRes)){
                                            $thumbName = $row['p_thumbnail'];
                                        };

                                        unlink('assets/images/post/'.$thumbName);

                                $deleteQueryp = "DELETE FROM posts WHERE p_id='$delete_id'";
                                $deleteResp = mysqli_query($db, $deleteQueryp);
                                if($deleteResp){
                                    header('location: posts.php');
                                }else{
                                    die("delete user error!".mysql_error($db));
                                }
                            }
                        }

         ?>

<?php
    include "inc/footer.php";
?>