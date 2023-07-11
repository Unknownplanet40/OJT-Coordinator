<?php
session_start();
@include_once("../Database/config.php");

if (!isset($_SESSION['DatahasbeenFetched'])) {
    header("Location: ../Login.php");
} else {
    $ShowAlert = true;

    $sql = "SELECT * FROM tbl_announcement WHERE ID=1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $title = $row['Title'];
    $desc = $row['Description'];
    $date = date("F j, Y", strtotime($row['DateAdded']));
    $comp = date("F j, Y", strtotime($row['DateEnd']));
    $post = $row['PostedBy'];
}

if (isset($_POST['searchEvent']) && !empty($_POST['searchEvent'])) {
    $search = $_POST['searchEvent'];
    $sql = "SELECT * FROM tbl_events WHERE eventTitle LIKE '%$search%'";
} else if (isset($_POST['resetEvent'])) {
    $sql = "SELECT * FROM tbl_events";
} else {
    $sql = "SELECT * FROM tbl_events";
}
$result = mysqli_query($conn, $sql);
unset($_POST['searchEvent']);
unset($_POST['resetEvent']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style/ImportantImport.css">
    <script src="../Script/SidebarScript.js"></script>
    <script src="../Script/SweetAlert2.js"></script>
    <script src="../Script/Bootstrap_Script/bootstrap.bundle.js"></script>
    <title>Events</title>
</head>

<body class="dark adminuser" style="min-width: 1080px;">
    <?php
    @include_once '../Components/AdminSidebar.php';
    @include_once '../Components/Modals/AdminEventModal.php';
    @include_once '../Components/PopupAlert.php';
    if (isset($ShowAlert)) {
        echo NewAlertBox();
        $_SESSION['Show'] = false;
    }
    ?>
    <section class="home">
        <div class="text">
            <h1 class="text-warning">Events</h1>
        </div>
        <div class="container-fluid" style="width: 98%;">
            <div class="container-xl my-1 table-responsive">
                <button class="btn btn-primary p-2 bg-gradient" type="button" data-bs-toggle="collapse"
                    data-bs-target="#EventForm" aria-expanded="false" aria-controls="EventForm">
                    <img src="../Image/Create.svg" alt="" class="me-2" width="24" height="24">
                    <span class="m-2">Create Event</span>
                </button>
                <button class="btn btn-success p-2 bg-gradient" type="button" data-bs-toggle="collapse"
                    data-bs-target="#Announce" aria-expanded="false" aria-controls="Announce">
                    <img src="../Image/update.svg" alt="" class="me-2" width="24" height="24">
                    <span class="m-2">Add a Announcement</span>
                </button>
                <div class="collapse" id="Announce">
                    <form class="row g-3 rounded mt-1" method="POST" action="../Components/Proccess/AnnounceUpdate.php">
                        <input type="hidden" name="Posted" id="Posted" value="<?php echo $_SESSION['GlobalName']; ?>">
                        <div class="col-md-12">
                            <div class="form-floating mb-3 text-light">
                                <input type="text" class="form-control text-bg-dark" id="AnnounceTitle"
                                    name="AnnounceTitle" placeholder="Announcement Title" minlength="5">
                                <label for="AnnounceTitle">Announcement Title</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating mb-3 text-light">
                                <textarea class="form-control text-bg-dark" placeholder="Announcement Description"
                                    id="AnnounceDescription" name="AnnounceDescription" style="height: 150px"
                                    minlength="5"></textarea>
                                <label for="AnnounceDescription">Announcement Description</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="vstack gap-2 col-md-5 mx-auto">
                                <input type="submit" class="btn btn-primary bg-gradient" name="addAnnounce"
                                    id="addAnnounce" value="Submit">
                                <input type="reset" class="btn btn-danger bg-gradient" name="resetAnnounce"
                                    id="resetAnnounce" value="Reset">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating mb-3 text-light">
                                <input type="date" class="form-control text-bg-dark" id="startDate" name="startDate"
                                    placeholder="Start Date">
                                <label for="startDate">Start Date</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating mb-3 text-light">
                                <input type="date" class="form-control text-bg-dark" id="EndDate" name="EndDate"
                                    placeholder="End Date">
                                <label for="EndDate">End Date</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <p class="text-danger text-center" id="Ann_error">
                                this is for error message
                            </p>
                        </div>
                        <script>
                            let startDate = document.getElementById("startDate");
                            let EndDate = document.getElementById("EndDate");
                            let Ann_error = document.getElementById("Ann_error");

                            Ann_error.innerHTML = "";

                            // check if end date is greater than start date
                            EndDate.addEventListener("change", function () {
                                let start = new Date(startDate.value);
                                let end = new Date(EndDate.value);
                                if (end <= start) {
                                    Ann_error.innerHTML = "End date cannot be less or equal to start date";
                                    EndDate.value = "";
                                } else {
                                    Ann_error.innerHTML = "";
                                }
                            });
                        </script>
                    </form>

                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">
                            <?php echo $title; ?>
                        </h4>
                        <p>
                            <?php echo $desc; ?>
                        </p>
                        <hr>
                        <p class="mb-0">Posted by:
                            <?php echo $post; ?> | Date Posted:
                            <?php echo $date; ?> | Date
                            End:
                            <?php echo $comp; ?>
                        </p>
                    </div>

                    <hr class="mt-4 mb-4" style="background-color: white; height: 5px; border-radius: 5px;">
                </div>
                <div class="collapse" id="EventForm">
                    <form class="row g-3 rounded mt-1" method="POST" action="../Components/Proccess/EventInsert.php"
                        enctype="multipart/form-data">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 text-light">
                                <input type="text" class="form-control text-bg-dark" id="EventTitle" name="EventTitle"
                                    placeholder="Event Name">
                                <label for="EventTitle">Event Name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3 text-light">
                                <input type="text" class="form-control text-bg-dark" id="EventLocation"
                                    name="EventLocation" placeholder="Event Location">
                                <label for="EventLocation">Event Location</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating mb-3 text-light">
                                <input type="date" class="form-control text-bg-dark" id="EventDate" name="EventDate"
                                    placeholder="Event Date">
                                <label for="EventDate">Event Date</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-floating mb-3 text-light">
                                <input type="time" class="form-control text-bg-dark" id="EventStart" name="EventStart"
                                    placeholder="Event Start Time">
                                <label for="EventStart">Event Start Time</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-floating mb-3 text-light">
                                <input type="time" class="form-control text-bg-dark" id="EventEnd" name="EventEnd"
                                    placeholder="Event End Time">
                                <label for="EventEnd">Event End Time</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating mb-3 text-light">
                                <select class="form-select text-bg-dark" name="EventType" id="EventType"
                                    aria-label="Events Type">
                                    <option selected hidden>Choose...</option>
                                    <option value="webinar">Webinar</option>
                                    <option value="workshop">Workshop</option>
                                    <option value="seminar">Seminar</option>
                                    <option value="conference">Conference</option>
                                    <option value="other">Other</option>
                                </select>
                                <label for="floatingSelect">Event Type</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating mb-3 text-light">
                                <input type="date" class="form-control text-bg-dark" id="EventCompletion"
                                    name="EventCompletion" placeholder="Event Completion Date">
                                <label for="EventCompletion">Event Completion Date</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating mb-3 text-light">
                                <input type="text" class="form-control text-bg-dark" id="EventOrganizer"
                                    name="EventOrganizer" placeholder="Event Organizer">
                                <label for="EventOrganizer">Event Organizer</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating mb-3 text-light">
                                <input type="number" max="50" min="5" class="form-control text-bg-dark" id="EventSlot"
                                    name="EventSlot" placeholder="Event Slot">
                                <label for="EventOrganizer">Event Slots</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="input-group mb-3 text-bg-dark">
                                <input type="file" class="form-control text-bg-dark" id="EventImage" name="EventImage">
                            </div>
                        </div>
                        <div class="col-md-12">,
                            <div class="form-floating mb-3 text-light">
                                <textarea class="form-control text-bg-dark" placeholder="Event Description"
                                    id="EventDescription" name="EventDescription" style="height: 150px"
                                    minlength="256"></textarea>
                                <label for="EventDescription">Event Description</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <input type="submit" class="btn btn-primary mb-1 w-50 bg-gradient" name="addEvent"
                                id="addEvent" value="Submit">
                            <input type="reset" class="btn btn-danger w-50 bg-gradient" name="resetEvent"
                                id="resetEvent" value="Reset">
                        </div>
                        <div class="col">
                            <script>
                                //form validation
                                document.addEventListener("DOMContentLoaded", function () {
                                    let EventTitle = document.getElementById("EventTitle");
                                    let EventLocation = document.getElementById("EventLocation");
                                    let EventDate = document.getElementById("EventDate");
                                    let EventStart = document.getElementById("EventStart");
                                    let EventEnd = document.getElementById("EventEnd");
                                    let EventType = document.getElementById("EventType");
                                    let EventCompletion = document.getElementById("EventCompletion");
                                    let EventOrganizer = document.getElementById("EventOrganizer");
                                    let EventSlot = document.getElementById("EventSlot");
                                    let EventDescription = document.getElementById("EventDescription");
                                    let error = document.querySelector(".error");

                                    error.innerHTML = "";

                                    // check if date is grater than completion date
                                    EventDate.addEventListener("change", function () {
                                        let date = new Date(EventDate.value);
                                        let completion = new Date(EventCompletion.value);
                                        if (date > completion) {
                                            error.innerHTML = "Event date cannot be greater than completion date";
                                            EventDate.value = "";
                                        } else {
                                            error.innerHTML = "";
                                        }
                                    });

                                    // check if completion date is less than date
                                    EventCompletion.addEventListener("change", function () {
                                        let date = new Date(EventDate.value);
                                        let completion = new Date(EventCompletion.value);
                                        if (completion < date) {
                                            error.innerHTML = "Completion date cannot be less than event date";
                                            EventCompletion.value = "";
                                        } else {
                                            error.innerHTML = "";
                                        }
                                    });

                                    // check if end time is greater than start time
                                    EventEnd.addEventListener("change", function () {
                                        let start = EventStart.value;
                                        let end = EventEnd.value;
                                        if (end < start) {
                                            error.innerHTML = "End time cannot be less than start time";
                                            EventEnd.value = "";
                                        } else {
                                            error.innerHTML = "";
                                        }
                                    });
                                });
                            </script>
                            <p class="text-danger error">
                                this is for error message
                            </p>
                        </div>
                    </form>
                </div>


                <!-- search bar -->
                <form action="AdminEvents.php" method="POST" id="searchForm">
                    <hr class="mt-4 mb-4" style="background-color: white; height: 5px; border-radius: 5px;">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control text-bg-dark" placeholder="Search Event Title"
                            aria-label="Search Event" aria-describedby="button-addon2" name="searchEvent"
                            id="searchEvent">
                        <input type="submit" value="Reset" class="btn btn-outline-danger" id="resetEvent"
                            name="resetEvent">
                    </div>
                </form>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        $i = 1;
                        while ($row = mysqli_fetch_assoc($result)) {

                            $start = date("g:i A", strtotime($row['eventStartTime']));
                            $end = date("g:i A", strtotime($row['eventEndTime']));
                            $date = date("F j, Y", strtotime($row['eventDate']));

                            if ($row['eventEnded'] == 'true') {
                                $status = 'Ended';
                            } else {
                                $status = 'Ongoing';
                            }

                            // limit description to 100 characters and add ... at the end
                            $desc = $row['eventDescription'];
                            $desc = substr($desc, 0, 100);
                            $desc = $desc . '...';

                            $output = '
            <div class="col">
                <div class="card h-100 text-bg-dark">
                    <img src="' . $row['eventImage'] . '" class="card-img-top" style="height: 200px; object-fit: cover;" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">' . $row['eventTitle'] . '</h5>
                        <p class="card-text">' . $date . '</p>
                        <p class="card-text">' . $row['eventLocation'] . '</p>
                        <p class="card-text" style="font-size: 14px;">' . $desc . '</p>
                        <small class="text-muted">Time: ' . $start . ' - ' . $end . ' | Available Seats: ' . $row['eventSlots'] . '</small>
                    </div>
                    <div class="card-footer text-center">
                        <a id="viewEvent' . $i . '" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ViewEvent" style="width: 100%;">View</a>
                    </div>
                </div>
            </div>
            <script>
                let viewEvent' . $i . ' = document.querySelector("#viewEvent' . $i . '");

                viewEvent' . $i . '.addEventListener("click", () => {
                    let EventTitle = document.querySelector("#Mtitle");
                    let EventImage = document.querySelector("#Mimg");
                    let EventDesc = document.querySelector("#Mdesc");
                    let EventDate = document.querySelector("#Mdate");
                    let EventTime = document.querySelector("#Mtime");
                    let EventLoc = document.querySelector("#Mloc");
                    let EventType = document.querySelector("#Mtype");
                    let EventStat = document.querySelector("#Mstat");
                    let EventOrg = document.querySelector("#Morg");
                    let EventUp = document.getElementById("Mup");

                    EventTitle.innerHTML = "' . $row['eventTitle'] . '";
                    EventImage.src = "' . $row['eventImage'] . '";
                    EventDesc.innerHTML = "' . $row['eventDescription'] . '";
                    EventDate.innerHTML = "' . $date . '";
                    EventTime.innerHTML = "' . $start . ' - ' . $end . '";
                    EventLoc.innerHTML = "' . $row['eventLocation'] . '";
                    EventType.innerHTML = "' . $row['eventType'] . '";
                    EventStat.innerHTML = "' . $status . '";
                    EventOrg.innerHTML = "' . $row['eventOrganizer'] . '";
                    EventUp.href = "../Components/Proccess/EventUpdate.php?id=' . $row['eventID'] . '";
                    });
                    </script>';
                            echo $output;
                            $i++;
                        }
                    } else {
                        $nodata = true;
                    }
                    ?>
                </div>
                <?php if (isset($nodata)) {
                    echo '<br>';
                    @include_once '../Components/Placeholders/CardPlaceholder.php';
                } ?>
            </div>
            <br>
        </div>
    </section>
</body>

</html>