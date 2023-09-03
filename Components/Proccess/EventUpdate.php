<?php
session_start();
@include_once("../../Database/config.php");
@include_once("../../Components/PopupAlert.php");

if (!isset($_SESSION['DatahasbeenFetched'])) {
    header("Location: ../Login.php");
} else {
    $ShowAlert = true;
}

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $EventID = $_GET['id'];
    $_SESSION['idngevent'] = $EventID;

    $sql = "SELECT * FROM tbl_events WHERE eventID = '$EventID'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $title = $row['eventTitle'];
    $desc = $row['eventDescription'];
    $image = $row['eventImage'];
    $date = $row['eventDate'];
    $formatdate = date("F j, Y", strtotime($date));
    $start = $row['eventStartTime'];
    $formatstart = date("g:i A", strtotime($start));
    $end = $row['eventEndTime'];
    $formatend = date("g:i A", strtotime($end));
    $type = $row['eventType'];
    $comp = $row['eventCompletion'];
    $formatcomp = date("F j, Y", strtotime($comp));
    $ended = $row['eventEnded'];
    $loc = $row['eventLocation'];
    $slot = $row['eventSlots'];
    $org = $row['eventOrganizer'];

    if ($ended == 'true') {
        $status = "Ended";
    } else {
        $status = "Ongoing";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Style/ColorPalette.css">
    <link rel="stylesheet" href="../../Style/Fonts.css">
    <link rel="stylesheet" href="../../Style/Bootstrap_Style/bootstrap.css">
    <script src="../../Script/SweetAlert2.js"></script>
    <script src="../../Script/Bootstrap_Script/bootstrap.bundle.js"></script>
    <title>Update Event</title>
    <style>
        * {
            font-family: 'Poppins';
            box-sizing: border-box;
            scroll-behavior: smooth;
        }

        body {
            background-color: var(--clr-background);
        }

        .listhead {
            background-color: var(--clr-primary);
            background-image: url("../../Image/BGanimated.svg");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }

        .bgani {
            background-color: #e4e9f7;
        }

        .bganim {
            background: linear-gradient(147deg, #020304, #445384);
            background-size: 400% 400%;
            animation: AnimationName 25s ease infinite;
        }

        @keyframes AnimationName {
            0% {
                background-position: 10% 0%
            }

            50% {
                background-position: 91% 100%
            }

            100% {
                background-position: 10% 0%
            }
        }

        /*For the scroll bar*/
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #fff;
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
    </style>
</head>

<body class="bgani">
    <?php
    if (isset($ShowAlert)) {
        echo NewAlertBox();
        $_SESSION['Show'] = false;
    }
    ?>
    <div class="container-lg rounded shadow-lg p-3 mt-5 text-bg-light">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center text-uppercase text-success fw-bold">Update Event</h1>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <ul class="list-group">
                    <li class="list-group-item listhead text-center">
                        <img src="../<?php if (isset($image)) {
                            echo $image;
                        } ?>" class="img-fluid img-thumbnail m-1" style="height: 256px;" alt="...">
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center text-dark">
                        <span class="fw-bold">Title</span>
                        <span>
                            <?php if (isset($title)) {
                                echo $title;
                            } ?>
                        </span>
                    </li>
                    <li class="list-group-item text-dark">
                        <span class="fw-bold">Description</span>
                        <br>
                        <span class="text-break" style="text-align: justify;">
                            <?php if (isset($desc)) {
                                echo $desc;
                            } ?>
                        </span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center text-dark">
                        <span class="fw-bold">Date</span>
                        <span>
                            <?php if (isset($formatdate)) {
                                echo $formatdate;
                            } ?>
                        </span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center text-dark">
                        <span class="fw-bold">Time</span>
                        <span>
                            <?php if (isset($formatstart)) {
                                echo $formatstart;
                            } ?> -
                            <?php if (isset($formatend)) {
                                echo $formatend;
                            } ?>
                        </span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center text-dark">
                        <span class="fw-bold">Completion</span>
                        <span>
                            <?php if (isset($formatcomp)) {
                                echo $formatcomp;
                            } ?>
                        </span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center text-dark">
                        <span class="fw-bold">Location</span>
                        <span>
                            <?php if (isset($loc)) {
                                echo $loc;
                            } ?>
                        </span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center text-dark">
                        <span class="fw-bold">Type</span>
                        <span>
                            <?php if (isset($type)) {
                                echo $type;
                            } ?>
                        </span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center text-dark">
                        <span class="fw-bold">Organizer</span>
                        <br>
                        <span>
                            <?php if (isset($org)) {
                                echo $org;
                            } ?>
                        </span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center text-dark">
                        <span class="fw-bold">Slots</span>
                        <span>
                            <?php if (isset($slot)) {
                                echo $slot;
                            } ?> Participants
                        </span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center text-dark">
                        <span class="fw-bold">Status</span>
                        <span>
                            <?php if (isset($status)) {
                                echo $status;
                            } ?>
                        </span>
                    </li>
                    <li class="list-group-item text-center text-dark">
                        <div class="hstack gap-3">
                            <a href="../../Admin/AdminEvents.php" class="btn btn-primary w-100">Back</a>
                            <!-- refresh btn -->
                            <a href="../../Components/Proccess/EventUpdate.php?id=<?php echo $EventID; ?>"
                                class="btn btn-success w-25">Refresh</a>
                            <a class="btn btn-danger" id="delete" title="Delete this event"><img
                                    src="../../Image/Delete.svg" alt="trash" style="height: 24px;"></a>
                            <script>
                                const deletebtn = document.getElementById('delete');
                                deletebtn.addEventListener('click', function () {
                                    Swal.fire({
                                        title: 'Are you sure?',
                                        text: "You won't be able to revert this!",
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'Yes, delete it!',
                                        background: "#fff",
                                        color: "#000"

                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.href = "../../Components/Proccess/EveDelete.php?id=<?php echo $EventID; ?>";
                                        }
                                    })
                                })
                            </script>
                        </div>
                    </li>
                    <li class="list-group-item text-center text-danger" id="warning">
                        <span>This is for Error Message</span>
                    </li>
                </ul>
            </div>
            <div class="col-md-6">
                <form method="POST" enctype="multipart/form-data" action="../Proccess/Eupdate.php">
                    <input type="hidden" name="EventID" value="<?php if (isset($EventID)) {
                        echo $EventID;
                    } ?>">
                    <ul class="list-group list-group-flush rounded">
                        <li class="list-group-item bg-transparent text-dark">
                            <div class="mb-3">
                                <label for="EventTitle" class="form-label">Event Title</label>
                                <input type="text" class="form-control" id="EventTitle" name="EventTitle" value="<?php if (isset($title)) {
                                    echo $title;
                                } ?>" required>
                            </div>
                        </li>
                        <li class="list-group-item bg-transparent text-dark">
                            <div class="mb-3">
                                <label for="EventDescription" class="form-label">Event Description</label>
                                <textarea class="form-control" id="EventDescription" name="EventDescription" rows="10"
                                    required><?php if (isset($desc)) {
                                        echo $desc;
                                    } ?></textarea>
                            </div>
                        </li>
                        <li class="list-group-item bg-transparent text-dark">
                            <div class="mb-3">
                                <label for="EventDate" class="form-label">Event Date</label>
                                <input type="date" class="form-control" id="EventDate" name="EventDate" value="<?php if (isset($date)) {
                                    echo $date;
                                } ?>" required min="<?php echo date('Y-m-d'); ?>">
                            </div>
                        </li>
                        <li class="list-group-item bg-transparent text-dark">
                            <div class="mb-3">
                                <label for="EventComp" class="form-label">Event Completion</label>
                                <input type="date" class="form-control" id="EventComp" name="EventComp" value="<?php if (isset($comp)) {
                                    echo $comp;
                                } ?>" required min="<?php echo date($date); ?>">
                            </div>
                        </li>
                        <li class="list-group-item bg-transparent text-dark">
                            <div class="mb-3">
                                <label for="EventStartTime" class="form-label">Event Start Time</label>
                                <input type="time" class="form-control" id="EventStartTime" name="EventStartTime" value="<?php if (isset($start)) {
                                    echo $start;
                                } ?>" required>
                            </div>
                        </li>
                        <li class="list-group-item bg-transparent text-dark">
                            <div class="mb-3">
                                <label for="EventEndTime" class="form-label">Event End Time</label>
                                <input type="time" class="form-control" id="EventEndTime" name="EventEndTime" value="<?php if (isset($end)) {
                                    echo $end;
                                } ?>" required min="<?php echo date($start); ?>">
                            </div>
                        </li>
                        <li class="list-group-item bg-transparent text-dark">
                            <div class="mb-3">
                                <label for="EventLocation" class="form-label">Event Location</label>
                                <input type="text" class="form-control" id="EventLocation" name="EventLocation" value="<?php if (isset($loc)) {
                                    echo $loc;
                                } ?>" required>
                            </div>
                        </li>
                        <li class="list-group-item bg-transparent text-dark">
                            <div class="mb-3">
                                <label for="EventType" class="form-label">Event Type</label>
                                <select class="form-select" id="EventType" name="EventType"
                                    value="<?php if (isset($type)) ?>" required>
                                    <option selected hidden>
                                        <?php if (isset($type)) {
                                            echo $type;
                                        } ?>
                                    </option>
                                    <option value="webinar">Webinar</option>
                                    <option value="workshop">Workshop</option>
                                    <option value="seminar">Seminar</option>
                                    <option value="conference">Conference</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                        </li>
                        <li class="list-group-item bg-transparent text-dark">
                            <div class="mb-3">
                                <label for="EventSlots" class="form-label">Event Organizer</label>
                                <input type="text" class="form-control" id="EventOrg" name="EventOrg" value="<?php if (isset($org)) {
                                    echo $org;
                                } ?>" required>
                            </div>
                        </li>
                        <li class="list-group-item bg-transparent text-dark">
                            <div class="mb-3">
                                <label for="EventSlots" class="form-label">Event Slots</label>
                                <input type="number" class="form-control" id="EventSlots" name="EventSlots" value="<?php if (isset($slot)) {
                                    echo $slot;
                                } ?>" required>
                            </div>
                        </li>
                        <script>
                            document.addEventListener("DOMContentLoaded", function () {
                                let EventTitle = document.getElementById('EventTitle');
                                let EventDescription = document.getElementById('EventDescription');
                                let EventDate = document.getElementById('EventDate');
                                let EventComp = document.getElementById('EventComp');
                                let EventStartTime = document.getElementById('EventStartTime');
                                let EventEndTime = document.getElementById('EventEndTime');
                                let EventLocation = document.getElementById('EventLocation');
                                let EventType = document.getElementById('EventType');
                                let EventSlots = document.getElementById('EventSlots');
                                let EventOrg = document.getElementById('EventOrg');
                                let EventID = document.getElementById('EventID');
                                let EventImage = document.getElementById('EventImage');
                                let currentdate = new Date();
                                let Error = document.getElementById('warning');
                                console.log(currentdate);
                                // get only date
                                currentdate = currentdate.toISOString().slice(0, 10);
                                console.log(currentdate);

                                Error.innerHTML = "";

                                //if event date is less than current date
                                EventDate.addEventListener('change', () => {
                                    if (EventDate.value < currentdate) {
                                        Error.innerHTML = "Event Date cannot be less than today's date, it can be today's date or any date after today's date";
                                        EventDate.value = "";
                                    }
                                    EventComp.min = EventDate.value;
                                });

                                //if event completion date is less than event date
                                EventComp.addEventListener('change', () => {
                                    if (EventComp.value < EventDate.value) {
                                        Error.innerHTML = "Event Completion Date cannot be less than to the Event Date, it can be the same date or any date after the Event Date";
                                        EventComp.value = "";
                                    }
                                    EventComp.min = EventDate.value;
                                });

                                //if start time is greater than end time
                                EventStartTime.addEventListener('change', () => {
                                    if (EventStartTime.value >= EventEndTime.value) {
                                        Error.innerHTML = "Event Start Time cannot be grater than or same as Event End Time. Please select a valid time";
                                        EventStartTime.value = "";
                                    } else {
                                        Error.innerHTML = "";
                                    }
                                });

                                //if end time is less than start time
                                EventEndTime.addEventListener('change', () => {
                                    if (EventEndTime.value <= EventStartTime.value) {
                                        Error.innerHTML = "Event End Time cannot be less than or same as Event Start Time. Please select a valid time";
                                        EventEndTime.value = "";
                                    } else {
                                        Error.innerHTML = "";
                                    }
                                });


                                setTimeout(() => {
                                    Error.innerHTML = "";
                                }, 10500);
                            });
                        </script>
                        <li class="list-group-item bg-transparent text-center">
                            <input type="submit" name="upevent" class="btn btn-success w-50" value="Update Event">
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </div>
    <br>
</body>

</html>