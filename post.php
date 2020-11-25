<?php 
    include 'includes/header.php';    
?>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">Naufal</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">About </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Blog<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Courses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="tombol btn btn-light" href="#">Login</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar Habis -->
    <?php 
            if(isset($_GET['p_id'])){
                $post_id = $_GET['p_id'];

            }
            $query = "SELECT * FROM posts WHERE post_id = $post_id";
            $select_all_posts_query = mysqli_query($connection,$query);
            while($row = mysqli_fetch_assoc($select_all_posts_query)):
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_content = $row['post_content'];
                ?>

<div class="jumbotron jumbotron-fluid vertical-center">
        <div class="container">
        </div>
    </div>
    <!-- Jumbrotoon habis -->
    <div class="container">
        <!-- judul -->
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
                    <div class="col-lg-8 col-md-10 mx-auto">
                        <p>
                            <?php echo $post_content?>

                        </p>
                    </div>
                </div>
            </div>
        </article>
        

        <?php 
            if (isset($_POST['create_comment'])) {
                $post_id = $_GET['p_id'];
                
                $comment_author = $_POST['comment_author'];
                $comment_email = $_POST['comment_email'];
                $comment_content = $_POST['comment_content'];

                $query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content,comment_status,comment_date) 
                            VALUES('$post_id','$comment_author','$comment_email','$comment_content','unapproved',now())";
                
                $insert_comment = mysqli_query($connection,$query);
                confirm($insert_comment);


                $query = "UPDATE posts SET post_comment_count = post_comment_count +1
                           WHERE post_id = $post_id ";

                $count_comment_query = mysqli_query($connection,$query);
                confirm($count_comment_query);
            }
        
        
        ?>





<!-- Default form grid -->
        <form action="" method="post">
        <!-- Grid row -->
        <div class="form-group shadow-textarea">
        <label for="exampleFormControlTextarea6"><h4>Leave a Comment</h4></label>
        <textarea name="comment_content" class="form-control z-depth-1" id="exampleFormControlTextarea6" rows="3" placeholder="Write something here..."></textarea>
        </div>
        <div class="row">
            <!-- Grid column -->
            <div class="col">
            <!-- Default input -->
            <input type="text" class="form-control" placeholder="Name" name="comment_author">
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col">
            <!-- Default input -->
            <input type="email" class="form-control" placeholder="Email" name="comment_email">
            </div>
            <!-- Grid column -->
        </div>
        <!-- Grid row -->
        <button class="btn btn-primary" type="submit" name="create_comment" style="margin-top:15px;">Post Comment</button>
        </form>
        <!-- Default form grid -->

        </form>
        <?php 
            $query = "SELECT * FROM comments WHERE comment_post_id =$post_id 
                       AND comment_status = 'approved' ORDER BY comment_id DESC ";
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
        ?>
            <div class="media">
                <a href="" class="pull-left">
                <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">
                    <?php echo $comment_author; ?>
                        <small><?php echo $comment_date; ?></small>
                    </h4>
                
                <?php echo $comment_content; ?>
                </div>
            </div>
            <?php endwhile; ?>
        
    </div>


            <?php endwhile;?>

    
    <!-- Jumbrotoon -->


    <?php 
        include "includes/footer.php";
    
    ?>
</body>

</html>