<?php
    include('config.php');
    session_start();

    $user_check = $_SESSION["priv"];
    $user = $_SESSION["user"];

    $sql = "SELECT username FROM users WHERE username = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $param_priv);
        $param_priv = $user;
        if($stmt->execute()) {
            $stmt->store_result();
        }
    }
    $result = $conn->query("SELECT priv, username FROM users WHERE username = '$user'");
    $row = $result->fetch_array(MYSQLI_ASSOC);

    if ($user_check != 255) {
        header("location: 404.html");
        $conn->close();
        die();
    } else {
        $login_session = $row['username'];
        echo "You have logged in";
    }
    
    if (!isset($_SESSION['login_user'])) {
        header("location: login.php");
        die();
    }

    ?>