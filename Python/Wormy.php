<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
    <link rel="stylesheet" href="/css/w3.css">
    <!--<link rel="stylesheet" type="text/css" href="css/customalign.css" />-->
    <link rel="stylesheet" href="/css/bootstrap.css" />
    <style>
      .error {color: #FF0000;}
      .success {color: #64dd17;}
      body {
            background-image: url('/img/container.png');
            }
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.neonzz.online/css/w3.css">
    <link href="https://www.neonzz.online/img/favicon.ico" rel="shortcut icon">
    <script src="https://www.neonzz.online/java/jquery.js"></script>
    <script src="https://www.neonzz.online/java/bootstrap.js"></script>
    <script src="https://www.neonzz.online/java/java.js"></script>
    <title>Neonzz.online :: Wormy</title>
</head>
<body onload="detectClient()">
<?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  $name = "";
  $email = "";
  $platform = ""; 
  $devanswer = "";
  $submitted = ""; 
  $nameErr = "";
  $emailErr = "";
  $platformErr = "";
  $devErr = "";
  $commentErr = "";
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
      } else {
          $name = test_input($_POST["name"]);
      }
    
      if (empty($_POST["email"])) {
        $emailErr = "Email is required";
      } else {
        $email = test_input($_POST["email"]);
        }
    
      if (empty($_POST["platform"])) {
        $platformErr = "Platform is required";
      } else {
        $platform = test_input($_POST["platform"]);
      }

      if (empty($_POST["devanswer"])) {
        $devErr = "devchoice required";
    } else {
      $devanswer = test_input($_POST["devanswer"]);
    }

      if (empty($_POST["comment"])) {
        $commentErr = "Comment is required";
      } else {
        $comment = test_input($_POST["comment"]);
        $sql = "INSERT INTO contact (name, email, platform, devans, comment)
        VALUES ('$name', '$email', '$platform', '$devanswer', '$comment')";
        if ($conn->query($sql) === TRUE) {
            $submitted = "Contact information has been submitted";
        } else {
            echo "Error:" . $sql . "<br />" . $conn->error;
            }
    }

}
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
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
    <video class="w3-image" playsinline autoplay muted width="1500" src="/vid/wormyvideo.mp4" type="video/mp4">
    Sorry, your browser does not supportthis video player.
    </video>
    <div class="w3-display-topmiddle">
        <h1 class="w3-small w3-text-grey"><span class="w3-opacity-min">Welcome to my site for my code!</span></h1>
    </div>
   </header>
   <div class="w3-container w3-padding-32" id="downloadWormy">
   </div>
   <h2 class="w3-content w3-large w3-text-grey"><span class="w3-opacity-min">Wormy</span></h2>
   <p class="w3-content"><span class="w3-opacity-min">Download Wormy here:<br /><br /><form class="w3-content" action="https://mega.nz/file/ZNEjCayK#WZP0lQOFRMPgoH4bELyRYzqezlMGIdXCTWYgF_z-SjU" method="GET" target="_blank"><button type="submit" class="btn btn-success">Wormy v1.0.2</button></form></span></p>
   <h3 class="w3-content w3-large w3-text-black"><span class="w3-opacity-min">Register to recive notifications on the latest updates if you have ideas or would like to join my development team please visit the contact us page or submit a ticket below.</span></h3><br /><br />
   <div class="w3-center verticaltext w3-content w3-padding" style="max-width: 1500px;">
    <h1 class="w3-content w3-large"><span class="w3-opacity-min">Contact us using the form below </span></h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" style="border: 1px solid black">
        <div class="w3-content form-group">
            <label for="name">Name:</label>
            <textarea class="w3-content form-control1" name="name" rows="1" id="name" placeholder="First and last name"></textarea>
            <span class="error">* <?php echo $nameErr;?></span>
        </div>
        <div class="w3-content form-group">
            <label for="email">E-mail:</label>
            <textarea class="w3-content form-control1" rows="1" name="email" id="email" placeholder="E-mail"></textarea>
            <span class="error">* <?php echo $emailErr;?></span>
        </div>
        <div class="w3-content form-group">
            <label for="platform">What operating system are you using?</span>
            <select class="form-control" id="Platform" name ="platform">
                <optgroup label="Windows">
                    <option name="platform">Win10 x64</option>
                    <option>Win10 x32</option>
                    <option>Win10 ARM</option>
                    <option>Win8/8.1 x64</option>
                    <option>Win8/8.1 x32</option>
                    <option>Win8/8.1 ARM</option>
                    <option>Win7 x64</option>
                    <option>Win7 x32</option>
                </optgroup>
 
                <optgroup label="Linux">
                   <option>GNU Linux distros x64</option>
                   <option>GNU Linux distros x32</option>
                   <option>GNU Linux distros ARM</option>
                   <option>GNOME Linux distros x64</option>
                   <option>GNOME Linux distros x32</option>
                   <option>GNOME Linux distros ARM</option>
                   <option>KDE Linux distros x64</option>
                   <option>KDE Linux distros x32</option>
                   <option>KDE Linux distros ARM</option>
                </optgroup>
 
                <optgroup label="Mac OSX" name="platform">
                    <option>MAC OSX x64</option>
                    <option>MAC OSX x32</option>
                    <option>MAC OSX ARM</option>
                </optgroup>
            </select>
            <span class="error">* <?php echo $platformErr;?></span>
        </div>
        <div class="w3-content form-group">
         <label>Would you like to join my development team?</span>
         <select class="form-control" id="devanswer" name="devanswer">
             <optgroup label="Development">
                 <option>Yes</option>
                 <option>No</option>
             </optgroup>
         </select>
         <span class="error">*<?php echo $devErr;?></span>
        </div>
        <div class="w3-content form-group">
            <label for="Comment">Comment:</label>
            <textarea class="w3-content form-control1" name="comment" rows="8" id="Comment" placeholder="Your comment here:"></textarea>
            <span class="error">* <?php echo $commentErr;?></span>
        </div>
        <span class="w3-content form-group"><button type="submit" class="btn btn-success" id="contactbutton" onclick="submitted()">Submit</button></span>
        <br />
        <span class="success"> <?php echo $submitted;?></span>
        

    </form>
    <br />
    <br />
   <footer>
    <div class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="footer">
        <img class="w3-image-footer" src="/img/Websitebackground.png" width="1500" height="450" id="footerimage">
        <p style="text-align:center">© Neonzz 2020 Powered by w3</p>
       </div>
   </footer> 
</body>
</html>