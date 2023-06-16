<?php
session_start();

// this code is for demonstration purposes only no functionality yet
$oldpassword = "qwertyui12";
$newpass = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $currentPassword = $_POST['current'];
    $newPassword = $_POST['new'];
    $confirmPassword = $_POST['confirm'];

    if ($currentPassword == $oldpassword) {
        if ($currentPassword == $newPassword) {
            $status = "New Password cannot be same as your current password";
            $statusType = "error";
        } else if ($newPassword == $confirmPassword) {
            $newpass = $newPassword;
            $status = "Your Password has been changed";
            $statusType = "success";
        } else {
            $status = "New Password and Confirm Password does not match";
            $statusType = "error";
        }
    } else {
        $status = "Current Password is incorrect";
        $statusType = "error";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Bootstrap_5.3.0/css/bootstrap.css">
    <link rel="stylesheet" href="./Styles/LoginStyle.css">
    <link rel="shortcut icon" href="./Images/login.svg" type="image/x-icon">
    <title> Sign In </title>
</head>

<body>
    <div class="registration-form">
        <form method="POST" action="ResetPassword.php">
            <div class="form-icon">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 96 960 960">
                        <path
                            d="M222 801q63-44 125-67.5T480 710q71 0 133.5 23.5T739 801q44-54 62.5-109T820 576q0-145-97.5-242.5T480 236q-145 0-242.5 97.5T140 576q0 61 19 116t63 109Zm257.814-195Q422 606 382.5 566.314q-39.5-39.686-39.5-97.5t39.686-97.314q39.686-39.5 97.5-39.5t97.314 39.686q39.5 39.686 39.5 97.5T577.314 566.5q-39.686 39.5-97.5 39.5Zm.654 370Q398 976 325 944.5q-73-31.5-127.5-86t-86-127.266Q80 658.468 80 575.734T111.5 420.5q31.5-72.5 86-127t127.266-86q72.766-31.5 155.5-31.5T635.5 207.5q72.5 31.5 127 86t86 127.032q31.5 72.532 31.5 155T848.5 731q-31.5 73-86 127.5t-127.032 86q-72.532 31.5-155 31.5ZM480 916q55 0 107.5-16T691 844q-51-36-104-55t-107-19q-54 0-107 19t-104 55q51 40 103.5 56T480 916Zm0-370q34 0 55.5-21.5T557 469q0-34-21.5-55.5T480 392q-34 0-55.5 21.5T403 469q0 34 21.5 55.5T480 546Zm0-77Zm0 374Z" />
                    </svg>
                </span>
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" name="current" placeholder="Current Password" required
                    pattern="([a-z]{8,}\d{2,})">
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" name="new" placeholder="New Password" required
                    pattern="([a-z]{8,}\d{2,})">
            </div>
            <div class="form-group">
                <input type="password" class="form-control item" name="confirm" placeholder="Confirm Password" required
                    pattern="([a-z]{8,}\d{2,})">
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Sign In" class="btn btn-block create-account">
                <!--about us-->
                <div style="display: flex; justify-content: space-between;">
                    <p class="reg-link" style="margin-left: 15px;"><a href="AboutUs.php">About Us</a></p>
                    <p class="reg-link">Don't have an account? <a href="Registration.php">Register Here</a></p>
                </div>
            </div>
        </form>
        <div class="social-media <?php echo (isset($statusType)) ? $statusType : ""; ?>">
            <h5>
                <?php
                if (isset($status)) {
                    echo $status;
                } else {
                    echo " ";
                }
                ?>
            </h5>
        </div>
    </div>
</body>

</html>