<?php
session_start();
@include_once("../../Database/config.php");
@include_once("../../Components/PopupAlert.php");

if (!isset($_SESSION['DatahasbeenFetched'])) {
    header("Location: ../Login.php");
} else {
    $ShowAlert = true;
}

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $_SESSION['UserID'] = $_GET['id'];
    $UserID = $_SESSION['UserID'];

    $sql = "SELECT * FROM tbl_admin WHERE UID='$UserID' AND role='moderator'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $name = $row['name'];
        $email = $row['admin_email'];
        $username = $row['admin_uname'];
        $password = $row['admin_pword'];
        $department = $row['department'];
        $position = $row['role'];
        $image = $row['imagePath'];
        $datecreated = $row['date_created'];
        $lastlogin = $row['last_login'];
        $status = $row['status'];

        $datecreated = date("F j, Y", strtotime($datecreated));
        $lastlogin = date("h:i A", strtotime($lastlogin));
        if ($status == 1) {
            $status = "Online";
        } else {
            $status = "Offline";
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
                <h1 class="text-center"></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 text-bg-dark text-center rounded">
                <ul class="list-group">
                    <li class="list-group-item listhead">
                        <img src="<?php echo isset($image) ? "../" . $image : "../../Image/Profile.png"; ?>
                        " class="img-fluid m-1" width="256" height="256">
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
                        Password:
                        <span class="text-end text-dark user-select-none">
                            <?php echo isset($password) ? $password : "Not Available"; ?>
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

                                    swal.fire({
                                        text: "Saving...",
                                        icon: 'info',
                                        allowOutsideClick: false,
                                        showConfirmButton: false,
                                        background: "#19191a",
                                        color: "#fff",
                                        timer: 2000,
                                        timerProgressBar: true,
                                        didOpen: () => {
                                            Swal.showLoading()
                                        }
                                    }).then((result) => {
                                        if (result.dismiss === Swal.DismissReason.timer) {
                                            if (id == currentUSer) {
                                                window.location.href = "../../Admin/AdminDashboard.php";
                                            }
                                        }
                                    })
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7 text-bg-dark p-5">
                <form action="../Proccess/update.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $UserID; ?>">
                    <div class="input-group mb-3">
                        <span class="input-group-text w-25 text-bg-success">Name:</span>
                        <input type="text" class="form-control" name="upname" id="upname"
                            value="<?php echo isset($name) ? $name : "Not Available"; ?>">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text text-bg-success w-25">Email:</span>
                        <input type="text" class="form-control" name="upemail" id="upemail"
                            value="<?php echo isset($email) ? $email : "Not Available"; ?>">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text text-bg-success w-25">Username:</span>
                        <input type="text" class="form-control" name="upusername" id="upusername"
                            value="<?php echo isset($username) ? $username : "Not Available"; ?>">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text text-bg-success w-25">Password:</span>
                        <input type="text" class="form-control" name="uppassword" id="uppassword"
                            value="<?php echo isset($password) ? $password : "Not Available"; ?>">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text text-bg-success w-25">Department:</span>
                        <select name="updepartment" class="form-select" id="updepartment"
                            value="<?php echo isset($department) ? $department : "Not Available"; ?>">
                            <option value="BSIT">Information Technology</option>
                            <option value="BSCS">Computer Science</option>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text text-bg-success w-25">Position:</span>
                        <select name="upposition" class="form-select" id="upposition">
                            <option value="administrator" <?php if ($position === "administrator")
                                echo "selected"; ?>>
                                ADMINISTRATOR</option>
                            <option value="moderator" <?php if ($position === "moderator")
                                echo "selected"; ?>>MODERATOR
                            </option>
                        </select>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text text-bg-success w-25">Image:</span>
                        <input type="file" class="form-control" name="upimage" id="upimage"
                            accept="jpg, jpeg, png, gif">
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
                        }, 6500);
                    </script>
                </div>
            </div>
        </div>
    </div>
</body>

</html>