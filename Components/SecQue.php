<?php
session_start();
@include_once("../Database/config.php");
date_default_timezone_set('Asia/Manila');


if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $Q1 = $_POST['Q1'];
    $Q2 = $_POST['Q2'];
    $Q3 = $_POST['Q3'];
    $ans1 = $_POST['QInput1'];
    $ans2 = $_POST['QInput2'];
    $ans3 = $_POST['QInput3'];


    // add to one variable separated by ;
    $questions = $Q1 . ";" . $Q2 . ";" . $Q3;
    $answers = $ans1 . ";" . $ans2 . ";" . $ans3;
    $currentDate = date("Y-m-d H:i:s");
    $id = $_SESSION['GlobalID'];



    if ($_SESSION['SecQue'] == true) {
        $sql = "UPDATE tbl_secquestion SET question = '$questions', answer = '$answers', date_updated = '$currentDate' WHERE UID = '$id'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            header("location: ../User/userProfile.php");
        } else {
            $_SESSION['message'] = "We can't process your request right now, Please try again later.";
            $_SESSION['icon'] = "error";
            $_SESSION['Show'] = true;
        }

    } else {
        $sql = "UPDATE tbl_secquestion SET question = '$questions', answer = '$answers', date_submitted = '$currentDate' WHERE UID = '$id'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $sql = "UPDATE tbl_trainee SET security_Question = '1' WHERE UID = '$id'";
            mysqli_query($conn, $sql);
            $_SESSION['GlobalSecQue'] = 1;
            header("location: ../User/userProfile.php");
        } else {
            $_SESSION['message'] = "We can't process your request right now, Please try again later.";
            $_SESSION['icon'] = "error";
            $_SESSION['Show'] = true;
        }
    }
}



?>