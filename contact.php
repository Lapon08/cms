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
                        <a class="nav-link " href="#">About</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="#">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Courses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Contact<span class="sr-only">(current)</span> </a>
                    </li>
                    <li class="nav-item">
                        <a class="tombol btn btn-light" href="#">Login</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar Habis -->
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
            <div class="col-lg-5 contact_informasi">
                <p>Are you a brand looking to collab on a project? Fill the form with your project details or you can
                    contact me on <br><br>
                    <ul class="list-inline" style="margin-top: -20px;">
                        <li class="list-inline-item">
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-linkedin fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-instagram fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
            </div>
            <div class="col-lg-5 contact_form">
                <form action="">
                    <div class="form-group">
                        <label for="contact_email">Email address</label>
                        <input type="email" class="form-control" id="contact_email" aria-describedby="emailHelp"
                            placeholder="Enter Email">
                        <label for="contact_subject">Email Subject</label>
                        <input type="text" class="form-control" id="contact_subject" aria-describedby="emailHelp"
                            placeholder="Enter Subject">
                        <label for="contact_body">Email Body</label>
                        <textarea class="form-control" id="contact_body" aria-describedby="emailHelp"
                            placeholder="Enter Message"> </textarea>
                        <button type="submit" class="btn btn-primary" style="margin-top: 20px;">Submit</button>
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