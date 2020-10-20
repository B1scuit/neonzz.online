<?php
include('include/userconfig.php');
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if (isset($_POST['upd_btn'])) {
            $edit_id = $_POST['edit_id'];
            $username = $_POST["username_edit"];
            $email = $_POST["email_edit"];
            $fname = $_POST["fname_edit"];
            $lname = $_POST["lname_edit"];

            $sql = "UPDATE users SET username='$username', email='$email', first_name='$fname', last_name='$lname' WHERE id='$edit_id'";

            if($conn->query($sql)) {
                $_SESSION["success"] = "Your data has been updated";
                header("location: userprofile.php");
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
    ?>