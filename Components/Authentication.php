<?php
session_start();
@include_once("../Database/config.php");
@include_once("../Components/SystemLog.php");


if (isset($_SESSION['UserType'])) {
    if ($_SESSION['UserType'] == "administrator") {
        fetchAdminData($_SESSION['Auth']);
    } else if ($_SESSION['UserType'] == "moderator") {
        fetchModeratorData($_SESSION['Auth']);
    } else {
        fetchUserData($_SESSION['Auth']);
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
    global $conn;
    // get data from database
    // after getting data from database store it in session and redirect to dashboard

    $sql = "SELECT * FROM tbl_admin WHERE UID = '$ID'";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        $_SESSION['GlobalID'] = $row['UID'];
        $_SESSION['GlobalName'] = $row['name'];
        $_SESSION['GlobalUsername'] = $row['admin_uname'];
        $_SESSION['GlobalPassword'] = $row['admin_pword'];
        $_SESSION['GlobalEmail'] = $row['admin_email'];
        $_SESSION['GlobalDept'] = $row['department'];
        $_SESSION['Profile'] = $row['imagePath'];
        $_SESSION['GlobalRole'] = $row['role'];

        $sql = "UPDATE tbl_accounts SET status = 1 WHERE UID = '$ID'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $_SESSION['message'] = "Welcome, " . $_SESSION['GlobalName'] . "!";
            $_SESSION['icon'] = "success";
            $_SESSION['Show'] = true;
            header("Location: ../Admin/AdminDashboard.php");
        } else {
            $_SESSION['message'] = "We incountered an error while logging you in, please try again later.";
            $_SESSION['icon'] = "error";
            $_SESSION['Show'] = true;
            logMessage("Error", "Authentication", "The file Authentication was accessed by " . $_SESSION['GlobalName'] . ".");
            header("Location: ../Login.php");
        }
    }
}

function fetchModeratorData($ID)
{
    global $conn;
    // get data from database
    // after getting data from database store it in session and redirect to dashboard

    $sql = "SELECT * FROM tbl_admin WHERE UID = '$ID'";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        $_SESSION['GlobalID'] = $row['UID'];
        $_SESSION['GlobalName'] = $row['name'];
        $_SESSION['GlobalUsername'] = $row['admin_uname'];
        $_SESSION['GlobalPassword'] = $row['admin_pword'];
        $_SESSION['GlobalEmail'] = $row['admin_email'];
        $_SESSION['GlobalDept'] = $row['department'];
        $_SESSION['Profile'] = $row['imagePath'];
        $_SESSION['GlobalRole'] = $row['role'];

        $sql = "UPDATE tbl_accounts SET status = 1 WHERE UID = '$ID'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $_SESSION['message'] = "Welcome, " . $_SESSION['GlobalName'] . "!";
            $_SESSION['icon'] = "success";
            $_SESSION['Show'] = true;
            header("Location: ../Admin/AdminDashboard.php");
        } else {
            $_SESSION['message'] = "We incountered an error while logging you in, please try again later.";
            $_SESSION['icon'] = "error";
            $_SESSION['Show'] = true;
            logMessage("Error", "Authentication", "The file Authentication was accessed by " . $_SESSION['GlobalName'] . ".");
            header("Location: ../Login.php");
        }
    }
}

function fetchUserData($ID)
{
    echo "User";
}


// Path: Components\Authentication.php
?>