<?php
session_start();
@include_once '../Database/config.php"';
@include_once '../Components/SystemLog.php';
@include_once '../Components/PopupAlert.php';
@include_once '../Components/ImageUpload.php';
@include_once '../Components/VaccineeData.php';
date_default_timezone_set('Asia/Manila');

$_SESSION['SAtheme'] = "light";

if (!isset($_SESSION['DatahasbeenFetched'])) {
    header("Location: ../Login.php");
}

if (isset($_POST['imageupload'])) {
    ProfileUpload();
}

if ($_SESSION['GlobalProfileCompleted'] == 'false') {
    // if the user has not completed his/her profile,
    $title = "Complete your profile";
    echo '<script>var ProfileCompleted = false;</script>';
    //get the age from database
    $sql = "SELECT age FROM tbl_trainee WHERE UID = " . $_SESSION['GlobalID'];
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $age = $row['age'];
    $year = date("Y");
    $year = $year - $age;
} else {
    // if the user has completed his/her profile,
    $title = "Profile Information";
    echo '<script>var ProfileCompleted = true;</script>';

    $sql = "SELECT * FROM tbl_secquestion WHERE UID = " . $_SESSION['GlobalID'];
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $questions = $row['question'];
        $answers = $row['answer'];
        $date = $row['date_submitted'];
        $dateUpdated = $row['date_updated'];

        // check if  null or empty
        if ($questions == null && $answers == null && $date == null) {

            $Q1 = NULL;
            $Q2 = NULL;
            $Q3 = NULL;

            $ans1 = NULL;
            $ans2 = NULL;
            $ans3 = NULL;

            $secmodalTitle = "Set your security questions";
            $_SESSION['SecQue'] = false;

        } else {
            // split the questions and answers
            $questions = explode(";", $questions);
            $answers = explode(";", $answers);

            // get the questions
            $Q1 = $questions[0];
            $Q2 = $questions[1];
            $Q3 = $questions[2];

            // get the answers
            $ans1 = $answers[0];
            $ans2 = $answers[1];
            $ans3 = $answers[2];

            $secmodalTitle = "Update your security questions";
            $_SESSION['SecQue'] = true;

            // get the date
            if ($dateUpdated == NULL) {
                $secQueDate = date("F d, Y - h:i A", strtotime($date));
                $sectitle = "Date submitted on";
            } else {
                $secQueDate = date("F d, Y - h:i A", strtotime($dateUpdated));
                $sectitle = "Last updated on";
            }
        }

    } else {
        // if the user has not set his/her security questions,
        $sql = "INSERT INTO tbl_secquestion (UID) VALUES (" . $_SESSION['GlobalID'] . ")";
        $result = mysqli_query($conn, $sql);

        $secmodalTitle = "Set your security questions";
        $_SESSION['SecQue'] = false;
    }
}

if (isset($_SESSION['GlobalVaccCompleted']) && $_SESSION['GlobalVaccCompleted'] == 1) {
    echo '<script>var VaccCompleted = true;</script>';
    echo '<script>console.log(VaccCompleted);</script>';
} else {
    echo '<script>var VaccCompleted = false;</script>';
    echo '<script>console.log(VaccCompleted);</script>';
}

if ($_SESSION['GlobalProfileCompleted'] == 'true') {
    $disabled = "";
} else {
    $disabled = "disabled";
}

if ($_SESSION['GlobalVaccinated'] == 0) {
    $disabledVac = "hidden";
} else {
    $disabledVac = "";
}

