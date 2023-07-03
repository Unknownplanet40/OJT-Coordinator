<?php
session_start();
@include_once("../Database/config.php");
@include_once("../Components/PopupAlert.php");

$_SESSION['SAtheme'] = "light";

if (!isset($_SESSION['DatahasbeenFetched'])) {
    header("Location: ../Login.php");
} elseif ($_SESSION['GlobalProfileCompleted'] == 'false') {
    header("Location: ../User/UserProfile.php");
} else {
    $ShowAlert = true;
    $ID = $_SESSION['GlobalID'];
}


$sql = "SELECT * FROM tbl_evaluation WHERE UID = '$ID'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    if ($_SESSION['GlobalEvaluated'] == "true") {
        $showForm = true;
        $Q1 = $row['Q1'];
        $Q2 = $row['Q2'];
    } else {
        $showForm = null;
    }


} else {
    $_SESSION['message'] = "Error No Data Found!";
    $_SESSION['icon'] = "error";
    $_SESSION['Show'] = true;
    header("Location: UserEvaluation.php");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style/ImportantImport.css">
    <script src="../Script/SweetAlert2.js"></script>
    <title>Evaluation</title>
</head>

<body>
    <?php include_once '../Components/Sidebar.php';
    if (isset($ShowAlert)) {
        echo NewAlertBox();
        $_SESSION['Show'] = false;
    } ?>
    <section class="home">
        <div class="text">Evaluation</div>
        <div class="content d-flex justify-content-center" style="margin: 10px; width: 98%;">
            <?php

            isset($showForm) ? include_once '../Components/EvaluateData.php' : $stat = "Not Evaluated Yet";

            if (isset($stat)) {
                echo $stat;
            }
            ?>
        </div>
    </section>
    <script src="../Script/SidebarScript.js"></script>
    <script src="../Script/Bootstrap_Script/bootstrap.bundle.js
</body>

</html>