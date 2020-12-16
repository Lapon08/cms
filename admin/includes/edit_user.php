<?php 
                if(isset($_GET['user_id'])){
                    $user_id = $_GET['user_id'];
                    if (empty($user_id)) {
                        header("Location: index.php");
                    }

                }
                // if($_GET['user_id'] == ""){
                //     header("Location: index.php");


                // }
                else {
                    header("Location: index.php");
                }
                $query = "SELECT * FROM users WHERE user_id = $user_id";
                $select_user_by_id = mysqli_query($connection,$query);
                while($row = mysqli_fetch_assoc($select_user_by_id)):

                    $user_username = $row['user_username'];
                    $user_firstname = $row['user_firstname'];
                    $user_lastname = $row['user_lastname'];
                    $user_email = $row['user_email'];
                    $user_role = $row['user_role'];
                    
                    $user_role = $row['user_role'];
                endwhile; ?>

        <?php 
            if (isset($_POST['edit_user'])) {
                if (!empty($_POST['user_username']) && !empty($_POST['user_firstname']) &&
                !empty($_POST['user_lastname'])  &&
                !empty($_POST['user_email']) && !empty($_POST['user_role']) ) 
                {

                $user_username = $_POST['user_username'];
                $user_firstname = $_POST['user_firstname'];
                $user_lastname = $_POST['user_lastname'];

                $user_email = $_POST['user_email'];
                // $post_date = date('d-m-y');
                $user_role = $_POST['user_role'];       
    

                    $user_username = mysqli_real_escape_string($connection,$user_username);
                    $user_firstname = mysqli_real_escape_string($connection,$user_firstname);
                    $user_lastname = mysqli_real_escape_string($connection,$user_lastname);

                    $user_email = mysqli_real_escape_string($connection,$user_email);
                    $user_role = mysqli_real_escape_string($connection,$user_role);




                $query = "UPDATE `users` SET 
                        `user_username`='$user_username',
                        
                        `user_firstname`='$user_firstname',
                        `user_lastname`='$user_lastname',
                        `user_email`='$user_email',
                        `user_role`='$user_role'
                        WHERE user_id = '$user_id'";
                $query_edit_user = mysqli_query($connection,$query);
                confirm($query_edit_user);
            ?>
                    <div class="alert alert-primary" role="alert" style="margin-left: 10px;">
                        User Updated: 
                        <a href="users.php" class="alert-link">View All Users</a>
                    </div>
                    <?php }
            else { ?>
                <div class="alert alert-danger" role="alert" style="margin-left: 10px;">
                This Form cannot empty
                </div>  
            <?php }
            
                }?>
        
        
        

<div class="col-12">
<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="author">Username</label>
        <input type="text" class="form-control" name="user_username" value="<?php echo $user_username?>">
    </div>

    <div class="form-group">
        <label for="post_status">Firstname</label>
        <input type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname?>">
    </div>


    <div class="form-group">
        <label for="post_tags">Lastname</label>
        <input type="text" class="form-control" name="user_lastname" value="<?php echo $user_lastname?>">
    </div>

    <div class="form-group">
        <label for="post_tags">Email</label>
        <input type="email" class="form-control" name="user_email" value="<?php echo $user_email?>">
    </div>

    <!-- <div class="form-group">
        <label for="post_tags">Password</label>
        <input type="password" class="form-control" name="user_password" value="<?php echo $user_password ?>">
    </div> -->

    <!-- <div class="form-group">
        <label for="image">Lastname</label>
        <input type="file" name="image">
    </div> -->


    <div class="form-group">
        <label for="post_category_id">User_role</label>
        <br>
        <select name="user_role" id="">
                    <option value="<?php echo $user_role ?>"><?php echo $user_role?> </option>
                <?php 
                    if ($user_role == "admin") { ?>
                        <option value="user">User</option>
                    <?php } elseif($user_role == "user") { ?>
                        <option value="admin">Admin</option>
                    <?php } ?>
            
                    
                    



                
        </select>
    </div>


    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="edit_user" value="Edit User">
    </div>
</form>
</div>