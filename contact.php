<?php 
    include 'includes/header.php';    
?>
<body>
    <!-- Navbar -->
    <?php 
        include 'includes/navigation.php';
    ?>
    <!-- Navbar Habis -->




    
<?php 
        // mengecek tombol submit
    if (isset($_POST['submit'])) {
        if(!empty($_POST['contact_email']) && !empty($_POST['contact_subject']) && 
        !empty($_POST['contact_content']) ){
        
        $contact_email = "From: ". $_POST['contact_email']; 
        $contact_subject = wordwrap($_POST['contact_subject'],70);
        $contact_content = $_POST['contact_content'];

        // mail('attacker08042001@gmail.com','Test Subjct','Hello There','From: attacker08042001@gmail.com')
    

    // send email
        mail('attacker08042001@gmail.com',$contact_subject,$contact_content,$contact_email);
        $message = "Email Has Been Sent";
        }else { 
                $message = "This Form Can't Empty";
            }
        } ?>


    <!-- main -->
    <div class="container">
        <!-- info -->
        <div class="row justify-content-center">
            <div class="col-lg-10 info_panel">
                <h1 class="head_info_about">CONTACT</h1>
            </div>
        </div>
        <!-- info habis -->
        <!-- kontak -->
        <div class="row justify-content-center contact">
                    <?php if(isset($message)){?>
                            <div class="col-md-8 col-lg-7 text-center align-content-center mx-auto ">
                                <div class="alert alert-dark" role="alert">
                                <?php echo $message?>
                                </div>  
                            </div>
                    <?php }?>
            <div class="col-lg-5 contact_informasi">
                <p>Are you a brand looking to collab on a project? Fill the form with your project details or you can
                    contact me on <br><br>
                    <ul class="list-inline" style="margin-top: -20px;">
                        <li class="list-inline-item">
                            <a href="https://www.linkedin.com/in/naufal-aprilian-marsa-mahendra-b374821a0/" target="blank">
                                <span class="fa-stack fa-lg">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-linkedin fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://www.instagram.com/naufalaprilian/" target="blank">
                                <span class="fa-stack fa-lg">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-instagram fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://github.com/Lapon08" target="blank">
                                <span class="fa-stack fa-lg">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
            </div>
            <div class="col-lg-5 contact_form">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="contact_email">Email address</label>
                        <!--  jika sudah login langsung terisi emailnya-->
                        <?php if (isset($_SESSION['user_username'])) {
                            $user_id = $_SESSION['user_id'];
                            $query = "SELECT user_email FROM users WHERE `user_id` = '$user_id' ";
                            $select_email = mysqli_query($connection,$query);
                            while($row = mysqli_fetch_assoc($select_email) ){
                                $user_email = $row['user_email'];
                            } ?>
                        <input type="email" class="form-control" id="contact_email" value="<?php echo $user_email ?>" name="contact_email" aria-describedby="emailHelp"
                            placeholder="Enter Email">

                        <?php }else { ?>
                            <input type="email" class="form-control" id="contact_email" name="contact_email" aria-describedby="emailHelp"
                            placeholder="Enter Email">
                        <?php }?>
                        
                        <label for="contact_subject">Email Subject</label>
                        <input type="text" class="form-control" id="contact_subject" name="contact_subject" aria-describedby="emailHelp"
                            placeholder="Enter Subject" autocomplete="off">
                        <label for="contact_body">Email Body</label>
                        <textarea class="form-control" id="contact_body" aria-describedby="emailHelp"
                            placeholder="Enter Message" name="contact_content"> </textarea>
                        <button type="submit" class="btn btn-primary" style="margin-top: 20px;" name="submit">Submit</button>
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