<?php
session_start();
@include_once("../../Database/config.php");
@include_once("../../Components/PopupAlert.php");

if (!isset($_SESSION['DatahasbeenFetched'])) {
    header("Location: ../Login.php");
} else {
    $ShowAlert = true;
}

if (isset($_SESSION['GlobalRole']) && $_SESSION['GlobalRole'] == "administrator") {
    $address = "../../Admin/AdminTrainees.php";
} else {
    $address = "../../Admin/ManageMod.php";
}

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $_SESSION['UserID'] = $_GET['id'];
    $UserID = $_SESSION['UserID'];

    $sql = "SELECT * FROM tbl_trainee WHERE UID='$UserID'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $name = $row['name'];
        $email = $row['email'];
        $username = $row['trainee_uname'];
        $password = $row['trainee_pword'];
        $department = $row['department'];
        $position = $row['role'];
        $image = $row['image'];
        $datecreated = date("F j, Y", strtotime($row['account_Created']));
        $course = $row['course'];

        $status = $row['status'];

        /*
        $datecreated = date("F j, Y", strtotime($datecreated));
        $lastlogin = date("h:i A", strtotime($lastlogin));

        */
        if ($status == 1) {
            $status = "<span class='text-success fw-bold'>Online</span>";

        } else {
            $status = "<span class='text-danger fw-bold'>Offline</span>";
        }

    } else {
        $_SESSION['message'] = "We have encountered an error, We did not find any data.";
        $_SESSION['icon'] = "error";
        $_SESSION['Show'] = true;
        header($address);
    }
}



function RandomCharacter($length)
{
    $result = '';
    for ($i = 0; $i < $length; $i++) {
        $result .= chr(rand(97, 122));
    }
    return $result;
}

$error[] = "";

