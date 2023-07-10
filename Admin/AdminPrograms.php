<?php
session_start();
@include_once("../Database/config.php");

if (!isset($_SESSION['DatahasbeenFetched'])) {
    header("Location: ../Login.php");
} else {
    $ShowAlert = true;
}

if (isset($_POST['searchEvent']) && !empty($_POST['searchEvent'])) {
    $search = $_POST['searchEvent'];
    $sql = "SELECT * FROM tbl_programs WHERE title LIKE '%$search%'";
} else if (isset($_POST['resetEvent'])) {
    $sql = "SELECT * FROM tbl_programs";
} else {
    $sql = "SELECT * FROM tbl_programs";
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
    @include_once '../Components/Modals/AdminProgModal.php';
    @include_once '../Components/PopupAlert.php';
    if (isset($ShowAlert)) {
        echo NewAlertBox();
        $_SESSION['Show'] = false;
    }
    ?>
    <section class="home">
        <div class="text">Programs</div>
        <div class="container-fluid" style="width: 98%;">
            <div class="container-xl my-1 table-responsive">
                <button class="btn btn-danger p-2 bg-gradient" type="button" data-bs-toggle="collapse"
                    data-bs-target="#EventForm" aria-expanded="false" aria-controls="EventForm">
                    <img src="../Image/Create.svg" alt="" class="me-2" width="24" height="24">
                    <span class="m-2">Create Program Offers</span>
                </button>
                <div class="collapse" id="EventForm">
                    <form class="row g-3 rounded mt-1" method="POST" action="../Components/Proccess/ProgInsert.php"
                        enctype="multipart/form-data">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 text-light">
                                <input type="text" class="form-control text-bg-dark" id="ProgtTitle" name="ProgTitle"
                                    placeholder="Program Name">
                                <label for="ProgTitle">Program Name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3 text-light">
                                <input type="text" class="form-control text-bg-dark" id="ProgLocation"
                                    name="ProgLocation" placeholder="Program Location">
                                <label for="ProgLocation">Program Location</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating mb-3 text-light">
                                <input type="date" class="form-control text-bg-dark" id="ProgDate" name="ProgDate"
                                    placeholder="Date">
                                <label for="ProgDate">Start Date</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-floating mb-3 text-light">
                                <input type="time" class="form-control text-bg-dark" id="ProgStart" name="ProgStart"
                                    placeholder="Start Time">
                                <label for="ProgStart">From</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-floating mb-3 text-light">
                                <input type="time" class="form-control text-bg-dark" id="ProgEnd" name="ProgEnd"
                                    placeholder="End Time">
                                <label for="ProgEnd">To</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating mb-3 text-light">
                                <select class="form-select text-bg-dark" name="Progduration" id="Progduration"
                                    aria-label="Events Type">
                                    <option selected hidden>Choose...</option>
                                    <option value="4">4 Week</option>
                                    <option value="8">8 Week</option>
                                    <option value="12">12 Week</option>
                                    <option value="16">16 Week</option>
                                    <option value="20">20 Week</option>
                                </select>
                                <label for="Progduration">Event Type</label>
                            </div>
                        </div>
                        <script>
                            // date calculation
                            document.addEventListener("DOMContentLoaded", function () {
                                let duration = document.getElementById("Progduration");
                                let date = document.getElementById("ProgDate");
                                let completion = document.getElementById("ProgCompletion");
                                let Hours = document.getElementById("ProgHours");
                                // check if duration is selected
                                if (duration) {
                                    duration.addEventListener("change", function () {
                                        let dur = duration.value;
                                        let start = new Date(date.value);
                                        let end = new Date(start);
                                        let numberOfWeeks = parseInt(dur);
                                        let numberOfHoursPerWeek = 40;  // Adjust this value with your desired number of hours per week

                                        // Calculate the end date
                                        end.setDate(end.getDate() + numberOfWeeks * 7); // Multiply by 7 to get the number of days
                                        let dd = end.getDate();
                                        let mm = end.getMonth() + 1;
                                        let yyyy = end.getFullYear();
                                        if (dd < 10) {
                                            dd = '0' + dd;
                                        }
                                        if (mm < 10) {
                                            mm = '0' + mm;
                                        }
                                        let endDate = yyyy + '-' + mm + '-' + dd;
                                        completion.value = endDate;

                                        // Calculate the total hours
                                        let totalHours = numberOfWeeks * numberOfHoursPerWeek;
                                        Hours.value = totalHours;
                                    });
                                }
                            });
                        </script>
                        <div class="col-md-4">
                            <div class="form-floating mb-3 text-light">
                                <input type="date" class="form-control text-bg-dark" id="ProgCompletion"
                                    name="ProgCompletion" placeholder="End Date">
                                <label for="ProgCompletion">End Date</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating mb-3 text-light">
                                <input type="text" class="form-control text-bg-dark" id="Progsuper" name="Progsuper"
                                    placeholder="Supervisor">
                                <label for="Progsuper">Supervisor</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-floating mb-3 text-light">
                                <input type="number" class="form-control text-bg-dark" id="ProgHours" name="ProgHours"
                                    placeholder="Hours">
                                <label for="ProgHours">Hours</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-floating mb-3 text-light">
                                <input type="number" max="50" min="5" class="form-control text-bg-dark" id="ProgSlot"
                                    name="ProgSlot" placeholder="Event Slot">
                                <label for="ProgSlot">Slots</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="input-group mb-3 text-bg-dark">
                                <input type="file" class="form-control text-bg-dark" id="ProgImage" name="ProgImage">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating mb-3 text-light">
                                <textarea class="form-control text-bg-dark" placeholder="Description"
                                    id="ProgDescription" name="ProgDescription" style="height: 150px"
                                    minlength="256"></textarea>
                                <label for="ProgDescription">Description</label>
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
                                    let EventTitle = document.getElementById("ProgTitle");
                                    let EventLocation = document.getElementById("ProgLocation");
                                    let EventDate = document.getElementById("ProgDate");
                                    let EventStart = document.getElementById("ProgStart");
                                    let EventEnd = document.getElementById("ProgEnd");
                                    let EventType = document.getElementById("Progduration");
                                    let EventCompletion = document.getElementById("ProgCompletion");
                                    let EventOrganizer = document.getElementById("Progsuper");
                                    let EventSlot = document.getElementById("ProgSlot");
                                    let EventDescription = document.getElementById("ProgDescription");
                                    let error = document.querySelector(".error");

                                    error.innerHTML = "";

                                    // check if date is grater than completion date
                                    if (EventDate) {
                                        EventDate.addEventListener("change", function () {
                                            let date = new Date(EventDate.value);
                                            let completion = new Date(EventCompletion.value);
                                            if (date > completion) {
                                                error.innerHTML = "Program date cannot be greater than completion date";
                                                EventDate.value = "";
                                            } else {
                                                error.innerHTML = "";
                                            }
                                        });
                                    }

                                    // check if completion date is less than date
                                    if (EventCompletion) {
                                        EventCompletion.addEventListener("change", function () {
                                            let date = new Date(EventDate.value);
                                            let completion = new Date(EventCompletion.value);
                                            if (completion < date) {
                                                error.innerHTML = "Completion date cannot be less than Program date";
                                                EventCompletion.value = "";
                                            } else {
                                                error.innerHTML = "";
                                            }
                                        });
                                    }

                                    // check if end time is greater than start time
                                    if (EventEnd) {
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
                                    }
                                });
                            </script>
                            <p class="text-danger error">
                                this is for error message
                            </p>
                        </div>
                    </form>
                </div>
                <hr class="mt-4 mb-4" style="background-color: white; height: 5px; border-radius: 5px;">

                <!-- search bar -->
                <form action="AdminPrograms.php" method="POST" id="searchForm">
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

                            $start = date("g:i A", strtotime($row['start_time']));
                            $end = date("g:i A", strtotime($row['end_time']));
                            $date = date("F j, Y", strtotime($row['start_date']));

                            if ($row['closed'] == 'true') {
                                $status = 'Closed';
                            } else {
                                $status = 'On-going';
                            }

                            // limit description to 100 characters and add ... at the end
                            $desc = $row['description'];
                            $desc = substr($desc, 0, 100);
                            $desc = $desc . '...';

                            $output = '
            <div class="col">
                <div class="card h-100 text-bg-dark">
                    <img src="' . $row['progimage'] . '" class="card-img-top" style="height: 200px; object-fit: cover;" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">' . $row['title'] . '</h5>
                        <p class="card-text">' . $date . '</p>
                        <p class="card-text">' . $row['progloc'] . '</p>
                        <p class="card-text" style="font-size: 14px;">' . $desc . '</p>
                        <small class="text-muted">Time: ' . $start . ' - ' . $end . ' | Available Seats: ' . $row['slots'] . '</small>
                    </div>
                    <div class="card-footer text-center">
                    <div class="hstack gap-2">
                    <a id="view' . $i . '" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ViewProg" style="width: 100%;">View</a>
                    <a id="update' . $i . '" class="btn btn-primary" tyle="width: 100%;">Update</a>
                    <a id="delete' . $i . '" class="btn btn-danger" style="width: 100%;">Delete</a>
                    </div>
                    </div>
                </div>
            </div>
            <script>
                let viewDetails' . $i . ' = document.querySelector("#view' . $i . '");
                let updateDetails' . $i . ' = document.querySelector("#update' . $i . '");
                let deleteDetails' . $i . ' = document.querySelector("#delete' . $i . '");

                let updateAddress = "../Components/Proccess/ProgUpdate.php?id=' . $row['progID'] . '";
                let deleteAddress = "../Components/Proccess/ProgDelete.php?id=' . $row['progID'] . '";

                    viewDetails' . $i . '.addEventListener("click", () => {
                        let viewTitle = document.querySelector("#Vtitle");
                        let viewImage = document.querySelector("#Vimg");
                        let viewDesc = document.querySelector("#Vdesc");
                        let viewDate = document.querySelector("#Vdate");
                        let viewTime = document.querySelector("#Vtime");
                        let viewLoc = document.querySelector("#Vloc");
                        let viewStat = document.querySelector("#Vstat");
                        let viewOrg = document.querySelector("#Vorg");
                        let viewUp = document.querySelector("#Vup");
                        let viewType = document.querySelector("#Vtype");

                        viewTitle.innerHTML = "' . $row['title'] . '";
                        viewImage.src = "' . $row['progimage'] . '";
                        viewDesc.innerHTML = "' . $row['description'] . '";
                        viewDate.innerHTML = "' . $date . '";
                        viewTime.innerHTML = "' . $start . ' - ' . $end . '";
                        viewLoc.innerHTML = "' . $row['progloc'] . '";
                        viewStat.innerHTML = "' . $status . '";
                        viewOrg.innerHTML = "' . $row['Supervisor'] . '";
                        viewType.innerHTML = "' . $row['Duration'] . '";
                        viewUp.href = updateAddress;
                    });

                    updateDetails' . $i . '.addEventListener("click", () => {
                        updateDetails' . $i . '.href = updateAddress;
                    });

                    // delete confirmation
                    deleteDetails' . $i . '.addEventListener("click", () => {
                        Swal.fire({
                            title: "Are you sure?",
                            text: "You won\'t be able to revert this!",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#d33",
                            cancelButtonColor: "#3085d6",
                            confirmButtonText: "Yes, delete it!",
                            cancelButtonText: "No, cancel!",
                            background: "#1a1a1a",
                            color: "white",
                            iconColor: "red"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.href = deleteAddress;
                            }
                        });
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