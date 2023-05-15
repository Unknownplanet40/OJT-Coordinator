<?php
session_start();
include_once("./External/Log.php");

logMessage("User " . $_SESSION['Global_Username'] . " logged out");

session_unset();
session_destroy();
header("Location: ./login.php");




?>