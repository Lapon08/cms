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
            if(isset($_GET['p_id'])){
                $post_id = $_GET['p_id'];
                
            if ($post_id === "") {
                header("Location: index.php");
            }else {
                $post_id = mysqli_escape_string($connection,$post_id);
            // mengambil data post berdasarkan id pada database
            $query = "SELECT * FROM posts WHERE post_id = $post_id";
            $select_all_posts_query = mysqli_query($connection,$query);
            while($row = mysqli_fetch_assoc($select_all_posts_query)):
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_content = $row['post_content'];
                ?>
                <!-- thumbnail post -->
<div class="jumbotron jumbotron-fluid vertical-center" style="background-image: url(images/post/<?php echo $post_image?>);">
        <div class="container">
        </div>
    </div>
    <!-- Jumbrotoon habis -->
    <div class="container">
        <!-- judul dan keterangan post -->

        <div class="row justify-content-center text-center">
            <div class="col-lg-10 info_panel">
                <h1 class="head_info"><?php echo $post_title ?> </h1>
                <span class="keterangan">Posted by <?php echo $post_author?> on <?php echo $post_date?></span>
            </div>
        </div>
        <!-- judul habis -->

        <!-- Post Content -->
        <article>
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-md-10 mx-auto">

                            <?php echo $post_content?>

                    </div>
                </div>
            </div>
        </article>
        

        <?php 
        // fungsi membuat sebuah comment
            if (isset($_POST['create_comment'])) {
                $post_id = $_GET['p_id'];  
                $comment_author = $_POST['comment_author'];
                $comment_email = $_POST['comment_email'];
                $comment_content = $_POST['comment_content'];
                if (!empty($comment_author) && !empty($comment_email) && !empty($comment_content) ) {
                    $comment_author = mysqli_escape_string($connection,$comment_author);
                    $comment_email = mysqli_escape_string($connection,$comment_email);
                    $comment_content = mysqli_escape_string($connection,$comment_content);
                    
                    $query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content,comment_status,comment_date) 
                    VALUES('$post_id','$comment_author','$comment_email','$comment_content','unapproved',now())";
        
                    $insert_comment = mysqli_query($connection,$query);
                    confirm($insert_comment); ?>
                    <div class="col-10 text-center align-content-center mx-auto ">
                    <div class="alert alert-primary" role="alert">
                        The comment has been sent, awaiting approval from the admin
                    </div>  
                    </div>

                <?php }else { ?>
                    <div class="col-10 text-center align-content-center mx-auto ">
                    <div class="alert alert-danger" role="alert">
                        This Form cannot empty
                    </div>  
                    </div>
                <?php }
            }
        
        
        ?>
                <!-- Comment section -->
        <!-- Default form grid -->
        <div class="col-lg-10 col-md-10 mx-auto">
            <!-- form create comment -->
                <form action="" method="post">
                <!-- Grid row -->
                <div class="form-group shadow-textarea">
                <label for="exampleFormControlTextarea6"><h4>Leave a Comment</h4></label>

                <textarea name="comment_content" class="form-control z-depth-1" id="exampleFormControlTextarea6" rows="3" placeholder="Write something here..." ></textarea>
                </div>
                <?php if (isset($_SESSION['user_username'])) {
                        $user = $_SESSION['user_id'];
                        $query = "SELECT user_firstname, user_lastname, user_email FROM users WHERE `user_id` = '$user'";
                        $select_user = mysqli_query($connection,$query);
                        confirm($select_user);
                        while ($row = mysqli_fetch_assoc($select_user) ) {
                            $user_firstname = $row['user_firstname'];
                            $user_lastname = $row['user_lastname'];
                            $user_email = $row['user_email']; 
                        } ?>
                    <div class="row">
                        <!-- Grid column -->
                        <div class="col">
                        <!-- Default input -->
                        <input type="text" class="form-control" placeholder="Name" name="comment_author"  value="<?php echo $user_firstname ." " . $user_lastname ?>">
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col">
                        <!-- Default input -->
                        <input type="email" class="form-control" placeholder="Email" name="comment_email"  value="<?php echo $user_email ?>">
                        </div>
                        <!-- Grid column -->
                    </div>

                    <?php }else { ?>

                    
                <div class="row">
                    <!-- Grid column -->
                    <div class="col">
                    <!-- Default input -->
                    <input type="text" class="form-control" placeholder="Name" name="comment_author"  >
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col">
                    <!-- Default input -->
                    <input type="email" class="form-control" placeholder="Email" name="comment_email" >
                    </div>
                    <!-- Grid column -->
                </div>
                <?php } ?>
                <!-- Grid row -->
                <button class="btn btn-primary" type="submit" name="create_comment" style="margin-top:15px;">Post Comment</button>
                </form>
                <!-- Form penutup comment section -->


                <?php 
                // Mengambil data comment pada databse sesuai post id
                    $query = "SELECT  comments.*, users.user_image FROM comments LEFT JOIN users ON users.user_email = comments.comment_email  
                                WHERE comment_post_id ='$post_id' AND comment_status = 'approved' ORDER BY comments.comment_id DESC";
                    $select_comment = mysqli_query($connection,$query);
                    confirm($select_comment);

                    while($row = mysqli_fetch_assoc($select_comment)):
                        $comment_id = $row['comment_id'];
                        $comment_author = $row['comment_author'];
                        $comment_post_id = $row['comment_post_id'];
                        $comment_email = $row['comment_email'];
                        $comment_status = $row['comment_status'];
                        $comment_content = $row['comment_content'];
                        $comment_date = $row['comment_date'];
                        $user_image = $row['user_image'];
                ?>
                    <div class="media">
                        <div class="pull-left item_comment">
                            <div class="item">
                            <?php 
                                if (isset($user_image)) { ?>
                                    <img class="media-object" src="images/profile/<?php echo $user_image ?>" alt="" style="margin-top:20px; margin-right:20px; ">
                                <?php }else { ?>
                                    <img  class="media-object" src="images/profile/default.png" alt="" style="margin-top:20px; margin-right:20px">
                                <?php }
                            ?>
                            </div>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading" style="margin-top: 20px;">
                            <?php echo $comment_author; ?>
                                <small><?php echo $comment_date; ?></small>
                            </h4>
                        
                        <?php echo $comment_content; ?>
                        
                        </div>
                        
                    </div>
                    <hr>
                    <?php endwhile; ?>
        
        </div>

        <?php endwhile; }}?>
            
    </div>
    
    <!-- Jumbrotoon -->


    <?php 
        include "includes/footer.php";
    
    ?>
</body>

</html>