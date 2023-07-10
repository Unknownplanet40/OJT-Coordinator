<?php
session_start();
@include_once("../../Database/config.php");

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $ID = $_GET['ID'];
    $file = $_GET['file'];
    $stat = $_GET['status'];

    switch ($file) {
        case "Doc1":
            $sql = "UPDATE tbl_trainee SET Doc1_stat = '$stat' WHERE UID = $ID";
            break;
        case "Doc2":
            $sql = "UPDATE tbl_trainee SET Doc2_stat = '$stat' WHERE UID = $ID";
            break;
        case "Doc3":
            $sql = "UPDATE tbl_trainee SET Doc3_stat = '$stat' WHERE UID = $ID";
            break;
        case "Doc4":
            $sql = "UPDATE tbl_trainee SET Doc4_stat = '$stat' WHERE UID = $ID";
            break;
        case "Doc5":
            $sql = "UPDATE tbl_trainee SET Doc5_stat = '$stat' WHERE UID = $ID";
            break;
        case "Doc6":
            $sql = "UPDATE tbl_trainee SET Doc6_stat = '$stat' WHERE UID = $ID";
            break;
        case "Doc7":
            $sql = "UPDATE tbl_trainee SET Doc7_stat = '$stat' WHERE UID = $ID";
            break;
        case "Doc8":
            $sql = "UPDATE tbl_trainee SET Doc8_stat = '$stat' WHERE UID = $ID";
            break;
        case "Doc9":
            $sql = "UPDATE tbl_trainee SET Doc9_stat = '$stat' WHERE UID = $ID";
            break;
        case "Doc10":
            $sql = "UPDATE tbl_trainee SET Doc10_stat = '$stat' WHERE UID = $ID";
            break;
        case "Doc11":
            $sql = "UPDATE tbl_trainee SET Doc11_stat = '$stat' WHERE UID = $ID";
            break;
        case "Doc12":
            $sql = "UPDATE tbl_trainee SET Doc12_stat = '$stat' WHERE UID = $ID";
            break;
        case "Doc13":
            $sql = "UPDATE tbl_trainee SET Doc13_stat = '$stat' WHERE UID = $ID";
            break;
    }

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['message'] = "Document has been Approved successfully";
        $_SESSION['icon'] = "success";
        $_SESSION['Show'] = true;
        header("Location: ../../Components/Resources.php?id=$ID");
    } else {
        $_SESSION['message'] = "Error: " . $sql . "<br>" . mysqli_error($conn);
        $_SESSION['icon'] = "error";
        $_SESSION['Show'] = true;
        header("Location: ../../Components/Resources.php?id=$ID");
    }
}



?>