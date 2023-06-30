<?php
session_start();
@include_once("../Database/config.php");
@include_once("../Components/PopupAlert.php");

// prevent user from accessing the page without logging in
if (!isset($_SESSION['DatahasbeenFetched'])) {
    header("Location: ../Login.php");
} else {
    $ShowAlert = true;
}

?>

<!DOCTYPE html>
<html lang="en, fil">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../Style/ImportantImport.css">
    <script src="../Script/SidebarScript.js"></script>
    <script src="../Script/SweetAlert2.js"></script>
    <script defer src="../Script/Bootstrap_Script/bootstrap.bundle.js" ></script>
    <title>Admin Dashboard</title>
</head>

<body class="dark adminuser" style="min-width: 1080px;">
    <?php include_once '../Components/AdminSidebar.php'; ?>
    <section class="home">
        <div class="text">SYSTEM LOG</div>
        <div class="container-fluid" style="width: 90%;">
            <small class="text-start text-muted" style="font-size: 16px;">This page shows the system log, recording
                errors and events that occur in the system. It helps with monitoring, tracking, troubleshooting, and
                maintaining the system efficiently.</small>
        </div>
        <hr class="hr">
        <div class="container-fluid" style="width: 98%;">
            <div>
                <div class="list-group" style="min-width: 700px; overflow-x: auto;">
                    <div class="list-group">
                        <?php
                        // Check if the log file exists
                        if (!file_exists("../System.log")) {
                            echo "<a class='list-group-item list-group-item-action text-bg-dark shadow-sm'>
                                    <div class='d-flex w-100 justify-content-between'>
                                        <h5 class='mb-1 text-uppercase text-warning'>Thier is no log file found in the system yet.</h5>
                                    </div>
                                </a>";
                        } else {
                            // Set the log file path
                            $logFile = "../System.log";

                            // Check if the file have contents
                            if (filesize($logFile) == 0) {
                                echo "<a class='list-group-item list-group-item-action text-bg-dark shadow-sm'>
                                    <div class='d-flex w-100 justify-content-between'>
                                        <h5 class='mb-1 text-uppercase text-warning'>You have no logs yet.</h5>
                                    </div>
                                </a>";
                            } else {
                                // Open the log file
                                $file = fopen($logFile, "r");
                            }


                            if ($file) {
                                // Reading the log file line by line
                        
                                $lines = [];
                                while (($line = fgets($file)) !== false) {
                                    $lines[] = $line;
                                }

                                $lines = array_reverse($lines);

                                $previousDate = null; // Add Date as a group heading
                                $logCounter = 0; // Added counter variable to limit the logs to 100
                        
                                foreach ($lines as $line) {
                                    // Extracting the date and time from the log string
                                    // by getting the string between "[" and "]"
                                    $startPos = strpos($line, "[") + 1;
                                    $endPos = strpos($line, "]");
                                    $dateAndTime = substr($line, $startPos, $endPos - $startPos);

                                    // Getting the current date
                                    $current_date = date("M d, Y");

                                    // Splitting the date and time
                                    list($date, $time) = explode(" ", $dateAndTime);

                                    // convert date to Jan 01, 2021 format
                                    $date = date("M d, Y", strtotime($date));
                                    // convert time to 12:00:00 AM format
                                    $time = date("h:i:s A", strtotime($time));
                                    // combine date and time
                                    $logDateAndTime = $date . " " . $time;

                                    // get how many days ago the log was created
                                    // by getting the difference between the current date and the log date
                                    $daysAgo = date_diff(date_create($date), date_create($current_date))->format("%a");

                                    // if the log was created today, display "Today" instead of "0 days ago"
                                    // or if the log was created yesterday, display "Yesterday" instead of "1 days ago"
                                    // else display the number of days ago
                                    if ($daysAgo == 0) {
                                        $daysAgo = "Today";
                                    } else if ($daysAgo == 1) {
                                        $daysAgo = "Yesterday";
                                    } else {
                                        $daysAgo = $daysAgo . " days ago";
                                    }

                                    // Extracting the remaining parts of the log string
                                    // by splitting it with " - " as the delimiter
                                    $parts = explode(" - ", $line);
                                    $logType = $parts[1];
                                    $logTitle = $parts[2];
                                    $logMessage = $parts[3];


                                    // Setting the color of the log type
                                    if ($logType == "Access") {
                                        $type = "<span class='text-success' style='font-size: 14px;'>" . $logType . "</span>";
                                    } else if ($logType == "Error") {
                                        $type = "<span class='text-danger' style='font-size: 14px;'>" . $logType . "</span>";
                                    } else if ($logType == "Warning") {
                                        $type = "<span class='text-warning' style='font-size: 14px;'>" . $logType . "</span>";
                                    } else if ($logType == "Debug") {
                                        $type = "<span class='text-primary' style='font-size: 14px;'>" . $logType . "</span>";
                                    } else if ($logType == "Info") {
                                        $type = "<span class='text-info' style='font-size: 14px;'>" . $logType . "</span>";
                                    } else {

                                    }

                                    // Check if the date has changed and add a group heading if necessary
                                    if ($date !== $previousDate) {
                                        echo "<a class='list-group-item list-group-item-action text-bg-success shadow-sm'>";
                                        echo "<h5 class='text-uppercase text-bg-success text-end mb-0'>" . $date . "</h5>";
                                        $previousDate = $date;
                                    }

                                    // Generating the final output
                                    $output = "<a class='list-group-item list-group-item-action text-bg-dark shadow-sm'>
                                                    <div class='d-flex w-100 justify-content-between'>
                                                        <h5 class='mb-1 text-uppercase text-secondary' style='min-width: 300px;'>" . $logTitle . " " . $type . "</h5>
                                                        <small><span class='badge bg-primary rounded'>" . $daysAgo . "</span> - " . $logDateAndTime . "</small>
                                                    </div>
                                                    <p class='mb-1 mx-3 text-break w-50'>" . $logMessage . "</p>
                                                </a>";
                                    echo $output;

                                    $logCounter++; // Increment counter
                        
                                    if ($logCounter >= 100) {
                                        break; // Exit the loop after 100 logs
                                    }
                                }

                                fclose($file);

                            } else {
                                echo "<a class='list-group-item list-group-item-action text-bg-dark shadow-sm'>
                                    <div class='d-flex w-100 justify-content-between'>
                                        <h5 class='mb-1 text-uppercase text-danger'>Thier is an error in opening the log file.</h5>
                                    </div>
                                </a>";
                            }
                        }
                        ?>
                    </div>
                    <p class="text-center text-muted">Only the last <b>100</b> logs are shown.</p>
                </div>
            </div>
            <br>
        </div>
    </section>
</body>

</html>