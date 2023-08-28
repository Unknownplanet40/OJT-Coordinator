<?php
session_start();
@include_once("../../Database/config.php");

function clearFolder($folderPath)
{
    $files = glob($folderPath . '/*'); // Get all files in the folder

    foreach ($files as $file) {
        if (is_file($file)) {
            unlink($file); // Remove each file
        }
    }
}

function randomString($n)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $str = '';
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $str .= $characters[$index];
    }
    return $str;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $UserID = $_POST['id'];
    $upname = $_POST['upname'];
    $upemail = $_POST['upemail'];
    $upusername = $_POST['upusername'];
    $uppassword = $_POST['uppassword'];
    $updepartment = $_POST['updepartment'];
    $upposition = $_POST['upposition'];
    $tempPass = $_SESSION['GlobalPassword'];


    $sql = "SELECT * FROM tbl_admin WHERE UID='$UserID'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $username = $row['admin_uname'];


    if (isset($_FILES['upimage']['name']) && $_FILES['upimage']['name'] == "") {
        print_r($_FILES);
        print_r($_POST);
        echo "No Image";
        $sql = "UPDATE tbl_admin SET name='$upname', admin_email='$upemail', admin_uname='$upusername', admin_pword='$uppassword', department='$updepartment', role='$upposition' WHERE UID='$UserID'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $_SESSION['message'] = "Account Updated Successfully.";
            $_SESSION['icon'] = "success";
            $_SESSION['Show'] = true;
            $_SESSION['isUpdated'] = 'true';
            header("location: $_SERVER[HTTP_REFERER]");
        } else {
            $_SESSION['message'] = "Account Update Failed.";
            $_SESSION['icon'] = "success";
            $_SESSION['Show'] = true;
            header("location: $_SERVER[HTTP_REFERER]");
        }
    } else {
        print_r($_FILES);
        print_r($_POST);
        $parentfolderpath = '../../uploads/' . $username . '_Credentials';
        $folderpath = $parentfolderpath . '/' . 'Profile';
        $tempfolderpath = $parentfolderpath . '/Profile/temp';
        $tempname = $username . '_' . 'Profile';
        $filename = randomString(5) . '_' . $tempname;
        $extensions = ['png', 'jpg', 'jpeg', 'gif'];


        if (!file_exists($parentfolderpath)) {
            mkdir($parentfolderpath, 0777, true);
        }

        if (!file_exists($folderpath)) {
            mkdir($folderpath, 0777, true);
        }

        if (!file_exists($tempfolderpath)) {
            mkdir($tempfolderpath, 0777, true);
        }

        // Copy old image to temp folder (if exists) then delete the old image
        foreach ($extensions as $extension) {
            $filePath = $folderpath . '/' . $filename . '.' . $extension;
            if (file_exists($filePath)) {
                $tempPath = $tempfolderpath . '/' . $filename . '.' . $extension;
                copy($filePath, $tempPath);
                unlink($filePath);
                break;
            }
        }

        $target_dir = $folderpath . '/';
        $target_file = $target_dir . basename($_FILES['upimage']['name']);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $newfilename = $filename . '.' . $imageFileType;
        $target_file = $target_dir . $newfilename;

        if ($_FILES['upimage']['size'] > 3000000) {
            $_SESSION['message'] = 'Sorry, your file is too large.';
            $_SESSION['icon'] = 'error';
            $_SESSION['Show'] = true;
        } elseif (!in_array($imageFileType, $extensions)) {
            $_SESSION['message'] = 'Sorry, only JPG, JPEG, PNG, DOCX, and PDF files are allowed.';
            $_SESSION['icon'] = 'error';
            $_SESSION['Show'] = true;
        } else {
            clearFolder($folderpath);
            if (move_uploaded_file($_FILES['upimage']['tmp_name'], $target_file)) {
                $Document = $target_file;
                $Document = substr($Document, 3);
                $sql = "UPDATE tbl_admin SET name='$upname', admin_email='$upemail', admin_uname='$upusername', admin_pword='$uppassword', department='$updepartment', role='$upposition', imagePath='$Document' WHERE UID='$UserID'";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    if ($tempPass != $uppassword) {
                        $sql = "UPDATE tbl_accounts SET password='$uppassword' WHERE UID='$UserID'";
                        mysqli_query($conn, $sql);
                    }
                    $_SESSION['message'] = "Successfully Updated.";
                    $_SESSION['icon'] = "success";
                    $_SESSION['Show'] = true;
                    $_SESSION['isUpdated'] = 'true';
                    header("location: $_SERVER[HTTP_REFERER]");
                } else {
                    $_SESSION['message'] = "Update Failed.";
                    $_SESSION['icon'] = "success";
                    $_SESSION['Show'] = true;
                    header("location: $_SERVER[HTTP_REFERER]");
                }
            }
        }
    }
}




?>