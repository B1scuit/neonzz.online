<?php
   include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" type="text/css" href="css/customalign.css" />
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link href="/img/favicon.ico" rel="shortcut icon">
    <style>
      .error {color: #FF0000;}
      .success {color: #64dd17;}
      body {
            background-image: url('/img/container.png');
            }
    </style>
    <script src="/java/jquery.js"></script>
    <script src="/java/bootstrap.js"></script>
    <script src="/java/java.js"></script>
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
                <a class="nav-link" href="/logout.php"><u>|Logout|</u></a>
        </ul>
</nav>
   <br />
   <h3 class="w3-medium w3-text-black"><span class="w3-opacity-min">Welcome<p class="w3-opacity-min" id="uname"><?php echo $_SESSION['user']; ?></span></h3>
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