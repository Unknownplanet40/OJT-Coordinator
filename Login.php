<?php
session_start();
@include_once("./Database/config.php");
@include_once("./Components/SystemLog.php");
@include_once("./Components/PopupAlert.php");

if (isset($_SESSION['autoUsername']) && isset($_SESSION['autoPassword'])) {
    $uname = $_SESSION['autoUsername'];
    $pword = $_SESSION['autoPassword'];
}

/* if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];


    if (empty($username) || empty($password)) {
        $error = "Please fill out all the fields.";
    } elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $error = "Invalid username.";
    } else {
        $sql = "SELECT * FROM tbl_accounts WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                // clear autoUsername and autoPassword session
                $_SESSION['autoUsername'] = null;
                $_SESSION['autoPassword'] = null;

                $_SESSION['Auth'] = $row['UID'];
                $_SESSION['UserType'] = $row['role'];
                header("Location: ./Components/Authentication.php");
            }
        } else {
            $error = "Invalid username or password.";
        }
    }
}  */
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
                    <input type="text" class="form-control item" name="username" id="username" placeholder="Username"
                        value="<?php if (isset($uname)) {
                            echo $uname;
                        } ?>">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control item" name="password" id="password"
                        placeholder="Password" value="<?php if (isset($pword)) {
                            echo $pword;
                        } ?>">
                    <div style="margin: -20px 5px 0 5px; display: flex; justify-content: space-between;">
                        <div>
                            <input class="form-check-input" type="checkbox" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault" style="Color: #fff;">
                                Show Password
                            </label>
                        </div>
                        <p class="reg-link"><a href="ForgotPassword.php">Forgot Password</a></p>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-block create-account" name="login">Sign In</button>
                    <div>
                        <p class="reg-link text-end">Don't have an account? <a href="Registration.php">Register Here</a>
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

<!-- Path: Login.php -->