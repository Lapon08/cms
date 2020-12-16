<?php 

    include 'includes/header.php';

?>


<div class="container">
<div class="row align-items-center justify-content-center" style="margin-top: 80px; margin-bottom:180px">

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
    if (!isset($_GET['forgot'])) {
        header("Location: index.php");
    }
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
        $length = 50;
        $token = bin2hex(openssl_random_pseudo_bytes($length));
        $query = "SELECT * FROM users WHERE user_email = '$email'";
        $check_email = mysqli_query($connection,$query);
        $count = mysqli_num_rows($check_email);
        if ($count>0) {
            $stmt = mysqli_prepare($connection,"UPDATE users SET token = '$token' WHERE user_email = ?");
            mysqli_stmt_bind_param($stmt,"s",$email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            


        }else {
            echo "yuhuuu";
        }
    }   



?>


        <div class="col-md-8 col-lg-7 ">
                    <!-- Default form login -->
            <form class="text-center border border-medium p-5" action="" method="post">

            <p class="h4 mb-4">Forgot Password</p>

            <!-- Email -->
            <input type="email" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="E-mail" name="email">

            <!-- Sign in button -->
            <button class="btn btn-info btn-block my-4" type="submit" name="login">Send</button>

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

