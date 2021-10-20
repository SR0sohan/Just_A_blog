<?php
    include "inc/header.php";
?>
            
<div class="page-heading">
    <h3>Profile Statistics</h3>
</div>
<div class="page-content">

    <?php

            /* if(isset($_GET['do'])){
                $do = $_GET['do'];
            }else{
                $do = 'manage';
            } */
        $do = isset($_GET['do']) ? $_GET['do'] : 'manage';
        
        if($do == 'manage'){
            // manage 
        }

        if($do == 'add'){
            // add 
        }

        if($do == 'edit'){
            // edit 
        }

        if($do == 'update'){
            // update 
        }

        if($do == 'delete'){
            // delete 
        }

      /* $do ='manage';  view all users
      $do ='add';       add new  users
      $do ='edit';  edit users
      $do ='update';  update users
      $do ='delete';  delete users */
      
    //   default 
      $do = 'manage';
    
    ?>

    <section class="row">
        <div class="col-12 col-lg-12">

        </div>
    </section>

</div>
<?php
    include "inc/footer.php";
?>
<!-- die("MySQLi Query Failed." . mysqli_error($db)) -->

<?php
         if(isset($_GET['delete_id'])){
             $delete_id = $_GET['delete_id'];

             $query3 = "DELETE FROM category WHERE c_id='$delete_id'";
             $result3 = mysqli_query($db, $query3);
             if($result3){
                 header('Location: category.php');
              
             }else{
                 echo "not done";
             }
         }
        ?>