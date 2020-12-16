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



            <!-- Menampilkan profile -->
            <div class="row justify-content-center mt-4">
<?php if (isset($_POST['change_password'])) {
        // function change password
        $current_password = $_POST['current_password'];
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];
        if (!empty($current_password) && !empty($new_password) && !empty($confirm_password)) {

        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
        }else {
            header("Location: login.php");
        }
        // password lebih dari 8
        if (strlen($new_password) > 8) {
            $query = "SELECT user_password FROM users WHERE `user_id` = '$user_id'";
            $select_user = mysqli_query($connection,$query);
            confirm($select_user);
        
            while($row = mysqli_fetch_assoc($select_user)){
                $user_password = $row['user_password'];
        
            }
            // apakah current password sama atau tidak
            $db_user_password = password_verify($current_password,$user_password);
            
            if ($new_password === $confirm_password) {
            
                if ($current_password == $db_user_password ) {
                    $new_password = password_hash($new_password,PASSWORD_DEFAULT);
                    $query = "UPDATE users SET user_password = '$new_password' WHERE `user_id` = '$user_id' ";
                    $change_password = mysqli_query($connection,$query);
                    confirm($change_password); ?>
                        <div class="alert alert-primary col-lg-6" role="alert" style="margin-left: 10px;">
                                Passwrod Changed
                        </div> 
        
                <?php }else { ?>
                        <div class="alert alert-danger col-lg-6" role="alert" style="margin-left: 10px;">
                                Your Current Password is Wrong
                        </div> 
                <?php }
        
            }else { ?>
                    <div class="alert alert-danger col-lg-6" role="alert" style="margin-left: 10px;">
                    Your Password Did Not Match
                    </div> 
            <?php }
        }else { ?>
                    <div class="alert alert-danger col-lg-6" role="alert" style="margin-left: 10px;">
                    Your Password Too Short
                    </div> 
        <?php }
        }else { ?>
            <div class="alert alert-danger col-lg-6 " role="alert" style="margin-left: 10px;">
            This Form can not empty!
            </div> 
        <?php }

    } ?>








            
            <div class="col-lg-7  contact_form">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="current_password">Current Password</label>
                        <input type="password" class="form-control" id="current_password" aria-describedby="emailHelp"
                            name="current_password" >
                        
                        <label for="new_password">New Password</label>
                        <input type="password" class="form-control" id="new_password" aria-describedby="emailHelp"
                            name="new_password">

                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" class="form-control" id="confirm_password" aria-describedby="emailHelp"
                            name="confirm_password">

                        <button type="submit" class="btn btn-primary" style="margin-top: 20px;" name="change_password">Change Password</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>

    <!-- footer -->
    <?php 
        include "includes/footer.php";
    
    ?>
</body>

</html>