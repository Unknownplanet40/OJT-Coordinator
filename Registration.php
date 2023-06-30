<?php
session_start();
@include_once("./Database/config.php");
@include_once("./Components/SystemLog.php");

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

    //current date format YYYY-MM-DD
    $date = date("Y-m-d");

    $_SESSION['temp'] = array($name, $age, $email, $usn, $username, $password, $confirm);

    // check if fields are empty
    if ($name == "" || $age == "" || $email == "" || $usn == "" || $username == "" || $password == "" || $confirm == "") {
        $error[] = "Please fill all the fields";
    } else {
        // name validation
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $error[] = "Only letters and white space allowed in name";
        } elseif (strlen($name) < 3) {
            $error[] = "Name must be atleast 3 characters";
        } elseif (strlen($name) > 50) {
            $error[] = "You have exceeded the maximum character for name";
        } else {
            // capitalize the first letter of the name
            $name = ucwords(strtolower($name));

            // age validation
            if ($age < 18) {
                $error[] = "You must be 18 years old and above to register";
            } elseif ($age > 99) {
                $error[] = "You have exceeded the maximum age to register";
            } else {
                // email validation
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $error[] = "Enter a valid email address format";
                } elseif (strlen($email) > 50) {
                    $error[] = "You have exceeded the maximum character for email";
                } elseif (strlen($email) < 10) {
                    $error[] = "Email must be atleast 10 characters";
                } elseif (!in_array(substr($email, strpos($email, "@")), $validEmailDomain)) {
                    $error[] = "Please enter a valid email domain";
                } else {
                    // usn validation
                    if (strlen($usn) < 10 || strlen($usn) > 10) {
                        $error[] = "University Serial Number must be 10 numeric characters";
                    } else {
                        // username validation
                        // if username is equal to  admin, then it will not be accepted
                        if (strtolower($username) == "admin" || strpos(strtolower($username), "admin") !== false) {
                            $error[] = "You cannot use this username because it is reserved for the admin only";
                        } elseif (strlen($username) < 5) {
                            $error[] = "Username must be atleast 5 characters";
                        } elseif (strlen($username) > 20) {
                            $error[] = "You have exceeded the maximum character for username";
                        } elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
                            $error[] = "Only letters and numbers allowed in username";
                        } elseif (preg_match("/[A-Z]/", $username)) {
                            $error[] = "Username must not contain uppercase letters";
                        } elseif (!preg_match("/^[a-z].*[0-9]$/", $username)) {
                            $error[] = "Username must start with a letter and end with a number";
                        } else {
                            // password validation
                            if (strlen($password) < 8) {
                                $error[] = "Password must be atleast 8 characters";
                            } elseif (strlen($password) > 20) {
                                $error[] = "You have exceeded the maximum character for password";
                            } elseif (!preg_match("#[0-9]+#", $password)) {
                                $error[] = "Password must include at least one number!";
                            } elseif (!preg_match("#[a-zA-Z]+#", $password)) {
                                $error[] = "Password must include at least one letter!";
                            } elseif (!preg_match("#[A-Z]+#", $password)) {
                                $error[] = "Password must include at least one uppercase letter!";
                            } elseif (!preg_match("#[a-z]+#", $password)) {
                                $error[] = "Password must include at least one lowercase letter!";
                            } elseif (!preg_match("#[\W]+#", $password)) {
                                $error[] = "Password must include at least one special character!";
                            } elseif ($password != $confirm) {
                                $error[] = "Please make sure your passwords match each other";
                            } else {
                                // this will need to be updated if the database is updated
                                $sql = "SELECT * FROM tbl_trainee WHERE trainee_uname = '$username' OR email = '$email' OR UID = '$usn'";
                                $result = mysqli_query($conn, $sql);

                                // check if the username, email, and usn is already taken
                                if ($result && mysqli_num_rows($result) > 0) {
                                    $row = mysqli_fetch_array($result);

                                    if ($row['trainee_uname'] == $username) {
                                        $unameAlreadyTaken = "Your username is already taken, please try another one";
                                    } else if ($row['email'] == $email) {
                                        $emailAlreadyTaken = "Your email is already taken, please try another one";
                                    } else if ($row['UID'] == $usn) {
                                        $usnAlreadyTaken = $usn . " is already taken, please try another one";
                                    }
                                } else {
                                    $ParentFolder = $username . "_Credentials";
                                    $folderpath = '../uploads/' . $ParentFolder;
                                    $tempfolderpath = '../uploads/' . $ParentFolder . '/temp';
                                    if (!file_exists($folderpath)) {
                                        mkdir($folderpath, 0777, true);
                                    } else if (!file_exists($tempfolderpath)) {
                                        mkdir($tempfolderpath, 0777, true);
                                    }

                                    $sql = "INSERT INTO tbl_trainee (name, email, UID, trainee_uname, trainee_pword, account_Created) VALUES ('$name', '$email', '$usn', '$username', '$password', '$date')";
                                    $result = mysqli_query($conn, $sql);
                                    if ($result) {
                                        $_SESSION['temp'] = array();
                                        $success = "Account successfully created";
                                        $_SESSION['autoUsername'] = $username;
                                        $_SESSION['autoPassword'] = $password;
                                    } else {
                                        $error[] = "Error in creating account";
                                    }
                                }

                            }
                        }
                    }
                }
            }
        }
    }

}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration Form</title>
    <link rel="stylesheet" href="./Style/Bootstrap_Style/bootstrap.css">
    <link rel="stylesheet" href="./Style/RegistrationStyle.css">
    <link rel="stylesheet" href="./Style/SweetAlert2.css">
    <script src="./Script/SweetAlert2.js"></script>
    <script src="./Script/RegisterValidation.js"></script>
    <script defer src="./Script/Bootstrap/bootstrap.bundle.js"></script>
    <link rel="shortcut icon" href="./Image/Register.svg" type="image/x-icon">

