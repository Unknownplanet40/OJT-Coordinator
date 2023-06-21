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

echo '<script>console.log("GlobalProfileCompleted: ' . $_SESSION['GlobalProfileCompleted'] . '")</script>';

if ($_SESSION['GlobalProfileCompleted'] == 'false') {
    // if the user has not completed his/her profile,
    $title = "Complete your profile";
    $readonly = "";
    $hidden = "hidden";
} else {
    // if the user has completed his/her profile,
    $title = "Profile Information";
    $readonly = "readonly";
    $hidden = "";

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

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style/ImportantImport.css">
    <link rel="stylesheet" href="../Style/Uprofile.css">
    <script src="../Script/SweetAlert2.js"></script>
    <title>Profile</title>
</head>

<script>
    // this function checks if the file input is empty or not
    function checkFileInput() {
        var fileInput = document.getElementById('fileInput');
        var submitButton = document.getElementById('submitButton');

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
        <div class="text">
            <?php echo $title; ?>
        </div>
        <div class="content">
            <div class="profile">
                <!--<img class="rounded" src="https://via.placeholder.com/256" alt="Profile Picture">-->
                <?php
                if (isset($_SESSION['Profile'])) {
                    echo '<img class="rounded shadow-lg" src="' . $_SESSION['Profile'] . '" alt="Profile Picture">';
                } else {
                    echo '<img class="rounded" src="../Image/Profile.png" alt="Profile Picture">';
                }
                ?>
                <form method="POST" action="UserProfile.php" enctype="multipart/form-data">
                    <div class="d-grid gap-2">
                        <br>
                        <input type="file" id="fileInput" class="form-control form-control-sm" name="Profile"
                            style="width: 256px;" onchange="checkFileInput()">
                        <input type="submit" id="submitButton" class="btn btn-success" name="imageupload" value="Upload"
                            disabled>
                    </div>
                </form>
            </div>
            <div class="inner-content">
                <div class="container-md">
                    <form class="row g-3">
                        <div class="col-md-6" <?php echo $hidden; ?>>
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control form-control-sm" name="name" id="name"
                                placeholder="John Doe" value="<?php if (isset($name)) {echo $name;} $readonly; ?>">
                        </div>
                        <div class="col-md-2" <?php echo $hidden; ?>>
                            <label for="uname" class="form-label d-block text-truncate ">Username</label>
                            <input type="text" class="form-control form-control-sm" name="uname" id="uname"
                                placeholder="johndoe123" value="" readonly>
                        </div>
                        <div class="col-md-2" <?php echo $hidden; ?>>
                            <label for="pword" class="form-label d-block text-truncate">Password</label>
                            <input type="password" class="form-control form-control-sm" name="pword" id="pword"
                                placeholder="lorenzoasis1213">
                        </div>
                        <div class="col-md-2" <?php echo $hidden; ?>>
                            <label for="conpword" class="form-label d-block text-truncate">Confirm Password</label>
                            <input type="password" class="form-control form-control-sm" name="conpword" id="conpword"
                                placeholder="lorenzoasis1213">
                        </div>
                        <div class="col-8">
                            <label for="Address" class="form-label">Address</label>
                            <input type="text" class="form-control form-control-sm" name="Address" id="Address"
                                placeholder="1234 Main St">
                        </div>
                        <div class="col-md-2">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control form-control-sm" name="city" id="city"
                                placeholder="Imus">
                        </div>
                        <div class="col-md-2">
                            <label for="province" class="form-label">Province</label>
                            <input type="text" class="form-control form-control-sm" name="province" id="province"
                                placeholder="Cavite">
                        </div>
                        <div class="col-4" <?php echo $hidden; ?>>
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control form-control-sm" name="email" id="email"
                                placeholder="lorenzo.Asis@gmail.com">
                        </div>
                        <div class="col-4">
                            <label for="birth" class="form-label d-block text-truncate">Birth Date</label>
                            <input type="date" class="form-control form-control-sm" name="birth" id="birth">
                        </div>
                        <div class="col-4">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control form-control-sm" name="phone" id="phone"
                                placeholder="09123456789">
                        </div>
                        <div class="col-md-2">
                            <label for="zipcode" class="form-label">Zipcode</label>
                            <input type="text" class="form-control form-control-sm" name="zipcode" id="zipcode"
                                placeholder="1234">
                        </div>
                        <div class="col-md-2">
                            <label for="Department" class="form-label d-block text-truncate">Dept.</label>
                            <select id="department" name="department" class="form-select form-select-sm">
                                <option selected hidden>Choose...</option>
                                <option value="BSIT">BSIT</option>
                                <option value="BSCS">BSCS</option>
                            </select>
                        </div>
                        <div class="col-2" <?php echo $hidden; ?>>
                            <label for="SID" class="form-label d-block text-truncate">Student ID</label>
                            <input type="text" class="form-control form-control-sm" name="SID" id="SID"
                                placeholder="123456789" readonly>
                        </div>
                        <div class="col-md-2">
                            <label for="gender" class="form-label d-block text-truncate">Sex</label>
                            <select id="gender" name="gender" class="form-select form-select-sm">
                                <option selected hidden>Choose...</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="Section" class="form-label d-block text-truncate">Section</label>
                            <select id="Yearlevel" name="Yearlevel" class="form-select form-select-sm">
                                <option selected hidden>Choose...</option>
                                <option value="1">1st Year</option>
                                <option value="2">2nd Year</option>
                                <option value="3">3rd Year</option>
                                <option value="2">4th Year</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="Section" class="form-label d-block text-truncate">Section</label>
                            <select id="Section" name="Yearlevel" class="form-select form-select-sm">
                                <option selected hidden>Choose...</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                                <option value="E">E</option>
                                <option value="F">F</option>
                                <option value="G">G</option>
                            </select>
                        </div>
                        <div class="col-12" hidden>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck">
                                <label class="form-check-label" for="gridCheck">
                                    Check me out
                                </label>
                            </div>
                        </div>
                        <p class="text-muted">Please fill your information correctly and Honestly to avoid any problems
                            in
                            the future. <br>
                            <small class="blockquote-footer" style="font-size: 12px;">Png, Jpg, Jpeg, Gif files are only
                                allowed and the maximum file size is
                                3 MB and best resolution is 256x256.</small>
                        </p>
                        <div class="col-12 text-start">
                            <button type="submit" class="btn btn-success">Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="content" style="background-color: #e4e9f7;">
            <span class="text-danger" hidden>Note: Uploading an invalid file will result in the deletion of the old
                profile
                picture. Please upload a valid file. (This has been Fix)</span>
        </div>
    </section>
    <script src="../Script/SidebarScript.js"></script>
    <script src="../Script/Bootstrap_Script/bootstrap.bundle.js"></script>
</body>

</html>