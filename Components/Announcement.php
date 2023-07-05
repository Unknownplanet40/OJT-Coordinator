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

if ($today > $end) {
    $sql = "UPDATE tbl_announcement SET isEnded = 0 WHERE isEnded = 1";
    $result = mysqli_query($conn, $sql);


} else {
    $output =
        '
            <div class="alert alert-success fade show" role="alert">
                <h4 class="alert-heading">' . $row['Title'] . '</h4>
                <p>' . $row['Description'] . '</p>
                <p class="mb-0 text-end">Posted by: ' . $row['PostedBy'] . '</p>
                <hr>
                <p class="mb-0 text-end">' . $date . ' | <small class="text-muted">Days Left Before Announcement Ends: ' . $days . '</small></p>
            
            </div>
        ';

    echo $output;
}


?>