</head>

<body style="color: #fff;">
    <div class="container-fluid">
        <div class="registration-form">
            <form method="POST" action="Registration.php" enctype="multipart/form-data" id="register-form"
                onsubmit="return submitForm()">
                <!-- this function is used to send the data to the same page -->
                <div class="form-icon">
                    <span>
                        <span>
                            <img src="./Image/Login.gif" alt="Login" width="100px" height="100px">
                        </span>
                    </span>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="form-group">
                            <input type="text" class="form-control item" name="Traineename" id="Traineename"
                                placeholder="Name" value="<?php if (isset($_SESSION['temp'][0])) {
                                    echo $_SESSION['temp'][0];
                                } ?>" title="Ex: Juan Dela Cruz">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <input type="text" class="form-control item" name="age" id="age" placeholder="Age" value="<?php if (isset($_SESSION['temp'][1])) {
                                echo $_SESSION['temp'][1];
                            } ?>" title="Ex: 18">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <input type="text" class="form-control item" name="email" id="email"
                                placeholder="Email Address" value="<?php if (isset($_SESSION['temp'][2])) {
                                    echo $_SESSION['temp'][2];
                                } ?>" title="Ex: Blk. 0 Lot 0, Village">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <input type="text" class="form-control item" name="usn" id="usn"
                                placeholder="University Serial Number" value="<?php if (isset($_SESSION['temp'][3])) {
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
                                    placeholder="Confirm Password" value="<?php if (isset($temp[6])) {
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
                    <?php
                    if (isset($unameAlreadyTaken)) {
                        echo "<script>Swal.fire({
                            icon: 'error',
                            text: '$unameAlreadyTaken',
                            background: '#19191a',
                            color: '#fff',
                          })</script>";
                    } else if (isset($emailAlreadyTaken)) {
                        echo "<script>Swal.fire({
                            icon: 'error',
                            text: '$emailAlreadyTaken',
                            background: '#19191a',
                            color: '#fff',
                          })</script>";
                    } else if (isset($usnAlreadyTaken)) {
                        echo "<script>Swal.fire({
                            icon: 'error',
                            text: '$usnAlreadyTaken',
                            background: '#19191a',
                            color: '#fff',
                          })</script>";
                    } else if (isset($success)) {
                        echo '<script>Swal.fire({
                            title: "Please wait...",
                            html: "We are creating your account",
                            allowOutsideClick: false,
                            showConfirmButton: false,
                            background: "#19191a",
                            color: "#fff",
                            onBeforeOpen: () => {
                              Swal.showLoading();
                            },
                          })
                          var randommilliseconds = Math.floor(
                            Math.random() * (9999 - 1000 + 1) + 1000
                          ).toString();
                          setTimeout(function () {
                                Swal.fire({
                                    icon: "success",
                                    title: "Success!",
                                    text: "' . $success . '",
                                    background: "#19191a",
                                    color: "#fff",
                                    allowOutsideClick: false,
                                    showCancelButton: true,
                                    confirmButtonColor: "#3085d6",
                                    cancelButtonColor: "#d33",
                                    confirmButtonText: "Login",
                                    cancelButtonText: "Back",
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = "./Login.php";
                                    } 
                                });
                                }, randommilliseconds);
                            </script>';
                    } else if (isset($error)) {
                        foreach ($error as $value) {
                            echo $value;
                        }
                    } else {
                        // this will not be executed unless there is an error in the code
                        logMessage("Error", "Registration", "There is an error in the registration process of the trainee");
                    }
                    ?>
                </p>
                <script>
                    setTimeout(function () {
                        document.getElementsByName("perror")[0].innerHTML = "";
                    }, 6500);
                    document.querySelector('.error').scrollIntoView({
                        behavior: 'smooth'
                    });
                </script>
            </div>
            <p class="text-light text-center"><small>
                    Please enter your basic information to create an account.<br>
                    <span class="text-warning">&copy; 2023. All Rights Reserved.</span>
                </small></p>
        </div>
    </div>
</body>

</html>

<!-- Path: Registration.php -->