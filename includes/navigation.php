    <?php 
        $query = "SELECT * FROM logo WHERE logo_id = 1";
        $select_logo = mysqli_query($connection,$query);
        confirm($select_logo);
        while ($row = mysqli_fetch_assoc($select_logo) ) {
            $logo_image = $row['logo_image'];
        }
    ?>
    
    
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="index.php" style=" margin:0"><img src="images/logo/<?php echo $logo_image ?>" alt="" style="height: 80px; width:auto ;"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Blog</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#">Courses</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                    <?php 
                        if (isset($_SESSION['user_username'])) { ?>
                        <li class="nav-item dropdown">
                            <a class="tombol btn btn-light dropdown-toggle" id="navbarDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Akun</a>
                        
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="border: 0px;" >
                                <a class="dropdown-item" href="profile.php">Profile</a>
                                <div class="dropdown-divider"></div>
                                
                                <a class="dropdown-item" href="logout.php">Logout</a>
                            </div>
                            </li>
                    <?php }else { ?>
                        <li class="nav-item">
                            <a class="tombol btn btn-light" href="login.php">Login</a>
                        </li>
                    <?php } ?>


                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar Habis -->
