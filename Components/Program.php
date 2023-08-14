<?php
session_start();
@include_once("../Database/config.php");
@include_once("../Components/PopupAlert.php");

if (!isset($_SESSION['DatahasbeenFetched'])) {
    header("Location: ../Login.php");
} else {
    $ShowAlert = true;
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $ProgID = $_GET['id'];
}

$sql = "SELECT * FROM tbl_programs WHERE progID = $ProgID";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if (mysqli_num_rows($result) > 0) {
    $_SESSION['message'] = "User Already Been Assigned a Program";
    $_SESSION['icon'] = "info";
    $_SESSION['Show'] = true;
    $useupdate = true;
    $hidden = "";

    $Title = $row['title'];
    $Location = $row['progloc'];
    $Date = date("M d, Y", strtotime($row['start_date']));
    $From = date("h:i A", strtotime($row['start_time']));
    $To = date("h:i A", strtotime($row['end_time']));
    $Duration = $row['Duration'];
    $Comp = date("M d, Y", strtotime($row['end_date']));
    $Super = $row['Supervisor'];
    $Hours = $row['hours'];
    $Desc = $row['description'];

} else {
    $useupdate = false;
    $hidden = "hidden";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style/Bootstrap_Style/bootstrap.css">
    <link rel="stylesheet" href="../Style/Fonts.css">
    <script src="../Script/SweetAlert2.js"></script>
    <script src="../Script/Bootstrap_Script/bootstrap.bundle.js"></script>
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

        .bgani {
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
            background: var(--body-color);
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
    <div class="container-lg mt-5">
        <p <?php echo $hidden; ?>>
            <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                data-bs-target="#AlreadybeenAsigned">
                Show Program Details
            </button>
        </p>
        <div class="collapse" id="AlreadybeenAsigned">
            <div class="card card-body bg-transparent">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="container-lg rounded shadow-lg mb-2 bg-dark">
                            <table class="table table-borderless text-bg-dark">
                                <tr>
                                    <td class="text-end"><span class="text-muted">Title</span></td>
                                    <td>
                                        <?php echo $Title; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-end"><span class="text-muted">Location</span></td>
                                    <td>
                                        <?php echo $Location; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-end"><span class="text-muted">Date</span></td>
                                    <td>
                                        <?php echo $Date; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-end"><span class="text-muted">Completion</span></td>
                                    <td>
                                        <?php echo $Comp; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-end"><span class="text-muted">From</span></td>
                                    <td>
                                        <?php echo $From; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-end"><span class="text-muted">To</span></td>
                                    <td>
                                        <?php echo $To; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-end"><span class="text-muted">Duration</span></td>
                                    <td>
                                        <?php echo $Duration; ?> Weeks
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-end"><span class="text-muted">Supervisor</span></td>
                                    <td>
                                        <?php echo $Super; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-end"><span class="text-muted">Hours</span></td>
                                    <td>
                                        <?php echo $Hours; ?> Hours
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-end"><span class="text-muted">Description</span></td>
                                    <td>
                                        <span class="text-break">
                                            <?php echo $Desc; ?>
                                        </span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-lg">
        <div id="EventForm">
            <form class="row g-3 rounded mt-1" method="POST" action="../Components/Proccess/ProgInsert.php"
                enctype="multipart/form-data">
                <div class="col-md-6">
                    <input type="hidden" name="ProgID" id="ProgID" value="<?php echo $ProgID; ?>">
                    <input type="hidden" name="useupdate" id="useupdate" value="<?php echo $useupdate; ?>">
                    <div class="form-floating mb-3 text-light">
                        <input type="text" class="form-control text-bg-dark" id="ProgtTitle" name="ProgTitle"
                            placeholder="Program Name" required>
                        <label for="ProgTitle">Program Name</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3 text-light">
                        <input type="text" class="form-control text-bg-dark" id="ProgLocation" name="ProgLocation"
                            placeholder="Program Location">
                        <label for="ProgLocation">Program Location</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating mb-3 text-light">
                        <input type="date" class="form-control text-bg-dark" id="ProgDate" name="ProgDate"
                            placeholder="Date" required min="<?php echo date('Y-m-d'); ?>">
                        <label for="ProgDate">Start Date</label>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-floating mb-3 text-light">
                        <input type="time" class="form-control text-bg-dark" id="ProgStart" name="ProgStart"
                            placeholder="Start Time" required>
                        <label for="ProgStart">From</label>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-floating mb-3 text-light">
                        <input type="time" class="form-control text-bg-dark" id="ProgEnd" name="ProgEnd"
                            placeholder="End Time" required>
                        <label for="ProgEnd">To</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating mb-3 text-light">
                        <select class="form-select text-bg-dark" name="Progduration" id="Progduration"
                            aria-label="Events Type" required>
                            <option selected hidden>Choose...</option>
                            <option value="4">4 Week</option>
                            <option value="8">8 Week</option>
                            <option value="12">12 Week</option>
                            <option value="16">16 Week</option>
                            <option value="20">20 Week</option>
                        </select>
                        <label for="Progduration">Duration</label>
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
                        <input type="date" class="form-control text-bg-dark" id="ProgCompletion" name="ProgCompletion"
                            placeholder="End Date" required>
                        <label for="ProgCompletion">End Date</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating mb-3 text-light">
                        <input type="text" class="form-control text-bg-dark" id="Progsuper" name="Progsuper"
                            placeholder="Supervisor" required>
                        <label for="Progsuper">Supervisor</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating mb-3 text-light">
                        <input type="number" class="form-control text-bg-dark" id="ProgHours" name="ProgHours"
                            placeholder="Hours" required>
                        <label for="ProgHours">Hours</label>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="vstack gap-2">
                        <input type="submit" class="btn btn-primary mb-1 bg-gradient" name="addEvent" id="addEvent"
                            value="Submit">
                        <input type="reset" class="btn btn-danger bg-gradient" name="resetEvent" id="resetEvent"
                            value="Reset">
                        <a href="../Admin/AdminTrainees.php" class="btn btn-secondary mt-1">Back</a>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="form-floating mb-3 text-light">
                        <textarea class="form-control text-bg-dark" placeholder="Description" id="ProgDescription"
                            name="ProgDescription" style="height: 138px" minlength="256"></textarea>
                        <label for="ProgDescription">Description</label>
                    </div>
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
    </div>
</body>

</html>