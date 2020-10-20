<?php
include('include/config.php');
session_start();
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if (isset($_POST['adminupd_btn'])) {
            $password = password_hash($pass, PASSWORD_DEFAULT);
            $edit_id = $_SESSION['Adminedit_id'];
            $username = $_POST["username_edit"];
            $email = $_POST["email_edit"];
            $pass = $_POST["pass_edit"];
            $Priv = $_POST["priv_edit"];

            $sql = "UPDATE users SET username='$username', email='$email', password='$password', Priv='$Priv' WHERE id='$edit_id'";

            if($conn->query($sql)) {
                $_SESSION["success"] = "Your data has been updated";
                header("location: profile.php");
                
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        print_r($_SESSION);
    }
    ?>