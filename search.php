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
    <!-- Jumbrotoon -->
    <div class="jumbotron jumbotron-fluid vertical-center">
        <div class="container">
            <h1 class="head_blog"><span>Hi</span>, Welcome To <br> My <span>Personal Blog</span> </h1>
            <!-- Search form -->
            <?php 
            
            if (isset($_POST['submit'])) {
                $search = $_POST['search'];
                $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%'";
                $search_query = mysqli_query($connection,$query);
                if(!$search_query){
                    die("Query Failed" . mysqli_error($connection));
                }
                else {
                    echo "berhasil";
                }

            }
           


            ?>



            <form class="form-inline d-flex justify-content-center md-form form-sm mt-0" action="" method="post">
                <button class="btn btn-default" style="margin-left: -19px;" type="submit" name="submit"><i class="fas fa-search" aria-hidden="true"></i></button>
                <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search"
                    aria-label="Search" name="search">

                    <!-- <button class="btn btn-primary" type="submit">Button</button> -->
            </form>


            <!-- <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p> -->
        </div>
    </div>
    <!-- Jumbrotoon habis -->
    <!-- Search form -->
    <!-- <form class="form-inline d-flex justify-content-center md-form form-sm mt-0">
        <i class="fas fa-search" aria-hidden="true"></i>
        <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search" aria-label="Search">
    </form> -->
    <!-- main -->
    <div class="container">
        <!-- info -->
        <div class="row justify-content-center">
            <div class="col-lg-10 info_panel">
                <h1 class="head_info">BLOG</h1>
            </div>
        </div>
        <!-- info habis -->

        <!-- kategori -->
        <div class="row justify-content-center text-center">
            <?php 
                
                $query = "SELECT * FROM categories";
                $select_all_categories_query = mysqli_query($connection,$query);
                while ($row = mysqli_fetch_assoc($select_all_categories_query)) :
                    $cat_title = $row['cat_title'];?>
            
            <class class="col-2-lg">
                <a href="#!" class="kategori">
                    <div class=" card bg-dark text-white card_kategori ">
                        <div class="card-body yuhu">
                            <?php echo "$cat_title"; ?>
                            <!-- MAX 13 -->
                        </div>
                    </div>
                </a>
            </class>
            <?php endwhile;?>

        </div>


    </div>


    <!-- kategori tutup -->
    <!-- post -->
    <div class="row justify-content-center text-center">
        <div class="col-4-lg">
            <?php 
            
            
            if (isset($_POST['submit'])) {
                $search = $_POST['search'];
                $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%'";
                $search_query = mysqli_query($connection,$query);
                if(!$search_query){
                    die("Query Failed" . mysqli_error($connection));
                }
                else {
                    while($row = mysqli_fetch_assoc($search_query)):
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = $row['post_content'];                     
                        $post_comment_count = $row['post_comment_count'];
            ?>
                    <div class="card shadow" style="width: 20rem;">
                        <img class="card-img-top" src="images/<?php echo $post_image?>" alt="Image Not Found">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $post_title?></h5>
                            <p class="card-text"><?php echo "$post_date &nbsp $post_comment_count "?> Comments</p>
                            <a href="#" class="btn btn-primary tombol_biasa">Read</a>
                        </div>
                    </div>
                </div>
                    <?php endwhile; ?>
                    <?php } ?>

                    <?php } ?>
                    


    </div>

    <!-- post tutup -->
    <div class="row justify-content-center text-center">
        <nav>
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
                <li class="page-item active"><a class="page-link">1</a></li>
                <li class="page-item"><a class="page-link">2</a></li>
                <li class="page-item"><a class="page-link">3</a></li>
                <li class="page-item"><a class="page-link">4</a></li>
                <li class="page-item"><a class="page-link">5</a></li>
                <li class="page-item">
                    <a class="page-link" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    </div>

    <!-- main habis -->

    <?php 
        include "includes/footer.php";
    
    ?>

</body>

</html>