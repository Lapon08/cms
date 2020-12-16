
<div class="col-lg-12">
    <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Post</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Id</th>
                                    <th>username</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    
                                    <th>Admin</th>
                                    <th>Edit</th>
                                    <th>Delete</th>


                                </tr>

                            </thead>
                            <tbody>

                                <?php 
                                    $query = "SELECT * FROM users";
                                    $select_users = mysqli_query($connection,$query);
                                    $no = 1;

                                    while($row = mysqli_fetch_assoc($select_users)):

                                        $user_id = $row['user_id'];
                                        $user_username = $row['user_username'];
                                        $user_firstname = $row['user_firstname'];
                                        $user_lastname = $row['user_lastname'];
                                        $user_email = $row['user_email'];
                                        $user_role = $row['user_role'];
                                        $user_image = $row['user_image'];
                                        $user_role = $row['user_role'];
                                        
                                ?>
                                <tr>
                                    <td><?php echo $no?></td>
                                    <td class="stu_id"><?php echo $user_id ?></td>
                                    <td><?php echo $user_username ?></td>
                                    <td><?php echo $user_firstname ?></td>
                                    <td><?php echo $user_lastname ?></td>
                                    <td><?php echo $user_email ?></td>
                                    <td><?php echo $user_role ?></td>
                                    

                                    <td><a class="badge badge-primary" style="padding: 10px;" href="users.php?change_to_admin=<?php echo $user_id ?>">Admin</a></td>
                                    <td><a class="badge badge-primary" style="padding: 10px;" href="users.php?source=edit_user&user_id=<?php echo $user_id ?>">Edit</a></td>
                                    <td><a href="" class="badge badge-danger delete_btn" style="padding: 10px;">Delete</a></td>

                                </tr>
                                    <?php $no++; endwhile; ?>

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
                                            <input type="hidden" name="user_id" id="delete_id">
                                            do you want to delete this User?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                                <button type="submit" name="delete" class="btn btn-danger">Yes</button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>

                            </tbody>

                            </table>
                            </div>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){

            $('.delete_btn').click(function(e){

                e.preventDefault();
                var stu_id = $(this).closest('tr').find('.stu_id').text();
                // console.log(stu_id);
                $('#delete_id').val(stu_id);
                $('#deleteStudentModal').modal('show');

            });



        });
    </script>


    <?php 
    
        if (isset($_POST['delete'])) {
            $user_id_delete = $_POST['user_id'];
            $user_id_delete = mysqli_real_escape_string($connection,$user_id_delete);
            $query = "DELETE FROM users WHERE user_id = $user_id_delete";
            $delete_query = mysqli_query($connection,$query);
            if (!$delete_query) {
                confirm($delete_query);
            }
            header("Location: users.php");
        }
        if (isset($_GET['change_to_admin'])) {
            $user_id_admin = $_GET['change_to_admin'];
            $user_id_admin  = mysqli_real_escape_string($connection,$user_id_admin);
            $query = "UPDATE users SET user_role= 'admin' WHERE user_id = $user_id_admin";
            $delete_query = mysqli_query($connection,$query);
            if (!$delete_query) {
                confirm($delete_query);
            }
            header("Location: users.php");
        }
    
    ?>
