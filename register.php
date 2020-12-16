<?php 

    include 'includes/header.php';
    include 'includes/navigation.php';
?>

<?php 
// cek apa sudah login atau belum
    if (isset($_SESSION['user_role'])) {
        $user_role = $_SESSION['user_role'];
        if ($user_role == 'admin') {
            header("Location: admin/index.php");
        }else {
            header("Location: index.php");
        }
    }


?>


<div class="container">
<div class="row align-items-center justify-content-center" style="margin-top: 80px;">
<?php 
    // fungsi register
    if (isset($_POST['register'])) {
        $user_username = $_POST['user_username'];
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        $user_password_repeat = $_POST['user_password_repeat'];

        $user_username = mysqli_real_escape_string($connection,$user_username);
        $user_firstname = mysqli_real_escape_string($connection,$user_firstname);
        $user_lastname = mysqli_real_escape_string($connection,$user_lastname);
        $user_email = mysqli_real_escape_string($connection,$user_email);
        $user_password= mysqli_real_escape_string($connection,$user_password);
        $user_password_repeat= mysqli_real_escape_string($connection,$user_password_repeat);
        
        // mengecek apakah usernam dan email sudah terpakai atau belum
        $query = "SELECT user_username FROM users WHERE user_username = '$user_username'";
        $check_username = mysqli_query($connection,$query);
        confirm($check_username);

        $query = "SELECT user_email FROM users WHERE user_email = '$user_email'";
        $check_email = mysqli_query($connection,$query);
        confirm($check_email);
        //mengecek username dan email sudah digunakan atau belum
        if (!mysqli_num_rows($check_username)> 0 && !mysqli_num_rows($check_email)> 0) {
            //cek jumlah karakter password
            if(!empty($user_username) && !empty($user_firstname) && !empty($user_lastname) && !empty($user_email) &&
            !empty($user_password_repeat) && !empty($user_password)) {
                if (strlen($user_password) > 8) {
                if ($user_password_repeat !==$user_password) {
                    $message = "Passwords are not the same";
                }else {
                    $user_password =password_hash($user_password,PASSWORD_DEFAULT);
                    // menambahkan user ke database
                    $query = " INSERT INTO `users`(`user_id`, `user_username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`)
                                VALUES ('','$user_username','$user_password','$user_firstname','$user_lastname','$user_email')";
                    $register_query = mysqli_query($connection,$query);
                    confirm($register_query); ?>
                            <div class="col-md-8 col-lg-7 text-center align-content-center mx-auto ">
                                <div class="alert alert-success" role="alert">
                                User Resgitration Successful!
                                </div>  
                            </div>
                    <?php }}
                else {
                    $message = "Password must be more than 8 characters long";
                }
            }else {
                $message = "Fields cannot be empty!";
            }
            

        }else {
            $message = "Username / Email is already in use ";
        }



        }?>

        <!-- Menampilkan Pesan  -->
        <?php if(isset($message)){?>
            <div class="col-md-8 col-lg-7 text-center align-content-center mx-auto ">
                <div class="alert alert-danger" role="alert">
                <?php echo $message?>
                </div>  
            </div>
        <?php }?>
        <div class="col-md-8 col-lg-7 ">
                    <!-- Default form login -->
            <form class="text-center border border-medium p-5" action="" method="post">

            <p class="h4 mb-4">Register</p>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-rounded form-control-user" id="exampleFirstName"
                            placeholder="First Name" name="user_firstname">
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-rounded form-control-user" id="exampleLastName"
                            placeholder="Last Name" name="user_lastname">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="email" class="form-control form-rounded form-control-user" id="exampleInputEmail"
                        placeholder="Email Address" name="user_email">
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-rounded form-control-user" id="exampleLastName"
                            placeholder="Username" name="user_username">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="password" class="form-control form-rounded form-control-user"
                            id="exampleInputPassword" placeholder="Password" name="user_password">
                    </div>
                    <div class="col-sm-6">
                        <input type="password" class="form-control form-rounded form-control-user"
                            id="exampleRepeatPassword" placeholder="Repeat Password" name="user_password_repeat">
                    </div>
                </div>

            <!-- Sign in button -->
            <button class="tombol btn btn-info btn-block my-4 p-2" type="submit" name="register" style="border-radius: 1000px;">Register</button>

            <!-- Register -->
            <p>Have Account?
                <a href="login.php">Login!</a>
            </p>

            </form>
            <!-- Default form login -->



        </div>
    </div>

</div>


<?php 

    include 'includes/footer.php';

?>

