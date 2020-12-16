<?php 
    include 'includes/header.php';

    if (isset($_SESSION['user_username'])) {
        $user_id = $_SESSION['user_id'];
    }else {
        header("Location: index.php");
    }
    
?>


<body>
    <!-- Navbar -->
    <?php 
        include 'includes/navigation.php';
    ?>
    <!-- Navbar Habis -->

    
    <!-- main -->
    <div class="container">
        <!-- info -->
        <div class="row justify-content-center">
            <div class="col-lg-10 info_panel">
                <h1 class="head_info_about">PROFILE</h1>
            </div>
        </div>
        <!-- info habis -->
        <?php 
        // mengambil data profile user
            $query = "SELECT * FROM users WHERE `user_id` = $user_id ";
            $select_user = mysqli_query($connection,$query);
            confirm($select_user);
            while($row = mysqli_fetch_assoc($select_user)){
                $user_id = $row['user_id'];
                $user_username = $row['user_username'];
                $user_firstname = $row['user_firstname'];
                $user_lastname = $row['user_lastname'];
                $user_email = $row['user_email'];
                $user_image = $row['user_image'];
            }
        
        ?>
        <!-- kontak -->
        <div class="row justify-content-center contact ">
        <?php 
        // fungsi edit profile
    if (isset($_POST['edit_profile'])) {    
        if (!empty($_POST['user_username']) && !empty($_POST['user_firstname']) &&
        !empty($_POST['user_lastname']) && !empty($_POST['user_email']) ) {

        $user_username = $_POST['user_username'];
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_email = $_POST['user_email'];
        $user_image_new = $_FILES['image']['name'];
        $user_image_temp = $_FILES['image']['tmp_name'];
        
        // Cek username 

        if ( empty($user_image_new) ) {
            $user_image_new = $user_image;
        }

        $user_firstname = mysqli_real_escape_string($connection,$user_firstname);
        $user_lastname = mysqli_real_escape_string($connection,$user_lastname);
        $user_username = mysqli_real_escape_string($connection,$user_username);
        $user_email = mysqli_real_escape_string($connection,$user_email);
        $user_image_new = mysqli_real_escape_string($connection,$user_image_new);
        
        move_uploaded_file($user_image_temp,"images/profile/$user_image_new");
        $query = "UPDATE users SET user_username = '$user_username', 
                        user_firstname = '$user_firstname',
                        user_lastname = '$user_lastname', 
                        user_email = '$user_email', 
                        user_image = '$user_image_new' 
                        WHERE `user_id` = $user_id";
        $user_profile_update = mysqli_query($connection,$query);
        confirm($user_profile_update); ?>
        <div class="col-10">
            <div class="alert alert-primary" role="alert" style="margin-left: 10px;">
            Profile Updated
        </div>
        </div>

        <?php 
        }else {?>
        <div class="col-10">
            <div class="alert alert-danger" role="alert" style="margin-left: 10px;">
            This Form cannot empty 
            </div> 
        </div>
        <?php }
}

?>

    <?php 
        if (isset($_POST['change_password'])) {
           header("Location: change_password.php");
        }
    
    
    
    
    
    ?>



            <!-- Menampilkan profile -->
            <div class="col-lg-5 contact_informasi text-center align-middle item-profile">
                <img class="media-object" src="images/profile/<?php echo $user_image ?>" alt="">
            </div>
            <div class="col-lg-5 contact_form">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="user_email">Email address</label>
                        <input type="email" class="form-control" id="user_email" aria-describedby="emailHelp"
                            name="user_email" value="<?php echo $user_email ?>">
                        
                        <label for="user_username">Username</label>
                        <input type="text" class="form-control" id="user_username" aria-describedby="emailHelp"
                            name="user_username" value="<?php echo $user_username ?>">

                        <label for="user_firstname">Firstname</label>
                        <input type="text" class="form-control" id="user_firstname" aria-describedby="emailHelp"
                            name="user_firstname" value="<?php echo $user_firstname ?>">

                        <label for="user_lastname">Lastname</label>
                        <input type="text" class="form-control" id="user_lastname" aria-describedby="emailHelp"
                            name="user_lastname" value="<?php echo $user_lastname ?>">
                        
                        <label for="user_image">Image</label>
                        <br>
                        <input type="file" name="image">
                        <br>
                        <button type="submit" class="btn btn-primary" style="margin-top: 20px;" name="edit_profile">Edit Profile</button>
                        <button type="submit" class="btn btn-primary" style="margin-top: 20px;" name="change_password">Change Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- footer -->
    <?php 
        include "includes/footer.php";
    
    ?>
</body>

</html>