<?php
session_start();
@include_once("../Database/config.php");
@include_once("../Components/SystemLog.php");


/* if (isset($_SESSION['UserType'])) {
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
} */

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM tbl_accounts WHERE username = '$username' OR password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['username'] != $username){
                $_SESSION['message'] = "You have entered an invalid username.";
                $_SESSION['icon'] = "error";
                $_SESSION['Show'] = true;
                header("Location: ../Login.php");
                //logMessage("Error", "Authentication", "The file Authentication was accessed without logging in.");
            } else if ($row['password'] != $password){
                $_SESSION['message'] = "You have entered an invalid password.";
                $_SESSION['icon'] = "error";
                $_SESSION['Show'] = true;
                header("Location: ../Login.php");
                //logMessage("Error", "Authentication", "The file Authentication was accessed without logging in.");
            } else {
                if ($row['role'] == "administrator") {
                    fetchAdminData($row['UID']);
                } else if ($row['role'] == "moderator") {
                    fetchModeratorData($row['UID']);
                } else {
                    fetchUserData($row['UID']);
                }
                unset($_SESSION['autoUsername']);
                unset($_SESSION['autoPassword']);
            }
        }
    } 
    /* else {
        $_SESSION['message'] = "Invalid username or password.";
        $_SESSION['icon'] = "error";
        $_SESSION['Show'] = true;
        logMessage("Error", "Authentication", "The file Authentication was accessed without logging in.");
        header("Location: ../Login.php");
    } */
} else {
    $_SESSION['message'] = "Invalid username or password.";
    $_SESSION['icon'] = "error";
    $_SESSION['Show'] = true;
    logMessage("Error", "Authentication", "The file Authentication was accessed without logging in.");
    header("Location: ../Login.php");
}

function Greetings(){
    $Greetings = array( "Good day", "Good morning", "Good afternoon", "Good evening", "Good night");
    $hour = date('H');
    if ($hour >= 5 && $hour <= 11) {
        return $Greetings[1];
    } else if ($hour >= 12 && $hour <= 17) {
        return $Greetings[2];
    } else if ($hour >= 18 && $hour <= 20) {
        return $Greetings[3];
    } else if ($hour >= 21 && $hour <= 23) {
        return $Greetings[4];
    } else {
        return $Greetings[0];
    }
}

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
        $_SESSION['GlobalDept'] = $row['department'];
        $_SESSION['GlobalStatus'] = $row['status'];

        $sql = "UPDATE tbl_accounts SET status = 1 WHERE UID = '$ID'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $_SESSION['message'] = Greetings() .", " . $_SESSION['GlobalName'] . "! Welcome to the Administrative Dashboard.";
            $_SESSION['icon'] = "info";
            $_SESSION['Show'] = true;
            $_SESSION['DatahasbeenFetched'] = true;
            header("Location: ../Admin/AdminDashboard.php");
        } else {
            $_SESSION['message'] = "We incountered an error while logging you in, please try again later.";
            $_SESSION['icon'] = "error";
            $_SESSION['Show'] = true;
            $_SESSION['DatahasbeenFetched'] = null;
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
            $_SESSION['message'] = Greetings() .", " . $_SESSION['GlobalName'] . "! Welcome to your dashboard.";
            $_SESSION['icon'] = "success";
            $_SESSION['Show'] = true;
            $_SESSION['DatahasbeenFetched'] = true;
            header("Location: ../Moderator/ModDashboard.php");
        } else {
            $_SESSION['message'] = "We incountered an error while logging you in, please try again later.";
            $_SESSION['icon'] = "error";
            $_SESSION['Show'] = true;
            $_SESSION['DatahasbeenFetched'] = null;
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