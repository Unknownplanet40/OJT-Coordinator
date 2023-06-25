<?php
session_start();
@include_once("../../Database/config.php");
@include_once("../../Components/SystemLog.php");

print_r($_POST);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $email = $_POST['pword'];
    $address = $_POST['Address'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $mail = $_POST['email'];
    $phone = $_POST['phone'];
    $birth =  date('Y-m-d', strtotime($_POST['birth']));
    $gender  = $_POST[$_POST['phone']];
    $age = $_POST['age'];

    $ID = $_SESSION['GlobalID'];

    $sql = "UPDATE tbl_trainee SET name = '$name', email = '$email', address = '$address', city = '$city', province = '$province', phone = '$phone', birthdate = '$birth', gender = '$gender', age = '$age' WHERE UID = $ID";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // update the session variables
        $_SESSION['GlobalName'] = $name;
        $_SESSION['GlobalCity'] = $city;
        $_SESSION['GlobalZip'] = $zipcode;
        $_SESSION['GlobalProvince'] = $province;
        $_SESSION['GlobalBirthdate'] = $birth;
        $_SESSION['GlobalPhone'] = $phone;
        $_SESSION['GlobalGender'] = $gender;
        $_SESSION['GlobalAge'] = $age;
        $_SESSION['GlobalAddress'] = $address;
        $_SESSION['GlobalEmail'] = $mail;


        // update the profile_Completed column
        $sql = "UPDATE tbl_trainee SET profile_Completed = 'true' WHERE UID = $ID";
        $result = mysqli_query($conn, $sql);

        // print message
        $_SESSION['GlobalProfileCompleted'] = 'true';
        $_SESSION['message'] = "Profile Updated Successfully! You need to re-login to see the changes.";
        $_SESSION['icon'] = "success";
        $_SESSION['Show'] = true;
        header("Location: ../../User/UserProfile.php");
    } else {
        $_SESSION['message'] = "Profile Update Failed! Please try again.";
        $_SESSION['icon'] = "error";
        $_SESSION['Show'] = true;
        header("Location: ../../User/UserProfile.php");
    }

}


?>