if ($_SESSION['GlobalSecQue'] == 1) {
    $secBadge = "hidden";
} else {
    $secBadge = "";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style/Uprofile.css">
    <link rel="stylesheet" href="../Style/ImportantImport.css">
    <script src="../Script/SweetAlert2.js"></script>
    <script defer src="../Script/UProfile.js"></script>
    <script defer src="../Script/SidebarScript.js"></script>
    <script defer src="../Script/Bootstrap_Script/bootstrap.bundle.js"></script>
    <title>Profile</title>
</head>

<script>
    // this function checks if the file input is empty or not 
    function checkFileInput() {
        var fileInput = document.getElementById('fileInput');
        var submitButton = document.getElementById('submitButton');

        // if the file input is empty, the submit button will be disabled
        if (fileInput.value === '') {
            submitButton.disabled = true;
        } else {
            submitButton.disabled = false;
        }
    }
</script>

<body>
    <?php @include_once '../Components/Sidebar.php'; ?>
    <?php echo NewAlertBox();
    $_SESSION['Show'] = false; ?>
    <section class="home">
        <div class="text text-truncate">
            <?php echo $title; ?>
        </div>
        <?php
        if ($_SESSION['GlobalProfileCompleted'] == 'false') {
            @include_once '../Components/Uprofile/Incomplete.php';
        } else {
            @include_once '../Components/Modals/SecurityQuestion.php';
            @include_once '../Components/Uprofile/Completed.php';
        }
        ?>
        <hr class="mt-4 mb-4 mx-4" style="background-color: #000; height: 5px; border-radius: 5px;">
        <div class="container">
            <div class="container">
                <b class="text">Vaccination Status</b>
                <div class="container-xl">
                    <div class="container-fluid" id="VACDetails">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="<?php echo $_SESSION['GlobalVaccImage']; ?>" alt="VacCard" id="VacCard"
                                    class="img-fluid img-thumbnail" style="width: 420px;">
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-6">
                                        <b class="fs-4 text-truncate">Vaccine Name:</b>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="fs-5 text-truncate text-success">
                                            <?php echo isset($_SESSION['GlobalVaccName']) ? $_SESSION['GlobalVaccName'] : "Not Available"; ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <b class="fs-4 text-truncate">Vaccine Type:</b>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="fs-5 text-truncate text-success">
                                            <?php echo isset($_SESSION['GlobalVaccType']) ? $_SESSION['GlobalVaccType'] : "Not Available"; ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <b class="fs-4 text-truncate">Vaccine Dose:</b>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="fs-5 text-truncate text-success">
                                            <?php echo isset($_SESSION['GlobalVaccDose']) ? $_SESSION['GlobalVaccDose'] : "Not Available"; ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <b class="fs-4 text-truncate">Vaccine Date(s):</b>
                                    </div>
                                    <div class="col-md-6">
                                        <?php
                                        if (isset($_SESSION['GlobalVaccDose']) && $_SESSION['GlobalVaccDose'] == 'one') {
                                            echo '<p class="fs-5 text-truncate text-success">' . $_SESSION['GlobalVD1'] . '</p>';
                                        } else if (isset($_SESSION['GlobalVaccDose']) && $_SESSION['GlobalVaccDose'] == 'two') {
                                            echo '<p class="fs-5 text-truncate text-success">' . $_SESSION['GlobalVD1'] . '</p>';
                                            echo '<p class="fs-5 text-truncate text-success">' . $_SESSION['GlobalVD2'] . '</p>';
                                        } else if (isset($_SESSION['GlobalVaccDose']) && $_SESSION['GlobalVaccDose'] == 'booster') {
                                            echo '<p class="fs-5 text-truncate text-success">' . $_SESSION['GlobalVD1'] . '</p>';
                                            echo '<p class="fs-5 text-truncate text-success">' . $_SESSION['GlobalVD2'] . '</p>';
                                            echo '<p class="fs-5 text-truncate text-success">' . $_SESSION['GlobalVD3'] . '</p>';
                                        } else {
                                            echo '<p class="fs-5 text-truncate text-success">Not Available</p>';
                                        }
                                        ?>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <b class="fs-4 text-truncate">Vaccine Location:</b>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="fs-5 text-truncate text-success">
                                                <?php echo isset($_SESSION['GlobalVaccLoc']) ? $_SESSION['GlobalVaccLoc'] : "Not Available"; ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <input type="button" class="btn btn-success btn-sm w-50" value="Edit"
                                                id="editVaccine">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="container-xl" id="VACcontainer">
                        <form action="../Components/Uprofile/VACCfunction.php" method="POST"
                            enctype="multipart/form-data" id="VACform">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="vaccineType" class="form-label">Vaccine Type</label>
                                    <select class="form-select" name="vaccineType" id="vaccineType">
                                        <option selected hidden>Choose...</option>
                                        <option value="1">Full Vaccination series</option>
                                        <option value="2">Single Dose Vaccine</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="vaccineName" class="form-label">Vaccine Brand</label>
                                    <select class="form-select form-select-md" name="vaccineName" id="vaccineName">
                                        <option selected hidden>Choose...</option>
                                        <option value="Pfizer">Pfizer - BioNTech</option>
                                        <option value="Moderna">Moderna - NIAID</option>
                                        <option value="AstraZeneca">AstraZeneca - Oxford</option>
                                        <option value="Sinovac">Sinovac - Coronavac</option>
                                        <option value="Sputnik">Sputnik V - Gamaleya</option>
                                        <option id="VNSO7" value="Johnson">Johnson & Johnson - Janssen</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="vaccineDose" class="form-label">Vaccination Dose</label>
                                    <select class="form-select form-select-md" name="vaccineDose" id="vaccineDose">
                                        <option selected hidden>Choose...</option>
                                        <option id="VDSO1" value="one">One Dose</option>
                                        <option value="two">Two Dose</option>
                                        <option value="booster">Booster Dose</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="VD1" class="form-label">Vaccination Date first dose</label>
                                    <input type="date" class="form-control" name="VD1" id="VD1">

                                    <label for="VD2" class="form-label">Vaccination Date second dose</label>
                                    <input type="date" class="form-control" name="VD2" id="VD2">

                                    <label for="VD3" class="form-label">Vaccination Date third dose</label>
                                    <input type="date" class="form-control" name="VD3" id="VD3">
                                </div>
                                <div class="col-md-6">
                                    <label for="vaccineLocation" class="form-label">Vaccination Location</label>
                                    <input type="text" class="form-control" name="vaccineLocation" id="vaccineLocation">
                                </div>
                                <div class="col-md-6">
                                    <label for="vaccineCard" class="form-label">Vaccination Card</label>
                                    <input type="file" class="form-control" name="vaccineCard" id="VaccineInput">
                                    <small class="blockquote-footer" style="font-size: 12px;">You can upload at least 1
                                        file; no need to upload all vaccines, just the latest.</small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 text-center">
                                    <input type="submit" name="vaccine" id="vaccine" class="btn btn-primary btn-sm w-50"
                                        value="Submit" <?php echo $disabled; ?> title="Submit your vaccination details">
                                    <button type="button" class="btn btn-sm btn-success w-50 mt-2"
                                        onclick="location.href='UserProfile.php'" title="Refresh Page to see changes"
                                        <?php echo $disabledVac; ?>>Refresh</button>
                                </div>
                                <script>
                                    document.addEventListener("DOMContentLoaded", function () {
                                        let vac = document.getElementById('vaccine');

                                        vac.addEventListener('click', function () {
                                            // check if the vac have an disabled attribute
                                            if (vac.hasAttribute('disabled')) {
                                                // add title attribute to the vac
                                                vac.setAttribute('title', 'Please complete your profile first');
                                            } else {
                                                // update the title attribute
                                                vac.setAttribute('title', 'Submit your vaccination details');
                                            }
                                        });
                                    });
                                </script>
                                <div class="col-md-6">
                                    <p class="text-danger" id="VACerror">
                                        <script>
                                            setTimeout(function () {
                                                document.getElementById('INCerror').innerHTML = "";
                                            }, 6500);
                                        </script>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </section>
</body>

</html>