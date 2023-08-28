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

function clearFolder($folderPath)
{
    $files = glob($folderPath . '/*'); // Get all files in the folder

    foreach ($files as $file) {
        if (is_file($file)) {
            unlink($file); // Remove each file
        }
    }
}

function Document_upload($DocumentType, $FromInput, $Column, $Column_Date, $Col_Stat)
{
    global $conn;

    $parentfolderpath = '../uploads/' . $_SESSION['GlobalUsername'] . '_Credentials';
    $folderpath = $parentfolderpath .'/'. $DocumentType;
    $tempfolderpath = $parentfolderpath .'/'. $DocumentType .'/'. 'temp';
    $tempname = $_SESSION['GlobalUsername'] . '_' . $DocumentType;
    $filename = randomString(5) . '_' . $tempname;
    $extensions = ['png', 'jpg', 'jpeg', 'pdf'];

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
        $filePath = $folderpath .'/'. $filename . '.' . $extension;
        if (file_exists($filePath)) {
            $tempPath = $tempfolderpath .'/'. $filename . '.' . $extension;
            copy($filePath, $tempPath);
            unlink($filePath);
            break;
        }
    }

    $target_dir = $folderpath .'/';
    $target_file = $target_dir . basename($_FILES[$FromInput]['name']);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $newfilename = $filename . '.' . $imageFileType;
    $target_file = $target_dir . $newfilename;

    if ($_FILES[$FromInput]['size'] > 3000000) {
        $_SESSION['message'] = 'Sorry, your file is too large.';
        $_SESSION['icon'] = 'error';
        $_SESSION['Show'] = true;
    } elseif (!in_array($imageFileType, $extensions)) {
        $_SESSION['message'] = 'Sorry, only JPG, JPEG, PNG, DOCX, and PDF files are allowed.';
        $_SESSION['icon'] = 'error';
        $_SESSION['Show'] = true;
    } else {
        clearFolder($folderpath);
        if (move_uploaded_file($_FILES[$FromInput]['tmp_name'], $target_file)) {
            $Document = $target_file;

            $currentDate = date('Y-m-d');
            $sql = "UPDATE tbl_resource SET $Column = '$Document', $Column_Date = '$currentDate', $Col_Stat = 0 WHERE UID = '" . $_SESSION['GlobalID'] . "'";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                // $_SESSION['message'] = 'The file ' . htmlspecialchars(basename($_FILES[$FromInput]['name'])) . ' has been uploaded.';
                // $_SESSION['icon'] = 'success';
                $_SESSION['Show'] = true;
            } else {
                $_SESSION['message'] = 'Sorry, there was an error uploading your file.';
                $_SESSION['icon'] = 'error';
                $_SESSION['Show'] = true;
            }
        } else {
            $_SESSION['message'] = 'Sorry, there was an error uploading your file.';
            $_SESSION['icon'] = 'error';
            $_SESSION['Show'] = true;
        }
    }
}





?>