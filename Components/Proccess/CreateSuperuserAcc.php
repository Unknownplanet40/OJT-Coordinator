<?php
session_start();
@include_once("../../Database/config.php");
date_default_timezone_set('Asia/Manila');

print_r($_POST);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ID = $_POST['CreUSN'];
    $FirstName = $_POST['CreFname'];
    $LastName = $_POST['CreLname'];
    $username = $_POST['CreUname'];
    $Email = $_POST['Cremail'];
    $Password = $_POST['CrePword'];
    $ConfirmPassword = $_POST['CreConPword'];
    $department = $_POST['CreDept'];
    $Role = $_POST['CreRole'];
    $name = $FirstName . " " . $LastName;
    $date = date('Y-m-d');

    if ($Role == "administrator") {
        $address = "Location: ../../Admin/ManageAdmin.php";
    } else {
        $address = "Location: ../../Admin/ManageMod.php";
    }

    function RandomCharacter($length)
    {
        $result = '';
        for ($i = 0; $i < $length; $i++) {
            $result .= chr(rand(97, 122));
        }
        return $result;
    }

    $sql = "SELECT * FROM tbl_admin WHERE admin_uname = '$username' OR admin_email = '$Email'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);

    if ($num == 1) {
        if ($row = mysqli_fetch_assoc($result)) {
            if ($row['admin_uname'] == $username) {
                $_SESSION['message'] = "Your Username already exists.";
                $_SESSION['icon'] = "error";
                $_SESSION['Show'] = true;
                header($address);
            } else if ($row['admin_email'] == $Email) {
                $_SESSION['message'] = "Email already in use.";
                $_SESSION['icon'] = "error";
                $_SESSION['Show'] = true;
                header($address);
            }
        } else {
            $_SESSION['message'] = "Details are not found in the database.";
            $_SESSION['icon'] = "error";
            $_SESSION['Show'] = true;
            // for debugging purposes
            echo "<script>console.log('Error in line: " . __LINE__ . "')</script>";
            header($address);
        }
    } else {
        $ParentFolder = $username . "_Credentials"; // folder name
        $folderpath = '../../uploads/' . $ParentFolder; // folder path
        $tempfolderpath = '../../uploads/' . $ParentFolder . '/temp'; // temp folder path
        $filename = $username . '_Profile_' . RandomCharacter(5); // file name
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
        $target_file = $taget_dir . basename($_FILES["CrePic"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $newfilename = $filename . "." . $imageFileType;
        $target_file = $taget_dir . $newfilename;

        if ($_FILES["CrePic"]["size"] > 5000000) {
            $_SESSION['message'] = "Sorry, your file is too large.";
            $_SESSION['icon'] = "error";
            $_SESSION['Show'] = true;
            header($address);
        } else if (!in_array($imageFileType, $extensions)) {
            $_SESSION['message'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $_SESSION['icon'] = "error";
            $_SESSION['Show'] = true;
            header($address);
        } else {
            if ($Password != $ConfirmPassword) {
                $_SESSION['message'] = "Password does not match.";
                $_SESSION['icon'] = "error";
                $_SESSION['Show'] = true;
                header($address);
            } else {
                if (move_uploaded_file($_FILES["CrePic"]["tmp_name"], $target_file)) {
                    
                    $files = glob('../uploads/' . $foldername . '/*'); // get all file names
                    foreach ($files as $file) { // iterate files
                        if (is_file($file)) {
                            if ($file != $target_file) {
                                unlink($file); // delete file
                            }
                        }
                    }
                    //remove the first 3 characters of the path
                    $target_file = substr($target_file, 3);

                    $sql = "INSERT INTO tbl_admin (name, admin_uname, admin_pword, admin_email, department, imagePath, date_created, last_login, role) VALUES ('$name', '$username', '$Password', '$Email', '$department', '$target_file', '$date', NOW(), '$Role')";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        if ($Role == "administrator") {
                            $_SESSION['message'] = "Administrator Account Created Successfully.";
                            $_SESSION['icon'] = "success";
                            $_SESSION['Show'] = true;
                            header($address);
                        } else {
                            $_SESSION['message'] = "Moderator Account Created Successfully.";
                            $_SESSION['icon'] = "success";
                            $_SESSION['Show'] = true;
                            header($address);
                        }
                    } else {
                        $_SESSION['message'] = "Error: " . $sql . "<br>" . mysqli_error($conn);
                        $_SESSION['icon'] = "error";
                        $_SESSION['Show'] = true;
                        echo "<script>console.log('Error in line: " . __LINE__ . "')</script>";
                        header($address);
                    }
                } else {
                    $_SESSION['message'] = "Sorry, there was an error uploading your file.";
                    $_SESSION['icon'] = "error";
                    $_SESSION['Show'] = true;
                    header($address);
                }
            }
        }
    }
}
?>