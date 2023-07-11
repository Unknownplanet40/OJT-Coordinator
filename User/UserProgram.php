<?php
session_start();
@include_once("../Database/config.php");
@include_once("../Components/PopupAlert.php");

$_SESSION['SAtheme'] = "light";

if (!isset($_SESSION['DatahasbeenFetched'])) {
    header("Location: ../Login.php");
} elseif ($_SESSION['GlobalProfileCompleted'] == 'false') {
    header("Location: ../User/UserProfile.php");
} else {
    $ShowAlert = true;
    if ($_SESSION['GlobalProgram'] == null) {
        header("Location: ../User/UserNoProgram.php");
    }
}

$sql = "SELECT * FROM tbl_programs WHERE progID = '" . $_SESSION['GlobalID'] . "'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if (mysqli_num_rows($result) > 0) {
    $title = $row['title'];
    $description = $row['description'];
    $startDate = date("F d, Y", strtotime($row['start_date']));
    $endDate = date("F d, Y", strtotime($row['end_date']));
    $location = $row['progloc'];
    $hours = $row['hours'];
    $start_time = date("h:i A", strtotime($row['start_time']));
    $end_time = date("h:i A", strtotime($row['end_time']));
    $duration = $row['Duration'];
    $Supervisor = $row['Supervisor'];
    $_SESSION['USERID'] = $row['progID'];
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style/ImportantImport.css">
    <link rel="stylesheet" href="../Style/Sidebar.css">
    <script src="../Script/SweetAlert2.js"></script>
    <title>Program Details</title>
</head>

