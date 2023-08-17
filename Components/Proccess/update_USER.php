<?php
session_start();
@include_once("../../Database/config.php");


if($_SERVER["REQUEST_METHOD"] == "POST") {
    $UserID = $_POST['id'];
    $upname = $_POST['upname'];
    $upemail = $_POST['upemail'];
    $upusername = $_POST['upusername'];
    $updepartment = $_POST['updepartment'];
    $upcourse = $_POST['upcourse'];

        print_r($_FILES);
        print_r($_POST);
        echo "if";
        $sql = "UPDATE tbl_trainee SET name='$upname', email='$upemail', trainee_uname='$upusername', department='$updepartment',  course='$upcourse' WHERE UID='$UserID'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $_SESSION['message'] = "Account Updated Successfully.";
            $_SESSION['icon'] = "success";
            $_SESSION['Show'] = true;
            header("location: $_SERVER[HTTP_REFERER]");
        } else {
            $_SESSION['message'] = "Account Update Failed.";
            $_SESSION['icon'] = "success";
            $_SESSION['Show'] = true;
            header("location: $_SERVER[HTTP_REFERER]");
        }
}




?>