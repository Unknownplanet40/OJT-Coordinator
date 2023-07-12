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

    if ($id == $_SESSION['GlobalID']) {
        $_SESSION['message'] = "You cannot delete your own account!";
        $_SESSION['icon'] = "info";
        $_SESSION['Show'] = true;
        header("Location: $address");
    } elseif ($_SESSION['GlobalStatus'] = 1 ) {
        $_SESSION['message'] = "Signed in account cannot be deleted!";
        $_SESSION['icon'] = "info";
        $_SESSION['Show'] = true;
        header("Location: $address");
    } else {
        $sql = "SELECT username FROM tbl_accounts WHERE UID = '$id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $username = $row['username'];

        if ($result) {
            $sql = "DELETE FROM tbl_admin WHERE UID = '$id'";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                $sql = "DELETE FROM tbl_accounts WHERE UID = '$id'";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    //delete folder of user
                    $folderPath = "../../uploads/' . $username . '_Credentials";

                    if (file_exists($folderPath)) {
                        $files = glob($folderPath . '/*');
                        foreach ($files as $file) {
                            if (is_file($file)) {
                                unlink($file);
                            }
                        }
                        rmdir($folderPath);
                    }

                    $_SESSION['message'] = "Account has been deleted!";
                    $_SESSION['icon'] = "success";
                    $_SESSION['Show'] = true;
                    header("Location: $address");
                } else {
                    $_SESSION['message'] = "Account has not been deleted!";
                    $_SESSION['icon'] = "error";
                    $_SESSION['Show'] = true;
                    header("Location: $address");
                }
            } else {
                $_SESSION['message'] = "Account has not been deleted!";
                $_SESSION['icon'] = "error";
                $_SESSION['Show'] = true;
                header("Location: $address");
            }
        }
    }
}





?>