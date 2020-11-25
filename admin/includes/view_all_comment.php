<table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Comment</th>
                                    <th>Email</th>
                                    <th>In Respone to</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Approve</th>
                                    <th>Unapprove</th>
                                    <th>Delete</th>
                                </tr>

                            </thead>
                            <tbody>

                                <?php 
                                    $query = "SELECT * FROM comments";
                                    $select_comment = mysqli_query($connection,$query);
                                    while($row = mysqli_fetch_assoc($select_comment)):

                                        $comment_id = $row['comment_id'];
                                        $comment_author = $row['comment_author'];
                                        $comment_post_id = $row['comment_post_id'];
                                        $comment_email = $row['comment_email'];
                                        $comment_status = $row['comment_status'];
                                        $comment_content = $row['comment_content'];
                                        $comment_date = $row['comment_date'];
                                ?>
                                <tr>
                                    <td><?php echo $comment_id ?></td>
                                    <td><?php echo $comment_author ?></td>
                                    <td><?php echo $comment_content ?></td>
                                    <td><?php echo $comment_email ?></td>

                                <?php 
                                    $query = "SELECT * FROM posts WHERE post_id = $comment_post_id ";
                                    $select_id_post_query = mysqli_query($connection,$query);
                                    confirm($select_id_post_query);
                            
                                        while ($row = mysqli_fetch_assoc($select_id_post_query)) :
                                         $post_title = $row['post_title'];
                                            $post_id = $row['post_id'];       ?>                      
                                            <td><a href="../post.php?p_id=<?php echo $post_id ?>"><?php echo $post_title?></a></td>
                                    <?php   endwhile; ?>

                                    
                                    
                                    <td><?php echo $comment_status ?></td>
                                    <td><?php echo $comment_date ?></td>
                                    <td><a href="comments.php?approve=<?php echo $comment_id ?>">Approve</a></td>
                                    <td><a href="comments.php?unapprove=<?php echo $comment_id ?>">Unapprove</a></td>
                                    <td><a href="comments.php?delete=<?php echo $comment_id ?>">Delete</a></td>
                                </tr>
                                    <?php endwhile; ?>
                            </tbody>

                        </table>

                        <?php 
                        
                            if (isset($_GET['delete'])) {
                                $post_id_delete = $_GET['delete'];
                                $query = "DELETE FROM comments WHERE comment_id = $comment_id";
                                $delete_query = mysqli_query($connection,$query);
                                if (!$delete_query) {
                                    confirm($delete_query);
                                }
                                header("Location: comments.php");
                            }
                        
                        ?>

                    <?php 
                        
                        if (isset($_GET['unapprove'])) {
                            $comment_id_unapprove = $_GET['unapprove'];
                            $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id ='$comment_id_unapprove' ";
                            $unapprove_query = mysqli_query($connection,$query);
                            if (!$unapprove_query) {
                                confirm($unapprove_query);
                            }
                            header("Location: comments.php");
                        }
                    
                    ?>
                    <?php 
                        
                        if (isset($_GET['approve'])) {
                            $comment_id_approve = $_GET['approve'];
                            $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id ='$comment_id_approve' ";
                            $approve_query = mysqli_query($connection,$query);
                            if (!$approve_query) {
                                confirm($approve_query);
                            }
                            header("Location: comments.php");
                        }
                    
                    ?>