<?php
include('include/header.php');
include('include/navbar.php');
include('include/topbar.php');
include('include/userconfig.php');
?>
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i>User Accounts</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Create Date</th>
                        <th>Create IP</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        </tr>
                    </thead>
                    <?php
                    $sql = 'SELECT * from users';
                    if ($conn->query($sql)) {
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                    $count=1;
                    $result = $conn->query($sql);
                    if (mysqli_num_rows($result) > 0) {
// output data of each row
                    while($row = mysqli_fetch_assoc($result)) { ?>
                    <tbody>
                        <tr>
                            <th>
                                <?php echo $row['id']; ?>
                            </th>
                            <td>
                                <?php echo $row["username"]; ?>
                            </td>
                            <td>
                                <?php echo $row["email"]; ?>
                            </td>
                            <td>
                                <?php echo $row["first_name"]; ?>
                            </td>
                            <td>
                                <?php echo $row["last_name"]; ?>
                            </td>
                            <td>
                                <?php echo $row['created']; ?>
                            </td>
                            <td>
                                <?php echo $row['createIP']; ?>
                            </td>
                            <td>
                                <form action="user_edit.php" method="post">
                                <input type="hidden" name="edit_id" id="edit_id" value="<?php echo $row['id'];?>">
                                <input type="submit" class="btn btn-primary" name="edit_btn" id="edit_btn" value="edit">
                                </form>
                            </td>
                            <td>
                                <form action="user_delete.php" method="post">
                                <input type="hidden" name="edit_id" value="<?php echo $row['id'];?>">
                                <input type="submit" class="btn btn-danger" value="Delete">
                                </form>
                            </td>
                        </tr>
                    </tbody>
                    <!-- Logout Modal-->
                    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                </div>
                                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                        <a class="btn btn-primary" href="logout.php">Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $count++;
                }
                    } else {
                        echo '0 results';
                    }
                    ?>
                    <?php
                    include('include/script.php');
                    include('include/footer.php'); ?>