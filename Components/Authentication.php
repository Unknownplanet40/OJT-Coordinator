<?php
session_start();
@include_once("../Database/config.php");
@include_once("../Components/SystemLog.php");

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
            } elseif ($row['password'] != $password){
                $_SESSION['message'] = "You have entered an invalid password.";
                $_SESSION['icon'] = "error";
                $_SESSION['Show'] = true;
                header("Location: ../Login.php");
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
    else {
        $_SESSION['message'] = "Invalid username or password.";
        $_SESSION['icon'] = "error";
        $_SESSION['Show'] = true;
        header("Location: ../Login.php");
    }
} else {
    $_SESSION['message'] = "Invalid username or password.";
    $_SESSION['icon'] = "error";
    $_SESSION['Show'] = true;
    logMessage("Error", "Authentication", "The file Authentication was accessed without logging in.");
    header("Location: ../Login.php");
}

function Greetings(){
    $Greetings = array( "Good day", "Good morning", "Good afternoon", "Good evening", "Good night");
    $hour = date('h');
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
    // after getting data from database, store it in session and redirect to dashboard

    $sql = "SELECT * FROM tbl_admin WHERE UID = '$ID'";
    $result = mysqli_query($conn, $sql);

    while ($result){
        $row = mysqli_fetch_assoc($result);
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


        $sql = "UPDATE tbl_accounts SET status = 1 WHERE UID = '$ID'";
        $result = mysqli_query($conn, $sql);

        if ($result) {

            $sql = "UPDATE tbl_admin SET last_login = NOW() WHERE UID = '$ID'";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                $_SESSION['message'] = Greetings() .", " . $_SESSION['GlobalName'] . "! Welcome to the Administrative Dashboard.";
            $_SESSION['icon'] = "info";
            $_SESSION['Show'] = true;
            $_SESSION['DatahasbeenFetched'] = true;
            echo "<script>console.log('".$_SESSION['GlobalName']."');</script>";
            header("Location: ../Admin/AdminDashboard.php");
            } else {
                $_SESSION['message'] = "We incountered an error while logging you in, please try again later.";
                $_SESSION['icon'] = "error";
                $_SESSION['Show'] = true;
                $_SESSION['DatahasbeenFetched'] = null;
                logMessage("Error", "Authentication", "The file Authentication was accessed by " . $_SESSION['GlobalName'] . ".");
                header("Location: ../Login.php");
            }
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

    echo "for moderator <br>";
}

function fetchUserData($ID)
{
    global $conn;

    $sql = "SELECT * FROM tbl_trainee WHERE UID = '$ID'";
    $result = mysqli_query($conn, $sql);
    
    while ($result){
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

        // course = BSIT - 2B
        // Department = BSIT
        // year = 2
        // Section = B

        // get the year and section from the course by splitting it after the dash
        $course = explode("-", $_SESSION['GlobalCourse']);
        $endtext = $course[1];

        // get the year and section by splitting it after the first character
        $year = substr($endtext, 0, 1);
        $section = substr($endtext, 1, 1);

        if ($year == '1'){
            $_SESSION['GlobalYear'] = "1st Year";
        } else if ($year == '2'){
            $_SESSION['GlobalYear'] = "2nd Year";
        } else if ($year == '3'){
            $_SESSION['GlobalYear'] = "3rd Year";
        } else if ($year == '4'){
            $_SESSION['GlobalYear'] = "4th Year";
        } else {
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
            } else{
                $_SESSION['message'] = Greetings() .", " . $_SESSION['GlobalName'] . "! Welcome to your dashboard.";
                $_SESSION['icon'] = "success";
                $_SESSION['Show'] = true;
                $_SESSION['DatahasbeenFetched'] = true;
                header("Location: ../User/UserDashboard.php");
            }
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

// Path: Components\Authentication.php
?>