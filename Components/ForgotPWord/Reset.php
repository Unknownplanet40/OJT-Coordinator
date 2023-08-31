<?php
session_start();
@include_once("../../Database/config.php");
@include_once("../PopupAlert.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    print_r($_POST);
    $ID = $_SESSION['FPUID'];
    $PWord = $_POST['PW'];

    $sql = "UPDATE tbl_trainee SET trainee_pword = '" . $PWord . "' WHERE UID = " . $ID;
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $sql = "UPDATE tbl_accounts SET password = '" . $PWord . "' WHERE UID = " . $ID;
        mysqli_query($conn, $sql);

        $_SESSION['message'] = "Password successfully changed.";
        $_SESSION['icon'] = "success";
        $_SESSION['Show'] = true;
    } else {
        $_SESSION['message'] = "Something went wrong.";
        $_SESSION['icon'] = "error";
        $_SESSION['Show'] = true;
    }
}
// unset all session variables that are used for resetting password
unset($_SESSION['FPUID']);
unset($_SESSION['FPQ1']);
unset($_SESSION['FPQ2']);
unset($_SESSION['FPQ3']);
unset($_SESSION['FPA1']);
unset($_SESSION['FPA2']);
unset($_SESSION['FPA3']);
unset($_SESSION['EmailFound']);
unset($_SESSION['Phase1']);

header("Location: ../../Login.php");
?>