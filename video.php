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
                    <li class="nav-item ">
                        <a class="nav-link" href="#">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Courses<span class="sr-only">(current)</span></a>
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
    <div class="container">
        <!-- info -->
        <div class="row justify-content-center">
            <div class="col-lg-10 info_panel">
                <h1 class="head_info_about">COURSES</h1>
            </div>
        </div>
        <!-- info habis -->
    </div>

    <div class="container align-content-center text-center">
        <video width="320" height="240" controls style="border: 1px solid black;">
            <source src="stock/video.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
    <style>
        .iframe-container {
            text-align: center;
            height: 500px;
        }
    </style>
    <?php 
        include "includes/footer.php";
    
    ?>

</body>

</html>