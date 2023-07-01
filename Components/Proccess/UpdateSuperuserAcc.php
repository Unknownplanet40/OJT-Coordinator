<?php
session_start();
@include_once("../../Database/config.php");

if (isset($_SESSION['GlobalRole']) && $_SESSION['GlobalRole'] != "administrator") {
    $address = "Location: ../../Admin/ManageAdmin.php";
} else {
    $address = "Location: ../../Admin/ManageMod.php";
}

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $UserID = $_GET['id'];
}

if (isset($_POST['update'])) {
    $upname = $_POST['upname'];
    $upemail = $_POST['upemail'];
    $upusername = $_POST['upusername'];
    $uppassword = $_POST['uppassword'];
    $updepartment = $_POST['updepartment'];
    $upposition = $_POST['upposition'];
    $upimage = $_POST['upimage'];

    // check if upimage is empty
    if (empty($upimage)) {
        $sql = "UPDATE tbl_admin SET name='$upname', admin_email='$upemail', admin_uname='$upusername', admin_pword='$uppassword', department='$updepartment', role='$upposition' WHERE UID='$UserID'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $_SESSION['message'] = "Account Updated Successfully.";
            $_SESSION['icon'] = "success";
            $_SESSION['Show'] = true;
        } else {
            $_SESSION['message'] = "Account Update Failed.";
            $_SESSION['icon'] = "error";
            $_SESSION['Show'] = true;
        }
    } else {
        $sql = "SELECT * FROM tbl_admin WHERE UID='$UserID'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $parentFolder = "../../uploads/" . $row['admin_username'] . "_Credentials/";
            
        }
    }


}



?>


<!DOCTYPE html>
<html lang="en, fil">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../Style/ColorPalette.css">
    <link rel="stylesheet" href="../../Style/Bootstrap_Style/bootstrap.css">
    <link rel="stylesheet" href="../../Style/Fonts.css">
    <script src="../../Script/SweetAlert2.js"></script>
    <script src="../../Script/chart.js"></script>
    <script src="../../Script/Bootstrap_Script/bootstrap.bundle.js"></script>
    <title>Update Account</title>

    <style>
        * {
            font-family: 'Poppins';
            box-sizing: border-box;
            scroll-behavior: smooth;
        }

        body {
            background-color: var(--clr-background);
        }

        .listhead {
            background-color: var(--clr-primary);
            background-image: url("../../Image/ProfBG.svg");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }
    </style>

</head>

<body>
    <div class="container-lg text-bg-dark rounded">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Update Account</h1>
                <?php
                if (isset($ShowAlert)) {
                    echo NewAlertBox();
                    $_SESSION['Show'] = false;
                }
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 text-bg-dark text-center rounded">
                <ul class="list-group">
                    <li class="list-group-item listhead">
                        <img src="../../Image/Dashboard.svg" class="img-fluid img-thumbnail m-1" alt="" width="256"
                            height="256">
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center text-muted">
                        Name:
                        <span class="text-end text-dark">Not Available</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center text-muted">
                        Email:
                        <span class="text-end text-dark">Not Available</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center text-muted">
                        Username:
                        <span class="text-end text-dark">Not Available</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center text-muted">
                        Password:
                        <span class="text-end text-dark">Not Available</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center text-muted">
                        Username:
                        <span class="text-end text-dark">Not Available</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center text-muted">
                        Department:
                        <span class="text-end text-dark">Not Available</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center text-muted">
                        Date Created:
                        <span class="text-end text-dark">Not Available</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center text-muted">
                        Last Login:
                        <span class="text-end text-dark">Not Available</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center text-muted">
                        Position Assigned:
                        <span class="text-end text-dark">Not Available</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center text-muted">
                        Current Status:
                        <span class="text-end text-dark">Not Available</span>
                    </li>
                </ul>
                <br>
            </div>
            <div class="col-md-7 text-bg-dark p-5">
                <form action="" method="POST">
                    <div class="input-group mb-3">
                        <span class="input-group-text w-25 text-bg-success">Name:</span>
                        <input type="text" class="form-control" name="upname" id="upname">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text text-bg-success w-25">Email:</span>
                        <input type="text" class="form-control" name="upemail" id="upemail">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text text-bg-success w-25">Username:</span>
                        <input type="text" class="form-control" name="upusername" id="upusername">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text text-bg-success w-25">Password:</span>
                        <input type="text" class="form-control" name="uppassword" id="uppassword">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text text-bg-success w-25">Department:</span>
                        <input type="text" class="form-control" name="updepartment" id="updepartment">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text text-bg-success w-25">Position:</span>
                        <input type="text" class="form-control" name="upposition" id="upposition">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text text-bg-success w-25">Image:</span>
                        <input type="file" class="form-control" name="upimage" id="upimage">
                    </div>
                    <div class="text-center">
                        <input type="button" class="btn btn-success w-50" value="Update" name="update" id="update">
                    </div>
                </form>
                <!-- Error Message -->
                <div class="m-5">
                    <p class="text-danger text-center fs-5" id="error">Your Error Here</p>
                    <script>
                        var error = document.getElementById("error");
                        setTimeout(function () {
                            error.innerHTML = "";
                        }, 6500);
                    </script>
                </div>
            </div>
        </div>
    </div>
</body>

</html>