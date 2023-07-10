<?php

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

function Doc1_upload(){
    global $conn;
    $ParentFolder = $_SESSION['GlobalUsername'] . "_Credentials";
    $DocumentFolder = $_SESSION['GlobalUsername'] . "_Documents";
    $folderpath = '../../uploads/' . $ParentFolder . '/' . $DocumentFolder;
    $tempfolderpath = '../../uploads/' . $ParentFolder . '/temp';
    $filename = $_SESSION['GlobalUsername'] . '_Doc1';
    $extensions = ['png', 'jpg', 'jpeg', 'pdf', 'docx', 'doc'];

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

    $taget_dir = "../../uploads/$ParentFolder/$DocumentFolder/";
    $target_file = $taget_dir . basename($_FILES["pl1"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $newfilename = $_SESSION['GlobalUsername'] . "_Resume." . $imageFileType;
    $target_file = $taget_dir . $newfilename;


    //file size validation (3MB)
    if ($_FILES["pl1"]["size"] > 3000000) {
        $_SESSION['message'] = "Sorry, your file is too large.";
        $_SESSION['icon'] = "error";
        $_SESSION['Show'] = true;
    } else if (!in_array($imageFileType, $extensions)) {
        //file type validation
        $_SESSION['message'] = "Sorry, only JPG, JPEG, PNG, PDF, DOC, DOCX files are allowed.";
        $_SESSION['icon'] = "error";
        $_SESSION['Show'] = true;
    } else {
        if (move_uploaded_file($_FILES["pl1"]["tmp_name"], $target_file)) {
            // delete the old image from temp folder
            foreach ($extensions as $extension) {
                $filePath = $tempfolderpath . '/' . $filename . '.' . $extension;
                if (file_exists($filePath)) {
                    unlink($filePath);
                    break;
                }
            }
            $_SESSION['message'] = "The file " . htmlspecialchars(basename($_FILES["pl1"]["name"])) . " has been uploaded.";
            $_SESSION['icon'] = "success";
            $_SESSION['Show'] = true;

            // Insert into database


        } else {
            // Display error message
            $_SESSION['message'] = "Sorry, there was an error uploading your file.";
            $_SESSION['icon'] = "error";
            $_SESSION['Show'] = true;
        }
    }
}




?>