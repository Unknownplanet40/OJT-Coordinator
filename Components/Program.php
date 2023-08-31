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
    $title = $_GET['title'];
}

$sql = "SELECT * FROM tbl_programs WHERE title = '$title'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if (mysqli_num_rows($result) > 0) {
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
    $Template = "disabled";
    $collapse = "show";

} else {
    $useupdate = false;
    $hidden = "hidden";
    $Template = "";
    $collapse = "";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style/Bootstrap_Style/bootstrap.css">
    <link rel="stylesheet" href="../Style/Fonts.css">
    <link rel="stylesheet" href="../Style/ColorPalette.css">
    <script src="../Script/SweetAlert2.js"></script>
    <script src="../Script/Bootstrap_Script/bootstrap.bundle.js"></script>
    <script src="../Script/jquery-3.5.1.js"></script>
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
            background: #e4e9f7;
        }

        .bganim {
            background: linear-gradient(147deg, #ffffff, #448454);
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

    $sql = "SELECT DISTINCT title, description, start_date, end_date, start_time, end_time, Duration, hours, progloc, Supervisor, ID FROM tbl_programs";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $filePath = '../Components/TemporaryData/Program.xml';

        // Create a new XML document
        $xml = new SimpleXMLElement('<programs></programs>');

        $addedTitles = array(); // Keep track of added titles
    
        while ($row = mysqli_fetch_assoc($result)) {
            $title = $row['title'];

            // Check if the title has already been added
            if (!in_array($title, $addedTitles)) {
                $program = $xml->addChild('program');
                $program->addChild('ID', $row['ID']);
                $program->addChild('title', $title);
                $program->addChild('progloc', $row['progloc']);
                $program->addChild('start_date', $row['start_date']);
                $program->addChild('start_time', $row['start_time']);
                $program->addChild('end_time', $row['end_time']);
                $program->addChild('Duration', $row['Duration']);
                $program->addChild('end_date', $row['end_date']);
                $program->addChild('Supervisor', $row['Supervisor']);
                $program->addChild('hours', $row['hours']);
                $program->addChild('description', $row['description']);

                // Add the title to the list of added titles
                $addedTitles[] = $title;
            }
        }

        // Save the XML to the file
        $xml->asXML($filePath);
    }

    ?>
    <script>
        // scroll to detalye
        $(document).ready(function () {
            $('html, body').animate({
                scrollTop: $('#AlreadybeenAsigned').offset().top
            }, 'slow');
        });
    </script>

    <div class="container-lg mt-5">
        <p <?php echo $hidden; ?>>
            <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                data-bs-target="#AlreadybeenAsigned">
                Show Program Details
            </button>
        </p>
        <div class="collapse <?php echo $collapse; ?>" id="AlreadybeenAsigned">
            <div class="card card-body bg-transparent border-0">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8 bg-light rounded shadow-lg">
                        <div class="container-lg mb-2">
                            <table class="table table-borderless">
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
                <div class="col-md-4">
                    <label for="Choice" class="form-label">Use Existing Program</label>
                    <select class="form-select" id="Choice" name="Choice" <?php print($Template); ?>>
                        <option value="" selected hidden>Choose...</option>
                    </select>
                </div>
                <div class="col-md-8">
                </div>
                <div class="col-md-6">
                    <input type="hidden" name="ProgID" id="ProgID" value="<?php echo $ProgID; ?>">
                    <input type="hidden" name="useupdate" id="useupdate" value="<?php echo $useupdate; ?>">
                    <div class="form-floating mb-3 text-light">
                        <input type="text" class="form-control" id="ProgTitle" name="ProgTitle"
                            placeholder="Program Name" required>
                        <label for="ProgTitle" class="text-dark">Program Name</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3 text-light">
                        <input type="text" class="form-control " id="ProgLocation" name="ProgLocation"
                            placeholder="Program Location">
                        <label for="ProgLocation" class="text-dark">Program Location</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating mb-3 text-light">
                        <input type="date" class="form-control " id="ProgDate" name="ProgDate" placeholder="Date"
                            required min="<?php echo date("Y-m-d"); ?>">
                        <label for="ProgDate" class="text-dark">Start Date</label>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-floating mb-3 text-light">
                        <input type="time" class="form-control " id="ProgStart" name="ProgStart"
                            placeholder="Start Time" required>
                        <label for="ProgStart" class="text-dark">From</label>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-floating mb-3 text-light">
                        <input type="time" class="form-control " id="ProgEnd" name="ProgEnd" placeholder="End Time"
                            required>
                        <label for="ProgEnd" class="text-dark">To</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating mb-3 text-light">
                        <select class="form-select " name="Progduration" id="Progduration" aria-label="Events Type"
                            required>
                            <option selected hidden>Choose...</option>
                            <option value="4">4 Week</option>
                            <option value="8">8 Week</option>
                            <option value="12">12 Week</option>
                            <option value="16">16 Week</option>
                            <option value="20">20 Week</option>
                        </select>
                        <label for="Progduration" class="text-dark">Duration</label>
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
                                // add title attribute in Hours
                                Hours.setAttribute("title", "You have to complete " + totalHours + " hours in " + numberOfWeeks + " weeks");
                            });
                        }
                    });
                </script>
                <div class="col-md-4">
                    <div class="form-floating mb-3 text-light">
                        <input type="date" class="form-control " id="ProgCompletion" name="ProgCompletion"
                            placeholder="End Date" required title="This will automatically calculate" readonly>
                        <label for="ProgCompletion" class="text-dark">End Date</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating mb-3 text-light">
                        <input type="text" class="form-control " id="Progsuper" name="Progsuper"
                            placeholder="Supervisor" required>
                        <label for="Progsuper" class="text-dark">Supervisor</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating mb-3 text-light">
                        <input type="number" class="form-control " id="ProgHours" name="ProgHours" placeholder="Hours"
                            required readonly>
                        <label for="ProgHours" class="text-dark">Hours</label>
                    </div>
                </div>
                <small class="text-muted">Note: End Date and Hours will be automatically calculated.</small>
                <div class="col-md-2">
                    <div class="vstack gap-2">
                        <input type="submit" class="btn btn-primary mb-1 bg-gradient" name="addEvent" id="addEvent"
                            value="Submit">
                        <input type="reset" disabled class="btn btn-danger bg-gradient" name="resetEvent" id="resetEvent"
                            value="Reset">
                        <a href="../Admin/AdminTrainees.php" class="btn btn-secondary mt-1">Back</a>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="form-floating mb-3 text-light">
                        <textarea class="form-control " placeholder="Description" id="ProgDescription"
                            name="ProgDescription" style="height: 138px" minlength="5"></textarea>
                        <label for="ProgDescription" class="text-dark">Description</label>
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
                            let EventHours = document.getElementById("ProgHours");
                            let EventDescription = document.getElementById("ProgDescription");
                            let reset = document.getElementById("resetEvent");
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
                                    EventType.value = "Choose...";
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
                                        EventHours.value = "";

                                    } else {
                                        error.innerHTML = "";
                                    }
                                });
                            }

                            // check if date is selected or not empty
                            EventType.addEventListener("change", function () {
                                if (EventDate.value == "") {
                                    error.innerHTML = "Please select a Starting Date first";
                                    // set default value of EventType to Choose...
                                    EventHours.value = "Choose...";

                                }
                            });

                            let choice = document.getElementById("Choice");
                            let PID = document.getElementById("ProgID");
                            let useupdate = document.getElementById("useupdate");

                            // Fetch the XML file and add the options to the select tag
                            fetch("../Components/TemporaryData/Program.xml")
                                .then(response => response.text())
                                .then(data => {
                                    let parser = new DOMParser();
                                    let xml = parser.parseFromString(data, "application/xml");
                                    let programs = xml.getElementsByTagName("program");
                                    let options = "";
                                    for (let i = 0; i < programs.length; i++) {
                                        let title = programs[i].getElementsByTagName("title")[0].childNodes[0].nodeValue;
                                        let id = programs[i].getElementsByTagName("ID")[0].childNodes[0].nodeValue;
                                        let endDate = programs[i].getElementsByTagName("end_date")[0].childNodes[0].nodeValue;
                                        let now = new Date();
                                        // check if the end date is near like 3 week or less, then disable it
                                        let end = new Date(endDate);
                                        let diff = end - now;
                                        // calculate the difference between end date and today's date
                                        let days = diff / (1000 * 60 * 60 * 24);
                                        days = Math.round(days);
                                        console.log("Debug object: " + id + " " + title + " " + days + " days left");
                                        if (days <= 21 && days > 1) {
                                            options += `<option value="${id}" disabled class="text-warning">${title} - Less than 3 weeks left</option>`;
                                        } else if (days <= 0) {
                                            options += `<option value="${id}" disabled class="text-danger">${title} - Program Ended</option>`;
                                        } else if (days == 1) {
                                            options += `<option value="${id}" disabled class="text-warning">${title} - 1 day left</option>`;
                                        } else {
                                            options += `<option value="${id}">${title}</option>`;
                                        }
                                    }
                                    // add the options to the select tag
                                    choice.innerHTML += options;
                                });

                            // if option is selected then show the details of the program in the form
                            choice.addEventListener("change", function () {
                                // Get the selected option value
                                let selectedValue = choice.value;

                                let today = new Date();

                                // Fetch the XML file again and find the selected program's details
                                fetch("../Components/TemporaryData/Program.xml")
                                    .then(response => response.text())
                                    .then(data => {
                                        let parser = new DOMParser();
                                        let xml = parser.parseFromString(data, "application/xml");
                                        let programs = xml.getElementsByTagName("program");
                                        for (let i = 0; i < programs.length; i++) {
                                            // Get the program details and update your form fields
                                            let id = programs[i].getElementsByTagName("ID")[0].childNodes[0].nodeValue;
                                            let title = programs[i].getElementsByTagName("title")[0].childNodes[0].nodeValue;
                                            let progloc = programs[i].getElementsByTagName("progloc")[0].childNodes[0].nodeValue;
                                            let start_date = programs[i].getElementsByTagName("start_date")[0].childNodes[0].nodeValue;
                                            let start_time = programs[i].getElementsByTagName("start_time")[0].childNodes[0].nodeValue;
                                            let end_time = programs[i].getElementsByTagName("end_time")[0].childNodes[0].nodeValue;
                                            let Duration = programs[i].getElementsByTagName("Duration")[0].childNodes[0].nodeValue;
                                            let end_date = programs[i].getElementsByTagName("end_date")[0].childNodes[0].nodeValue;
                                            let Supervisor = programs[i].getElementsByTagName("Supervisor")[0].childNodes[0].nodeValue;
                                            let hours = programs[i].getElementsByTagName("hours")[0].childNodes[0].nodeValue;
                                            let description = programs[i].getElementsByTagName("description")[0].childNodes[0].nodeValue;

                                            // if option is selected then show the details of the program in the form
                                            if (id === selectedValue) {
                                                // Update your form fields with the program details
                                                EventTitle.value = title;
                                                EventLocation.value = progloc;
                                                EventDate.value = start_date;
                                                EventStart.value = start_time;
                                                EventEnd.value = end_time;
                                                EventType.value = Duration;
                                                EventCompletion.value = end_date;
                                                EventOrganizer.value = Supervisor;
                                                EventHours.value = hours;
                                                EventDescription.value = description;
                                                reset.disabled = false;

                                                // set min date of EventDate to start_date
                                                EventDate.setAttribute("min", start_date); // this will prevent user to select past date & validation compatibility

                                                console.log(id);
                                                console.log(title);
                                                console.log(progloc);
                                                console.log(start_date);
                                                console.log(start_time);
                                                console.log(end_time);
                                                console.log(Duration);
                                                console.log(end_date);
                                                console.log(Supervisor);
                                                console.log(hours);
                                                console.log(description);
                                            }
                                        }
                                    }).catch(error => {
                                        console.error("Error fetching or parsing XML data:", error);
                                    });

                                // Clear the form fields if no option is selected
                                if (!selectedValue) {
                                    EventTitle.value = "";
                                    EventLocation.value = "";
                                    EventDate.value = "";
                                    EventStart.value = "";
                                    EventEnd.value = "";
                                    EventType.value = "Choose...";
                                    EventCompletion.value = "";
                                    EventOrganizer.value = "";
                                    EventHours.value = "";
                                    EventDescription.value = "";
                                    EventDate.setAttribute("min", today);
                                    reset.disabled = true;
                                }
                            });
                        });
                    </script>
                    <p class="text-danger text-center error">
                        this is for error message
                    </p>
                </div>
            </form>
        </div>
    </div>
</body>

</html>