<?php
session_start();
@include_once("../../Database/config.php");

echo print_r($_POST);

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $postedby = $_POST['Posted'];
    $AnnounceTitle = $_POST['AnnounceTitle'];
    $AnnounceDesc = $_POST['AnnounceDescription'];
    $AnnounceDate = $_POST['startDate'];
    $AnnounceComp = $_POST['EndDate'];

    $sql = "UPDATE tbl_announcement SET Title='$AnnounceTitle', Description='$AnnounceDesc', DateAdded='$AnnounceDate', DateEnd='$AnnounceComp', isEnded = 0, PostedBy='$postedby' WHERE ID=1";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['message'] = "Announcement Updated Successfully.";
        $_SESSION['icon'] = "success";
        $_SESSION['Show'] = true;
        header("location: $_SERVER[HTTP_REFERER]");
    } else {
        $_SESSION['message'] = "Announcement Update Failed.";
        $_SESSION['icon'] = "error";
        $_SESSION['Show'] = true;
        header("location: $_SERVER[HTTP_REFERER]");
    }

}

?>