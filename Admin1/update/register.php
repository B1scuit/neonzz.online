<?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  require_once "include/config.php";
  $uname = $email = "";
  $psw = $cpsw = "";
  $unameErr = $emailErr = "";
  $passErr = $cpassErr = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
      $psw = trim($_POST["psw"]);
  
      $cpsw = trim($_POST["cpsw"]);
      if(empty($unameErr) && empty($passErr) && empty($cpassErr)) {
          $sql = "INSERT INTO users (priv, createIP, username, email, password)
          VALUES ('0', '$_SERVER[REMOTE_ADDR]', ?, ?, ?)";
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
    }
      $conn->close();
  ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <style>
        .error1 {font-size: 10px; color: #FF0000;}
  </style>

  <title>Neonzz.online:: Admin - Register</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
              <form method="POST" action=<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Email Address">
                  <span class="error1">*<?php echo $emailErr;?></span>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="uname" name="uname" placeholder="Username">
                  <span class="error1">*<?php echo $unameErr;?></span>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="psw" name="psw" placeholder="Password">
                    <span class="error1">*<?php echo $passErr;?></span>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="cpsw" name="cpsw" placeholder="Repeat Password">
                    <span class="error1">*<?php echo $cpassErr;?></span>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Register Account
                </button>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="forgot-password.html">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="login.html">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>