<body>
    <?php
    include_once '../Components/Sidebar.php';
    if (isset($ShowAlert)) {
        echo NewAlertBox();
        $_SESSION['Show'] = false;
    } ?>
    <section class="home">
        <div class="text">Program Details</div>
        <div style="margin: 10px; width: 98%;">
            <div class="text-center text-uppercase fs-3 fw-bolder">
                <?php echo $title ?>
            </div>
            <div style="display: flex; justify-content: center;">
                <div class="fs-5 text-center mt-2 mb-2" style="width: 75%;">
                    <?php echo $description ?>
                </div>
            </div>
            <br>
            <div class="container">
                <div class="row row-cols-1 row-cols-md-2 g-4">
                    <div class="col-md-6">
                        <ul class="list-group shadow-lg">
                            <li class="list-group-item text-bg-success text-center text-uppercase">Program Details</li>
                            <li class="list-group-item"><span class="fw-bold">Start Date: </span>
                                <?php echo $startDate ?>
                            </li>
                            <li class="list-group-item"><span class="fw-bold">End Date: </span>
                                <?php echo $endDate ?>
                            </li>
                            <li class="list-group-item"><span class="fw-bold">Location: </span>
                                <?php echo $location ?>
                            </li>
                            <li class="list-group-item"><span class="fw-bold">Hours: </span>
                                <?php echo $hours ?> hours
                            </li>
                            <li class="list-group-item"><span class="fw-bold">Start Time: </span>
                                <?php echo $start_time ?>
                            </li>
                            <li class="list-group-item"><span class="fw-bold">End Time: </span>
                                <?php echo $end_time ?>
                            </li>
                            <li class="list-group-item"><span class="fw-bold">Duration: </span>
                                <?php echo $duration ?> weeks
                            </li>
                            <li class="list-group-item"><span class="fw-bold">Supervisor: </span>
                                <?php echo $Supervisor ?>
                            </li>
                        </ul>
                    </div>
                    <br>
                    <div class="col-md-6">
                        <ul class="list-group shadow-lg">
                            <!-- explode text into array seperated by ; -->
                            <li class="list-group-item text-bg-success text-center text-uppercase">Trainee Details</li>
                            <li class="list-group-item"><span class="fw-bold">Name: </span>
                                <?php echo $_SESSION['GlobalName'] ?>
                            </li>
                            <li class="list-group-item"><span class="fw-bold">Email: </span>
                                <?php echo $_SESSION['GlobalEmail'] ?>
                            </li>
                            <li class="list-group-item"><span class="fw-bold">Birt Date: </span>
                                <?php echo date("F d, Y", strtotime($_SESSION['GlobalBirthdate'])) ?>
                            </li>
                            <li class="list-group-item"><span class="fw-bold">Department: </span>
                                <?php echo $_SESSION['GlobalDept'] ?>
                            </li>
                            <li class="list-group-item"><span class="fw-bold">Course & Section: </span>
                                <?php echo $_SESSION['GlobalCourse'] ?>
                            </li>
                            <li class="list-group-item"><span class="fw-bold">Gender: </span>
                                <?php echo $_SESSION['GlobalGender'] ?>
                            </li>
                            <li class="list-group-item"><span class="fw-bold">Phone Number: </span>
                                <?php echo $_SESSION['GlobalPhone'] ?>
                            </li>
                            <li class="list-group-item"><span class="fw-bold">Address: </span>
                                <?php echo $_SESSION['GlobalAddress'] ?>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-12 text-center mt-4">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <ul class="list-group shadow-lg">
                                    <li class="list-group-item text-bg-success text-center text-uppercase">Download your
                                        Placement Form</li>
                                    <li class="list-group-item"><a id="btnDownload" class="btn btn-success">Download</a></li>
                                    <script>
                                        let btnDownload = document.getElementById("btnDownload");
                                        btnDownload.addEventListener("click", function() {
                                            window.location.href = "../Components/generatepdf.php?ID=<?php echo $_SESSION['GlobalID'] ?>";
                                        });
                                    </script>
                                </ul>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="text">Progress</div>
            <div>
                <div class="text-center text-uppercase fs-6 fw-bolder">Web Development Internship</div>
                <div class="text-center fs-6 fw-bolder">Progress:
                    <?php echo $_SESSION['GlobalPercentage'] ?>%
                </div>
                <br>
                <div style="display: flex; justify-content: center;">
                    <div class="progress bg-secondary" style="width: 75%;">
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-success"
                            role="progressbar" style="width: <?php echo $_SESSION['GlobalPercentage'] ?>%;"
                            aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"><?php echo $_SESSION['GlobalPercentage'] ?>%</div>
                    </div>
                </div>
            </div>
            <br>
            <div class="text">Event Joined</div>
            <div class="d-flex justify-content-center">
                <div style="width: 75%; margin-bottom: 10px;">
                    <ol class="list-group">
                        <li
                            class="list-group-item d-flex justify-content-between align-items-start list-group-item-success">
                            <div class="ms-2 me-auto ">
                                <div class="fw-bold">Event Name</div>
                            </div>
                            Status
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto ">
                                <!-- <div class="fw-light">You don't have any event joined yet.</div> -->
                                <?php
                                $sql = "SELECT EventID FROM tbl_trainee WHERE UID = '" . $_SESSION['GlobalID'] . "'AND Join_an_Event = 1";
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_assoc($result);
                                if (isset($row['EventID'])) {
                                    $ID = $row['EventID'];
                                }

                                if (mysqli_num_rows($result) > 0) {
                                    $sql = "SELECT * FROM tbl_events WHERE eventID = '" . $ID . "'";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_assoc($result);

                                    $output =
                                        '<div class="card-body">
                                    <!-- this should be a list of events joined by the user -->
                                    <h5 class="card-title">' . $row['title'] . '</h5> <!-- Event Title -->
                                    <p class="card-text">' . $row['description'] . '</p> <!-- Event Description -->
                                    <p class="card-text">' . $row['eventLocation'] . '</p> <!-- Event Date -->
                                    <p class="card-text">' . date("d-m-Y", strtotime($row['eventDate'])) . '</p> <!-- Event Date -->
                                    <p class="card-text">' . date("h:i A", strtotime($row['eventTime'])) . '</p> <!-- Event Time -->
                                    <p class="card-text">' . $row['eventduration'] . ' Weeks</p> <!-- Event Duration -->
                                </div>';
                                } else {
                                    $output = '<div class="fw-light">You don\'t have any event joined yet.</div>';
                                }
                                echo $output;
                                ?>
                            </div>
                        </li>
                    </ol>
                </div>
            </div>
            <br>
        </div>
    </section>
    <script src="../Script/SidebarScript.js"></script>
    <script src="../Script/Bootstrap_Script/bootstrap.bundle.js"></script>
</body>

</html>