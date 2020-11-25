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

    <!-- course -->

    <section>
        <div class="container py-3 text-center text-md-left">
            <div class="card shadow">
                <div class="row">
                    <div class="col-md-5">
                        <img class="card-img-top-course" src="stock/header1.jpg" alt="Card image cap">
                    </div>
                    <div class=" col-md-7 px-3">
                        <div class="card-block px-3">
                            <h4 class="card-title course-title">Lorem ipsum dolor sit amet</h4>
                            <p class="card-text course-desc">Consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore
                                et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                laboris nisi ut aliquip ex ea commodo consequat. </p>
                            <a href="#" class="btn btn-primary tombol_biasa tombol_course"
                                style="margin-bottom: 12px;">Read</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="container py-3 text-center text-md-left">
            <div class="card shadow">
                <div class="row">
                    <div class="col-md-5">
                        <img class="card-img-top-course" src="stock/header1.jpg" alt="Card image cap">
                    </div>
                    <div class=" col-md-7 px-3">
                        <div class="card-block px-3">
                            <h4 class="card-title course-title">Lorem ipsum dolor sit amet</h4>
                            <p class="card-text course-desc">Consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore
                                et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                laboris nisi ut aliquip ex ea commodo consequat. </p>
                            <a href="#" class="btn btn-primary tombol_biasa tombol_course"
                                style="margin-bottom: 12px;">Read</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="container py-3 text-center text-md-left">
            <div class="card shadow">
                <div class="row">
                    <div class="col-md-5">
                        <img class="card-img-top-course" src="stock/header1.jpg" alt="Card image cap">
                    </div>
                    <div class=" col-md-7 px-3">
                        <div class="card-block px-3">
                            <h4 class="card-title course-title">Lorem ipsum dolor sit amet</h4>
                            <p class="card-text course-desc">Consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore
                                et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                laboris nisi ut aliquip ex ea commodo consequat. </p>
                            <a href="#" class="btn btn-primary tombol_biasa tombol_course"
                                style="margin-bottom: 12px;">Read</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- course habis -->

    <?php 
        include "includes/footer.php";
    
    ?>
</body>

</html>