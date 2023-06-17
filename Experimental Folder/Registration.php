<?php
session_start();

if (isset($_POST['register'])) {
    $name = $_POST['Traineename'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $usn = $_POST['usn'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];
    $validEmailDomain = [
        "@gmail.com",
        "@yahoo.com",
        "@outlook.com",
        "@icloud.com",
        "@hotmail.com",
        "@cvsu.edu.ph",
    ];

    $_SESSION['temp'] = array($name, $age, $email, $usn, $username, $password, $confirm);

}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration Form</title>
    <link rel="stylesheet" href="../Style/Bootstrap_Style/bootstrap.css">
    <link rel="stylesheet" href="../Style/RegistrationStyle.css">
    <link rel="stylesheet" href="../Style/SweetAlert2.css">
    <script src="../Script/SweetAlert2.js"></script>
    <script src="./Registration.php"></script>
    <link rel="shortcut icon" href="../Image/Register.svg" type="image/x-icon">

</head>

<body style="color: #fff;">
    <div class="container-fluid">
        <div class="registration-form">
            <form method="POST" action="Registration.php" enctype="multipart/form-data" id="register-form"
                onsubmit="return validateForm()">
                <!-- this function is used to send the data to the same page -->
                <div class="form-icon">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 96 960 960" fill="var(--clr-secondary)">
                            <path
                                d="M480 576q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM240 896q-33 0-56.5-23.5T160 816v-32q0-34 17.5-62.5T224 678q62-31 126-46.5T480 616q66 0 130 15.5T736 678q29 15 46.5 43.5T800 784v32q0 33-23.5 56.5T720 896H240Z" />
                        </svg>
                    </span>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="form-group">
                            <input type="text" class="form-control item" name="Traineename" id="Traineename"
                                placeholder="Name"
                                value="<?php if (isset($_SESSION['temp'][0])) {
                                    echo $_SESSION['temp'][0];
                                } ?>" title="Ex: Juan Dela Cruz">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <input type="text" class="form-control item" name="age" id="age" placeholder="Age"
                                value="<?php if (isset($_SESSION['temp'][1])) {
                                    echo $_SESSION['temp'][1];
                                } ?>" title="Ex: 18">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <input type="text" class="form-control item" name="email" id="email"
                                placeholder="Email Address"
                                value="<?php if (isset($_SESSION['temp'][2])) {
                                    echo $_SESSION['temp'][2];
                                } ?>" title="Ex: Blk. 0 Lot 0, Village">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <input type="text" class="form-control item" name="usn" id="usn"
                                placeholder="University Serial Number"
                                value="<?php if (isset($_SESSION['temp'][3])) {
                                    echo $_SESSION['temp'][3];
                                } ?>" title="Ex: 1234567890">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control item" name="username" id="username" placeholder="Username"
                        value="<?php if (isset($_SESSION['temp'][4])) {
                            echo $_SESSION['temp'][4];
                        } ?>" title="Ex: delcruz20">
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <input type="password" class="form-control item" name="password" id="password"
                                    placeholder="Password" value="<?php if (isset($temp[5])) {
                                        echo $temp[5];
                                    } ?>" title="Ex: @Juandelacruz123">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <input type="password" class="form-control item" name="confirm" id="confirm"
                                    placeholder="Confirm Password"
                                    value="<?php if (isset($temp[6])) {
                                        echo $temp[6];
                                    } ?>" title="Ex: @Juandelacruz123">
                            </div>
                        </div>
                    </div>
                    <div style="margin: -20px 5px 0 5px; display: flex; justify-content: space-between;">
                        <div>
                            <input class="form-check-input" type="checkbox" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault" style="Color: #fff;">
                                Show Password
                            </label>
                        </div>
                        <p class="reg-link" hidden><a href="ForgotPassword.php">Forgot
                                Password</a></p>
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-block create-account" name="register" id="register"
                        value="Create Account">
                    <div class="row g-1" hidden>
                        <div class="col-4">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="picture" hidden>
                                <label class="custom-file-label" for="customFile">Upload Image</label>
                            </div>
                        </div>
                        <div class="col-8">
                        </div>
                    </div>
                    <div>
                        <p class="reg-link text-end">Already have an account? <a href="./Login.php">Login here</a>
                        </p>
                    </div>
                </div>
            </form>
            <div class="social-media error">
                <p class="text-center" name="perror">
                    
                </p>
                <script>
                    setTimeout(function () {
                        document.getElementsByName("perror")[0].innerHTML = "";
                    }, 6000);
                    document.querySelector('.error').scrollIntoView({
                        behavior: 'smooth'
                    });
                </script>
            </div>
            <p class="text-muted text-center"><small>
                    Please enter your basic information to create an account.<br>
                    <span class="text-warning">&copy; 2023. All Rights Reserved.</span>
                </small></p>
        </div>
    </div>
    <script src="../Script/Bootstrap_Script/bootstrap.bundle.js"></script>
</body>

</html>

<!-- Path: Registration.php -->