<?php

function ProfileUpload()
{
    global $conn;
    $username = $_SESSION['GlobalUsername'];
    $foldername = $username . "_Credentials"; //create a folder for the user's credentials
    $path = '../uploads/' . $foldername . '/' . $username . '_Profile'; //this is the path of the profile picture
    $extensions = ['png', 'jpg', 'jpeg', 'gif']; //these are the extensions of the profile picture

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!file_exists('../uploads/' . $foldername)) { //if the folder does not exist
            mkdir('../uploads/' . $foldername, 0777, true); //create the uploads folder
            mkdir('../uploads/' . $foldername . '/temp', 0777, true); //create the temp folder inside the uploads folder
        }

        $target_dir = "../uploads/$foldername/"; // this is the folder where you will keep the files
        $target_file = $target_dir . basename($_FILES["Profile"]["name"]); // this is the actual file
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); //store what type of file the image is (png, jpg, etc)
        //$newfilename = $username . "_Profile." . $imageFileType; // this is the new file name
        $newfilename = $username . "_Profile_" . randomString(5) . "." . $imageFileType; // this is the new file name
        $filenamewithoutextension = $username . "_Profile_" . randomString(5); // this is the new file name
        $target_file = $target_dir . $newfilename; // this is the new file path
        $_SESSION['tempProfile'] = $filenamewithoutextension; // store the new file path in a session variable

        if (empty($_FILES["Profile"]["name"])) { //if the file is empty
            // Display error message
            $_SESSION['message'] = "Please upload a file.";
            $_SESSION['icon'] = "error";
            $_SESSION['Show'] = true;
        } else if (file_exists($target_file)) { //if the file already exists
            // Display error message
            $_SESSION['message'] = "Sorry, file already exists.";
            $_SESSION['icon'] = "error";
            $_SESSION['Show'] = true;
        } else if ($_FILES["Profile"]["size"] > 3000000) { //if the file is larger than 3mb
            // Display error message
            $_SESSION['message'] = "Sorry, your file " . htmlspecialchars(basename($_FILES["Profile"]["name"])) . " is too large.";
            $_SESSION['icon'] = "error";
            $_SESSION['Show'] = true;
        } else if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") { //if the file is not a png, jpg, jpeg, or gif
            // Display error message
            $_SESSION['message'] = "Sorry, only JPG, JPEG, PNG, & GIF files are allowed.";
            $_SESSION['icon'] = "error";
            $_SESSION['Show'] = true;
        } else { //if the file is good
            if (move_uploaded_file($_FILES["Profile"]["tmp_name"], $target_file)) {

                // check if their are any image other the image file named $target_file
                $files = glob('../uploads/' . $foldername . '/*'); // get all file names
                foreach ($files as $file) { // iterate files
                    if (is_file($file)) {
                        if ($file != $target_file) {
                            unlink($file); // delete file
                        }
                    }
                }

                unset($_SESSION['Profile']);

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
                    unset($_SESSION['tempProfile']);
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
}

// random 5 string generator for image name
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




?>