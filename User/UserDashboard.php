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
            <?php
            @include_once '../Components/Announcement.php';
            @include_once '../Components/Modals/AdminEventModal.php';
            ?>
            <div class="row">
                <div class="col-sm-8">
                    <div class="card h-100">
                        <div class="card-header">
                            Program Joined
                        </div>
                        <?php
                        $id = $_SESSION['GlobalID'];
                        $sql = "SELECT program, prog_duration, fulfilled_time FROM tbl_trainee WHERE UID = '$id'";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        $program = $row['program'];
                        $duration = $row['prog_duration'];
                        $fulfilled = $row['fulfilled_time'];

                        if (isset($program)) {
                            $sql = "SELECT * FROM tbl_programs WHERE progID = '$id'";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($result);

                            $current_date = date("Y-m-d");
                            $start_date = $row['start_date'];
                            $end_date = $row['end_date'];

                            $start_datetime = new DateTime($start_date);
                            $end_datetime = new DateTime($end_date);
                            $current_datetime = new DateTime($current_date);

                            $total_duration = $start_datetime->diff($end_datetime)->format('%a');
                            $elapsed_duration = $start_datetime->diff($current_datetime)->format('%a');
                            $percentage = ($elapsed_duration / $total_duration) * 100;
                            $percentage = round($percentage, 0);

                            if ($percentage >= 100) {
                                $_SESSION['GlobalPercentage'] = 100;
                            } else {
                                $_SESSION['GlobalPercentage'] = $percentage;
                            }

                            if ($current_date >= $row['end_date']) {
                                $sql = "UPDATE tbl_trainee SET completed = 'true' WHERE UID = '$id'";
                                $result = mysqli_query($conn, $sql);
                                $_SESSION['GlobalCompleted'] = 'true';
                            }

                            $startdate = date("F j, Y", strtotime($row['start_date']));
                            $enddate = date("F j, Y", strtotime($row['end_date']));
                            $start = date("g:i A", strtotime($row['start_time']));
                            $end = date("g:i A", strtotime($row['end_time']));

                            if (isset($_SESSION['GlobalCompleted']) && $_SESSION['GlobalCompleted'] == 'true') {
                                $Progoutput =
                                    '<div class="card-body">
                                        Program has been completed.
                                    </div>';
                            } else {
                                $Progoutput =
                                    '<div class="card-body">
                            <h5 class="card-title">' . $row['title'] . '</h5>
                            <p class="card-text">Duration: ' . $row['Duration'] . ' Weeks</p>
                            <p class="card-text">Start and End Date: ' . $startdate . ' - ' . $enddate . '</p>
                            <p class="card-text">From: ' . $start . ' to ' . $end . '</p>
                            <p class="card-text">Supervisor: ' . $row['Supervisor'] . '</p>
                            <p class="card-text">Description: ' . $row['description'] . '</p>
                            </p>
                            </div>
                            <br>
                            <div class="card-footer">
                            <div class="progress">
                                <div class="progress-bar bg-success progress-bar-striped progress-bar-animated"
                                 role="progressbar" style="width: ' . $percentage . '%"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">' . $percentage . '%</div>
                            </div>
                            </div>';
                            }
                        } else {
                            $Progoutput =
                                '<div class="card-body">
                            No program joined yet.
                            </div>';
                        }

                        echo $Progoutput;
                        ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card h-100 card border-success mb-3">
                        <div class="card-header">
                            Events Joined
                        </div>
                        <?php
                        $id = $_SESSION['GlobalID'];
                        $sql = "SELECT EventID, Join_an_Event FROM tbl_trainee WHERE UID = '$id'";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        $eventID = $row['EventID'];
                        $join = $row['Join_an_Event'];

                        if ($join == 1) {
                            $sql = "SELECT * FROM tbl_events WHERE eventID = '$eventID'";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($result);
                            $currentdate = date("Y-m-d");

                            if ($currentdate >= $row['eventCompletion']) {
                                $sql = "UPDATE tbl_trainee SET Join_an_Event = 0 WHERE UID = '$id'";
                                $result = mysqli_query($conn, $sql);

                                if ($result) {
                                    $sql = "UPDATE tbl_events SET eventEnded = 'true' WHERE eventID = '$eventID'";
                                    $result = mysqli_query($conn, $sql);

                                    if ($result) {
                                        $output =
                                            '<div class="card-body">
                                    <!-- this should be a list of events joined by the user -->
                                    <h5 class="card-title"></h5> <!-- Event Name -->
                                    <p class="card-text">Event have been Closed!</p>
                                    <!-- so on and so forth -->
                                    <!--<a href="#" class="btn btn-success" hidden>Go somewhere</a>-->
                                </div>';
                                    }

                                } else {
                                    $output =
                                        '<div class="card-body">
                                    <!-- this should be a list of events joined by the user -->
                                    <h5 class="card-title"></h5> <!-- Event Name -->
                                    <p class="card-text">Event has ended.</p> <!-- Event Description -->
                                    <!-- so on and so forth -->
                                    <!--<a href="#" class="btn btn-success" hidden>Go somewhere</a>-->
                                </div>';
                                }
                            } elseif ($row['eventEnded'] == 'true') {
                                $output =
                                    '<div class="card-body">
                                    <!-- this should be a list of events joined by the user -->
                                    <h5 class="card-title"></h5> <!-- Event Name -->
                                    <p class="card-text">Event already ended.</p> <!-- Event Description -->
                                    <!-- so on and so forth -->
                                    <!--<a href="#" class="btn btn-success" hidden>Go somewhere</a>-->
                                </div>';
                            } else {
                                $start = date("g:i A", strtotime($row['eventStartTime']));
                                $end = date("g:i A", strtotime($row['eventEndTime']));
                                $date = date("F j, Y", strtotime($row['eventDate']));

                                $output =
                                    '<div class="card-body">
                                    <div class="card-body">
                                        <h5 class="card-title">' . $row['eventTitle'] . '</h5>
                                        <p class="card-text">' . $date . '</p>
                                        <p class="card-text">' . $row['eventLocation'] . '</p>
                                        <p class="card-text" style="font-size: 14px;">' . $row['eventDescription'] . '</p>
                                        <small class="text-muted">Time: ' . $start . ' - ' . $end . '</small>
                                    </div>
                            </div>';
                            }
                        } else {
                            $output =
                                '<div class="card-body">
                                    <!-- this should be a list of events joined by the user -->
                                    <h5 class="card-title"></h5> <!-- Event Name -->
                                    <p class="card-text">No events joined yet.</p> <!-- Event Description -->
                                    <!-- so on and so forth -->
                                    <!--<a href="#" class="btn btn-success" hidden>Go somewhere</a>-->
                                </div>';
                        }
                        echo $output;
                        ?>
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
                        $i = 1;
                        while ($row = mysqli_fetch_assoc($result)) {

                            $start = date("g:i A", strtotime($row['eventStartTime']));
                            $end = date("g:i A", strtotime($row['eventEndTime']));
                            $date = date("F j, Y", strtotime($row['eventDate']));

                            $desc = $row['eventDescription'];
                            $desc = substr($desc, 0, 100);
                            $desc = $desc . '...';

                            if ($row['eventEnded'] == 'true') {
                                $status = 'Ended';
                            } else {
                                $status = 'Ongoing';
                            }

                            $output =
                                '
                    <div class="col">
                        <div class="card h-100">
                        <img src="' . $row['eventImage'] . '" class="card-img-top" style="max-height: 256px; object-fit: cover;" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">' . $row['eventTitle'] . '</h5>
                                <p class="card-text">' . $date . '</p>
                                <p class="card-text">' . $row['eventLocation'] . '</p>
                                <p class="card-text">' . $status . '</p>
                                <p class="card-text" style="font-size: 14px;">' . $desc . '</p>
                                <small class="text-muted">Time: ' . $start . ' - ' . $end . ' | Available Seats: ' . $row['eventSlots'] . '</small>
                            </div>
                            <div class="card-footer text-center">
                                <!-- if the user is already registered, the button should be disabled -->
                                ';
                            echo $output;
                            if ($_SESSION['GlobalJoin_an_Event'] == 1 || $row['eventSlots'] == 0 || $row['eventEnded'] == 'true') {
                                echo '<a class="btn btn-success" hidden>Register</a>
                            </div>
                        </div>
                    </div>';
                            } else {
                                echo '<a href="../Components/eventprocess.php?ID=' . $row['eventID'] . '" class="btn btn-success">Register</a>
                                <a id="viewEvent' . $i . '" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#UserEvent">View</a>
                            </div>
                        </div>
                    </div>
                    <script>
                    let viewEvent' . $i . ' = document.querySelector("#viewEvent' . $i . '");
                    viewEvent' . $i . '.addEventListener("click", () => {
                    let EventTitle = document.querySelector("#Etitle");
                    let EventImage = document.querySelector("#Eimg");
                    let EventDesc = document.querySelector("#Edesc");
                    let EventDate = document.querySelector("#Edate");
                    let EventTime = document.querySelector("#Etime");
                    let EventLoc = document.querySelector("#Eloc");
                    let EventType = document.querySelector("#Etype");
                    let EventStat = document.querySelector("#Estat");
                    let EventOrg = document.querySelector("#Eorg");
                    let EventUp = document.getElementById("Eup");

                    EventTitle.innerHTML = "' . $row['eventTitle'] . '";
                    EventImage.src = "' . $row['eventImage'] . '";
                    EventDesc.innerHTML = "' . $row['eventDescription'] . '";
                    EventDate.innerHTML = "' . $date . '";
                    EventTime.innerHTML = "' . $start . ' - ' . $end . '";
                    EventLoc.innerHTML = "' . $row['eventLocation'] . '";
                    EventType.innerHTML = "' . $row['eventType'] . '";
                    EventStat.innerHTML = "' . $status . '";
                    EventOrg.innerHTML = "' . $row['eventOrganizer'] . '";
                    EventUp.href = "../Components/eventprocess.php?ID=' . $row['eventID'] . '";
                    });
                    </script>
                    ';
                                $i++;
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