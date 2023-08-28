<?php
session_start();
@include_once("../../Database/config.php");
@include_once("../../Components/PopupAlert");
date_default_timezone_set('Asia/Manila');

$UID = $_SESSION['GlobalID'];
$EventID = $_SESSION['GlobalEventID'];

$sql = "SELECT * FROM tbl_events WHERE EventID = '$EventID'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    $current_date = date("Y-m-d");
    $current_time = date("H:i:s");
    $completion_date = $row['eventCompletion'];
    $completion_time = date("H:i:s", strtotime($row['eventEndTime']));
    // 12 hour format


    // get the remaining time
    $date1 = new DateTime($current_time);
    $date2 = new DateTime($completion_time);
    $interval = $date1->diff($date2);
    $nonZeroComponents = [];

    if ($current_date == $completion_date) {

        // Check and add non-zero components to the array
        if ($interval->format('%H') > 0) {
            $nonZeroComponents[] = $interval->format('%h hours');
        }
        if ($interval->format('%I') > 0) {
            $nonZeroComponents[] = $interval->format('%i minutes');
        }
        if ($interval->format('%S') > 0) {
            $nonZeroComponents[] = $interval->format('%s seconds');
        }

        $remaining_time = implode(', ', $nonZeroComponents);
        $_SESSION['remaining_time'] = $remaining_time;
        header("Location: ../../User/UserDashboard.php");
    } else {
        $sql = "UPDATE tbl_events SET eventSlots = eventSlots + 1 WHERE EventID = '$EventID'";
        mysqli_query($conn, $sql);
        $sql = "UPDATE tbl_trainee SET Join_an_Event = 0 WHERE UID = '$UID'";
        mysqli_query($conn, $sql);

        $_SESSION['message'] = "You have successfully unjoined the event.";
        $_SESSION['icon'] = "success";
        $_SESSION['Show'] = true;
        $_SESSION['GlobalJoin_an_Event'] = 0;
        header("Location: ../../User/UserDashboard.php");
    }
}

?>