<?php

function ProfileUpload()
{
    global $conn;
    // $username = "caps"; //get the username (change this to the actual username using session)
    $username = $_SESSION['GlobalUsername'];
    $foldername = $username . "_Credentials"; //create a folder for the user's credentials
    $path = '../uploads/' . $foldername . '/' . $username . '_Profile'; //this is the path of the profile picture
    $extensions = ['png', 'jpg', 'jpeg', 'gif']; //these are the extensions of the profile picture

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!file_exists('../uploads/' . $foldername)) { //if the folder does not exist
            mkdir('../uploads/' . $foldername, 0777, true); //create the uploads folder
            mkdir('../uploads/' . $foldername . '/temp', 0777, true); //create the temp folder inside the uploads folder
        }

        // copy old profile picture to temp folder
        foreach ($extensions as $extension) {
            $filePath = $path . '.' . $extension;
            if (file_exists($filePath)) {
                //$tempPath = '../uploads/' . $foldername . '\/temp/' . $username . '_Profile.' . $extension;
                $tempPath = "../uploads/$foldername/temp/$username" . "_Profile.$extension";
                echo "<script>console.log('Debug Objects: " . $tempPath . "' );</script>";
                copy($filePath, $tempPath);
                break;
            }
        }

        // delete the old profile picture
        foreach ($extensions as $extension) {
            $filePath = $path . '.' . $extension;
            if (file_exists($filePath)) {
                unlink($filePath);
                break;
            }
        }

        $target_dir = "../uploads/$foldername/"; // this is the folder where you will keep the files
        $target_file = $target_dir . basename($_FILES["Profile"]["name"]); // this is the actual file
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); //store what type of file the image is (png, jpg, etc)
        $newfilename = $username . "_Profile." . $imageFileType; // this is the new file name
        $target_file = $target_dir . $newfilename; // this is the new file path

        if (empty($_FILES["Profile"]["name"])) { //if the file is empty
            // Move the old profile picture to the original folder
            foreach ($extensions as $extension) {
                $filePath = $path . '.' . $extension;
                //$tempPath = '../uploads/' . $foldername . '\/temp/' . $username . '_Profile.' . $extension;
                $tempPath = "../uploads/$foldername/temp/$username" . "_Profile.$extension";
                if (file_exists($tempPath)) {
                    copy($tempPath, $filePath);
                    unlink($tempPath);
                    break;
                }
            }
            // Display error message
            $_SESSION['message'] = "Please upload a file.";
            $_SESSION['icon'] = "error";
            $_SESSION['Show'] = true;
        } else if (file_exists($target_file)) { //if the file already exists
            // same din dito
            foreach ($extensions as $extension) {
                $filePath = $path . '.' . $extension;
                //$tempPath = '../uploads/' . $foldername . '\/temp/' . $username . '_Profile.' . $extension;
                $tempPath = "../uploads/$foldername/temp/$username" . "_Profile.$extension";
                if (file_exists($tempPath)) {
                    copy($tempPath, $filePath);
                    unlink($tempPath);
                    break;
                }
            }
            // Display error message
            $_SESSION['message'] = "Sorry, file already exists.";
            $_SESSION['icon'] = "error";
            $_SESSION['Show'] = true;
        } else if ($_FILES["Profile"]["size"] > 3000000) { //if the file is larger than 3mb
            // ito rin
            foreach ($extensions as $extension) {
                $filePath = $path . '.' . $extension;
                //$tempPath = '../uploads/' . $foldername . '\/temp/' . $username . '_Profile.' . $extension;
                $tempPath = "../uploads/$foldername/temp/$username" . "_Profile.$extension";
                if (file_exists($tempPath)) {
                    copy($tempPath, $filePath);
                    unlink($tempPath);
                    break;
                }
            }
            // Display error message
            $_SESSION['message'] = "Sorry, your file " . htmlspecialchars(basename($_FILES["Profile"]["name"])) . " is too large.";
            $_SESSION['icon'] = "error";
            $_SESSION['Show'] = true;
        } else if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") { //if the file is not a png, jpg, jpeg, or gif
            // and ito rin
            foreach ($extensions as $extension) {
                $filePath = $path . '.' . $extension;
                //$tempPath = '../uploads/' . $foldername . '\/temp/' . $username . '_Profile.' . $extension;
                $tempPath = "../uploads/$foldername/temp/$username" . "_Profile.$extension";
                if (file_exists($tempPath)) {
                    copy($tempPath, $filePath);
                    unlink($tempPath);
                    break;
                }
            }
            // Display error message
            $_SESSION['message'] = "Sorry, only JPG, JPEG, PNG, & GIF files are allowed.";
            $_SESSION['icon'] = "error";
            $_SESSION['Show'] = true;
        } else { //if the file is good
            if (move_uploaded_file($_FILES["Profile"]["tmp_name"], $target_file)) {
                // delete the temp profile picture in the temp folder
                foreach ($extensions as $extension) {
                    $tempPath = "../uploads/$foldername/temp/$username" . "_Profile.$extension";
                    //$tempPath = '../uploads/' . $foldername . '\/temp/' . $username . '_Profile.' . $extension;
                    if (file_exists($tempPath)) {
                        unlink($tempPath);
                        break;
                    }
                }
                //update the database here (use the $target_file variable)

                // role based
                if ($_SESSION['GlobalRole'] == 'administrator' || $_SESSION['GlobalRole'] == 'moderator') {
                    $sql = "UPDATE tbl_admin SET imagePath = '$target_file' WHERE UID = '$_SESSION[GlobalID]'";
                } else  {
                    $sql = "UPDATE tbl_trainee SET image = '$target_file' WHERE UID = '$_SESSION[GlobalID]'";
                }
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    $_SESSION['Profile'] = $target_file;
                    $_SESSION['message'] = "Congratulations! The file " . htmlspecialchars(basename($_FILES["Profile"]["name"])) . " has been uploaded.";
                    $_SESSION['icon'] = "success";
                    $_SESSION['Show'] = true;
                } else {
                    $_SESSION['message'] = "We incountered an error while uploading your profile picture, please try again later.";
                    $_SESSION['icon'] = "error";
                    $_SESSION['Show'] = true;
                }


            } else {
                $_SESSION['message'] = "Sorry, there was an error uploading your file.";
                $_SESSION['icon'] = "error";
                $_SESSION['Show'] = true;
            }
        }
    }
    // basta ganyan lang yung code tatawagin mo lang yung function na to pag nag upload ng profile image
}

