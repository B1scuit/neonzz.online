<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
    <link rel="stylesheet" href="https://www.neonzz.online/css/w3.css">
    <link rel="stylesheet" type="text/css" href="/css/customalign.css" />
    <link rel="stylesheet" href="https://www.neonzz.online/css/bootstrap.css" />
    <script src="https://www.neonzz.online/java/jquery.js"></script>
    <script src="https://www.neonzz.online/java/bootstrap.js"></script>
    <script src="https://www.neonzz.online/java/java.js"></script>
    <title>Neonzz.online :: Register</title>
</head>
<body onload="detectClient()">
<?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  require_once "config.php";
  $fName = "";
  $lName = "";
  $uname = "";
  $email = "";
  $psw = "";
  $cpsw = "";
  $nameErr = "";
  $nameErr2 = "";
  $unameErr = "";
  $emailErr = "";
  $passErr = "";
  $cpassErr = "";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["fName"])) {
          $nameErr = "First name is Required";
      } elseif (!preg_match("/^[a-zA-Z ]*$/",$fName)) {
          $nameErr="Only letters and white space";
      } else {
          $fName = trim($_POST["fName"]);
      }
      if (empty($_POST["lName"])) {
          $nameErr2 = "Last name is required";
      } elseif (!preg_match("/^[a-zA-Z ]*$/",$lName)) {
          $nameErr2 = "Only letters and white space";
      } else {
          $lName = trim($_POST["lName"]);
      }
      if (empty($_POST["uname"])) {
          $unameErr = "Username Required";
      } elseif (!preg_match("/^[a-zA-Z0-9]*$/",$uname)) {
          $unameErr = "Username can only contain letters numbers";
      } else {
          $sql = "SELECT id FROM users WHERE username = ?";

          if($stmt = $conn->prepare($sql)) {
              $stmt->bind_param("s", $param_uname);
              $param_uname = trim($_POST["uname"]);

              if($stmt->execute()) {
                  $stmt->store_result();

                  if($stmt->num_rows == 1) {
                      $unameErr = "This username is already taken";
                  } else {
                    $uname = trim($_POST["uname"]);
                  }
              } else {
                  echo "Oops! Something went wrong plase try again";
              }
              $stmt->close();
          }
          
      }
      if (empty($_POST["email"])) {
          $emailErr = "E-mail required!";
      } else {
          $sql = "SELECT id FROM users WHERE email = ?";

          if ($stmt = $conn->prepare($sql)) {
              $stmt->bind_param("s", $param_email);
              $param_email = trim($_POST["email"]);

              if($stmt->execute()) {
                  $stmt->store_result();

                  if($stmt->num_rows == 1) {
                      $emailErr = "This E-mail is taken please login instead";
                  } else {
                    $email = trim($_POST["email"]);
                  }
              } else {
                  echo "Oops! Something went wrong please try again";
              }
              $stmt->close();
          }
          
      }
      if (empty($_POST["psw"])) {
          $passErr = "Password is required";
      } elseif ($_POST['psw'] != $_POST['cpsw']) {
          $passErr = "Password must match.";
      } else {
          $psw = trim($_POST["psw"]);
      }
      if (empty($_POST["cpsw"])) {
        $cpassErr = "Confirm Required";
      } elseif ($_POST["psw"] != $_POST['cpsw']) {
          $cpassErr = "Password must match.";
      } else {
          $cpsw = trim($_POST["cpsw"]);  
      }

      if(empty($unameErr) && empty($passErr) && empty($cpassErr)) {
          $sql = "INSERT INTO users (first_name, last_name, createIP, Priv, username, email, password)
          VALUES ('$fName', '$lName', '$_SERVER[REMOTE_ADDR]', '0', ?, ?, ?)";
          if($stmt = $conn->prepare($sql)) {
              $stmt->bind_param("sss", $param_uname, $param_email, $param_password);

              $param_uname = $uname;
              $param_email = $email;
              $param_password = password_hash($psw, PASSWORD_DEFAULT);
              if($stmt->execute()) {
                  //redirect
                  header("location: /index.php");
              } else {
                  error_log("error: $sql", 0);
                  //echo $stmt->error;
                  echo "Something went wrong please try again";
              }
              $stmt->close();
          }
      }
      $conn->close();
  }
  ?>

  <nav class="navbar navbar-dark navbar-expand-sm bg-secondary">
    <a class="navbar-brand" href="/index.php"><img src="/img/logo.png"></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="/index.php"><u>|Home|</u></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/index.php#projects"><u>|Projects|</u></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/about.html"><u>|About|</u></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/contact.php"><u>|Contact us|</u></a>
            </li class="nav-item">
                <a class="nav-link" href="/register.php"><u>|Register|</u></a>
            <li class="float-right">
              <a  class="float-right nav-link" href="/login.php" target="_top"><u id="login">|Login|</u></a>
            </li>
        </ul>
  </nav>
  <br />
  <header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
  <img class="w3-image" src="/img/Websitebackground.png" alt="logo" width="1500" height="1000">
  <div class="w3-center w3-content w3-padding" style="max-width:1500px;">
    <h1 class="w3-content w3-large"><span class="w3-opacity-min">To register please fill the form below:</span>
    <br />
    <br />
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="w3-content form-group">
            <label for="fName">First name:</label>
            <input class="w3-content form-control1" type="text" id="fName" name="fName">
            <span class="error"><?php echo $nameErr;?></span>
        </div>
        <div class="w3-content form-group">
            <label for="lName">Last name:</label>
            <input class="w3-content form-control1" type="text" id="lName" name="lName">
            <span class="error"><?php echo $nameErr2;?> </span>
        </div>
        <div class="w3-content form-group">
            <label for="email">E-mail:</label>
            <input class="w3-content form-control1" type="text" id="email" name="email">
            <span class="error"><?php echo $emailErr;?></span>
        </div>
        <div class ="w3-content form-group">
            <label for="uname">Username:</label>
            <input class="w3-content form-control1" type="text" id="uname" name="uname">
            <span class="error"><?php echo $unameErr;?></span>
        </div>
        <div class="w3-content form-group">
            <label for="psw">Password:</label>
            <input class="w3-content form-control1" type="password" id="psw" name="psw">
            <span class="error"><?php echo $passErr; ?>
        </div>
        <div class="w3-content form-group">
            <label for="cpsw">Confirm password:</label>
            <input class="w3-content form-control1" type="password" id="cpsw" name="cpsw">
            <span class="error"><?php echo $cpassErr; ?>
        </div>
        <span class="w3-content form-control"><button type="submit" class="btn btn-success" id="register">Register</button></span>

</body>
</html>