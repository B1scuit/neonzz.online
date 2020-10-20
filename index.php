<?php
session_start();
  if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: welcome.php");
    exit;
  } else {
    echo "Not logged in";
  }
require_once "config.php";
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        $sql1 = "SELECT Priv FROM users WHERE username = '$username'";

        if($stmt = $conn->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Store result
                $stmt->store_result();
                
                // Check if username exists, if yes then verify password
                if($stmt->num_rows == 1){                    
                    // Bind result variables
                    $stmt->bind_result($id, $username, $hashed_password);
                    if($stmt->fetch()){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();

                            $result = $conn->query($sql1);
                            $row = $result->fetch_assoc();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["login_user"] = $username;
                            $_SESSION["user"] = $username;
                            $_SESSION["priv"] = $row["Priv"];
                            setcookie('userid', $_SESSION['id'], time() + (60 * 60 * 24 * 30), "/");
                            setcookie('user', $_SESSION['user'], time() + (60 * 60 * 24 * 30), "/");

                            // Redirect user to welcome page
                            header("location: welcome.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }
    
    // Close connection
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
    <link rel="stylesheet" href="https://www.neonzz.online/css/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.neonzz.online/css/bootstrap.css" />
    <link href="https://www.neonzz.online/img/favicon.ico" rel="shortcut icon">
    <script src="https://www.neonzz.online/java/jquery.js"></script>
    <script src="https://www.neonzz.online/java/bootstrap.js"></script>
    <script src="https://www.neonzz.online/java/java.js"></script>
    <style>
      body {
            background-image: url('/img/container.png');
            }
    </style>

    <title>Neonzz.online :: Home</title>
</head>
<body onload ="detectClient()">
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
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/logout.php">|<u>Register</u>|</a>
        </ul>
</nav>
<div id="login">
     <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
     <div class="w3-content">
       <span><img src="/img/img_avatar.png" alt="Avatar" class="avatar"></span>
      </div>
      <div class="w3-content form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
      </div>    
            <div class="w3-content form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="w3-content form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p class="w3-content">Don't have an account? <a href="register.php">Sign up now</a>.</p>
      </form>
     </div>
   <br />
   <h3 class="w3-medium w3-text-black"><span class="w3-opacity-min">Welcome<button onclick="login()" class="btn btn-success">Login</button></h3>
   <header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
    <img class="w3-image" src="img/Websitebackground.png" alt="logo" width="1500" height="1000" id="headerimage">
    <div class="w3-display-topmiddle">
        <h1 class="w3-small w3-text-grey"><span class="w3-opacity-min">Welcome to my site for my code!</span></h1>
    </div>
   </header>
   <!-- Page content -->
   <div class="w3-content w3-padding" style="max-width:1564px">

    <!-- Project Section -->
    <div class="w3-container w3-padding-32" id="projects">
        <h3 class="w3-border-bottom w3-border-light-grey w3-padding-custom" style="font-family:chiller" id="ProjectText">Projects</h3>
    </div>

    <div class="w3-row-padding">
      <div class="w3-col l3 m6 w3-margin-bottom">
        <div class="w3-display-container">
          <div class="w3-display-topleft w3-black w3-padding">Wormy</div>
          <a href="Python/Wormy.php">
          <img src="img/Wormyhome.PNG" alt="Wormy" style="width:100%">
          </a>
          <p>Wormy is a snake clone made in pygame</p>
        </div>
      </div>
      <div class="w3-col l3 m6 w3-margin-bottom">
        <div class="w3-display-container">
          <div class="w3-display-topleft w3-black w3-padding">Pong</div>
          <a href="Python/Pong.php">
          <img src="img/Pong.PNG" alt="Pong" style="width:100%">
          </a>
          <p>Pong is a ping pong game made in Python</p>
        </div>
      </div>
      <div class="w3-col l3 m6 w3-margin-bottom">
        <div class="w3-display-container">
          <div class="w3-display-topleft w3-black w3-padding">Building Escape</div>
          <a href="UE4/Building-escape.php">
          <img src="img/buildingescape.png" alt="Building Escape" style="width:100%">
          </a>
          <p>Building Escape is puzzle based escape game made in UE4 and is almost ready for testing</p>
        </div>
      </div>
      <div class="w3-col l3 m6 w3-margin-bottom">
        <div class="w3-display-container">
          <div class="w3-display-topleft w3-black w3-padding">Battle Tank</div>
          <a href="UE4/Battle-Tank.php">
          <img src="img/placeholder.png" alt="Battle Tank" style="width:100%">
          </a>
          <p>Battle Tank is not ready for testing</p>
        </div>
      </div>
    </div>

    <footer>
        <p style="text-align:center">© Neonzz 2020 Powered by w3</p>
    </footer>

</body>
</html>