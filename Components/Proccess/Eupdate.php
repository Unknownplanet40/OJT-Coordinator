<?php
session_start();
@include_once("../../Database/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $eventid = $_POST['EventID'];
    $eventitle = $_POST['EventTitle'];
    $eventloc = $_POST['EventLocation'];
    $eventdate = $_POST['EventDate'];
    $eventstart = $_POST['EventStartTime'];
    $eventend = $_POST['EventEndTime'];
    $eventtype = $_POST['EventType'];
    $eventcom = $_POST['EventComp'];
    $eventorg = $_POST['EventOrg'];
    $eventdesc = $_POST['EventDescription'];
    $eventslot = $_POST['EventSlots'];

    $eventdesc = str_replace("'", "\'", $eventdesc);

    $sql = "SELECT * FROM tbl_events WHERE eventID = '$eventid'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $olddate = $row['eventDate'];
    $oldstart = $row['eventStartTime'];
    $oldend = $row['eventEndTime'];
    $oldComp = $row['eventCompletion'];

    //if the date is changed
    if ($olddate != $eventdate || $oldstart != $eventstart || $oldend != $eventend || $oldComp != $eventcom) {
        $sql = "UPDATE tbl_events SET eventTitle = '$eventitle', eventLocation = '$eventloc', eventDate = '$eventdate', eventStartTime = '$eventstart', eventEndTime = '$eventend', eventType = '$eventtype', eventCompletion = '$eventcom', eventOrganizer = '$eventorg', eventDescription = '$eventdesc', eventSlots = '$eventslot', eventEnded = 'false' WHERE eventID = '$eventid'";
        $result = mysqli_query($conn, $sql);
    } else {
        $sql = "UPDATE tbl_events SET eventTitle = '$eventitle', eventLocation = '$eventloc', eventDate = '$eventdate', eventStartTime = '$eventstart', eventEndTime = '$eventend', eventType = '$eventtype', eventCompletion = '$eventcom', eventOrganizer = '$eventorg', eventDescription = '$eventdesc', eventSlots = '$eventslot' WHERE eventID = '$eventid'";
        $result = mysqli_query($conn, $sql);
    }

    if ($result) {
        $_SESSION['message'] = "Event Updated Successfully";
        $_SESSION['icon'] = "success";
        $_SESSION['Show'] = true;
        header("Location: ../../Components/Proccess/EventUpdate.php?id=$eventid");
    } else {
        $_SESSION['message'] = "Event Update Failed";
        $_SESSION['icon'] = "error";
        $_SESSION['Show'] = true;
        header("Location: ../../Components/Proccess/EventUpdate.php?id=$eventid");
    }
}

?>