<?php
session_start();
@include_once("../../Database/config.php");
@include_once("../../Components/SystemLog.php");

print_r($_POST);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $address = $_POST['Address'];
    $city = $_POST['city'];
    $zipcode = $_POST['zipcode'];
    $province = $_POST['province'];
    $birth =  date('Y-m-d', strtotime($_POST['birth']));
    $phone = $_POST['phone'];
    $age = $_POST['age'];
    $department = $_POST['department'];
    $gender = $_POST['gender'];
    $yearlevel = $_POST['Yearlevel'];
    $section = $_POST['section'];

    $course = $department . "-" . $yearlevel . $section;

    $ID = $_SESSION['GlobalID'];

    $sql = "UPDATE tbl_trainee SET address = '$address', city = '$city', postal_code = '$zipcode', province = '$province', birthdate = '$birth', phone = '$phone', department = '$department', gender = '$gender', course = '$course' WHERE UID = $ID";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // update session
        $_SESSION['UpdateSeason'] = true;

        // update the profile_Completed column
        $sql = "UPDATE tbl_trainee SET profile_Completed = 'true' WHERE UID = $ID";
        $result = mysqli_query($conn, $sql);

        // print message
        $_SESSION['GlobalProfileCompleted'] = 'true';
        $_SESSION['message'] = "Profile Updated Successfully! You need to re-login to see the changes.";
        $_SESSION['icon'] = "success";
        $_SESSION['Show'] = true;
        header("Location: ../../Components/Authentication.php");
    } else {
        $_SESSION['message'] = "Profile Update Failed! Please try again.";
        $_SESSION['icon'] = "error";
        $_SESSION['Show'] = true;
        header("Location: ../../User/UserProfile.php");
    }

}


?>