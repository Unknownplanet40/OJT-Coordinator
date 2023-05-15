<?php
session_start();
include_once("./External/config.php");
include_once("./External/Log.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // check if username and password are empty
    if (empty($username) || empty($password)) {
        $error = "Username or Password is empty";
    } else {
        // check if the username and password are correct
        $sql = "SELECT * FROM tbl_accounts WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0){

            while($row = mysqli_fetch_assoc($result)){
                $ID = $row['UID'];
                $Type = $row['user_type'];
            }
            // check if the user is an admin or a user
            if($Type == 1){
                logMessage("User " . $_SESSION['Global_Username'] . " logged in as Admin");

                // Updating the loggin status of the admin
                $sql = "UPDATE tbl_Admin SET LogginStatus = 1 WHERE ID = '$ID'";
                $result = mysqli_query($conn, $sql);

                // Selecting the data from the database and storing it in the session
                $sql = "SELECT * FROM tbl_Admin WHERE ID = '$ID'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                $_SESSION['Global_ID'] = $row['ID'];
                $_SESSION['Global_Name'] = $row['name'];
                $_SESSION['Global_Username'] = $row['admin_uname'];
                $_SESSION['Global_Password'] = $row['admin_pword'];
                $_SESSION['Global_Email'] = $row['email'];
                $_SESSION['Global_Dept'] = $row['department'];
                $_SESSION['role'] = $row['role'];
                $_SESSION['LogginStatus'] = $row['LogginStatus'];

                // Redirecting to the Admin Home Page
                header("Location: ./AdminDashboard.php");
            } else {
                logMessage("User " . $_SESSION['Global_Username'] . " logged in as User");

                // Updating the loggin status of the user
                $sql = "UPDATE tbl_trainee SET LogginStatus = 1 WHERE ID = '$ID'";
                $result = mysqli_query($conn, $sql);

                // Selecting the data from the database and storing it in the session
                $sql = "SELECT * FROM tbl_trainee WHERE UID = '$ID'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                $_SESSION['Global_ID'] = $row['UID'];
                $_SESSION['Global_Name'] = $row['name'];
                $_SESSION['Global_Username'] = $row['username'];
                $_SESSION['Global_Password'] = $row['password'];
                $_SESSION['Global_Email'] = $row['email'];
                $_SESSION['Global_Dept'] = $row['department'];
                $_SESSION['LogginStatus'] = $row['LogginStatus'];

                // Redirecting to the User Home Page
                header("Location: ./UserDashboard.php");
            }
        } else {
            $error = "Username or Password is invalid";
        }
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
    <link rel="stylesheet" href="./traineetest.php">
    <title> Sign In </title>
</head>

<body>
    <div class="registration-form">
        <form method="POST" action="Login.php">
            <div class="form-icon">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 96 960 960">
                        <path
                            d="M222 801q63-44 125-67.5T480 710q71 0 133.5 23.5T739 801q44-54 62.5-109T820 576q0-145-97.5-242.5T480 236q-145 0-242.5 97.5T140 576q0 61 19 116t63 109Zm257.814-195Q422 606 382.5 566.314q-39.5-39.686-39.5-97.5t39.686-97.314q39.686-39.5 97.5-39.5t97.314 39.686q39.5 39.686 39.5 97.5T577.314 566.5q-39.686 39.5-97.5 39.5Zm.654 370Q398 976 325 944.5q-73-31.5-127.5-86t-86-127.266Q80 658.468 80 575.734T111.5 420.5q31.5-72.5 86-127t127.266-86q72.766-31.5 155.5-31.5T635.5 207.5q72.5 31.5 127 86t86 127.032q31.5 72.532 31.5 155T848.5 731q-31.5 73-86 127.5t-127.032 86q-72.532 31.5-155 31.5ZM480 916q55 0 107.5-16T691 844q-51-36-104-55t-107-19q-54 0-107 19t-104 55q51 40 103.5 56T480 916Zm0-370q34 0 55.5-21.5T557 469q0-34-21.5-55.5T480 392q-34 0-55.5 21.5T403 469q0 34 21.5 55.5T480 546Zm0-77Zm0 374Z" />
                    </svg>
                </span>
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" name="username" placeholder="Username" required>
                <!--pattern="([a-z]{8,}\d{2,})"-->
            </div>
            <div class="form-group">
                <input type="password" class="form-control item" name="password" placeholder="Password"
                    required><!--pattern="([a-z]{8,}\d{2,})"-->
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-block create-account">Sign In</button>
                <!--about us-->
                <div style="display: flex; justify-content: space-between;">
                    <p class="reg-link" style="margin-left: 15px;"><a href="AboutUs.php">About Us</a></p>
                    <p class="reg-link">Don't have an account? <a href="Registration.php">Register Here</a></p>
                </div>
            </div>
        </form>
        <div class="social-media error">
            <!-- this script is used to display error message for 3 seconds -->
            <script>
                setTimeout(function () {
                    document.querySelector('.error').innerHTML = '';
                }, 3000);
            </script>


            <?php
            if (isset($error)) {
                echo "<h5>$error</h5>";
            } ?>
        </div>
    </div>
</body>

</html>