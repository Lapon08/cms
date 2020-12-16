
<div class="col-lg-12">
    <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Comments</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Comment</th>
                                    <th>Email</th>
                                    <!-- <th>In Respone to</th> -->
                                    <th>Status</th>
                                    <th>Post</th>
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
                                    $no = 1;
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
                                    <td><?php echo $no?></td>
                                    <td class="stu_id"><?php echo $comment_id ?></td>
                                    <td><?php echo $comment_author ?></td>
                                    <td><?php echo $comment_content ?></td>
                                    <td><?php echo $comment_email ?></td>
                                    <td><?php echo $comment_status ?></td>

                                <?php 
                                    $query = "SELECT * FROM posts WHERE post_id = $comment_post_id ";
                                    $select_id_post_query = mysqli_query($connection,$query);
                                    confirm($select_id_post_query);
                            
                                        while ($row = mysqli_fetch_assoc($select_id_post_query)) :
                                         $post_title = $row['post_title'];
                                            $post_id = $row['post_id'];       ?>                      
                                            <td><a href="../post.php?p_id=<?php echo $post_id ?>"><?php echo $post_title?></a></td>
                                    <?php $no++;  endwhile; ?>

                                    
                                    
                                   
                                    <td><?php echo $comment_date ?></td>
                                    <td><a class="badge badge-primary" style="padding: 10px;" href="comments.php?approve=<?php echo $comment_id ?>">Approve</a></td>
                                    <td><a class="badge badge-primary" style="padding: 10px;" href="comments.php?unapprove=<?php echo $comment_id ?>">Unapprove</a></td>
                                    <td><a href="" class="badge badge-danger delete_btn" style="padding: 10px;">Delete</a></td>
                                </tr>
                                    <?php endwhile; ?>
                            </tbody>
                                <!-- Modal -->
                                <div class="modal fade" id="deleteStudentModal" tabindex="-1" role="dialog" aria-labelledby="deleteStudentModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteStudentModalLabel">Confirmation</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="" method="post">
                                            <div class="modal-body">
                                            <input type="hidden" name="comment_id" id="delete_id">
                                            do you want to delete this Comment?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                                <button type="submit" name="delete" class="btn btn-danger">Yes</button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </table>
                            </div>
    </div>
</div>

                        <?php 
                        
                            if (isset($_POST['delete'])) {

                                $comment_id_delete = $_POST['comment_id'];
                                $comment_id_delete = mysqli_real_escape_string($connection,$comment_id_delete);
                                $query = "DELETE FROM comments WHERE comment_id = '$comment_id_delete'";
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
                            $comment_id_unapprove = mysqli_real_escape_string($connection,$comment_id_unapprove);
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
                            $comment_id_approve = mysqli_real_escape_string($connection,$comment_id_approve);
                            $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id ='$comment_id_approve' ";
                            $approve_query = mysqli_query($connection,$query);
                            if (!$approve_query) {
                                confirm($approve_query);
                            }
                            header("Location: comments.php");
                        }
                    
                    ?>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){

            $('.delete_btn').click(function(e){

                e.preventDefault();
                var stu_id = $(this).closest('tr').find('.stu_id').text();
                console.log(stu_id);
                $('#delete_id').val(stu_id);
                $('#deleteStudentModal').modal('show');

            });



        });
    </script>