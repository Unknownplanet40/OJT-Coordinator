<?php
session_start();
@include_once("../Database/config.php");
@include_once("../Components/SystemLog.php");
date_default_timezone_set('Asia/Manila');

if($_SESSION['UpdateSeason']){
    if ($_SESSION['GlobalRole'] == "administrator") {
        fetchAdminData($_SESSION['GlobalID']);
    } else if ($_SESSION['GlobalRole'] == "moderator") {
        fetchModeratorData($_SESSION['GlobalID']);
    } else {
        fetchUserData($_SESSION['GlobalID']);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM tbl_accounts WHERE username = '$username' OR password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['username'] != $username) {
                $_SESSION['message'] = "You have entered an invalid username.";
                $_SESSION['icon'] = "error";
                $_SESSION['Show'] = true;
                header("Location: ../Login.php");
            } elseif ($row['password'] != $password) {
                $_SESSION['message'] = "You have entered an invalid password.";
                $_SESSION['icon'] = "error";
                $_SESSION['Show'] = true;
                header("Location: ../Login.php");
            } elseif ($row['username'] == $username && $row['password'] == $password) {
                if ($row['role'] == "administrator") {
                    fetchAdminData($row['UID']);
                } else if ($row['role'] == "moderator") {
                    fetchModeratorData($row['UID']);
                } else {
                    fetchUserData($row['UID']);
                }
                unset($_SESSION['autoUsername']);
                unset($_SESSION['autoPassword']);

                // this will delete the file EvalData.txt
                $file = "../Components/EvaluatePDF/EvalData.txt";
                if (file_exists($file)) {
                    unlink($file);
                }

            } else {
                $_SESSION['message'] = "Invalid username or password.";
                $_SESSION['icon'] = "error";
                $_SESSION['Show'] = true;
                header("Location: ../Login.php");
            }
        }
    } else {
        $_SESSION['message'] = "Invalid username or password.";
        $_SESSION['icon'] = "error";
        $_SESSION['Show'] = true;
        header("Location: ../Login.php");
    }
} else {
    $_SESSION['message'] = "No user was found.";
    $_SESSION['icon'] = "error";
    $_SESSION['Show'] = true;
    logMessage("Error", "Authentication", "The file Authentication was accessed without logging in.");
    header("Location: ../Login.php");
}

function Greetings()
{
    $Greetings = array(
        "Good day",
        "Good morning",
        "Good afternoon",
        "Good evening",
        "Good night"
    );
    
    $hour = date("H");

    if ($hour >= 5 && $hour < 12) {
        return $Greetings[1]; // Good morning (5:00 AM - 11:59 AM)
    } elseif ($hour >= 12 && $hour < 17) {
        return $Greetings[2]; // Good afternoon (12:00 PM - 4:59 PM)
    } elseif ($hour >= 17 && $hour < 20) {
        return $Greetings[3]; // Good evening (5:00 PM - 7:59 PM)
    } else {
        return $Greetings[4]; // Good night (8:00 PM - 4:59 AM)
    }

}

function fetchAdminData($ID)
{
    global $conn;

    // Get data from database
    $sql = "SELECT * FROM tbl_admin WHERE UID = '$ID'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Store data in session
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
        $_SESSION['GlobalAccCreated'] = $row['account_Created'];
        $_SESSION['GlobalSecQue'] = $row['security_Question'];

        // Update status in tbl_accounts
        $sql = "UPDATE tbl_accounts SET status = 1 WHERE UID = '$ID'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            // Update last_login in tbl_admin
            $sql = "UPDATE tbl_admin SET last_login = '" . date('Y-m-d H:i:s') . "' WHERE UID = '$ID'";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                $_SESSION['message'] = Greetings() . ", " . $_SESSION['GlobalName'] . "! Welcome to the Administrative Dashboard.";
                $_SESSION['icon'] = "info";
                $_SESSION['Show'] = true;
                $_SESSION['DatahasbeenFetched'] = true;
                echo "<script>console.log('" . $_SESSION['GlobalName'] . "');</script>";
                header("Location: ../Admin/AdminDashboard.php");
                exit;
            }
        }

        // If any error occurs during the process
        $_SESSION['message'] = "We encountered an error while logging you in, please try again later.";
        $_SESSION['icon'] = "error";
        $_SESSION['Show'] = true;
        $_SESSION['DatahasbeenFetched'] = null;
        logMessage("Error", "Authentication", "The file Authentication was accessed by " . $_SESSION['GlobalName'] . ".");
        header("Location: ../Login.php");
        exit;
    }
}


