<table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Tags</th>
                                    <th>Comments</th>
                                    <th>Date</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>

                            </thead>
                            <tbody>

                                <?php 
                                    $query = "SELECT * FROM posts";
                                    $select_posts = mysqli_query($connection,$query);
                                    while($row = mysqli_fetch_assoc($select_posts)):

                                        $post_id = $row['post_id'];
                                        $post_author = $row['post_author'];
                                        $post_title = $row['post_title'];
                                        $post_category_id = $row['post_category_id'];
                                        $post_status = $row['post_status'];
                                        $post_image = $row['post_image'];
                                        $post_tags = $row['post_tags'];
                                        $post_comment_count = $row['post_comment_count'];
                                        $post_date = $row['post_date'];
                                ?>
                                <tr>
                                    <td><?php echo $post_id ?></td>
                                    <td><?php echo $post_author ?></td>
                                    <td><?php echo $post_title ?></td>

                                    <?php 
                                        $query = "SELECT * FROM categories WHERE cat_id = $post_category_id";
                                        $select_id_categories_query = mysqli_query($connection,$query);
                                        confirm($select_id_categories_query);
                                        
                                        while ($row = mysqli_fetch_assoc($select_id_categories_query)) :
                                            $cat_title = $row['cat_title'];
                                            $cat_id = $row['cat_id'];       ?>                      
                                            <td><?php echo $cat_title?></td>
                                        <?php endwhile; ?>

                                    <td><?php echo $post_status ?></td>
                                    <td><img src="../images/<?php echo $post_image?>" alt="image" class="img-responsive" width="100"></td>
                                    <td><?php echo $post_tags ?></td>
                                    <td><?php echo $post_comment_count ?></td>
                                    <td><?php echo $post_date ?></td>
                                    <td><a href="posts.php?source=edit_post&p_id=<?php echo $post_id ?>">Edit</a></td>
                                    <td><a href="posts.php?delete=<?php echo $post_id ?>">Delete</a></td>
                                </tr>
                                    <?php endwhile; ?>
                            </tbody>

                        </table>

                        <?php 
                        
                                        if (isset($_GET['delete'])) {
                                            $post_id_delete = $_GET['delete'];
                                            $query = "DELETE FROM posts WHERE post_id = $post_id_delete";
                                            $delete_query = mysqli_query($connection,$query);

                                            if (!$delete_query) {
                                                confirm($delete_query);
                                            }

                                        }
                        
                        ?>