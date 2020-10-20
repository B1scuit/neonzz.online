<?php
include('include/header.php');
include('include/navbar.php');
include('include/topbar.php');
include('include/userconfig.php');

if(isset($_POST['edit_btn'])) {
    $edit_id = $_POST['edit_id'];

    $query = "SELECT * FROM users WHERE id = '$edit_id'";
    
    if($conn->query($query)) {
        //$result1 = $conn->query($sql);
        $row = mysqli_fetch_assoc($result);
        $result = $conn->query($query);
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
    $result = $conn->query($query);


}
?>
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i>EDIT User Accounts</div>
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
                        <th>Edit</th>
                        </tr>
                    </thead>
                    <?php
                    $count=1;
                    $result = $conn->query($query);
                    if (mysqli_num_rows($result) > 0) {
// output data of each row
                    while($row = mysqli_fetch_assoc($result)) { ?>
                    <tbody>
                        <tr>
                            <th>
                                <?php echo $edit_id ?>
                            </th>
                            <td>
                                <form action="user_editcode.php" method="post">
                                <input type="hidden" name="edit_id" id="edit_id" value="<?php echo $edit_id ?>">
                                <input type="text" name="username_edit" value="<?php echo $row['username'];?>">
                            </td>
                            <td>
                                <input type="text" name="email_edit" value="<?php echo $row['email'];?>">
                            </td>
                            <td>
                                <input type="text" name="fname_edit" value="<?php echo $row['first_name'];?>">
                            </td>
                            <td>
                                <input type="text" name="lname_edit" value="<?php echo $row['last_name'];?>">
                            </td>
                            <td>
                                <input type="submit" class="btn btn-primary" name="upd_btn" id="upd_btn" value="Submit">
                                </form>
                            </td>
                        </tr>
                    </tbody>
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