<?php
session_start();
@include_once("../../Database/config.php");

function deleteDirectory($path) {
    if (is_dir($path)) {
        $files = glob($path . '/*');
        foreach ($files as $file) {
            is_dir($file) ? deleteDirectory($file) : unlink($file);
        }
        rmdir($path);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $ID = $_GET['ID'];
    $username = $_GET['username'];


    $sql = "DELETE FROM tbl_accounts WHERE UID = '$ID'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $foldername = $username . "_Credentials";
        $path = "../../uploads/" . $foldername;
        $folder = $path;
        if (is_dir($folder)) {
            deleteDirectory($folder);
        }

        $sql = "DELETE FROM tbl_admin WHERE UID = '$ID'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $_SESSION['message'] = "Account has been deleted.";
            $_SESSION['icon'] = "success";
            $_SESSION['Show'] = true;
            header("location: $_SERVER[HTTP_REFERER]");
        } else {
            $_SESSION['message'] = "Account has not been deleted.";
            $_SESSION['icon'] = "error";
            $_SESSION['Show'] = true;
            // for debugging purposes
            echo "<script>console.log('Error in line: " . __LINE__ . "')</script>";
            header("location: $_SERVER[HTTP_REFERER]");
        }
    } else {
        $_SESSION['message'] = "Account has not been deleted.";
        $_SESSION['icon'] = "error";
        $_SESSION['Show'] = true;
        // for debugging purposes
        echo "<script>console.log('Error in line: " . __LINE__ . "')</script>";
        header("location: $_SERVER[HTTP_REFERER]");
    }
} else {
    $_SESSION['message'] = "Error in deleting account.";
    $_SESSION['icon'] = "error";
    $_SESSION['Show'] = true;
    // for debugging purposes
    echo "<script>console.log('Error in line: " . __LINE__ . "')</script>";
    header("location: $_SERVER[HTTP_REFERER]");

}



?>