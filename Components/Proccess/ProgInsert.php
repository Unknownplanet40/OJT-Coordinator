<?php
session_start();
@include_once("../../Database/config.php");

print_r($_POST);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Title = $_POST['ProgTitle'];
    $Location = $_POST['ProgLocation'];
    $Date = $_POST['ProgDate'];
    $From = $_POST['ProgStart'];
    $To = $_POST['ProgEnd'];
    $Duration = $_POST['Progduration'];
    $Comp = $_POST['ProgCompletion'];
    $Super = $_POST['Progsuper'];
    $Hours = $_POST['ProgHours'];
    $Desc = $_POST['ProgDescription'];
    $ID = $_POST['ProgID'];
    $type = $_POST['useupdate'];
    $autofill = $_POST['Choice'];
    
    if ($type == true) {
        $sql = "UPDATE tbl_programs SET title = '$Title', description = '$Desc', start_date = '$Date', end_date = '$Comp', progloc = '$Location', hours = '$Hours', start_time = '$From', end_time = '$To', Duration = '$Duration', Supervisor = '$Super' WHERE progID = $ID";
    } else {
        $sql = "INSERT INTO tbl_programs(progID, title , description, start_date, end_date, progloc, hours, start_time, end_time, Duration, Supervisor) VALUES ($ID, '$Title', '$Desc', '$Date', '$Comp', '$Location', '$Hours', '$From', '$To', '$Duration', '$Super')";
    }
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $sql = "UPDATE tbl_trainee SET program = '$Title', prog_duration = '$Duration', fulfilled_time = '$Hours' WHERE UID = $ID";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $_SESSION['message'] = "Program has been added successfully";
            $_SESSION['icon'] = "success";
            $_SESSION['Show'] = true;
            header("Location: ../../Admin/AdminTrainees.php");
        } else {
            $_SESSION['message'] = "Error: Could not able to execute $sql. " . mysqli_error($conn);
            $_SESSION['icon'] = "error";
            $_SESSION['Show'] = true;
            header("Location: ../Program.php?id=$ID");
        }
    } else {
        $_SESSION['message'] = "Error: " . $sql . "<br>" . mysqli_error($conn);
        $_SESSION['icon'] = "error";
        $_SESSION['Show'] = true;
        header("Location: ../Program.php?id=$ID");
    }

}
?>