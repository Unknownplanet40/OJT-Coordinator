<?php

$sql = "SELECT * FROM tbl_announcement WHERE isEnded = 0";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$today = date("Y-m-d");
$end = $row['DateEnd'];

// get how many days left before the announcement ends
$diff = abs(strtotime($end) - strtotime($today));
$days = floor($diff / (60 * 60 * 24));

// format date added to Jan 1, 2021
$date = date("F j, Y", strtotime($row['DateAdded']));

// if today is greater than or equal to the end date, set isEnded to 1
if ($today >= $end) {
    $sql = "UPDATE tbl_announcement SET isEnded = 0 WHERE isEnded = 1";
    $result = mysqli_query($conn, $sql);
    echo '<script>console.log("Announcement Ended")</script>';
} else {
    $announcement =
        '
            <div class="alert alert-success fade alert-dismissible show user-select-none" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <h4 class="alert-heading">' . $row['Title'] . '</h4>
                <p class="text-break">' . $row['Description'] . '</p>
                <p class="mb-0 text-end">Posted by: ' . $row['PostedBy'] . '</p>
                <hr>
                <p class="mb-0 text-end">' . $date . ' | <small class="text-muted">Days Left Before Announcement Ends: ' . $days . '</small></p>
            </div>
        ';

    echo $announcement;
}


?>