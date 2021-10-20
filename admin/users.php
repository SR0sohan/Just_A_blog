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
                                <h3>All users information</h3>
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
                                            <th>Photo</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>User role</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                  <?php
                                      
                                      $query = "SELECT * FROM users";
                                      $view_result = mysqli_query($db,$query);
                                      $count = 0;
                                      while ($row = mysqli_fetch_assoc($view_result)) {
                                        $u_id = $row['u_id'];
                                        $u_name = $row['u_name'];
                                        $u_photo = $row['u_photo'];
                                        $u_email = $row['u_email'];
                                        $u_pass = $row['u_pass'];
                                        $u_phone = $row['u_phone'];
                                        $u_address = $row['u_address'];
                                        $u_gender = $row['u_gender'];
                                        $u_dob = $row['u_dob'];
                                        $u_biodata = $row['u_biodata'];
                                        $u_role = $row['u_role'];
                                        $u_status = $row['u_status'];
                                        $count++;

                                          ?>
                                        
                                        <tr>
                                            <td><?php echo $count;?></td>
                                            <td>
                                                <img src="assets/images/users/<?php echo $u_photo;?>" class="img-circle" width="80" height="80" alt="" style="border-radius:100%">
                                            </td>
                                            <td><?php echo $u_name?></td>
                                            <td><?php echo $u_email?></td>
                                            <td><?php echo $u_phone?></td>
                                            <td>
                                                <?php
                                                  if($u_role == 0){
                                                      echo'<span class= "badge bg-success">Subscriber</span>';
                                                  }
                                                 if($u_role == 1){
                                                    echo'<span class= "badge bg-info">Editor</span>'; 
                                                 }
                                                 if($u_role == 2){
                                                    echo'<span class= "badge bg-danger">Admin</span>'; 
                                                 }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                  if($u_status == 0){
                                                    echo'<span class= "badge bg-danger">Inactive</span>';
                                                 }
                                                 if($u_status == 1){
                                                    echo'<span class= "badge bg-success">Active</span>';
                                                 }
                                                
                                                ?>
                                            </td>
                                            <td>
                                                <a href="" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="profile">
                                                  <i class="far fa-eye ms-2 text-success"></i>
                                                </a>
                                                <a href="users.php?do=edit&edit_id=<?php echo $u_id;?>"type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                                  <i class="far fa-edit ms-2 text-warning"></i>
                                                </a>
                                            
                                                <a href="users.php?do=delete&d_id=<?php echo $u_id;?>"type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
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
                        <h3>Add a new user</h3>
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
                                            <label for="username">User Name</label>
                                            <input type="text" id="username" class="form-control" placeholder="User Name" name="username" required="required">
                                            <p><small class="text-muted">Insert your full name.</small></p>
                                        </div>

                                        <div class="form-group">
                                            <label for="useremail">User email</label>
                                            <input type="email" id="useremail" class="form-control" placeholder="example@something.com" name="useremail" required="required">
                                            <p><small class="text-muted">Insert your email address.</small></p>
                                        </div>

                                        <div class="form-group">
                                            <label for="userpassword">User Password</label>
                                            <input type="password" id="userpassword" class="form-control" placeholder="password"  required="required" name="password">
                                            <p><small class="text-muted">Minimum 8 characters</small></p>
                                        </div>
                                        <div class="form-group">
                                            <label for="Phone">Phone</label>
                                            <input type="number" id="Phone" class="form-control" placeholder="Phone number"  required="required"  name="phone">
                                            <p><small class="text-muted">Don't use country code.</small></p>
                                        </div>

                                        <div class="form-group">
                                            <label for="Address">Address</label>
                                            <textarea class="form-control" id="Address" name="address" rows="3" placeholder="Address"></textarea>
                                            <label>Your current Address</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="gender">Select Gender</label>
                                                <select class="form-select" id="gender" name="gender">
                                                    <option value=''>Please Select Gender....</option>
                                                    <option value='Male'>Male</option>
                                                    <option value='Female'>Female</option>
                                                    <option value='Others'>Others</option>
                                                </select>
                                        </div>

                                        <div class="form-group">
                                                <label for="birthday">Date Of Birthday:</label>
                                                <input type="date" id="birthday" name="birthday" class="form-control" name="dob">
                                        </div>

                                        <div class="form-group">
                                            <label for="role">User role</label>
                                                <select class="form-select" id="role" name="userrole">
                                                    <option value='0' selected>Subscriber</option>
                                                    <option value='1'>Editor</option>
                                                    <option value='2'>Admin</option>  
                                                </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="biodata">Bio data</label>
                                            <textarea class="form-control" id="biodata" rows="6" name="biodata" placeholder="Bio data"></textarea>
                                            <label>Your bio data with in 100 words</label>
                                        </div>

                                        <div class="form-group">
                                                <label for="photo">User Image</label>
                                                <input class="form-control" type="file" id="photo" name="image">
                                                <p><small class="text-muted">Please use a square size photo(png,jpg,jpeg)</small></p>
                                        </div>

                                        <div class="col-sm-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-lg btn-primary me-2 mb-1" name="add_user">Submit</button>
                                            <button type="reset" class="btn btn-lg btn-light-secondary me-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>

                        <!-- user data add  -->
                            <?php
                                
                                if(isset($_POST['add_user'])){

                                    $username = $_POST['username'];
                                    $useremail = $_POST['useremail'];
                                    $password = $_POST['password'];
                                    $phone = $_POST['phone'];
                                    $Address = $_POST['address'];
                                    $gender = $_POST['gender'];
                                    $birthday = $_POST['birthday'];
                                    $userrole = $_POST['userrole'];
                                    $biodata = $_POST['biodata'];
                                    $file_name = $_FILES['image']['name'];
                                    $tmp_name = $_FILES['image']['tmp_name'];

                                    $extn_array = explode('.', $_FILES['image']['name']);
                                    $extn = strtolower(end($extn_array));
                                    $extensions = array('jpg','png','jpeg');

                                

                                    if(empty($username) || empty($useremail) || empty($password) || empty($file_name)){
                                        echo "<span class='alert alert-danger'>User name,Email and password are required!</span>";
                                    }else{

                                        if(in_array($extn, $extensions) === false){
                                            echo 'plz insert jpg, png or jpeg format file!';
                                        }else{

                                            $random = rand();
                                            $update_name = $random.$file_name;
                                            // image transfer to a folder

                                            move_uploaded_file($tmp_name, 'assets/images/users/'.$update_name);
                                            
                                            $hasspassword = sha1($password);

                                            $userAddQuery = "INSERT INTO users (u_name,u_photo,u_email,u_pass,u_phone,u_address,u_gender,	u_dob,u_biodata,u_role,u_status) VALUES ('$username','$update_name','$useremail','$hasspassword','$phone','$Address','$gender','$birthday','$biodata','$userrole','1')";
            
                                            $userAdd = mysqli_query($db,$userAddQuery);
                                            if($userAdd){
                                                header('Location:users.php');
                                            }else{
                                                die('Add user error!'.mysqli_error($db));
                                            }
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
                            $query = "SELECT * FROM users WHERE u_id = '$edit_id'";
                                      $view_result = mysqli_query($db,$query);
                                      $count = 0;
                                      while ($row = mysqli_fetch_assoc($view_result)) {
                                        $u_id = $row['u_id'];
                                        $u_name = $row['u_name'];
                                        $u_photo = $row['u_photo'];
                                        $u_email = $row['u_email'];
                                        $u_pass = $row['u_pass'];
                                        $u_phone = $row['u_phone'];
                                        $u_address = $row['u_address'];
                                        $u_gender = $row['u_gender'];
                                        $u_dob = $row['u_dob'];
                                        $u_biodata = $row['u_biodata'];
                                        $u_role = $row['u_role'];
                                        $u_status = $row['u_status'];
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
                        <h4 class="card-title">Edit the user information</h4>
                    </div>

                        <form action="users.php?do=update" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="username">User Name</label>
                                            <input type="text" id="username" class="form-control" placeholder="User Name" name="username" required="required" value="<?php echo $u_name;?>">
                                            <p><small class="text-muted">Insert your full name.</small></p>
                                        </div>

                                        <div class="form-group">
                                            <label for="useremail">User email</label>
                                            <input type="email" id="useremail" class="form-control" placeholder="example@something.com" name="useremail" required="required" value="<?php echo $u_email;?>">
                                            <p><small class="text-muted">Insert your email address.</small></p>
                                        </div>

                                        <div class="form-group">
                                            <label for="userpassword">User Password</label>
                                            <input type="password" id="userpassword" class="form-control" placeholder="password" name="password">
                                            <p><small class="text-muted">Minimum 8 characters</small></p>
                                        </div>
                                        <div class="form-group">
                                            <label for="Phone">Phone</label>
                                            <input type="number" id="Phone" class="form-control" placeholder="Phone number"  required="required"  name="phone" value="<?php echo $u_phone;?>">
                                            <p><small class="text-muted">Don't use country code.</small></p>
                                        </div>

                                        <div class="form-group">
                                            <label for="Address">Address</label>
                                            <textarea class="form-control" id="Address" name="address" rows="3" placeholder="Address" value="<?php echo $u_address;?>"><?php echo $u_address;?></textarea>
                                            <label>Your current Address</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="gender">Select Gender</label>
                                                <select class="form-select" id="gender" name="gender">
                                                    <option value=''>Please Select Gender....</option>
                                                    <option value='Male'<?php if($u_gender == 'Male') echo "selected";?>>Male</option>
                                                    <option value='Female'<?php if($u_gender == 'Female') echo "selected";?>>Female</option>
                                                    <option value='Others'<?php if($u_gender == 'Others') echo "selected";?>>Others</option>
                                                </select>
                                        </div>

                                        <div class="form-group">
                                                <label for="birthday">Date Of Birthday:</label>
                                                <input type="date" id="birthday" name="birthday" class="form-control" name="dob" value="<?php echo $u_dob;?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="role">User role</label>
                                                <select class="form-select" id="role" name="userrole">
                                                    <option value='0' <?php if($u_role == '0') echo "selected";?>>Subscriber</option>
                                                    <option value='1' <?php if($u_role == '1') echo "selected";?>>Editor</option>
                                                    <option value='2' <?php if($u_role == '2') echo "selected";?>>Admin</option>  
                                                </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="status">User status</label>
                                                <select class="form-select" id="status" name="userstatus">
                                                    <option value='0' <?php if($u_status == '0') echo "selected";?>>Inactive</option>
                                                    <option value='1' <?php if($u_status == '1') echo "selected";?>>Active</option> 
                                                </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="biodata">Bio data</label>
                                            <textarea class="form-control" id="biodata" rows="6" name="biodata" placeholder="Bio data" value="<?php echo $u_biodata;?>"><?php echo $u_biodata;?></textarea>
                                            <label>Your bio data with in 100 words</label>
                                        </div>

                                        <div class="form-group">
                                                <img src="assets/images/users/<?php echo $u_photo;?>" width="200" alt=""> <br><br><br>
                                                <label for="photo">User Image</label>
                                                <input class="form-control" type="file" id="photo" name="image">
                                                <p><small class="text-muted">Please use a square size photo(png,jpg,jpeg)</small></p>
                                        </div>

                                        

                                        <div class="col-sm-12 d-flex justify-content-end">
                                            <input type="hidden" class="form-control" name="edit_user_id" value="<?php echo $edit_id;?>">
                                            <!-- <input type="submit" name="editUser" value="upadte"> -->
                                            <button type="submit" class="btn btn-lg btn-primary me-2 mb-1" name="add_user">Submit</button>
                                            
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

                            $edit_id        = $_POST['edit_user_id'];
                            $username       = $_POST['username'];
                            $useremail      = $_POST['useremail'];
                            $password       = $_POST['password'];
                            $phone          = $_POST['phone'];
                            $address        = $_POST['address'];
                            $gender         = $_POST['gender'];
                            $dob            = $_POST['dob'];
                            $userrole       = $_POST['userrole'];
                            $userstatus     = $_POST['userstatus'];
                            $biodata        = mysqli_real_escape_string($db, $_POST['biodata']);
                            // $biodata        = mysql_real_escape_string($db, $_POST['biodata']);
                            $file_name      = $_FILES['image']['name'];
                            $file_tmp_name  = $_FILES['image']['tmp_name'];

                            // user updates both password and image 
                            if (!empty($password ) && !empty($file_name)) {
                                # code...
                                $hasspassword = sha1($password);

                                $extn_array = explode('.', $_FILES['image']['name']);
                                $extn = strtolower(end($extn_array));
                                $extensions = array('jpg','png','jpeg');

                                if(in_array($extn,$extensions) == true){

                                    $random = rand();
                                     $update_name = $random.$file_name;
                                    // image transfer to a folder

                                     move_uploaded_file($file_tmp_name, 'assets/images/users/'.$update_name);
                                    $u_updateQuery = "UPDATE users SET u_name='$username', u_photo='$update_name',u_email='$useremail', u_pass='$hasspassword', u_phone='$phone', u_address='$address', u_gender='$gender', u_dob='$dob',u_biodata='$biodata', u_role='$userrole', u_status='$userstatus' WHERE u_id='$edit_id'";
                                    $u_update_res = mysqli_query($db,$u_updateQuery);   
                                    if ($u_update_res) {
                                        # code...
                                        header('location:users.php');
                                    }else {
                                        
                                        die("user update error (1).".mysql_error($db));
                                    }
                                    

                                }else{
                                    echo '<span class="alert alert-danger">Please select an image(jpg,jpeg,png)</span>';
                                }

                            }
                            // user updates not the password only image 
                            else if (empty($password ) && !empty($file_name)) {
                                # code...
                                $extn_array = explode('.', $_FILES['image']['name']);
                                $extn = strtolower(end($extn_array));
                                $extensions = array('jpg','png','jpeg');

                                if(in_array($extn,$extensions) == true){

                                    $random = rand();
                                     $update_name = $random.$file_name;
                                    // image transfer to a folder

                                     move_uploaded_file($file_tmp_name, 'assets/images/users/'.$update_name);
                                    $u_updateQuery = "UPDATE users SET u_name='$username', u_photo='$update_name',u_email='$useremail', u_phone='$phone', u_address='$address', u_gender='$gender', u_dob='$dob',u_biodata='$biodata', u_role='$userrole', u_status='$userstatus' WHERE u_id='$edit_id'";
                                    $u_update_res = mysqli_query($db,$u_updateQuery);   
                                    if ($u_update_res) {
                                        # code...
                                        header('location:users.php');
                                    }else {
                                        
                                        die("user update error (2).".mysql_error($db));
                                    }
                                    

                                }else{
                                    echo '<span class="alert alert-danger">Please select an image(jpg,jpeg,png)</span>';
                                }

                            }
                            // user updates only password and not the image 
                            else if (!empty($password ) && empty($file_name)) {
                                # code...
                                $hasspassword = sha1($password);
                                    $u_updateQuery = "UPDATE users SET u_name='$username',u_email='$useremail', u_pass='$hasspassword', u_phone='$phone', u_address='$address', u_gender='$gender', u_dob='$dob',u_biodata='$biodata', u_role='$userrole', u_status='$userstatus' WHERE u_id='$edit_id'";
                                    $u_update_res = mysqli_query($db,$u_updateQuery);   
                                    if ($u_update_res) {
                                        # code...
                                        header('location:users.php');
                                    }else {
                                        
                                        die("user update error (3).".mysql_error($db));
                                    }
                            }       
                            // user updates nothing
                            else {
                                # code...
                                $u_updateQuery = "UPDATE users SET u_name='$username',u_email='$useremail', u_phone='$phone', u_address='$address', u_gender='$gender', u_dob='$dob',u_biodata='$biodata', u_role='$userrole', u_status='$userstatus' WHERE u_id='$edit_id'";
                                $u_update_res = mysqli_query($db,$u_updateQuery);   
                                if ($u_update_res) {
                                    # code...
                                    header('location:users.php');
                                }else {
                                    
                                    die("user update error (4).".mysql_error($db));
                                }
                            }
                            
                        }
                    }

                    if($do == 'delete'){
                            if(isset($_GET['d_id'])){
                            
                                $delete_id = $_GET['d_id'];

                                        $photoQuery = "SELECT u_photo FROM users WHERE u_id = '$delete_id'";
                                        $photoRes = mysqli_query($db,$photoQuery);
                                        while($row = mysqli_fetch_assoc($photoRes)){
                                            $photoName = $row['u_photo'];
                                        }

                                        unlink('assets/images/users/'.$photoName);

                                $deleteQuery = "DELETE FROM users WHERE u_id='$delete_id'";
                                $deleteRes = mysqli_query($db, $deleteQuery);
                                if($deleteRes){
                                    header('location: users.php');
                                }else{
                                    die("delete user error!".mysql_error($db));
                                }
                            }
                        }

         ?>

<?php
    include "inc/footer.php";
?>