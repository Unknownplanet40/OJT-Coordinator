<?php
session_start();
@include_once("../../Database/config.php");
@include_once("../PopupAlert.php");

if (isset($_SESSION['Phase1']) && $_SESSION['Phase1'] == true) {
} else if (isset($_SESSION['Phase2']) && $_SESSION['Phase2'] == true) {

} else {
    unset($_SESSION['Phase1']);
    unset($_SESSION['Phase2']);
    header("Location: ./VerifyEmail.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Password Reset</title>
    <link rel="shortcut icon" href="../../Image/login.svg" type="image/x-icon">
    <link rel="stylesheet" href="../../Style/Bootstrap_Style/bootstrap.css">
    <link rel="stylesheet" href="../../Style/LoginStyle.css">
    <script src="../../Script/SweetAlert2.js"></script>
    <script defer src="../../Script/Bootstrap_Script/bootstrap.bundle.js"></script>
    <script src="../../Script/jquery-3.5.1.js"></script>
</head>

<body style="color: #fff;">
    <?php echo NewAlertBox();
    $_SESSION['Show'] = false;

    ?>
    <div class="d-flex justify-content-center align-items-center">
        <div class="registration-form">
            <form>
                <!-- this function is used to send the data to the same page -->
                <div class="form-icon">
                    <span>
                        <span>
                            <img src="../../Image/FPword.gif" alt="Login" width="100px" height="100px">
                        </span>
                    </span>
                </div>
                <div class="form-group">
                    <div class="mb-3">
                        <label for="Q1" class="form-label text-dark">Password</label>
                        <input type="text" class="form-control item form-control-sm" id="PW" name="PW" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="Q2" class="form-label text-dark">Confirm Password</label>
                        <input type="text" class="form-control item form-control-sm" id="CPW" name="CPW" placeholder="">
                    </div>
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-block create-account" name="Verify">Change Password</button>
                </div>
                <div class="form-group">
                    <p class="error text-center text-danger"></p>
                </div>

                <script>
                    const error = document.querySelector(".error");
                    const PW = document.querySelector("#PW");
                    const CPW = document.querySelector("#CPW");
                    const form = document.querySelector("form");

                    form.addEventListener("submit", (e) => {
                        e.preventDefault();
                        if (PW.value == "" || CPW.value == "") {
                            error.textContent = "Please fill all the fields";
                            return;
                        }
                        if (PW.value != CPW.value) {
                            error.textContent = "Password does not match";
                            return;
                        } else if (PW.value.length < 8) {
                            error.textContent = "Password must be at least 8 characters";
                            return;
                        } else if (PW.value.length > 20) {
                            error.textContent = "Password must be less than 20 characters";
                            return;
                        } else if (PW.value.search(/[0-9]/) == -1) {
                            error.textContent = "Password must contain at least one number";
                            return;
                        } else if (PW.value.search(/[a-z]/) == -1) {
                            error.textContent = "Password must contain at least one lowercase letter";
                            return;
                        } else if (PW.value.search(/[A-Z]/) == -1) {
                            error.textContent = "Password must contain at least one uppercase letter";
                            return;
                        } else if (PW.value.search(/[!\@\#\$\%\^\&\*\(\)\_\+\.\,\;\:]/) == -1) {
                            error.textContent = "Password must contain at least one special character";
                            return;
                        } else if (PW.value.search(/\s/) != -1) {
                            error.textContent = "Password must not contain any spaces";
                            return;
                        } else if (PW.value.search(/['"]/) != -1) {
                            error.textContent = "Password must not contain any quotes";
                            return;
                        } else {
                            form.action = "Reset.php";
                            form.method = "POST";
                            form.submit();

                        }
                    });

                    setTimeout(() => {
                        error.textContent = "";
                    }, 6800);

                </script>
            </form>
        </div>
        <script>

        </script>
    </div>
</body>

</html>