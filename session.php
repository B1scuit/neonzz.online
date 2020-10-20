<?php
   include('config.php');
   session_start();
   
   $user_check = $_SESSION["user"];
   
   $sql = "SELECT username FROM users WHERE username = ?";
   if ($stmt = $conn->prepare($sql)) {
       $stmt->bind_param("s", $param_username);
       $param_username = $user_check;

       if($stmt->execute()) {
           $stmt->store_result();
       }
       
   }
   $result = $conn->query("SELECT id, username FROM users WHERE username ='$user_check'");
   $row = $result->fetch_array(MYSQLI_ASSOC);
   
   $login_session = $row['username'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
      die();
   }
?>