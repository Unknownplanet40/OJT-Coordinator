<?php
// No need to modify this file unless you know what you're doing.
// RJC 12/05/2023

$dbhost = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "enter databasename here";

try {
    $conn = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname);
} catch (\Throwable $th) {
    header("location: ErrorPage.php?error=500");
}
?>