function pl1upload()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //create uploads folder in OJT-Coordinator folder
        if (!file_exists('uploads')) {
            mkdir('uploads', 0777, true);
        }
        $username = "test";
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["pl1"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $newfilename = $username . "_pl1." . $imageFileType;
        $target_file = $target_dir . $newfilename;

        //if empty
        if (empty($_FILES["pl1"]["name"])) {
            $_SESSION['message'] = "Please upload a file.";
            $_SESSION['icon'] = "error";
            $_SESSION['Show'] = true;
        } else if (file_exists($target_file)) {
            $_SESSION['message'] = "Sorry, file already exists.";
            $_SESSION['icon'] = "error";
            $_SESSION['Show'] = true;
        } else if ($_FILES["pl1"]["size"] > 3000000) {
            $_SESSION['message'] = "Sorry, your file is too large.";
            $_SESSION['icon'] = "error";
            $_SESSION['Show'] = true;
        } else if (
            $imageFileType != "pdf" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        ) {
            $_SESSION['message'] = "Sorry, only PDF, JPG, JPEG, & PNG files are allowed.";
            $_SESSION['icon'] = "error";
            $_SESSION['Show'] = true;
        } else {
            if (move_uploaded_file($_FILES["pl1"]["tmp_name"], $target_file)) {
                $_SESSION['message'] = "The file " . htmlspecialchars(basename($_FILES["pl1"]["name"])) . " has been uploaded.";
                $_SESSION['icon'] = "success";
                $_SESSION['Show'] = true;
                // database code here

            } else {
                $_SESSION['message'] = "Sorry, there was an error uploading your file.";
                $_SESSION['icon'] = "error";
                $_SESSION['Show'] = true;
            }
        }
    }
}


?>