function fetchModeratorData($ID)
{
    global $conn;

    $sql = "SELECT * FROM tbl_admin WHERE UID = '$ID'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Store data in session
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
        $_SESSION['GlobalAccCreated'] = $row['account_Created'];

        // Update status in tbl_accounts
        $sql = "UPDATE tbl_accounts SET status = 1 WHERE UID = '$ID'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            // Update last_login in tbl_admin
            $sql = "UPDATE tbl_admin SET last_login = NOW() WHERE UID = '$ID'";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                $_SESSION['message'] = Greetings() . ", " . $_SESSION['GlobalName'] . "! Welcome to your dashboard.";
                $_SESSION['icon'] = "info";
                $_SESSION['Show'] = true;
                $_SESSION['DatahasbeenFetched'] = true;
                echo "<script>console.log('" . $_SESSION['GlobalName'] . "');</script>";
                header("Location: ../Admin/AdminDashboard.php");
                exit;
            }
        }

        // If any error occurs during the process
        $_SESSION['message'] = "We encountered an error while logging you in, please try again later.";
        $_SESSION['icon'] = "error";
        $_SESSION['Show'] = true;
        $_SESSION['DatahasbeenFetched'] = null;
        logMessage("Error", "Authentication", "The file Authentication was accessed by " . $_SESSION['GlobalName'] . ".");
        header("Location: ../Login.php");
        exit;
    }


}

function fetchUserData($ID)
{
    global $conn;

    $sql = "SELECT * FROM tbl_trainee WHERE UID = '$ID'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        $_SESSION['GlobalID'] = $row['UID'];
        $_SESSION['GlobalName'] = $row['name'];
        $_SESSION['GlobalUsername'] = $row['trainee_uname'];
        $_SESSION['GlobalPassword'] = $row['trainee_pword'];
        $_SESSION['GlobalBirthdate'] = $row['birthdate'];
        $_SESSION['GlobalAge'] = $row['age'];
        $_SESSION['GlobalEmail'] = $row['email'];
        $_SESSION['GlobalDept'] = $row['department'];
        $_SESSION['GlobalStatus'] = $row['status'];
        $_SESSION['GlobalRole'] = $row['role'];
        $_SESSION['GlobalAccCreated'] = $row['account_Created'];
        $_SESSION['GlobalProfileCompleted'] = $row['profile_Completed'];
        $_SESSION['GlobalVaccinated'] = $row['vaccine_Completed'];
        $_SESSION['Profile'] = $row['image'];
        $_SESSION['GlobalGender'] = $row['gender'];
        $_SESSION['GlobalPhone'] = $row['phone'];
        $_SESSION['GlobalProgram'] = $row['program'];
        $_SESSION['GlobalCourse'] = $row['course'];
        $_SESSION['P_duration'] = $row['prog_duration'];
        $_SESSION['Fulfilled'] = $row['fulfilled_time'];
        $_SESSION['GlobalCompleted'] = $row['completed'];
        $_SESSION['GlobalEvaluated'] = $row['evaluated'];
        $_SESSION['GlobalAddress'] = $row['address'];
        $_SESSION['GlobalCity'] = $row['city'];
        $_SESSION['GlobalZip'] = $row['postal_code'];
        $_SESSION['GlobalProvince'] = $row['province'];
        $_SESSION['GlobalJoin_an_Event'] = $row['Join_an_Event'];
        $_SESSION['GlobalEventID'] = $row['EventID'];
        $_SESSION['GlobalSecQue'] = $row['security_Question'];

        $course = explode("-", $_SESSION['GlobalCourse']);
        $endtext = $course[1];

        $year = substr($endtext, 0, 1);
        $section = substr($endtext, 1, 1);

        switch ($year) {
            case '1':
                $_SESSION['GlobalYear'] = 1;
                break;
            case '2':
                $_SESSION['GlobalYear'] = 2;
                break;
            case '3':
                $_SESSION['GlobalYear'] = 3;
                break;
            case '4':
                $_SESSION['GlobalYear'] = 4;
                break;
            default:
                $_SESSION['GlobalYear'] = $year;
        }

        $_SESSION['GlobalSection'] = $section;

        $sql = "UPDATE tbl_accounts SET status = 1 WHERE UID = '$ID'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            if ($_SESSION['GlobalProfileCompleted'] == 'false') {
                $_SESSION['message'] = "Before you can proceed to your dashboard, you need to complete your profile first.";
                $_SESSION['icon'] = "info";
                $_SESSION['Show'] = true;
                $_SESSION['DatahasbeenFetched'] = true;
                header("Location: ../User/UserProfile.php");
                exit;
            } else {
                $_SESSION['message'] = Greetings() . ", " . $_SESSION['GlobalName'] . "! Welcome to your dashboard.";
                $_SESSION['icon'] = "success";
                $_SESSION['Show'] = true;
                $_SESSION['DatahasbeenFetched'] = true;
                header("Location: ../User/UserDashboard.php");
                exit;
            }
        }
    }

    // If any error occurs during the process
    $_SESSION['message'] = "We encountered an error while logging you in, please try again later.";
    $_SESSION['icon'] = "error";
    $_SESSION['Show'] = true;
    $_SESSION['DatahasbeenFetched'] = null;
    logMessage("Error", "Authentication", "The file Authentication was accessed by " . $_SESSION['GlobalName'] . ".");
    header("Location: ../Login.php");
    exit;
}


// Path: Components\Authentication.php
?>