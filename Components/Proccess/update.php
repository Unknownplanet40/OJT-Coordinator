<?php
session_start();
@include_once("../../Database/config.php");


if($_SERVER["REQUEST_METHOD"] == "POST") {
    $UserID = $_POST['id'];
    $upname = $_POST['upname'];
    $upemail = $_POST['upemail'];
    $upusername = $_POST['upusername'];
    $uppassword = $_POST['uppassword'];
    $updepartment = $_POST['updepartment'];
    $upposition = $_POST['upposition'];
    $upimage = $_POST['upimage'];

    if (empty($upimage)) {
        print_r($_FILES);
        print_r($_POST);
        echo "if";
        $sql = "UPDATE tbl_admin SET name='$upname', admin_email='$upemail', admin_uname='$upusername', admin_pword='$uppassword', department='$updepartment', role='$upposition' WHERE UID='$UserID'";
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
    } else {
        print_r($_FILES);
        print_r($_POST);
        echo "else";


        /* $sql = "SELECT * FROM tbl_admin WHERE UID='$UserID'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $ParentFolder = $row['admin_uname'] . "_Credentials"; // folder name
            $folderpath = '../../uploads/' . $ParentFolder; // folder path
            $tempfolderpath = '../../uploads/' . $ParentFolder . '/temp'; // temp folder path
            $filename = $username . '_Profile_' . RandomCharacter(5); // file name
            $old_image = $row['imagePath']; // old image name
            $extensions = ['png', 'jpg', 'jpeg', 'gif']; // allowed extensions

            if (!file_exists($folderpath)) {
                mkdir($folderpath, 0777, true);
            } else if (!file_exists($tempfolderpath)) {
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

            $taget_dir = "../../uploads/$ParentFolder/";
            $target_file = $taget_dir . basename($_FILES["upimage"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $newfilename = $filename . "." . $imageFileType;
            $target_file = $taget_dir . $newfilename;

            if (file_exists($target_file)) {
                $error[] = "Sorry, file already exists.";
            } else if ($_FILES["upimagec"]["size"] > 5000000) {
                $error[] = "Sorry, your file is too large.";
            } // if not an image
            else if (
                $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif"
            ) {
                $error[] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            } else {
                if (move_uploaded_file($_FILES["upimage"]["tmp_name"], $target_file)) {
                    $sql = "UPDATE tbl_admin SET name='$upname', admin_email='$upemail', admin_uname='$upusername', admin_pword='$uppassword', department='$updepartment', role='$upposition', imagePath='$newfilename' WHERE UID='$UserID'";
                    $result = mysqli_query($conn, $sql);

                    if ($result) {
                        $_SESSION['message'] = "Account Updated Successfully.";
                        $_SESSION['icon'] = "success";
                        $_SESSION['Show'] = true;
                    } else {
                        $error = "Account Update Failed.";
                    }
                } else {
                    $error[] = "Sorry, there was an error uploading your file.";
                }
            }
        } */
    }
}




?>