<?php 
    include 'includes/header.php';    
?>
<!-- Mengambil data about pada database -->
<?php 

    $query = "SELECT * FROM about";
    $select_about = mysqli_query($connection,$query);
    confirm($select_about);
    while($row = mysqli_fetch_assoc($select_about)){
        $about_name = $row['about_name'];
        $about_introduction = $row['about_introduction'];
        $about_description = $row['about_description'];
        $about_photo = $row['about_photo'];

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
                <h1 class="head_info_about">ABOUT</h1>
            </div>
        </div>
        <!-- info habis -->
        <!-- Intorduction about -->
        <div class="row justify-content-center">
            <div class="col-lg-4 info_panel">
                <h1 class="head_info_nama" style="text-transform: uppercase;"><?php echo $about_name?></h1>
            </div>
            <div class="col-lg-4 info_panel">
                <p><?php echo $about_introduction?></p>
            </div>

        </div>
    <!-- Gambar about -->
    </div>
    <!-- Jumbrotoon -->
    <div class="jumbotron jumbotron-fluid vertical-center" style="margin-top: 40px; background-image: url('images/about/<?php echo $about_photo ?>');">

    </div>
    <!-- Jumbrotoon habis -->
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <p class="info_isi_about"><?php echo $about_description?></p>
                </div>
            </div>
        </div>
    </article>
    <!-- info -->
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10 info_panel_what">
            <h1 class="head_info_about">WHAT I DO?</h1>
        </div>
    </div>
    <!-- info habis -->
    <!-- What i Do -->

    <div class="row justify-content-center text-center">
        <!-- Mengambil aktivitas pada database -->
    <?php 
    $query = "SELECT * FROM activity";
    $select_about_photo = mysqli_query($connection,$query);
    confirm($select_about_photo);
    while($row = mysqli_fetch_assoc($select_about_photo)){
        $activity_photo = $row['activity_photo'];
        $activity_information = $row['activity_information'];
        $activity_id = $row['activity_id'];
        $activity_title = $row['activity_title']; ?>
 
        <div class="col-4-lg ">
            <div class="card shadow" style="width: 20rem; height: 520px ">
                <img src="images/about/activity/<?php echo $activity_photo?>" class="card-img-top-about"
                    alt="..." />
                <div class="card-body">
                    <h5 class="card-title"><?php echo $activity_title?></h5>
                    <p class="card-text">
                        <?php echo $activity_information?>
                    </p>
                </div>
            </div>
        </div>
    <?php }?>
    </div>
    </div>
    <!-- footer -->
    <?php 
        include "includes/footer.php";
    
    ?>
</body>

</html>