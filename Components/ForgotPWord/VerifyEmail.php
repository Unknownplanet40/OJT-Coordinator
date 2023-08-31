<?php
session_start();
@include_once("../../Database/config.php");
@include_once("../PopupAlert.php");

$_SESSION['Phase1'] = false;




?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign In</title>
    <link rel="stylesheet" href="../../Style/Bootstrap_Style/bootstrap.css">
    <link rel="stylesheet" href="../../Style/SweetAlert2.css">
    <link rel="stylesheet" href="../../Style/LoginStyle.css">
    <script src="../../Script/SweetAlert2.js"></script>
    <link rel="shortcut icon" href="../../Image/login.svg" type="image/x-icon">
    <script defer src="../../Script/Bootstrap_Script/bootstrap.bundle.js"></script>
    <script src="../../Script/jquery-3.5.1.js"></script>
</head>

<body style="color: #fff;">
    <?php echo NewAlertBox();
    $_SESSION['Show'] = false;

    if (isset($_SESSION['EmailFound']) && $_SESSION['EmailFound'] == 0) {
        echo "<script>Swal.fire({
            icon: 'success',
            title: 'Email found!',
            text: 'Before we proceed, please answer your security question.',
            confirmButtonText: 'Okay'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = './Question.php';
            }
        })
        </script>";
        unset($_SESSION['EmailFound']);
        $_SESSION['Phase1'] = true;
    } else if (isset($_SESSION['EmailFound']) && $_SESSION['EmailFound'] == 1) {
        echo "<script>Swal.fire({
            icon: 'error',
            title: 'Email not found!',
            text: 'We can\'t find your email address in our database.',
            confirmButtonText: 'Okay'
        })</script>";
        unset($_SESSION['EmailFound']);
    } else if (isset($_SESSION['EmailFound']) && $_SESSION['EmailFound'] == 2) {
        echo "<script>Swal.fire({
            icon: 'info',
            title: 'Opps!',
            text: 'We found your email address but you don\'t have a security question Setup, please contact the administrator.',
            footer: '<a href=\'../../Login.php\'>Back to Login</a>',
            confirmButtonText: 'Okay'
        })</script>";
        unset($_SESSION['EmailFound']);
    }
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
                    <input type="text" class="form-control item" name="Email" id="Email"
                        placeholder="Please enter your email address">
                </div>
                <div class="form-group text-center">
                    <button type="button" class="btn btn-block create-account w-25 text-bg-danger"
                        name="Back">Back</button>
                    <button type="submit" class="btn btn-block create-account w-50" name="Verify">Continue</button>
                </div>
                <div class="form-group">
                    <p class="error text-center text-danger"></p>
                </div>

                <script>
                    $(document).ready(function () {
                        $("button[name='Back']").click(function () {
                            window.location.href = "../../Login.php";
                        });
                    });

                    let email = document.getElementById("Email");
                    let form = document.querySelector("form");
                    let error = document.querySelector(".error");
                    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

                    form.addEventListener("submit", (event) => {
                        event.preventDefault();
                        if (email.value === "") {
                            error.textContent = "We can't check it if you don't enter your email address.";
                            email.focus();
                            return false;
                            // build in php validation
                        } else if (!emailPattern.test(email.value)) {
                            error.textContent = "Please enter a valid email address.";
                            email.focus();
                            return false;
                        }
                        else {
                            form.action = "../ForgotPWord/CheckEmail.php";
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
    </div>
</body>

</html>

<!-- Path: Login.php -->