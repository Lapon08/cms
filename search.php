
<?php 
    include 'includes/header.php';    
?>
<body>
    <!-- Navbar -->
    <?php 
        include 'includes/navigation.php';
    ?>
    <!-- Navbar Habis -->

    <!-- Jumbrotoon -->
    <div class="jumbotron jumbotron-fluid vertical-center" style="background-image: url(images/header/header.jpg);" >
        <div class="container">

            <!-- cek apakah user sudah login atau belum -->
            <?php if (isset($_SESSION['user_username'])) { ?>
                <h1 class="head_blog"><span>Hi <?php echo $_SESSION['user_username']?></span>, Welcome To <br> My <span>Personal Blog</span> </h1>
            <?php }else { ?>
                <h1 class="head_blog"><span>Hi</span>, Welcome To <br> My <span>Personal Blog</span> </h1>
            <?php }?>
            <!-- Search form -->

            <!-- Search form -->
            <form class="form-inline d-flex justify-content-center md-form form-sm mt-0" action="search.php" method="get">
                <button class="btn btn-default" style="margin-left: -19px;" type="submit" name="submit"><i class="fas fa-search" aria-hidden="true"></i></button>
                <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search"
                    aria-label="Search" name="search">
            </form>
        </div>
    </div>
    <!-- Jumbrotoon habis -->

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
                // mengambil data kategori pada database
                $query = "SELECT * FROM categories";
                $select_all_categories_query = mysqli_query($connection,$query);
                while ($row = mysqli_fetch_assoc($select_all_categories_query)) :
                    $cat_title = $row['cat_title'];
                    $cat_id = $row['cat_id'];
                    ?>
                 <!-- menampilkan kategori -->
            <class class="col-2-lg">
                <a href="category.php?category=<?php echo $cat_id ?>" class="kategori">
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
    
    <!-- kategori tutup -->



    <!-- post -->
    <div class="row justify-content-center text-center">
        
            <?php 
            // menangkap search
            if (isset($_GET['submit'])) {
                
                $search = $_GET['search'];
                $search = mysqli_escape_string($connection,$search);
                $post_count = 9;
                // pagination
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                    $page = mysqli_escape_string($connection,$page);
                }else {
                    $page = "1";
                }
                if ($page =="" || $page ==1) {
                    $page_1 = 0;
                }else {
                    $page_1 = ($page * $post_count) - $post_count;
                }
                // menentukan jumlah post
                if (isset($_SESSION['user_username'])) {
                    if ($_SESSION['user_role'] == 'admin') {
                        $select_post_query_count = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' OR post_title  LIKE '%$search%' ORDER BY post_id DESC";
                    }
                    else{
                        $select_post_query_count = "SELECT * FROM posts WHERE (post_tags LIKE '%$search%' OR post_title  LIKE '%$search%') AND  post_status ='publish' ORDER BY post_id DESC";
                }
                }else {
                    $select_post_query_count = "SELECT * FROM posts WHERE (post_tags LIKE '%$search%' OR post_title  LIKE '%$search%') AND  post_status ='publish' ORDER BY post_id DESC";
                }

                $find_count= mysqli_query($connection,$select_post_query_count);
                $count = mysqli_num_rows($find_count);
                if ($count <= 0) { ?>
                    <div class="mt-5">
                        <h1>No Post For You</h1>
                    </div>
                <?php }


                $count = ceil($count / $post_count);
                if (isset($_SESSION['user_username'])) {
                    if ($_SESSION['user_role'] == 'admin') {
                        $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' OR post_title  LIKE '%$search%' ORDER BY post_id DESC LIMIT $page_1, $post_count";
                    }
                    else{
                        $query = "SELECT * FROM posts WHERE (post_tags LIKE '%$search%' OR post_title  LIKE '%$search%') AND  post_status ='publish' ORDER BY post_id DESC LIMIT $page_1, $post_count";
                }
                }else {
                    $query = "SELECT * FROM posts WHERE (post_tags LIKE '%$search%' OR post_title  LIKE '%$search%') AND  post_status ='publish' ORDER BY post_id DESC LIMIT $page_1, $post_count";
                }

                $search_query = mysqli_query($connection,$query);
                if(!$search_query){
                    die("Query Failed" . mysqli_error($connection));
                }
                else {
                    while($row = mysqli_fetch_assoc($search_query)):
                        $post_id = $row['post_id'];
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = $row['post_content']; 
                        $query = "SELECT * FROM comments WHERE comment_post_id = '$post_id' ";
                        $count_comment = mysqli_query($connection,$query);
                        $post_comment_count = mysqli_num_rows($count_comment);                    
                        // Menampilkan post
            ?><div class="col-4-lg">
                    <div class="card shadow" style="width: 20rem;">
                        <img class="card-img-top" src="images/post/<?php echo $post_image?>" alt="Image Not Found">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $post_title?></h5>
                            <p class="card-text"><?php echo "$post_date &nbsp $post_comment_count "?> Comments</p>
                            <a href="post.php?p_id=<?php echo $post_id ?>" class="btn btn-primary tombol_biasa">Read</a>
                        </div>
                    </div>
                </div>
                    <?php endwhile; ?>
                    <?php } ?>

                    <?php }else {
                        header('Location:index.php');
                    } ?>



    </div>
    <!-- post tutup -->
    <div class="row justify-content-center text-center">
        <nav>
            <ul class="pagination">
                <!-- pagination -->
                <?php for ($i=1; $i <= $count ; $i++) { 
                    if ($i == $page) { ?>
                    <li class="page-item active"><a class="page-link" href="search.php?page=<?php echo $i ?>&search=<?php echo $search ?>&submit="> <?php echo $i?> </a></li>
                    <?php } else { ?>
                    <li class="page-item"><a class="page-link" href="search.php?page=<?php echo $i ?>&search=<?php echo $search ?>&submit="> <?php echo $i?> </a></li>
                    <?php } ?>
                <?php } ?>

                </li>
            </ul>
        </nav>
    </div>
    </div>
    </div>

    <!-- main habis -->

    <?php 
        include "includes/footer.php";
    
    ?>

</body>

</html>