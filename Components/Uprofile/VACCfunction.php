<?php
session_start();
@include_once("../../Database/config.php");
@include_once("../../Components/SystemLog.php");

print_r($_POST);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $VaccName = $_POST['vaccineName'];
    $VaccType = $_POST['vaccineType'];
    $VaccDose = $_POST['vaccineDose'];
    $VaccLoc = $_POST['vaccineLocation'];
    $VD1 = $_POST['VD1'];
    $VD2 = $_POST['VD2'];
    $VD3 = $_POST['VD3'];
    $ID = $_SESSION['GlobalID'];


    // image upload
    //if vaccine folder does not exist, inside upload folder create vaccine folder

    $ParentFolder = $_SESSION['GlobalUsername'] . "_Credentials";
    $VaccineFolder = $_SESSION['GlobalUsername'] . "_Vaccine";
    $folderpath = '../../uploads/' . $ParentFolder . '/' . $VaccineFolder;
    $tempfolderpath = '../../uploads/' . $ParentFolder . '/temp';
    $filename = $_SESSION['GlobalUsername'] . '_VaccineImage';
    $extensions = ['png', 'jpg', 'jpeg'];

    if (!file_exists($folderpath)) {
        mkdir($folderpath, 0777, true);
    } else if (!file_exists($tempfolderpath)) {
        mkdir($tempfolderpath, 0777, true);
    }

    // Copy old image to temp folder
    foreach ($extensions as $extension) {
        $filePath = $folderpath . '/' . $filename . '.' . $extension;
        if (file_exists($filePath)) {
            $tempPath = $tempfolderpath . '/' . $filename . '.' . $extension;
            copy($filePath, $tempPath);
            break;
        }
    }

    // delete the old image
    foreach ($extensions as $extension) {
        $filePath = $folderpath . '/' . $filename . '.' . $extension;
        if (file_exists($filePath)) {
            unlink($filePath);
            break;
        }
    }

    $taget_dir = "../../uploads/$ParentFolder/$VaccineFolder/";
    $target_file = $taget_dir . basename($_FILES["vaccineCard"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $newfilename = $_SESSION['GlobalUsername'] . "_VaccineCard." . $imageFileType;
    $target_file = $taget_dir . $newfilename;


    //file size validation (5MB)
    if ($_FILES["vaccineCard"]["size"] > 5000000) {
        $_SESSION['message'] = "Sorry, your file is too large.";
        $_SESSION['icon'] = "error";
        $_SESSION['Show'] = true;
        header("Location: ../../User/UserProfile.php");
    } else if (!in_array($imageFileType, $extensions)) {
        //file type validation
        $_SESSION['message'] = "Sorry, only JPG, JPEG, PNG files are allowed.";
        $_SESSION['icon'] = "error";
        $_SESSION['Show'] = true;
        header("Location: ../../User/UserProfile.php");
    } else {
        if (move_uploaded_file($_FILES["vaccineCard"]["tmp_name"], $target_file)) {
            // delete the old image from temp folder
            foreach ($extensions as $extension) {
                $filePath = $tempfolderpath . '/' . $filename . '.' . $extension;
                if (file_exists($filePath)) {
                    unlink($filePath);
                    break;
                }
            }

            if ($VaccDose == 'one') {
                $VD2 = NULL;
                $VD3 = NULL;
            } else if ($VaccDose == 'two') {
                $VD3 = NULL;
            }
            
            $target_file = substr($target_file, 3);

            if ($_SESSION['GlobalVaccCompleted'] == 1) {
                $sql = "UPDATE tbl_vaccine SET vaccineName = '$VaccName', vaccineType = '$VaccType', vaccineDose = '$VaccDose', vaccineLoc = '$VaccLoc', vaccineImage = '$target_file', VaccDoseOne = '$VD1', VaccDosetwo = '$VD2', VaccDoseBooster = '$VD3' WHERE UID = $ID";
            } else{
                $sql = "INSERT INTO tbl_vaccine (UID, vaccineName, vaccineType, vaccineDose, vaccineLoc, vaccineImage, VaccDoseOne, VaccDosetwo, VaccDoseBooster) VALUES ('$ID', '$VaccName', '$VaccType', '$VaccDose', '$VaccLoc', '$target_file', '$VD1', '$VD2', '$VD3')";
            }
            $result = mysqli_query($conn, $sql);

            if ($result) {
                // update the session variables
                $_SESSION['GlobalVaccName'] = $VaccName;
                $_SESSION['GlobalVaccType'] = $VaccType;
                $_SESSION['GlobalVaccDose'] = $VaccDose;
                $_SESSION['GlobalVaccLoc'] = $VaccLoc;
                $_SESSION['GlobalVaccImage'] = $VaccImage;
                $_SESSION['GlobalVD1'] = $VD1;
                $_SESSION['GlobalVD2'] = $VD2;
                $_SESSION['GlobalVD3'] = $VD3;

                // update the profile_Completed column
                $sql = "UPDATE tbl_trainee SET vaccine_Completed = 1 WHERE UID = $ID";
                $result = mysqli_query($conn, $sql);

                // print message
                $_SESSION['GlobalVaccCompleted'] = 1;
                $_SESSION['message'] = "Vaccination Details Updated Successfully! You need to re-login to see the changes.";
                $_SESSION['icon'] = "success";
                $_SESSION['Show'] = true;
                header("Location: ../../User/UserProfile.php");
            } else {
                $_SESSION['message'] = "Vaccination Details Update Failed! Please try again.";
                $_SESSION['icon'] = "error";
                $_SESSION['Show'] = true;
                header("Location: ../../User/UserProfile.php");
            }
        } else {
            // Display error message
            $_SESSION['message'] = "Sorry, there was an error uploading your file.";
            $_SESSION['icon'] = "error";
            $_SESSION['Show'] = true;
            header("Location: ../../User/UserProfile.php");
        }
    }
}