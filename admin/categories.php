<?php 

    include 'includes/admin_header.php';
?>

    <div id="wrapper">

        <?php 
            include 'includes/admin_navigation.php';
        ?>



        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin
                            <small>Author</small>
                        </h1>
                        <!-- Add category Form -->
                        <div class="col-xs-6">
                            <!-- Insert_categorie -->


                            <?php 
                                if (isset($_POST['submit'])) {
                                    $cat_title = $_POST['cat_title'];
    
                                        $query = "INSERT INTO categories(`cat_title`)
                                                    VALUE('$cat_title')";
                                        echo $cat_title;
                                        $create_category_query = mysqli_query($connection,$query);
                                        if (!$create_category_query) {
                                            die("Query failed" . mysqli_error($connection));
                                        }

                                    

                                }
                            
                            ?>





                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="cat_title">Add Category</label>
                                    <input type="text" class="form-control" name="cat_title" required>
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                                </div>
                            </form>



                                    <!-- Edit Category -->
                                    <?php 
                                        if (isset($_GET['edit'])) {
                                            $cat_id = $_GET['edit'];

                                            $query = "SELECT * FROM categories WHERE cat_id = '$cat_id'";
                                            $select_id_categories_query = mysqli_query($connection,$query);
                                            while ($row = mysqli_fetch_assoc($select_id_categories_query)) :
                                                $cat_title = $row['cat_title'];
                                                $cat_id = $row['cat_id'];       ?>  
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="cat_title">Edit Category</label>                                    
                                    <input type="text" class="form-control" name="cat_title" value="<?php echo $cat_title; ?>" required>
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="update_category" value="Edit Category">
                                </div>                                            
                                </form>                                        
                                        
                                            <?php endwhile; } ?>    


                             <?php 
                                    if (isset($_POST['update_category'])) {
                                        $the_cat_title = $_POST['cat_title'];
                                        $query = "UPDATE categories SET cat_title = '$the_cat_title' WHERE cat_id = $cat_id ";

                                        $update_category_query = mysqli_query($connection,$query);
                                        if (!$update_category_query) {
                                            die("Query Error" .mysqli_error($connection));
                                        }

                                    }
                             
                             
                             ?>       


                        </div>
                    </div>
                    <div class="col-xs-12">
                    <?php 
                
                        $query = "SELECT * FROM categories";
                        $select_all_categories_query = mysqli_query($connection,$query);
                                            
                    ?>
                    
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Title</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    while ($row = mysqli_fetch_assoc($select_all_categories_query)) :
                                    $cat_title = $row['cat_title'];
                                    $cat_id = $row['cat_id'];                                       
                                
                                ?>
                                <tr>
                                <td><?php echo $cat_id?></td>
                                <td><?php echo $cat_title?></td>
                                <td><a href="categories.php?delete=<?php echo "$cat_id"; ?>">Delete</a></td>
                                <td><a href="categories.php?edit=<?php echo "$cat_id"; ?>">Edit</a></td>
                                </tr>
                                <?php endwhile; ?>
                                            <!-- Delete Categorie -->
                                <?php 
                                    if (isset($_GET['delete'])) {
                                        $the_cat_id = $_GET['delete'];
                                        $query = "DELETE FROM categories WHERE cat_id = '$the_cat_id'";

                                        $delete_category_query = mysqli_query($connection,$query);
                                        header("Location: categories.php");
                                    }
                                ?>
                                
                            </tbody>

                        </table>



                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php 
    include 'includes/admin_footer.php';
?>