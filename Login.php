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
    <div class="d-flex justify-content-center align-items-center">
        <div class="registration-form">
            <form method="POST" action="./Components/Authentication.php">
                <!-- this function is used to send the data to the same page -->
                <div class="form-icon">
                    <span>
                        <span>
                            <img src="./Image/Login.gif" alt="Login" width="100px" height="100px">
                        </span>
                    </span>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control item" name="username" id="username" placeholder="Username"
                        value="<?php if (isset($uname)) {
                            echo $uname;
                        } ?>" title="Username must contain at least 5 characters, with no special characters, no whitespaces no numbers, no UPPER/lowercase and must be unique.">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control item" name="password" id="password"
                        placeholder="Password" value="<?php if (isset($pword)) {
                            echo $pword;
                        } ?>" title="Password must contain at least 8 characters, including UPPER/lowercase and numbers with special characters and no whitespaces.">
                    <div style="margin: -20px 5px 0 5px; display: flex; justify-content: space-between;">
                        <div>
                            <input class="form-check-input" type="checkbox" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault" style="Color: #000;">
                                Show Password
                            </label>
                        </div>
                        <!-- I will add this later -->
                        <!-- <p class="reg-link"><a href="ForgotPassword.php">Forgot Password</a></p> -->
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-block create-account" name="login">Sign In</button>
                    <div>
                        <p class="reg-link text-end">Don't have an account? <a href="Registration.php">Register Here</a>
                        </p>
                    </div>
                </div>
                <div class="form-group">
                    <p class="error text-center"></p>
                </div>
            </form>
            <div class="social-media error" hidden>
            </div>
            <p class="text-muted text-center mt-2"><small>
                    <span class="text-dark fw-bold">&copy; 2023. All Rights Reserved.</span>
                </small></p>
        </div>

    </div>
</body>

</html>

<!-- Path: Login.php -->