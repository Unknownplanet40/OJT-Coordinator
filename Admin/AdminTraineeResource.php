<?php
session_start();
@include_once("../Database/config.php");
@include_once("../Components/PopupAlert.php");

// prevent user from accessing the page without logging in
if (!isset($_SESSION['DatahasbeenFetched'])) {
    header("Location: ../Login.php");
} else {
    $ShowAlert = true;
}

?>


<!DOCTYPE html>
<html lang="en, fil">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../Style/ImportantImport.css">
    <script src="../Script/SidebarScript.js"></script>
    <script src="../Script/SweetAlert2.js"></script>
    <script src="../Script/chart.js"></script>
    <script src="../Script/AdminTables.js"></script>
    <title>Admin Resource</title>
</head>

<body class="dark adminuser" style="min-width: 1080px;">
    <?php
    @include_once '../Components/AdminSidebar.php';
    if (isset($ShowAlert)) {
        echo NewAlertBox();
        $_SESSION['Show'] = false;
    }
    ?>
    <section class="home">
        <div class="text">
            <h1 class="text-warning">Resources of Trainees</h1>
        </div>
        <div class="container-fluid" style="width: 98%;">
            <div class="container-lg">
                <!-- Remove this before you start coding -->
                <p class="text-light"> Feature: Can see the list of resources of trainees</p>
                <p class="text-light"> can update the resources of trainees</p>
                <p class="text-light"> can request for resubmission of resources</p>
                <p class="text-light"> can approve the resources of trainees</p>
                <p class="text-light"> can disapprove the resources of trainees</p>
                <p class="text-light"> can delete the resources of trainees</p>
                <p class="text-light"> can add resources of trainees</p>
            </div>
        </div>
    </section>

</body>

</html>