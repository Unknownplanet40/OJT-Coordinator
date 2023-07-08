<?php
session_start();
@include_once("../../Database/config.php");

if (isset($_SESSION['GlobalRole']) && $_SESSION['GlobalRole'] == "administrator") {
    $address = "../../Admin/ManageAdmin.php";
} else {
    $address = "../../Admin/ManageMod.php";
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['id'];

    $sql = "DELETE FROM tbl_admin WHERE UID = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['message'] = "Account has been deleted!";
        $_SESSION['icon'] = "success";
        $_SESSION['Show'] = true;
        header($address);
    } else {
        $_SESSION['message'] = "Account has not been deleted!";
        $_SESSION['icon'] = "error";
        $_SESSION['Show'] = true;
        header($address);
    }
}





?>