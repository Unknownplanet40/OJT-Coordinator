<?php
session_start();
@include_once("./Database/config.php");
@include_once("./Components/SystemLog.php");


if (isset($_SESSION['UserType'])) {
    if ($_SESSION['UserType']  == "admin") {
        fetchAdminData($_SESSION['ID']);
    } else if ($_SESSION['UserType'] == "moderator") {
        fetchModeratorData($_SESSION['ID']);
    } else {
        fetchUserData($_SESSION['ID']);
    }
} else {
    $_SESSION['message'] = "Could not fetch user data, you need to login first.";
    $_SESSION['icon'] = "error";
    $_SESSION['Show'] = true;
    logMessage("Error", "Authentication", "The file Authentication was accessed without logging in.");
    header("Location: ../Login.php");
}

$_SESSION['DatahasbeenFetched'] = true;

function fetchAdminData($ID)
{
    echo "Admin";
    // get data from database
    // after getting data from database store it in session and redirect to dashboard
}

function fetchModeratorData($ID)
{
    echo "Moderator";
}

function fetchUserData($ID)
{
    echo "User";
}


// Path: Components\Authentication.php
?>