if (isset($_POST['update'])) {
    $upname = $_POST['upname'];
    $upemail = $_POST['upemail'];
    $upusername = $_POST['upusername'];
    $uppassword = $_POST['uppassword'];
    $updepartment = $_POST['updepartment'];
    $upposition = $_POST['upposition'];
    $upimage = $_POST['upimage'];
    $upcourse = $_POST['upcourse'];

    $_SESSION['tempdata'] = array(
        'upname' => $upname,
        'upemail' => $upemail,
        'upusername' => $upusername,
        'uppassword' => $uppassword,
        'updepartment' => $updepartment,
        'upposition' => $upposition,
        'upimage' => $upimage
    );

    // check if upimage is empty



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
    <link rel="stylesheet" href="../../Style/SidebarStyle.css">
    <link rel="stylesheet" href="../../Style/Fonts.css">
    <script src="../../Script/SweetAlert2.js"></script>
    <script src="../../Script/Bootstrap_Script/bootstrap.bundle.js"></script>
    <title>Update Account</title>

    <style>
        * {
            font-family: 'Poppins';
            box-sizing: border-box;
            scroll-behavior: smooth;
        }

        body {
            background-color: #e4e9f7;
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
    <?php
    if (isset($ShowAlert)) {
        echo NewAlertBox();
        $_SESSION['Show'] = false;
    }
    ?>
    <div class="container-lg text-light shadow-lg p-3 mt-5 mb-5 bg-body rounded">
        <div class="row">
            <div class="col-md-12 mt-2">
                <h1 class="text-center text-success text-uppercase fw-bold">Update Account</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 text-center rounded">
                <ul class="list-group shadow-lg">
                    <li class="list-group-item listhead text-center border-0" style="min-height: 256px;">
                        <img src="<?php echo isset($image) ? "../" . $image : "../../Image/Profile.png"; ?>
                        " class="img-fluid m-1 rounded" style="min-height: 256px; min-width: 256px; max-height: 256px; max-width: 256px;">
                    </li>
                    <li
                        class="list-group-item d-flex justify-content-between align-items-center text-muted" style="background: linear-gradient(to right, #2a9134 1%,#3fa34d 53%,#2a9134 100%)">
                        <span class="text-light user-select-none">Name:</span>
                        <span class="text-end text-light user-select-none">
                            <?php echo isset($name) ? $name : "Not Available"; ?>
                        </span>
                    </li>
                    <li
                        class="list-group-item d-flex justify-content-between align-items-center text-muted" style="background: linear-gradient(to left, #2a9134 1%,#3fa34d 53%,#2a9134 100%)">
                        <span class="text-light user-select-none">Email Address:</span>
                        <span class="text-end text-light user-select-none">
                            <?php echo isset($email) ? $email : "Not Available"; ?>
                        </span>
                    </li>
                    <li
                        class="list-group-item d-flex justify-content-between align-items-center text-muted" style="background: linear-gradient(to right, #2a9134 1%,#3fa34d 53%,#2a9134 100%)">
                        <span class="text-light user-select-none">Username:</span>
                        <span class="text-end text-light user-select-none">
                            <?php echo isset($username) ? $username : "Not Available"; ?>
                        </span>
                    </li>
                    <li
                        class="list-group-item d-flex justify-content-between align-items-center text-muted" style="background: linear-gradient(to left, #2a9134 1%,#3fa34d 53%,#2a9134 100%)">
                        <span class="text-light user-select-none">Department:</span>
                        <span class="text-end text-light user-select-none">
                            <?php echo isset($department) ? $department : "Not Available"; ?>
                        </span>
                    </li>
                    <li
                        class="list-group-item d-flex justify-content-between align-items-center text-muted " style="background: linear-gradient(to right, #2a9134 1%,#3fa34d 53%,#2a9134 100%)">
                        <span class="text-light user-select-none">Date Created:</span>
                        <span class="text-end text-light user-select-none">
                            <?php echo isset($datecreated) ? $datecreated : "Not Available"; ?>
                        </span>
                    </li>
                    <li
                        class="list-group-item d-flex justify-content-between align-items-center text-muted" style="background: linear-gradient(to left, #2a9134 1%,#3fa34d 53%,#2a9134 100%)">
                        <span class="text-light user-select-none">Last Login:</span>
                        <span class="text-end text-light user-select-none">
                            <?php echo isset($lastlogin) ? $lastlogin : "Not Available"; ?>
                        </span>
                    </li>
                    <li
                        class="list-group-item d-flex justify-content-between align-items-center text-muted" style="background: linear-gradient(to right, #2a9134 1%,#3fa34d 53%,#2a9134 100%)">
                        <span class="text-light user-select-none">Account Type:</span>
                        <span class="text-end text-light user-select-none">
                            <?php echo isset($position) ? $position : "Not Available"; ?>
                        </span>
                    </li>
                </ul>
                <div class="py-3">
                    <div class="row">
                        <div class="col-md-4">
                            <a id="back" class="btn btn-primary w-100">Back</a>
                            <script>
                                let backBTN = document.getElementById("back");

                                backBTN.addEventListener("click", function () {
                                    // get id
                                    let id = "<?php echo $UserID; ?>";
                                    let currentUSer = "<?php echo $_SESSION['GlobalID']; ?>";

                                    if (id == currentUSer) {
                                        Swal.fire({
                                            text: "We recommend relogging into your account, whether you have updated it or not.",
                                            icon: 'info',
                                            allowOutsideClick: false,
                                            showCancelButton: true,
                                            confirmButtonColor: '#3085d6',
                                            cancelButtonColor: '#d33',
                                            confirmButtonText: 'Relogin',
                                            cancelButtonText: 'Just Go Back',
                                            background: "#fff",
                                            color: "#000"

                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                window.location.href = "../../logout.php";
                                            } else {
                                                window.location.href = "<?php echo $address; ?>";
                                            }
                                        })
                                    } else {
                                        window.location.href = "<?php echo $address; ?>";
                                    }

                                });


                            </script>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-7 p-5 mt-4">
                <form action="../Proccess/update_USER.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $UserID; ?>">
                    <div class="input-group mb-3">
                        <span class="input-group-text w-25 text-bg-success">Name:</span>
                        <input type="text" class="form-control" name="upname" id="upname"
                            value="<?php echo isset($name) ? $name : "Not Available"; ?>" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text text-bg-success w-25">Email:</span>
                        <input type="text" class="form-control" name="upemail" id="upemail"
                            value="<?php echo isset($email) ? $email : "Not Available"; ?>" required pattern="^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text text-bg-success w-25">Username:</span>
                        <input type="text" class="form-control" name="upusername" id="upusername"
                            value="<?php echo isset($username) ? $username : "Not Available"; ?>" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text text-bg-success w-25">Course</span>
                        <input type="text" class="form-control" name="upcourse" id="upcourse"
                            value="<?php echo isset($course) ? $course : "Not Available"; ?>" required pattern="^(BSIT|BSCS)-(1|2|3|4)[A-G]$">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text text-bg-success w-25">Department:</span>
                        <select name="updepartment" class="form-select" id="updepartment" required>
                            <option value="BSIT" <?php echo $department == "BSIT" ? "selected" : ""; ?>>Information
                                Technology</option>
                            <option value="BSCS" <?php echo $department == "BSCS" ? "selected" : ""; ?>>Computer
                                Science</option>
                        </select>
                    </div>
                    <div class="text-center">
                        <input type="submit" class="btn btn-success w-50" value="Update" name="update" id="update">
                    </div>
                </form>
                <!-- Error Message -->
                <div class="m-5">
                    <p class="text-danger text-center fs-5">
                    <div class="alert alert-danger" id="error" role="alert" style="display: none;">
                        <span class="text-danger">Invalid Course Format</span> <br>
                        <small class="text-muted">Please follow this format: (BSIT|BSCS)-(1-4)[A-G]</small> <br>
                        <span class="text-muted">Example: <?php echo isset($course) ? $course : "BSIT-2B"; ?></span>
                        <?php
                        foreach ($error as $err) {
                            echo $err . "<br>";
                        }
                        ?>
                    </div>

                    </p>
                    <script>
                        var error = document.getElementById("error");
                        setTimeout(function () {
                            error.style.display = "none";
                        }, 8500);

                        let upcourse = document.getElementById("upcourse");
                        let updepartment = document.getElementById("updepartment");
                        let update = document.getElementById("update");

                        let pattern = "^(BSIT|BSCS)-(1|2|3|4)[A-G]$";

                        upcourse.addEventListener("keyup", function () {
                            upcourse.value = upcourse.value.toUpperCase();
                            if (upcourse.value.match(pattern)) {
                                error.style.display = "none";
                                update.disabled = false;
                            } else {
                                error.style.display = "block";
                                update.disabled = true;
                                //error.innerHTML = "Invalid Course Format, <br> Please follow this format: <br> (BSIT|BSCS)-(1|2|3|4)[A-G] <br> Example: BSIT-2B";
                            }
                        });

                        //if updepartment is BSCS, then the upcourse should be BSCS
                        updepartment.addEventListener("change", function () {
                            // get last 3 characters
                            let last3 = upcourse.value.slice(-3);
                            if (updepartment.value == "BSCS") {
                                upcourse.value = "BSCS" + last3;
                            } else {
                                upcourse.value = "BSIT" + last3;
                            }
                        });


                    </script>
                </div>
            </div>
        </div>
    </div>
</body>

</html>