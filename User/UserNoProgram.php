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
    <script defer src="../Script/SidebarScript.js"></script>
    <script defer src="../Script/Bootstrap_Script/bootstrap.bundle.js"></script>
    <title>Program Details</title>
</head>

<body>
    <?php
    include_once '../Components/Sidebar.php';
    if (isset($ShowAlert)) {
        echo NewAlertBox();
        $_SESSION['Show'] = false;
    } ?>
    <section class="home">
        <div class="text">Program Details</div>
        <div style="margin: 10px; width: 98%;">
            <div class="container-lg">
                <div class="text-center text-uppercase fs-5">
                    You have not been assigned to any program yet. Please contact or wait for your Coordinator to assign you to a program. Thank you!
                </div>
                <br>
                <div class="text-center">
                    Please insure that you have completed submitting your Documents and Profile. <br>
                    to prevent any delays in your program assignment.
                </div>
            </div>
            <br>
            <p class="text-center"><small class="text-muted"><b>Note</b>: You will be able to see your
                    program details here once you have been assigned to a program.</small></p>
        </div>
    </section>
</body>

</html>