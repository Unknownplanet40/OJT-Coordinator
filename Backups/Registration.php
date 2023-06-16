<?php
$alreadyExists =false;
$usnExists =false;

echo "<script>EmailExists = " . json_encode($alreadyExists) . ";</script>";
echo "<script>UsnAlreadyExists = " . json_encode($usnExists) . ";</script>";


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
    <script src="./Script/RegisterValidation.js"></script>
    <link rel="shortcut icon" href="./Image/Register.svg" type="image/x-icon">
</head>

<body>
    <div class="container-fluid">
        <div class="registration-form">
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
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
                    <div class="col-6">
                        <div class="form-group">
                            <input type="text" class="form-control item" name="Traineename" id="Traineename"
                                placeholder="Name">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <input type="text" class="form-control item" name="age" id="age" placeholder="Age">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                        <select class="form-control item" name="Gender" id="course">
                                <option selected hidden>Sex</option>
                                <option value="male">Male</option>
                                <option value="Female">Female</option>
                                <option value="LGBTQ">LGBTQ+</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="form-group">
                            <input type="text" class="form-control item" name="email" id="email"
                                placeholder="Email Address">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <!-- <input type="text" class="form-control item" name="course" id="course"
                                placeholder="Current Course"> -->
                            <select class="form-control item" name="course" id="course">
                                <option selected hidden>Current Course</option>
                                <option value="BSIT">BSIT</option>
                                <option value="BSCS">BSCS</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <input type="date" class="form-control item" name="birth" id="birth"
                                placeholder="Birthdate">
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="form-group">
                            <input type="tel" class="form-control item" name="phone" id="phone" placeholder="Phone">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <input type="text" class="form-control item" name="address" id="address"
                                placeholder="Current Address">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <input type="text" class="form-control item" name="usn" id="usn"
                                placeholder="University Serial Number">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <input type="text" class="form-control item" name="city" id="city" placeholder="City">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <input type="tel" class="form-control item" name="postal" id="postal"
                                placeholder="Postal Code">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <input type="tel" class="form-control item" name="province" id="province"
                                placeholder="Province">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control item" name="username" id="username" placeholder="Username">
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <input type="password" class="form-control item" name="password" id="password"
                                    placeholder="Password">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <input type="password" class="form-control item" name="confirm" id="confirm"
                                    placeholder="Confirm Password">
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
                    <button type="submit" class="btn btn-block create-account" name="login">Create
                        Account</button>
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

            </div>
            <p class="text-muted text-center"><small>
                    Please enter your basic information to create an account.<br>
                    <span class="text-warning">&copy; 2023. All Rights Reserved.</span>
                </small></p>
        </div>
    </div>
</body>

</html>