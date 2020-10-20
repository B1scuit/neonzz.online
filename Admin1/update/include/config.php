<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'admin');
define('DB_PASSWORD', 'x?0F$Gz?jb');
define('DB_NAME', 'admin');

$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if ($conn->connect_error) {
    echo "Error:" . $conn . "<br />" . $conn->error;
    die("connection falied");
}
?>