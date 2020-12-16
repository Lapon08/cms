<?php 
    if (isset($_POST['create_user'])) {
        // Menambahkan user, cek dulu form tidak boleh kosong
        if (!empty($_POST['user_username']) && !empty($_POST['user_firstname']) &&
        !empty($_POST['user_lastname']) && !empty($_POST['user_password']) &&
        !empty($_POST['user_email']) && !empty($_POST['user_role']) ) 
        {
        $user_username = $_POST['user_username'];
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_password = $_POST['user_password'];
        
        // $user_image = $_FILES['image'] ['name'];
        // $user_image_temp = $_FILES['image']['tmp_name'];

        $user_email = $_POST['user_email'];
        // $post_date = date('d-m-y');
        $user_role = $_POST['user_role'];       
        // $post_comment_count =4;

        if (strlen($user_password) >= 8 ) {
            
        
        $user_password = password_hash($user_password,PASSWORD_DEFAULT);

        // move_uploaded_file($post_image_temp,"../images/$post_image");
        $user_username = mysqli_real_escape_string($connection,$user_username);
        $user_firstname = mysqli_real_escape_string($connection,$user_firstname);
        $user_lastname = mysqli_real_escape_string($connection,$user_lastname);
        $user_password = mysqli_real_escape_string($connection,$user_password);
        $user_email = mysqli_real_escape_string($connection,$user_email);
        $user_role = mysqli_real_escape_string($connection,$user_role);


        // tambah user ke database
        $query = "INSERT INTO `users`(`user_id`, `user_username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_role`) 
                    VALUES ('','$user_username','$user_password','$user_firstname','$user_lastname','$user_email','$user_role')";
    
        $create_post = mysqli_query($connection,$query);
        confirm($create_post);
        ?>
        <div class="alert alert-primary" role="alert" style="margin-left: 10px;">
        User Added: 
        <a href="users.php" class="alert-link">View All Users</a>
    </div>
    <?php }else { ?>
        <div class="alert alert-danger" role="alert" style="margin-left: 10px;">
        password must be more than 8
        </div>  
    <?php }
            }
            else { ?>
                <div class="alert alert-danger" role="alert" style="margin-left: 10px;">
                This Form cannot empty
                </div>  
            <?php }
     }?>


<div class="col-lg-12">
<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="author">Username</label>
        <input type="text" class="form-control" name="user_username">
    </div>

    <div class="form-group">
        <label for="post_status">Firstname</label>
        <input type="text" class="form-control" name="user_firstname">
    </div>


    <div class="form-group">
        <label for="post_tags">Lastname</label>
        <input type="text" class="form-control" name="user_lastname">
    </div>

    <div class="form-group">
        <label for="post_tags">Email</label>
        <input type="email" class="form-control" name="user_email">
    </div>

    <div class="form-group">
        <label for="post_tags">Password</label>
        <input type="password" class="form-control" name="user_password">
    </div>

    <!-- <div class="form-group">
        <label for="image">Lastname</label>
        <input type="file" name="image">
    </div> -->


    <div class="form-group">
        <label for="post_category_id">User_role</label>
        <br>
        <select name="user_role" id="">
            <option value="admin">Admin</option>
            <option value="user">User</option>
        </select>
    </div>


    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_user" value="Create User">
    </div>
</form>
</div>