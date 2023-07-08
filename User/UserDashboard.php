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
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style/ImportantImport.css">
    <link rel="stylesheet" href="../Style/TestingDashboard.css">
    <script src="../Script/SweetAlert2.js"></script>
    <title>Dashboard</title>
</head>

<body>
    <?php include_once '../Components/Sidebar.php';
    if (isset($ShowAlert)) {
        echo NewAlertBox();
        $_SESSION['Show'] = false;
    } ?>

    <section class="home">
        <div class="text">Dashboard</div>
        <div class="content" style="margin: 10px; width: 98%;">
            <?php @include_once '../Components/Announcement.php'; ?>
            <div class="row">
                <div class="col-sm-8">
                    <div class="card h-100">
                        <div class="card-header">
                            Program Joined
                        </div>
                        <!-- this should be the program joined by the user -->
                        <div class="card-body">
                            <h5 class="card-title">Web Development Internship</h5>
                            <p class="card-text">Duration: 12 Weeks</p>
                            <p class="card-text">Start and End Date: January 1, 2023 - March 31, 2023</p>
                            <p class="card-text">Gain practical experience and training in web development through the
                                Web Development Internship. Develop skills in HTML, CSS, and JavaScript, and collaborate
                                on real-world projects under the guidance of experienced mentors.
                            </p>
                        </div>
                        <br>
                        <div class="card-footer">
                            <div class="progress">
                                <!-- this should be the progress of the user in the program -->
                                <!-- just change the width of the div to change the progress -->
                                <div class="progress-bar bg-success" role="progressbar" style="width: 25%;"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25% Complete</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card h-100 card border-success mb-3">
                        <div class="card-header">
                            Events Joined
                        </div>
                        <div class="card-body">
                            <!-- this should be a list of events joined by the user -->
                            <h5 class="card-title"></h5> <!-- Event Name -->
                            <p class="card-text">No events joined yet.</p> <!-- Event Description -->
                            <!-- so on and so forth -->
                            <!--<a href="#" class="btn btn-success" hidden>Go somewhere</a>-->
                        </div>
                    </div>
                </div>
            </div>
            <div class="text">Events</div>
            <div class="container-lg">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <?php
                    $sql = "SELECT * FROM tbl_events";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {

                        while ($row = mysqli_fetch_assoc($result)) {

                            $start = date("g:i A", strtotime($row['eventStartTime']));
                            $end = date("g:i A", strtotime($row['eventEndTime']));
                            $date = date("F j, Y", strtotime($row['eventDate']));

                            $output =
                                '
                    <div class="col">
                        <div class="card h-100">
                            <img style="ratio: 16/9" src="' . $row['eventImage'] . '" class="card-img-top"
                                alt="...">
                            <div class="card-body">
                                <h5 class="card-title">' . $row['eventTitle'] . '</h5>
                                <p class="card-text">' . $date . '</p>
                                <p class="card-text">' . $row['eventLocation'] . '</p>
                                <p class="card-text" style="font-size: 14px;">' . $row['eventDescription'] . '</p>
                                <small class="text-muted">Time: ' . $start . ' - ' . $end . ' | Available Seats: ' . $row['eventSlots'] . '</small>
                            </div>
                            <div class="card-footer text-center">
                                <!-- if the user is already registered, the button should be disabled -->
                                ';
                            echo $output;
                            if ($_SESSION['GlobalJoin_an_Event'] == 1) {
                                echo '<a class="btn btn-success" hidden>Register</a>
                            </div>
                        </div>
                    </div>';
                            } else {
                                echo '<a href="../Components/eventprocess.php?ID=' . $row['eventID'] . '" class="btn btn-success">Register</a>
                            </div>
                        </div>
                    </div>';
                            }
                        }

                    } else {
                        echo '
                    <div class="content d-flex justify-content-center" style="margin: 10px; width: 98%;">
                        No Events Available
                    </div>';
                    }
                    ;
                    ?>
                </div>
            </div>
            <br>
        </div>

    </section>
    <script src="../Script/SidebarScript.js"></script>
    <script src="../Script/Bootstrap_Script/bootstrap.bundle.js"></script>
</body>

</html>

<!-- Path: User\UserDashboard.php -->