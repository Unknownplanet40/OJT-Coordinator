<?php
session_start();
@include_once '../Database/config.php"';
@include_once '../Components/SystemLog.php';
@include_once '../Components/PopupAlert.php';
@include_once '../Components/ImageUpload.php';

$_SESSION['SAtheme'] = "light";

if (!isset($_SESSION['DatahasbeenFetched'])) {
    header("Location: ../Login.php");
}

if (isset($_POST['imageupload'])) {
    ProfileUpload();
}

if ($_SESSION['GlobalProfileCompleted'] == 'false') {
    // if the user has not completed his/her profile,
    $title = "Complete your profile";
} else {
    // if the user has completed his/her profile,
    $title = "Profile Information";

    //values
    $name = $_SESSION['GlobalName'];
    $uname = $_SESSION['GlobalUsername'];
    $pword = $_SESSION['GlobalPassword'];
    $Address = $_SESSION['GlobalAddress'];
    $city = $_SESSION['GlobalCity'];
    $province = $_SESSION['GlobalProvince'];
    $email = $_SESSION['GlobalEmail'];
    $birth = $_SESSION['GlobalBirthdate'];
    $phone = $_SESSION['GlobalPhone'];
    $zipcode = $_SESSION['GlobalZip'];
    $department = $_SESSION['GlobalDept'];
    $SID = $_SESSION['GlobalID'];
    $gender = $_SESSION['GlobalGender'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style/Uprofile.css">
    <link rel="stylesheet" href="../Style/ImportantImport.css">
    <script src="../Script/SweetAlert2.js"></script>
    <script defer src="../Script/SidebarScript.js"></script>
    <script defer src="../Script/Bootstrap_Script/bootstrap.bundle.js"></script>
    <title>Profile</title>
</head>

<script>
    // this function checks if the file input is empty or not 
    function checkFileInput() {
        var fileInput = document.getElementById('fileInput');
        var submitButton = document.getElementById('submitButton');

        // if the file input is empty, the submit button will be disabled
        if (fileInput.value === '') {
            submitButton.disabled = true;
        } else {
            submitButton.disabled = false;
        }
    }
</script>

<body>
    <?php @include_once '../Components/Sidebar.php'; ?>
    <?php echo NewAlertBox();
    $_SESSION['Show'] = false; ?>
    <section class="home">
        <div class="text text-truncate">
            <?php echo $title; ?>
        </div>
        <?php
            if ($_SESSION['GlobalProfileCompleted'] == 'false'){
                @include_once '../Components/Uprofile/Incomplete.php';
            } else {
                @include_once '../Components/Uprofile/Completed.php';
            }
        ?>
        <hr class="mt-4 mb-4 mx-4" style="background-color: #000; height: 5px; border-radius: 5px;">
        <div class="container">

        </div>
    </section>
</body>

</html>