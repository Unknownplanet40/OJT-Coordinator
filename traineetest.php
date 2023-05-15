<?php
session_start();
include_once("./External/config.php");

$loggedin = $_SESSION['Global_Loggedin'];
$name = $_SESSION['Global_Name'];
$username = $_SESSION['Global_Username'];
$password = $_SESSION['Global_Password'];
$UID = $_SESSION['Global_ID'];

if(isset($loggedin) && $loggedin == false){
    header("Location: ./login.php");
} else{
    echo "you are logged in as $name with username $username and password $password and UID $UID and your role is Trainee";
}
?>
<button onclick="window.location.href='./logout.php'">Logout</button>