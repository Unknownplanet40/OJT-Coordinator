<?php
session_start();
@include_once("./Database/config.php");
@include_once("./Components/SystemLog.php");

// check what type of user is logging out
if (isset($_SESSION['GlobalRole'])) {
    if ($_SESSION['GlobalRole'] == "administrator") {
        $sql = "UPDATE tbl_accounts SET status = 0 WHERE UID = '" . $_SESSION['GlobalID'] . "'";
    } else if ($_SESSION['GlobalRole'] == "moderator") {
        $sql = "UPDATE tbl_accounts SET status = 0 WHERE UID = '" . $_SESSION['GlobalID'] . "'";
    } else {
        $sql = "UPDATE tbl_accounts SET status = 0 WHERE UID = '" . $_SESSION['GlobalID'] . "'";

        if (file_exists("./Components/EvaluatePDF/". $_SESSION['GlobalUsername'] . '_EvalData.txt')) {
            unlink("./Components/EvaluatePDF/". $_SESSION['GlobalUsername'] . '_EvalData.txt');
            unlink("./Components/EvaluatePDF/". $_SESSION['GlobalUsername'] . '_EvalInfo.txt');
        }
    }
}
$result = mysqli_query($conn, $sql);
$_SESSION['DatahasbeenFetched'] = null;

// check if the loggin status of the user was updated
if ($result) {
    session_unset();
    session_destroy();
    header("Location: ./login.php");
} else {
    $_SESSION['message'] = "The System encountered an error while logging you out, please Contact the Administrator.";
    $_SESSION['icon'] = "error";
    $_SESSION['Show'] = true;
    logMessage("Error", "Log-out", "There was an error while logging out.");
    header("Location: " . $_SERVER['HTTP_REFERER']);
}
?>