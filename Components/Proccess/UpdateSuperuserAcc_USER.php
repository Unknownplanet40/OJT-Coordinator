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
            $status = "<span class='text-success'>Online</span>";
            
        } else {
            $status = "<span class='text-danger'>Offline</span>";
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
    <?php
    if (isset($ShowAlert)) {
        echo NewAlertBox();
        $_SESSION['Show'] = false;
    }
    ?>
    <div class="container-lg text-bg-dark rounded">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Update Account</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 text-bg-dark text-center rounded">
                <ul class="list-group">
                    <li class="list-group-item listhead">
                        <img src="<?php echo isset($image) ? "../" . $image : "../../Image/Profile.png"; ?>
                        " class="img-fluid m-1 img-thumbnail" width="256" height="256">
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center text-muted">
                        Name:
                        <span class="text-end text-dark user-select-none">
                            <?php echo isset($name) ? $name : "Not Available"; ?>
                        </span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center text-muted">
                        Email:
                        <span class="text-end text-dark user-select-none">
                            <?php echo isset($email) ? $email : "Not Available"; ?>
                        </span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center text-muted">
                        Username:
                        <span class="text-end text-dark user-select-none">
                            <?php echo isset($username) ? $username : "Not Available"; ?>
                        </span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center text-muted">
                        Department:
                        <span class="text-end text-dark user-select-none">
                            <?php echo isset($department) ? $department : "Not Available"; ?>
                        </span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center text-muted">
                        Date Created:
                        <span class="text-end text-dark user-select-none">
                            <?php echo isset($datecreated) ? $datecreated : "Not Available"; ?>
                        </span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center text-muted">
                        Last Login:
                        <span class="text-end text-dark user-select-none">
                            <?php echo isset($lastlogin) ? $lastlogin : "Not Available"; ?>
                        </span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center text-muted">
                        Position Assigned:
                        <span class="text-end text-dark user-select-none">
                            <?php echo isset($position) ? $position : "Not Available"; ?>
                        </span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center text-muted">
                        Current Status:
                        <span class="text-end text-dark user-select-none text">
                            <?php echo isset($status) ? $status : "Not Available"; ?>
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
                                        background: "#19191a",
                                        color: "#fff"

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
            <div class="col-md-7 text-bg-dark p-5">
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
                            value="<?php echo isset($email) ? $email : "Not Available"; ?>" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text text-bg-success w-25">Username:</span>
                        <input type="text" class="form-control" name="upusername" id="upusername"
                            value="<?php echo isset($username) ? $username : "Not Available"; ?>" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text text-bg-success w-25">Course</span>
                        <input type="text" class="form-control" name="upcourse" id="upcourse"
                            value="<?php echo isset($course) ? $course : "Not Available"; ?>"required>
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
                    <p class="text-danger text-center fs-5" id="error">
                        <?php
                        foreach ($error as $err) {
                            echo $err . "<br>";
                        }
                        ?>
                    </p>
                    <script>
                        var error = document.getElementById("error");
                        setTimeout(function () {
                            error.innerHTML = "";
                        }, 8500);

                        let upcourse = document.getElementById("upcourse");

                        let pattern = "^(BSIT|BSCS)-(1|2|3|4)[A-G]$";

                        upcourse.addEventListener("keyup", function () {
                            upcourse.value = upcourse.value.toUpperCase();
                            if (upcourse.value.match(pattern)) {
                                error.innerHTML = "";
                            } else {
                                error.innerHTML = "Invalid Course Format, <br> Please follow this format: <br> (BSIT|BSCS)-(1|2|3|4)[A-G] <br> Example: BSIT-2B";
                            }
                        });


                    </script>
                </div>
            </div>
        </div>
    </div>
</body>

</html>