<?php
session_start();
include_once("./External/config.php");
include_once("./External/Log.php");

// check what type of user is logging out
if (isset($_GET['type'])) {
    if ($_GET['type'] == "Admin") {
        #sql query to update the loggin status of the admin
        $sql = "UPDATE tbl_Admin SET LogginStatus = 0 WHERE ID = '" . $_SESSION['Global_ID'] . "'";
        $result = mysqli_query($conn, $sql);
    } else if ($_GET['type'] == "User") {
        #sql query to update the loggin status of the user
        $sql = "UPDATE tbl_trainee SET LogginStatus = 0 WHERE UID = '" . $_SESSION['Global_ID'] . "'";
        $result = mysqli_query($conn, $sql);
    } else {
        logMessage("Error: Type of user not specified");
        header("Location: ErrorPage.php?error=409");
    }
}
// check if the loggin status of the user was updated
if ($result) {
    logMessage("User " . $_SESSION['Global_Username'] . " logged out");
} else {
    logMessage("Error: Unable to update the loggin status of the user");
}

session_unset();
session_destroy();
header("Location: ./login.php");
?>