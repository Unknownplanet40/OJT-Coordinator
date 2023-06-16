<?php
// No need to modify this file unless you know what you're doing.
// RJC 12/05/2023

$dbhost = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "ojtcs_database";

try {
    $conn = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname);
    if ($conn) {
        echo "<script>console.log('The database is connected successfully.');</script>";
    } else {
        echo "<script>console.log('Failed to connect to database.');</script>";
    }
} catch (\Throwable $th) {
    header("location: ErrorPage.php?error=500");
}
?>