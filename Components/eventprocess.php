<?php
session_start();
@include_once("../Database/config.php");
//$EventID = $_GET['EventID'];

if($_SERVER["REQUEST_METHOD"] == "GET") {
    $ID = $_GET['ID'];
    $CurrentUser = $_SESSION['GlobalID'];

    $sql = "SELECT eventSlots FROM tbl_events WHERE eventID = '$ID'";
    $result = mysqli_query($conn, $sql);

    if($result){
        $row = mysqli_fetch_assoc($result);
        $eventslot = $row['eventSlots'];

        $sql = "UPDATE tbl_events SET eventSlots = '$eventslot' - 1 WHERE eventID = '$ID'";
        $result = mysqli_query($conn, $sql);

        if($result){
            $sql = "UPDATE tbl_trainee SET Join_an_Event = 1, EventID = '$ID' WHERE UID = '$CurrentUser'";
            $result = mysqli_query($conn, $sql);

            if($result){
                $_SESSION['message'] = "Register Successful";
                $_SESSION['icon'] = "success";
                $_SESSION['Show'] = true;
                $_SESSION['GlobalJoin_an_Event'] = 1;
                $_SESSION['GlobalEventID'] = $ID;
                header("Location: ../User/UserDashboard.php");
            }else {
                $_SESSION['message'] = "Can\'t proceed, Please try again later!";
                $_SESSION['icon'] = "error";
                $_SESSION['Show'] = true;
                header("Location: ../User/UserDashboard.php");
            }
        }else {
            $_SESSION['message'] = "Can\'t proceed, Please try again later!";
            $_SESSION['icon'] = "error";
            $_SESSION['Show'] = true;
            header("Location: ../User/UserDashboard.php");
        }
    } else {
        $_SESSION['message'] = "Can\'t join Even, Try again later.";
        $_SESSION['icon'] = "error";
        $_SESSION['Show'] = true;
        header("Location: ../User/UserDashboard.php");
    }
}
?>