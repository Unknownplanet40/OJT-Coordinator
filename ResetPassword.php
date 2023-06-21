<?php
session_start();
@include_once("./Database/config.php");
@include_once("./Components/SystemLog.php");
@include_once("./Components/PopupAlert.php");

if (isset($_POST['mailadd'])) {
    $email = $_POST['emailAddress'];
    $sql = "SELECT * FROM tbl_trainee WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {

        }
    } else {
        $error = "Invalid username or password.";
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign In</title>
    <link rel="stylesheet" href="./Style/Bootstrap_Style/bootstrap.css">
    <link rel="stylesheet" href="./Style/SweetAlert2.css">
    <link rel="stylesheet" href="./Style/LoginStyle.css">
    <script defer src="./Script/Bootstrap_Script/bootstrap.bundle.js"></script>
    <script src="./Script/LoginValidation.js"></script>
    <script src="./Script/SweetAlert2.js"></script>
    <link rel="shortcut icon" href="./Image/login.svg" type="image/x-icon">

</head>

<body style="color: #fff;">
    <?php echo NewAlertBox();
    $_SESSION['Show'] = false; ?>
    <div class="container-fluid">
        <div class="registration-form">
            <form method="POST" action="./Components/Authentication.php">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Launch static backdrop modal
                </button>

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="ResetPassword.php" method="POST">
                            <div class="modal-content text-bg-dark">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Before you proceed</h1>
                                </div>
                                <div class="modal-body">
                                    <div class="input-group input-group-sm mb-3">
                                        <span class="input-group-text text-bg-dark" id="emailAdd">Email Address</span>
                                        <input type="text" name="emailAddress" id="emailAddress"
                                            class="form-control text-bg-dark" aria-label="Sizing example input"
                                            aria-describedby="emailAdd">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" class="btn btn-primary" name="mailadd" value="Get OTP">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content text-bg-dark">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Before you proceed</h1>
                            </div>
                            <div class="modal-body">
                                <div class="input-group input-group-sm mb-3">
                                    <span class="input-group-text text-bg-dark" id="inputGroup-sizing-sm">Email
                                        Address</span>
                                    <input type="text" class="form-control text-bg-dark"
                                        aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Understood</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- this function is used to send the data to the same page -->
                <div class="form-icon">
                    <span>
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 96 960 960" fill="var(--clr-secondary)">
                                <path
                                    d="M480 576q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM240 896q-33 0-56.5-23.5T160 816v-32q0-34 17.5-62.5T224 678q62-31 126-46.5T480 616q66 0 130 15.5T736 678q29 15 46.5 43.5T800 784v32q0 33-23.5 56.5T720 896H240Z" />
                            </svg>
                        </span>
                    </span>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control item" name="password" id="password"
                        placeholder="Password">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control item" name="password" id="password"
                        placeholder="Password">
                    <div style="margin: -20px 5px 0 5px; display: flex; justify-content: space-between;">
                        <div>
                            <input class="form-check-input" type="checkbox" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault" style="Color: #fff;">
                                Show Password
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-block create-account" name="resetpassword">Sign In</button>
                    <div>
                        <p class="reg-link text-end">Back to <a href="Login.php">Login</a>
                        </p>
                    </div>
                </div>
            </form>
            <div class="social-media error">
            </div>
            <p class="text-muted text-center"><small>
                    <span class="text-warning">&copy; 2023. All Rights Reserved.</span>
                </small></p>
        </div>

    </div>
</body>

</html>