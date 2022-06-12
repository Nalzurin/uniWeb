
<?php
session_start();
$servername = "localhost";
$username = "root";
$database = "heroes";
$connection = mysqli_connect($servername, $username, null, $database);
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());

}
?>