<?php
session_start();
include_once '../Components/PopupAlert.php';
include_once '../Components/ImageUpload.php';

$_SESSION['user'] = 'ryanj';

if (isset($_POST['imageupload'])) {
    ProfileUpload();
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
    <?php include_once '../Components/Sidebar.php'; ?>
    <?php echo NewAlertBox();
    $_SESSION['Show'] = false; ?>
    <section class="home">
        <div class="text">Profile Information</div>
        <div class="content">
            <div class="profile">
                <!--<img class="rounded" src="https://via.placeholder.com/256" alt="Profile Picture">-->
                <?php
                // this is just a temporary code for the profile picture
                // if file "ryanj_Profile" exists in the folder "ryanj_Credentials" then display it
                //optimized Version
                $fileExtensions = ['jpg', 'png', 'jpeg', 'gif'];
                $profilePicture = '';

                foreach ($fileExtensions as $extension) {
                    $path = '../uploads/'. $_SESSION['user'] .'_Credentials/'. $_SESSION['user'] .'_Profile.'. $extension;
                    if (file_exists($path)) {
                        $profilePicture = $path;
                        break;
                    }
                }

                if (!empty($profilePicture)) {
                    echo '<img class="rounded shadow-lg" src="' . $profilePicture . '" alt="Profile Picture">';
                } else {
                    echo '<img class="rounded" src="../Image/Profile.png" alt="Profile Picture">';
                }
                ?>
                <form method="POST" action="UserProfile.php" enctype="multipart/form-data">
                    <div class="d-grid gap-2">
                        <br>
                        <!--only png jpg jpeg pdf allowed-->
                        <input type="file" id="fileInput" class="form-control form-control-sm" name="Profile"
                            style="width: 256px;">
                        <input type="submit" id="submitButton" class="btn btn-success" name="imageupload" value="Upload"
                        >
                    </div>
                </form>
            </div>
            <div class="inner-content">
                <form class="row g-3">
                    <div class="col-md-6">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control form-control-sm" name="name" id="name"
                            placeholder="John Doe">
                    </div>
                    <div class="col-md-2">
                        <label for="uname" class="form-label d-block text-truncate ">Username</label>
                        <input type="text" class="form-control form-control-sm" name="uname" id="uname"
                            placeholder="johndoe123" value="" readonly>
                    </div>
                    <div class="col-md-2">
                        <label for="pword" class="form-label d-block text-truncate">Password</label>
                        <input type="password" class="form-control form-control-sm" name="pword" id="pword"
                            placeholder="lorenzoasis1213">
                    </div>
                    <div class="col-md-2">
                        <label for="conpword" class="form-label d-block text-truncate">Confirm Password</label>
                        <input type="password" class="form-control form-control-sm" name="conpword" id="conpword"
                            placeholder="lorenzoasis1213">
                    </div>
                    <div class="col-12">
                        <label for="Address" class="form-label">Address</label>
                        <input type="text" class="form-control form-control-sm" name="Address" id="Address"
                            placeholder="1234 Main St">
                    </div>
                    <div class="col-4">
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
                    <div class="col-md-4">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control form-control-sm" name="city" id="city"
                            placeholder="Quezon City">
                    </div>
                    <div class="col-2">
                        <label for="SID" class="form-label d-block text-truncate">Student ID</label>
                        <input type="text" class="form-control form-control-sm" name="SID" id="SID"
                            placeholder="123456789" readonly>
                    </div>
                    <div class="col-md-2">
                        <label for="zipcode" class="form-label">Zipcode</label>
                        <input type="text" class="form-control form-control-sm" name="zipcode" id="zipcode"
                            placeholder="1234">
                    </div>
                    <div class="col-md-2">
                        <label for="Yearlevel" class="form-label d-block text-truncate">Year level</label>
                        <select id="Yearlevel" class="form-select form-select-sm" disabled>
                            <option>Choose...</option>
                            <option selected>1st Year</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="Section" class="form-label d-block text-truncate">Section</label>
                        <select id="Section" class="form-select form-select-sm" disabled>
                            <option>Choose...</option>
                            <option selected>Section 1</option>
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
                    <p class="text-muted">Please fill your information correctly and Honestly to avoid any problems in
                        the future. <br>
                        <small class="blockquote-footer" style="font-size: 12px;">Png, Jpg, Jpeg, Gif files are only
                            allowed and the maximum file size is
                            3 MB and best resolution is 256x256.</small>
                    </p>
                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-success">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="content" style="background-color: #e4e9f7;">
            <span class="text-danger" hidden>Note: Uploading an invalid file will result in the deletion of the old profile
                picture. Please upload a valid file. (This has been Fix)</span>
        </div>
    </section>
    <script src="../Script/SidebarScript.js"></script>
    <script src="../Script/Bootstrap_Script/bootstrap.bundle.js"></script>
</body>

</html>