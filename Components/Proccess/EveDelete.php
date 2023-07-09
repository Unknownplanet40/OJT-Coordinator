<?php
session_start();
@include_once("../../Database/config.php");




if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET['id'];

    $sql = "SELECT * FROM tbl_events WHERE eventID = '$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $title = $row['eventTitle'];
    $foldername = $title . '_Event';

    if ($result) {
        $sql = "DELETE FROM tbl_events WHERE eventID = '$id'";
        $result = mysqli_query($conn, $sql);
        if ($result) {

            $path = "../../uploads/$foldername";

            if (file_exists($path)) {
                // Check if the folder contains any subfolders
                $subfolders = glob($path . '/*', GLOB_ONLYDIR);

                // Delete subfolders and their contents
                foreach ($subfolders as $subfolder) {
                    $subfiles = glob($subfolder . '/*');
                    foreach ($subfiles as $subfile) {
                        if (is_file($subfile)) {
                            unlink($subfile);
                        }
                    }
                    rmdir($subfolder);
                }

                // Delete the main folder and its contents
                $files = glob($path . '/*');
                foreach ($files as $file) {
                    if (is_file($file)) {
                        unlink($file);
                    }
                }
                rmdir($path);
            }

            $_SESSION['message'] = "Event Deleted Successfully";
            $_SESSION['icon'] = "info";
            $_SESSION['Show'] = true;
            header("location: ../../Admin/AdminEvents.php");
        } else {
            $_SESSION['message'] = "Their was an error deleting the event";
            $_SESSION['icon'] = "error";
            $_SESSION['Show'] = true;
            header("Location: ../../Components/Proccess/EventUpdate.php?id=$id");
        }
    } else {
        $_SESSION['message'] = "Their was an error deleting the event";
        $_SESSION['icon'] = "error";
        $_SESSION['Show'] = true;
        header("Location: ../../Components/Proccess/EventUpdate.php?id=$id");
    }
}



?>