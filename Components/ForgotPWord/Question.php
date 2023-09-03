<?php
session_start();
@include_once("../../Database/config.php");
@include_once("../PopupAlert.php");

$_SESSION['Phase2'] = false;

if (isset($_SESSION['Phase1']) && $_SESSION['Phase1'] == true) {
    $Q1 = $_SESSION['FPQ1'];
    $Q2 = $_SESSION['FPQ2'];
    $Q3 = $_SESSION['FPQ3'];

    $A1 = $_SESSION['FPA1'];
    $A2 = $_SESSION['FPA2'];
    $A3 = $_SESSION['FPA3'];
    $_SESSION['Phase2'] = true;
} else {
    header("Location: ./VerifyEmail.php");
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Security Question</title>
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
                <div class="form-icon">
                    <span>
                        <span>
                            <img src="../../Image/FPword.gif" alt="Login" width="100px" height="100px">
                        </span>
                    </span>
                </div>
                <div class="form-group">
                    <div class="mb-3">
                        <label for="Q1" class="form-text text-dark">
                            <?php echo isset($Q1) ? $Q1 : "Question 1"; ?>
                        </label>
                        <input type="text" class="form-control item form-control-sm" id="Q1" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="Q2" class="form-text text-dark">
                            <?php echo isset($Q2) ? $Q2 : "Question 2"; ?>
                        </label>
                        <input type="text" class="form-control item form-control-sm" id="Q2" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="Q3" class="form-text text-dark">
                            <?php echo isset($Q3) ? $Q3 : "Question 3"; ?>
                        </label>
                        <input type="text" class="form-control item form-control-sm" id="Q3" placeholder="">
                    </div>
                </div>
                <div class="form-group text-center">
                    <input type="hidden" name="UID" value="<?php echo $_SESSION['FPUID']; ?>">
                    <button type="submit" class="btn btn-block create-account w-50" name="Verify">Verify</button>
                </div>
                <div class="form-group">
                    <p class="error text-center text-danger"></p>
                </div>

                <script>
                    const error = document.querySelector(".error");
                    const Que1 = document.querySelector("#Q1");
                    const Que2 = document.querySelector("#Q2");
                    const Que3 = document.querySelector("#Q3");
                    const A1 = "<?php echo $A1; ?>";
                    const A2 = "<?php echo $A2; ?>";
                    const A3 = "<?php echo $A3; ?>";
                    const form = document.querySelector("form");
                    form.addEventListener("submit", (e) => {
                        e.preventDefault();
                        if (Que1.value == "" || Que2.value == "" || Que3.value == "") {
                            error.textContent = "Please fill all the fields";
                        } else if (Que1.value != A1 || Que2.value != A2 || Que3.value != A3) {
                            error.textContent = "Please enter correct answers";
                        } else {
                            form.action = "ResetPassword.php";
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

<!-- Path: Login.php -->