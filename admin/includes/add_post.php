<?php 
// fungsi menambahkan post
    if (isset($_POST['create_post'])) {
        if (!empty($_POST['title']) && !empty($_POST['post_author_id']) &&
        !empty($_POST['post_category_id']) && !empty($_POST['post_status']) &&
        !empty($_POST['post_content']) && !empty($_POST['post_tags']) ) 
        {

        $post_title = $_POST['title'];
        $post_author = $_POST['post_author_id'];
        $post_category_id = $_POST['post_category_id'];
        $post_status = $_POST['post_status'];
        
        $post_image = $_FILES['image'] ['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];

        $post_content = $_POST['post_content'];
        $post_date = date('d-m-y');
        $post_tags = $_POST['post_tags'];       
        // $post_comment_count =4;
        move_uploaded_file($post_image_temp,"../images/post/$post_image");

        $post_title = mysqli_real_escape_string($connection,$post_title);
        $post_author = mysqli_real_escape_string($connection,$post_author);
        $post_category_id = mysqli_real_escape_string($connection,$post_category_id);
        $post_status = mysqli_real_escape_string($connection,$post_status);
        $post_image = mysqli_real_escape_string($connection,$post_image);
        $post_image_temp = mysqli_real_escape_string($connection,$post_image_temp);
        $post_content = mysqli_real_escape_string($connection,$post_content);
        $post_date = mysqli_real_escape_string($connection,$post_date);
        $post_tags = mysqli_real_escape_string($connection,$post_tags);
            // tambah post
        $query = "INSERT INTO `posts`(`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_status`) 
                    VALUES ('','$post_category_id','$post_title','$post_author',now(),'$post_image','$post_content','$post_tags','$post_status')";
    
        $create_post = mysqli_query($connection,$query);
        confirm($create_post);
        $post_this = mysqli_insert_id($connection);
        ?>
        
        <div class="alert alert-primary" role="alert" style="margin-left: 10px;">
        Post Added: <a href="../post.php?p_id=<?php echo  $post_this ?>" target="blank" class="alert-link">View This Post</a> /
        <a href="posts.php"  class="alert-link">View All Post</a>
        </div>        
    <?php }
        else { ?>
            <div class="alert alert-danger" role="alert" style="margin-left: 10px;">
            This Form cannot empty
            </div>  
        <?php }
    } ?>

<!-- Menampilkan seluruh post yang ada -->
<div class="col-lg-12">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Post Title</label>
            <input type="text" class="form-control" name="title">
        </div>

        
        <div class="form-group">
            <label for="post_category_id">Post Category</label>
            <br>
            <select name="post_category_id" id="">
                    <?php 
                        $query = "SELECT * FROM categories";
                        $select_id_categories_query = mysqli_query($connection,$query);
                        confirm($select_id_categories_query);
                        
                        while ($row = mysqli_fetch_assoc($select_id_categories_query)) :
                            $cat_title = $row['cat_title'];
                            $cat_id = $row['cat_id'];       ?>                      
                        <option value="<?php echo $cat_id ?>"  > <?php echo $cat_title?> </option>
                        <?php endwhile; ?>
            </select>
        </div>

        <!-- <div class="form-group">
            <label for="author">Author</label>
            <input type="text" class="form-control" name="author">
        </div> -->
        <div class="form-group">
            <label for="post_author_id">Author</label>
            <br>
            <select name="post_author_id" id="">
                    <?php 
                        $query = "SELECT * FROM users WHERE user_role = 'admin'";
                        $select_id_user_query = mysqli_query($connection,$query);
                        confirm($select_id_user_query);
                        
                        while ($row = mysqli_fetch_assoc($select_id_user_query)) :
                            $user_id = $row['user_id'];
                            $user_username = $row['user_username'];       ?>                      
                        <option value="<?php echo $user_username ?>"  > <?php echo $user_username?> </option>
                        <?php endwhile; ?>
            </select>
        </div>


        
        <div class="form-group">
            <label for="post_status">Status</label>
            <select name="post_status" class="form-control" id="">
                <option value="draft">Draft</option>
                <option value="publish">Publish</option>
                    
            </select>
            
            
            </div>

        <div class="form-group">
            <label for="image">Post Image</label>
            <br>
            <input type="file" name="image" required>
        </div>

        <div class="form-group">
            <label for="post_tags">Post Tags</label>
            <input type="text" class="form-control" name="post_tags" required>
        </div>



        <div class="form-group">
            <label for="post_content">Post Content</label>
            <textarea class="ckeditor form-control" name="post_content" id="editor" cols="30" rows="10 required">
            </textarea>
        </div>

        <script>
                ClassicEditor
                        .create( document.querySelector( '#editor' ) )
                        .then( editor => {
                                console.log( editor );
                        } )
                        .catch( error => {
                                console.error( error );
                        } );
        </script>

        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
        </div>
    </form>
</div>