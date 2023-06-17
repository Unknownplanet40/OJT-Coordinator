<?php
// this is a Design Version 2.0
session_start();

// check if message is set
if (isset($_SESSION['message'])) {
    echo "<script>alert('" . $_SESSION['message'] . "')</script>";
    unset($_SESSION['message']);
}

// It's not submitting, when the code for the Validation is in the same file as the code for the database.
// so I separated the code for the Validation and the code for the database.
// I put the code for Database in a different file named database.php
?>
<!-- Reference for the design: https://epicbootstrap.com/snippets/registration -->
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>registration form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        :root {
            --clr-background: #1b1b1b;
            --clr-secondary: #292929;
            --clr-accent: #ffa31a;
            --clr-input: #808080;
        }

        /*For the scroll-bar*/
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: var(--body-color);
            transition: var(--tran-05);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--primary-color);
            border-radius: 5px;
        }

        ::selection {
            background-color: var(--primary-color);
            color: #fff;
        }

        body {
            background-color: var(--clr-background);
        }

        .registration-form {
            padding: 20px 0;
        }

        .registration-form form {
            background-color: var(--clr-secondary);
            max-width: 550px;
            margin: auto;
            padding: 50px 70px 10px 70px;
            border-top-left-radius: 30px;
            border-top-right-radius: 30px;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
        }

        .registration-form .form-icon {
            text-align: center;
            background-color: var(--clr-accent);
            border-radius: 50%;
            font-size: 40px;
            color: white;
            width: 100px;
            height: 100px;
            margin: auto;
            margin-bottom: 50px;
            line-height: 100px;
        }

        .registration-form .form-icon span svg {
            margin-top: -20px;
        }

        .registration-form .item {
            border-radius: 20px;
            margin-bottom: 25px;
            padding: 10px 20px;
            background-color: var(--clr-input);
            color: white;
        }

        .registration-form .item::placeholder {
            color: #fff;
        }

        .registration-form .create-account {
            border-radius: 10px;
            padding: 8px 20px;
            font-size: 18px;
            font-weight: bold;
            background-color: var(--clr-accent);
            border: none;
            color: white;
            margin-top: 10px;
            width: 100%;
        }

        .registration-form .reg-link {
            color: #fff;
            text-align: right;
        }

        .registration-form .reg-link a {
            color: var(--clr-accent);
            text-decoration: none;
        }

        .registration-form .reg-link a:hover {
            color: var(--clr-input);
            text-decoration: none;
        }

        .registration-form .social-media {
            max-width: 550px;
            background-color: var(--clr-secondary);
            margin: auto;
            padding: 20px 0;
            text-align: center;
            border-bottom-left-radius: 30px;
            border-bottom-right-radius: 30px;
            color: #9fadca;
            /* border-top: 1px solid var(--clr-accent); */
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
        }

        .registration-form .error {
            margin-bottom: 16px;
        }

        .registration-form .error p {
            margin: 0;
            font-size: 16px;
            font-weight: bold;
            margin-right: 5px;
            color: #dc3545;
        }

        @media (max-width: 576px) {
            .registration-form form {
                padding: 50px 20px;
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="registration-form">
            <form method="POST" action="database.php">
                <div class="form-icon">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 96 960 960" fill="var(--clr-secondary)">
                            <path
                                d="M480 576q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM240 896q-33 0-56.5-23.5T160 816v-32q0-34 17.5-62.5T224 678q62-31 126-46.5T480 616q66 0 130 15.5T736 678q29 15 46.5 43.5T800 784v32q0 33-23.5 56.5T720 896H240Z" />
                        </svg>
                    </span>
                </div>
                <!-- &nbsp; is a non-breaking space -->
                <div class="form-group">
                    <input type="text" class="form-control item" name="username" id="username" placeholder="Name">
                    <div class="text-danger" id="usernameErr" style="margin: -25px 0 5px 15px;">&nbsp;</div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control item" name="email" id="email" placeholder="Email Address">
                    <div class="text-danger" id="mailErr" style="margin: -25px 0 5px 15px;">&nbsp;</div>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control item" name="password" id="password"
                        placeholder="Password">
                    <div class="text-danger" id="passwordErr" style="margin: -25px 0 5px 15px;">&nbsp;</div>
                    <div style="margin: -5px 5px 0 5px; display: flex; justify-content: space-between;">
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
                    <button type="submit" class="btn btn-block create-account" name="login" id="login">Create Account</button>
                    <div>
                        <p class="reg-link text-end">Already have an account? <a href="loginForm.php">Sign In</a>
                        </p>
                    </div>
                </div>
            </form>
            <div class="social-media error">

            </div>
            <!-- This design is not its final form; it may change in the future. -->
            <p class="text-muted text-center mb-0"><small>
                    <span class="text-warning">&copy; 2023. All Rights Reserved.</span>
                </small></p>
        </div>
        <script>
            var form = document.querySelector("form");
            var showPassword = document.getElementById("flexCheckDefault");
            // for error message
            var errorDiv = document.querySelector(".error");
            var userError = document.getElementById("usernameErr");
            var passError = document.getElementById("passwordErr");
            var mailError = document.getElementById("mailErr");
            // for input fields
            var uname = document.getElementById("username");
            var pname = document.getElementById("password");
            var mail = document.getElementById("email");
            // for validation
            var validDomain = ["gmail.com", "yahoo.com", "outlook.com", "icloud.com", "hotmail.com", "live.com"];

            // Show/hide password
            showPassword.addEventListener("click", function () {
                if (pname.type === "password") {
                    pname.type = "text";
                } else {
                    pname.type = "password";
                }
            });

            // Form Validation
            form.addEventListener("submit", (event) => {
                event.preventDefault();

                errorDiv.innerHTML = "";
                username = uname.value;
                password = pname.value;
                email = mail.value;

                function emailIsValid(email) {
                    if (validDomain.includes(email.split("@")[1])) {
                        return true;
                    } else {
                        return false;
                    }
                }

                if (username.trim() === "" || password.trim() === "" || email.trim() === "") {
                    errorDiv.innerHTML = "Please fill up the form properly";
                    userError.innerHTML = "&nbsp;";
                    passError.innerHTML = "&nbsp;";
                    mailError.innerHTML = "&nbsp;";
                } else if (password.length < 8) {
                    errorDiv.innerHTML = "";
                    userError.innerHTML = "&nbsp;";
                    passError.innerHTML = "Password must be at least 8 characters long";
                    mailError.innerHTML = "&nbsp;";
                } else if (!/[a-z]/.test(password)) {
                    errorDiv.innerHTML = "";
                    userError.innerHTML = "&nbsp;";
                    passError.innerHTML = "Password must contain at least one lowercase character";
                    mailError.innerHTML = "&nbsp;";
                } else if (!/[A-Z]/.test(password)) {
                    errorDiv.innerHTML = "";
                    userError.innerHTML = "&nbsp;";
                    passError.innerHTML = "Password must contain at least one uppercase character";
                    mailError.innerHTML = "&nbsp;";
                } else if (!/[0-9]/.test(password)) {
                    errorDiv.innerHTML = "";
                    userError.innerHTML = "&nbsp;";
                    passError.innerHTML = "Password must contain at least one digit";
                    mailError.innerHTML = "&nbsp;";
                } else if (/\d/.test(username)) {
                    errorDiv.innerHTML = "";
                    userError.innerHTML = "Name must not contain any digit";
                    passError.innerHTML = "&nbsp;";
                    mailError.innerHTML = "&nbsp;";
                } else if (!/\s/.test(username)) {
                    errorDiv.innerHTML = "";
                    userError.innerHTML = "Name must contain at least one whitespace";
                    passError.innerHTML = "&nbsp;";
                    mailError.innerHTML = "&nbsp;";
                } else if (username.length < 4) {
                    errorDiv.innerHTML = "";
                    userError.innerHTML = "Name not Valid (at least 4 characters long)";
                    passError.innerHTML = "&nbsp;";
                    mailError.innerHTML = "&nbsp;";
                } else if (/\s/.test(email)) {
                    errorDiv.innerHTML = "";
                    userError.innerHTML = "&nbsp;";
                    passError.innerHTML = "&nbsp;";
                    mailError.innerHTML = "Email must not contain any whitespace";
                } else if (!/[@.]/.test(email)) {
                    errorDiv.innerHTML = "";
                    userError.innerHTML = "&nbsp;";
                    passError.innerHTML = "&nbsp;";
                    mailError.innerHTML = "Email must contain '@' and '.' Special Characters";
                } else if (!emailIsValid(email)) {
                    errorDiv.innerHTML = "";
                    userError.innerHTML = "&nbsp;";
                    passError.innerHTML = "&nbsp;";
                    mailError.innerHTML = "Please enter a valid email address";
                } else {
                    userError.innerHTML = "&nbsp;";
                    passError.innerHTML = "&nbsp;";
                    mailError.innerHTML = "&nbsp;";
                    form.submit();
                }
            });
        </script>
    </div>
</body>

</html>