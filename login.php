<?php 

    include 'includes/header.php';
    include 'includes/navigation.php';

?>


<div class="container">
<div class="row align-items-center justify-content-center" style="margin-top: 80px;">
<!-- Mengecek apakah user sebelumnya sudah login atau belum -->
<?php 
    if (isset($_SESSION['user_role'])) {
        $user_role = $_SESSION['user_role'];
        if ($user_role == 'admin') {
            header("Location: admin/index.php");
        }else {
            header("Location: index.php");
        }
    }


?>




<?php 

    if (isset($_POST['login'])) {

        $user_email = $_POST['email'];
        $user_password = $_POST['password'];
        // cek apakah form kosong atau tidak
        if (!empty($user_email) && !empty($user_password)) {
        
        $user_email = mysqli_real_escape_string($connection,$user_email);
        $user_password = mysqli_real_escape_string($connection,$user_password);
        // Mengecek apakah user dengan email tersebut ada atau tidak
        $query = "SELECT * FROM users WHERE user_email = '$user_email'";
        $select_user_query = mysqli_query($connection,$query);
        $count = mysqli_num_rows($select_user_query);
        confirm($select_user_query);
        // jika tidak ada
        if ($count < 1) { ?>
                    <div class="col-md-8 col-lg-7 text-center align-content-center mx-auto ">
                    <div class="alert alert-danger" role="alert">
                        Login Failed ! <strong> username/password</strong> Incorrect
                    </div>  
                    </div>
        <?php }else {
            // jika ada ambil semua data user
        while($row = mysqli_fetch_assoc($select_user_query)){
            $db_user_id = $row['user_id'];
            $db_user_firstname = $row['user_firstname'];
            $db_user_lastname = $row['user_lastname'];
            $db_user_username = $row['user_username'];
            $db_user_role = $row['user_role'];
            $db_user_email = $row['user_email'];
            $db_user_password = $row['user_password'];

        }
        // bandingkan password
        $db_user_password = password_verify($user_password,$db_user_password);
        if ($user_email != $db_user_email) { ?>
                    <div class="col-md-8 col-lg-7 text-center align-content-center mx-auto ">
                    <div class="alert alert-danger" role="alert">
                        Login Failed ! <strong> username/password</strong> Incorrect
                    </div>  
                    </div>
        <?php }
        // jika email dan password sudah sama atau tidak
        else if ($user_email == $db_user_email) {
            if ($user_password != $db_user_password) { ?>
                    <div class="col-md-8 col-lg-7 text-center align-content-center mx-auto ">
                    <div class="alert alert-danger" role="alert">
                        Login Failed ! <strong> username/password</strong> Incorrect
                    </div>  
                    </div>
            <?php }else {
            // session dimulai
            $_SESSION['user_username'] = $db_user_username;
            $_SESSION['user_email'] = $db_user_email;
            $_SESSION['user_firstname'] = $db_user_firstname;
            $_SESSION['user_lastname'] = $db_user_lastname;
            $_SESSION['user_role'] = $db_user_role;
            $_SESSION['user_id'] = $db_user_id;
                if ($db_user_role == "admin") {
                    header("Location: admin/index.php");
                }else {
                    header("Location: index.php");
                }
            
            }
        }
    }}
        else { ?>
                    <div class="col-md-8 col-lg-7 text-center align-content-center mx-auto ">
                    <div class="alert alert-danger" role="alert">
                        Login Failed ! <strong> username/password</strong> Incorrect
                    </div>  
                    </div>
        <?php }

    }

?>

        <div class="col-md-8 col-lg-6 ">
                    <!-- Default form login -->
            <form class="text-center border border-medium p-5" action="login.php" method="post">

            <p class="h4 mb-4">Welcome Back!</p>

            <!-- Email -->
            <input type="email" id="defaultLoginFormEmail" class="form-control mb-4 form-rounded" placeholder="E-mail" name="email">

            <!-- Password -->
            <input type="password" id="defaultLoginFormPassword" class="form-control form-rounded mb-4" placeholder="Password" name="password">

            <div class="d-flex justify-content-around">

                <div>
                    <!-- Forgot password -->
                   
                </div>
            </div>

            <!-- Sign in button -->
            <button class="tombol btn btn-info btn-block my-4 p-2" type="submit" name="login" style="border-radius: 1000px;">Login</button>

            <!-- Register -->
            <p>Not a member?
                <a href="register.php">Register</a>
            </p>

            </form>
            <!-- Default form login -->



        </div>
    </div>

</div>


<?php 

    include 'includes/footer.php';

?>

