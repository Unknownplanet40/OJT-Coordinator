<?php
session_start();
@include_once("./Database/config.php");
$valid = "true";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    echo "<script>console.log('$username')</script>";
    echo "<script>console.log('$password')</script>";

    $sql = "SELECT * FROM tbl_accounts WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $message = "You have successfully logged in!";
            $success = true;
            echo "<script>attempt = 0;</script>";
        } else {
            $message = "Invalid username or password!";
            $success = false;
            $valid = "false";
        }
    }
}
echo "<script>var ValidUsername = $valid;</script>";
?>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var form = document.querySelector("form");
        var errorDiv = document.querySelector(".error");
        var showPassword = document.getElementById("flexCheckDefault");
        var password = document.getElementById("password");
        var attempts = 0;
        var maxAttempts = 3;
        var lockoutTime = 1; // Lockout time in minutes
        var countdownInterval;
        var buttonDisabled = false;

        // Retrieve saved login attempt count and lockout time from localStorage
        if (localStorage.getItem("loginAttempts")) {
            attempts = parseInt(localStorage.getItem("loginAttempts"));
        }

        if (localStorage.getItem("lockoutTime")) {
            lockoutTime = parseInt(localStorage.getItem("lockoutTime"));
        }

        if (localStorage.getItem("buttonDisabled")) {
            buttonDisabled = localStorage.getItem("buttonDisabled") === "true";
            if (buttonDisabled) {
                disableButton();
                startLockoutTimer();
            }
        }

        console.log("attempts: " + attempts);
        console.log("lockoutTime: " + lockoutTime);
        console.log("buttonDisabled: " + buttonDisabled);
        console.log("Is mail valid: " + ValidUsername);

        // Show/hide password
        showPassword.addEventListener("click", function () {
            if (password.type === "password") {
                password.type = "text";
            } else {
                password.type = "password";
            }
        });

        // Validate the username and password when the form is submitted
        form.addEventListener("submit", function (event) {

            // Clear previous error messages
            errorDiv.innerHTML = "";

            // Get the values from the username and password fields
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;

            // Validate the username and password
            if (username.trim() === "" || password.trim() === "") {
                displayError("Username and password are required");
            } else if (username.length < 8) {
                displayError("Username must have at least 8 characters");
            } else if (password.length < 8) {
                displayError("Password must have at least 8 characters");
            } else if (/\s/.test(username) || /\s/.test(password)) {
                displayError("Username and password cannot contain whitespace");
            } else if (!/\d{2}/.test(password)) {
                displayError("Password must contain at least two digits");
            } else if (!/[A-Z]/.test(password)) {
                displayError("Password must contain at least one uppercase letter");
            } else if (!/[a-z]/.test(password)) {
                displayError("Password must contain at least one lowercase letter");
            } else if (!/[!@#$%^&*]/.test(password)) {
                displayError("Password must contain at least one special character");
            } else if (/[!@#$%^&*]/.test(username)) {
                displayError("Username cannot contain special characters");
            } else if (username === password) {
                displayError("Username and password cannot be the same");
            } else {
                // This is where you would check the username and password against a database
                if (ValidUsername) {
                    // If the username and password are valid, clear the login attempt count
                    attempts = 0;
                    localStorage.setItem("loginAttempts", attempts.toString());
                    localStorage.setItem("lockoutTime", lockoutTime.toString());
                    localStorage.setItem("buttonDisabled", buttonDisabled.toString());
                } else {
                    
                }
            }

            // Save the login attempt count and lockout time in localStorage
            localStorage.setItem("loginAttempts", attempts.toString());
            localStorage.setItem("lockoutTime", lockoutTime.toString());
            localStorage.setItem("buttonDisabled", buttonDisabled.toString());
        });

        function displayError(message) {
            var error = document.createElement("p");
            error.textContent = message;
            errorDiv.appendChild(error);

            // Clear the error after 5 seconds
            setTimeout(function () {
                errorDiv.removeChild(error);
            }, 3000);
        }

        function displayAttempt(message) {
            var attemptMessage = message;
            var attemptDiv = document.createElement("div");
            attemptDiv.textContent = attemptMessage;
            errorDiv.appendChild(attemptDiv);

            // Clear the attempt count after 5 seconds
            setTimeout(function () {
                // Remove the attemptDiv from the DOM
                errorDiv.removeChild(attemptDiv);
            }, 5000);
        }

        function disableButton() {
            var submitButton = document.querySelector('button[name="login"]');
            submitButton.disabled = true;
            buttonDisabled = true;
        }

        function startLockoutTimer() {
            var totalSeconds = lockoutTime * 60;
            var minutes, seconds;
            var timerDiv = document.createElement("div");
            timerDiv.classList.add("lockout-timer");
            errorDiv.appendChild(timerDiv);

            countdownInterval = setInterval(function () {
                minutes = Math.floor(totalSeconds / 60);
                seconds = totalSeconds % 60;

                timerDiv.textContent =
                    "Account locked. Please wait " +
                    minutes +
                    " minutes " +
                    seconds +
                    " seconds";

                if (totalSeconds <= 0) {
                    clearInterval(countdownInterval);
                    errorDiv.removeChild(timerDiv);
                    enableButton();
                    attempts = 0; // Reset login attempts
                    // Save the login attempt count and lockout time in localStorage
                    localStorage.setItem("loginAttempts", attempts.toString());
                    localStorage.setItem("lockoutTime", lockoutTime.toString());
                    localStorage.setItem("buttonDisabled", buttonDisabled.toString());
                }

                totalSeconds--;
            }, 1000);
        }

        function enableButton() {
            var submitButton = document.querySelector('button[name="login"]');
            submitButton.disabled = false;
            buttonDisabled = false;
        }
    });
</script>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign In</title>
    <link rel="stylesheet" href="./Style/Bootstrap_Style/bootstrap.css">
    <link rel="stylesheet" href="./Style/LoginStyle.css">
    <link rel="stylesheet" href="./Style/SweetAlert2.css">
    <!--<script src="./Script/LoginValidation.js"></script>-->
    <script src="./Script/SweetAlert2.js"></script>
    <link rel="shortcut icon" href="./Image/login.svg" type="image/x-icon">
</head>

<body style="color: #fff;">
    <div class="container-fluid">
        <div class="registration-form">
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
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
                    <input type="text" class="form-control item" name="username" id="username" placeholder="Username">
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
                <p class="text-center" name="perror">
                    <?php
                    if (isset($message)) {
                        if ($success) {
                            echo "<script>Swal.fire({
                                icon: 'success',
                                text: '$message',
                                background: '#19191a',
                                color: '#fff',
                              })</script>";
                        }
                    }
                    ?>
                </p>
            </div>
            <p class="text-muted text-center"><small>
                    Refreshing the page while locked out will reset the time immediately. <br>
                    <span class="text-warning">&copy; 2023. All Rights Reserved.</span>
                </small></p>
        </div>

    </div>
</body>

</html>