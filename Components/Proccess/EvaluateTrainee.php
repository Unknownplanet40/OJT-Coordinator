<?php
session_start();
@include_once("../../Database/config.php");
@include_once("../../Components/PopupAlert.php");

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $ID = $_GET['ID'];

    $sql = "SELECT * FROM tbl_trainee WHERE UID = '$ID'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $name = $row['name'];
        $email = $row['email'];
        $trainee_uname = $row['trainee_uname'];
        $evaluated = $row['evaluated'];
    } else {
        $_SESSION['message'] = "Error in line: " . __LINE__ . " in " . __FILE__;
        $_SESSION['icon'] = "error";
        $_SESSION['Show'] = true;
        header("Location:" . $_SERVER['HTTP_REFERER']);
    }

} else {
    $ID = $_SESSION['EvID'];

    $sql = "SELECT * FROM tbl_trainee WHERE UID = '$ID'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $name = $row['name'];
        $email = $row['email'];
        $trainee_uname = $row['trainee_uname'];
    } else {
        $_SESSION['message'] = "Error in line: " . __LINE__ . " in " . __FILE__;
        $_SESSION['icon'] = "error";
        $_SESSION['Show'] = true;
        header("Location:" . $_SERVER['HTTP_REFERER']);
    }
}

$ShowAlert = true;


?>


<!DOCTYPE html>
<html lang="en, fil">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../Style/ImportantImport.css">
    <script src="../../Script/SweetAlert2.js"></script>
    <script defer src="../../Script/Bootstrap_Script/bootstrap.bundle.js"></script>
    <script src="../../Script/jquery-3.5.1.js"></script>
    <title> [Trainee Name] Evaluation </title>
</head>

<body class="dark adminuser">
    <br>
    <div class="container-lg rounded">
        <div class="container-lg">
            <?php 
            if (isset($ShowAlert)) {
                echo NewAlertBox();
                $_SESSION['Show'] = false;
            }
            
            if ($evaluated == "true") {
                echo "<script> Swal.fire({icon: 'error', title: 'Oops...', text: 'This trainee has already been evaluated', footer: '<a href=\"../TraineeList.php\">Go back to Trainee List</a>'}) </script>";
                die();
            } else {
                @include "../../Components/EvaluateTable.php"; 
            }

            
            ?>
        </div>
    </div>
</body>

</html>