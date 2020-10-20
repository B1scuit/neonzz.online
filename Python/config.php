<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'admin');
define('DB_PASSWORD', 'x?0F$Gz?jb');
define('DB_NAME', 'customer');

$admin = 'Neonzz';
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if ($conn->connect_error) {
    echo "Error:" . $conn . "<br />" . $conn->error;
    die("Connection failed see echo");
} else {
    //echo "Connection Sucessful";
}
?>