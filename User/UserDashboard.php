<?php
session_start();
@include_once("../Database/config.php");
@include_once("../Components/PopupAlert.php");
date_default_timezone_set('Asia/Manila');

$_SESSION['SAtheme'] = "light";

if (!isset($_SESSION['DatahasbeenFetched'])) {
    header("Location: ../Login.php");
} elseif ($_SESSION['GlobalProfileCompleted'] == 'false') {
    header("Location: ../User/UserProfile.php");
} else {
    $ShowAlert = true;

    // before loading the page, check if the event has ended
    $sql = "SELECT * FROM tbl_events";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $currentDate = date("Y-m-d");
        $currenttime = date("H:i:s");
        while ($row = mysqli_fetch_assoc($result)) {
            $ID = $row['eventID'];
            $eventCompletion = $row['eventCompletion'];
            $eventDateStarted = $row['eventDate'];
            $eventEnd = $row['eventEndTime'];
            //check if event date is equal to completion date
            if ($eventDateStarted == $eventCompletion) {
                //check if current time is greater than the event end time
                if ($currenttime >= $eventEnd) {
                    $sql = "UPDATE tbl_events SET eventEnded='true' WHERE eventID='$ID'";
                }
            } else {
                //check if current date is greater than the event completion date
                if ($currentDate >= $eventCompletion) {
                    $sql = "UPDATE tbl_events SET eventEnded='true' WHERE eventID='$ID'";
                }
            }
            mysqli_query($conn, $sql);
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
    }
    if (isset($_SESSION['remaining_time']) && $_SESSION['remaining_time'] != null) {
        echo "<script>swal.fire({
            icon: 'info',
            html: '<span style=\"text-align: justify;\">You can\'t unjoin the event yet. Because it\'s almost over. please wait for the remaining time to end.</span>',
            footer: 'Remaining Time: " . $_SESSION['remaining_time'] . "',
            allowOutsideClick: false,
            allowEscapeKey: false,
            allowEnterKey: false
          });</script>";
        unset($_SESSION['remaining_time']);
    }
    ?>
    <section class="home">
        <div class="text">Dashboard</div>
        <div class="container-xl">
            <div class="content">
                <?php
                @include_once '../Components/Announcement.php';
                @include_once '../Components/Modals/AdminEventModal.php';
                ?>
                <div class="row row-cols-1 g-4">
                    <div class="col-md-4" hidden>
                        <!-- calendar -->
                        <div class="card h-100 border border-success shadow-lg user-select-none">
                            <div class="card-header">
                                Calendar
                            </div>
                            <div class="card-body">
                                <div id="calendar"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" hidden>
                        sdasdasd
                    </div>
                    <div class="col-md-4" hidden>
                        sdasdasd
                    </div>
                    <div class="col-md-8">
                        <div class="card h-100 border border-success shadow-lg user-select-none">
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
                    <div class="col-md-4">
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

                                if ($row['eventEnded'] == 'true') {
                                    $sql = "UPDATE tbl_trainee SET Join_an_Event = 0 WHERE UID = '$id'";
                                    mysqli_query($conn, $sql);
                                    $_SESSION['GlobalJoin_an_Event'] = 0;

                                    echo
                                        '<div class="card-body">
                                        <h5 class="card-title"></h5>
                                        <p class="card-text">No event joined yet.</p>
                                        <p class="card-text"></p>
                                        <p class="card-text" style="font-size: 14px;"></p>
                                        <small class="text-muted"></small>
                                    </div>';
                                } else {
                                    $start = date("g:i A", strtotime($row['eventStartTime']));
                                    $end = date("g:i A", strtotime($row['eventEndTime']));
                                    $date = date("F j, Y", strtotime($row['eventDate']));
                                    $comp = date("F j, Y", strtotime($row['eventCompletion']));

                                    if ($date == $comp) {
                                        $datecomp = '';
                                    } else {
                                        $datecomp = ' - ' . $comp;
                                    }

                                    echo
                                        '<div class="card-body">
                                        <h5 class="card-title">' . $row['eventTitle'] . '</h5>
                                        <p class="card-text">' . $date . ' <small class="text-muted">' . $datecomp . '</small></p>
                                        <p class="card-text">' . $row['eventLocation'] . '</p>
                                        <p class="card-text" style="font-size: 14px;">' . $row['eventDescription'] . '</p>
                                        <small class="text-muted">Time: ' . $start . ' - ' . $end . '</small>
                                        <br>
                                    </div>
                                    <div class="card-footer text-end">
                                        <a href="../Components/Proccess/UnjoinEvent.php" class="btn btn-danger btn-sm" title="Unjoin to this event">Unjoin</a>
                                    </div>
                                    
                                    ';
                                }
                            } else {
                                echo
                                    '<div class="card-body">
                                        <h5 class="card-title"></h5>
                                        <p class="card-text">No event joined yet.</p>
                                        <p class="card-text"></p>
                                        <p class="card-text" style="font-size: 14px;"></p>
                                        <small class="text-muted"></small>
                                    </div>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="text">Events</div>
                <div class="container-lg">
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        <?php
                        $sql = "SELECT * FROM tbl_events WHERE eventEnded = 'false' ORDER BY eventDate ASC";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            $i = 1;
                            while ($row = mysqli_fetch_assoc($result)) {

                                $start = date("g:i A", strtotime($row['eventStartTime']));
                                $end = date("g:i A", strtotime($row['eventEndTime']));
                                $date = date("F j, Y", strtotime($row['eventDate']));
                                $comdate = date("F j, Y", strtotime($row['eventCompletion']));

                                // if date and completion date is the same, then it is a one day event
                                if ($date == $comdate) {
                                    $comdate = '';
                                } else {
                                    $comdate = ' - ' . $comdate;
                                }

                                $desc = $row['eventDescription'];
                                $desc = substr($desc, 0, 100);
                                $desc = $desc . '...';

                                if ($row['eventEnded'] == 'true') {
                                    $status = 'Ended';
                                } else {
                                    $status = 'Ongoing';
                                }

                                // get how many days from the current date to the event date
                                $currentDate = date("Y-m-d");
                                $eventDate = $row['eventCreated'];
                                $diff = abs(strtotime($eventDate) - strtotime($currentDate));
                                $days = floor($diff / (60 * 60 * 24));

                                // if the event is less than 3 days, add a new badge
                                if ($days <= 3) {
                                    $badge = '<span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle" title="Newly Added Event!"><span class="visually-hidden">New Event</span></span>';
                                } else {
                                    $badge = '';
                                }

                                $output =
                                    '<div class="col">
                                    <div class="position-relative">
                                        <div class="card h-100 border border-success shadow-lg user-select-none">
                                        <img src="' . $row['eventImage'] . '" class="card-img-top" style="object-fit: cover; aspect-ratio: 16/9;" alt="...">
                                                <div class="card-body">
                                                    <h5 class="card-title">' . $row['eventTitle'] . '</h5>
                                                    <p class="card-text">' . $date . ' <small class="text-muted">' . $comdate . '</small></p>
                                                    <p class="card-text">' . $row['eventLocation'] . '</p>
                                                    <p class="card-text">' . $status . '</p>
                                                    <p class="card-text text-break" style="font-size: 14px;">' . $desc . '</p>
                                                    <small class="text-muted">Time: ' . $start . ' - ' . $end . ' <br> Available Seats: ' . $row['eventSlots'] . '</small>
                                                </div>
                                                <div class="card-footer text-center">
                                    <!-- if the user is already registered, the button should be disabled -->
                                    ';
                                echo $output;
                                if ($_SESSION['GlobalJoin_an_Event'] == 1 || $row['eventSlots'] == 0 || $row['eventEnded'] == 'true') {
                                    echo '<a class="btn btn-success" hidden>Register</a>
                                                </div>
                                            </div>
                                    ' . $badge . '
                                    </div>
                                </div>';
                                } else {
                                    echo '<a href="../Components/eventprocess.php?ID=' . $row['eventID'] . '" class="btn btn-success">Register</a>
                                    <a id="viewEvent' . $i . '" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#UserEvent">View</a>
                                </div>
                            </div>
                            ' . $badge . '
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
        </div>
    </section>
    <script src="../Script/SidebarScript.js"></script>
    <script src="../Script/Bootstrap_Script/bootstrap.bundle.js"></script>
</body>

</html>

<!-- Path: User\UserDashboard.php -->