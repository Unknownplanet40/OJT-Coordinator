<?php
session_start();
@include_once("../../Database/config.php");

print_r($_POST);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $eventitle = $_POST['EventTitle'];
    $eventloc = $_POST['EventLocation'];
    $eventdate = $_POST['EventDate'];
    $eventstart = $_POST['EventStart'];
    $eventend = $_POST['EventEnd'];
    $eventtype = $_POST['EventType'];
    $eventcom = $_POST['EventCompletion'];
    $eventorg = $_POST['EventOrganizer'];
    $eventdesc = $_POST['EventDescription'];
    $eventslot = $_POST['EventSlot'];
    $DateCreated = date("Y-m-d");

    function RandomCharacter($length)
    {
        $result = '';
        for ($i = 0; $i < $length; $i++) {
            $result .= chr(rand(97, 122));
        }
        return $result;
    }

    // Check if eventimg is empty
    if (empty($_FILES['EventImage']['name'])) {
        $eventimg = "../../Image/eventImage.jpg";
    } else {
        $parentfolderpath = '../../uploads/' . $eventitle . '_Event'; // parent folder path 'eventtitle_event
        $folderpath = $parentfolderpath . '/Eventimg'; // folder path 'eventtitle_event/Eventimg'
        $tempfolderpath = $parentfolderpath . '/Eventimg/temp'; // temp folder path 'eventtitle_event/Eventimg/temp'
        $filename = RandomCharacter(5) . "_Eventimg(" . $eventitle . ")"; // filename format "randomstring_eventimg(eventtitle)
        $extensions = ['png', 'jpg', 'jpeg']; // allowed extensions

        if (!file_exists($folderpath)) {
            mkdir($folderpath, 0777, true);
        } else if (!file_exists($tempfolderpath)) {
            mkdir($tempfolderpath, 0777, true);
        }

        // Copy old image to temp folder (if exists) then delete the old image
        foreach ($extensions as $extension) {
            $filePath = $folderpath . '/' . $filename . '.' . $extension;
            if (file_exists($filePath)) {
                $tempPath = $tempfolderpath . '/' . $filename . '.' . $extension;
                copy($filePath, $tempPath);
                unlink($filePath);
                break;
            }
        }

        $taget_dir = $folderpath . '/'; // target directory 'eventtitle_event/Eventimg/'
        $target_file = $taget_dir . basename($_FILES["EventImage"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $newfilename = $filename . "." . $imageFileType;
        $target_file = $taget_dir . $newfilename;

        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["EventImage"]["tmp_name"]);

        // If file size is larger than 3mb
        if ($_FILES["EventImage"]["size"] > 3000000) {
            $_SESSION['message'] = "Sorry, your file is too large.";
            $_SESSION['icon'] = "error";
            $_SESSION['Show'] = true;
            header("Location: ../../Admin/AdminEvents.php");
            exit;
        } elseif (!in_array($imageFileType, $extensions)) {
            $_SESSION['message'] = "Sorry, only JPG, JPEG & PNG files are allowed.";
            $_SESSION['icon'] = "error";
            $_SESSION['Show'] = true;
            header("Location: ../../Admin/AdminEvents.php");
            exit;
        } else {
            if ($check !== false) {
                if (move_uploaded_file($_FILES["EventImage"]["tmp_name"], $target_file)) {
                    $eventimg = $target_file;
                    $eventimg = substr($eventimg, 3);
                } else {
                    $_SESSION['message'] = "Sorry, there was an error uploading your file.";
                    $_SESSION['icon'] = "error";
                    $_SESSION['Show'] = true;
                    header("Location: ../../Admin/AdminEvents.php");
                    exit;
                }
            } else {
                $_SESSION['message'] = "File is not an image.";
                $_SESSION['icon'] = "error";
                $_SESSION['Show'] = true;
                header("Location: ../../Admin/AdminEvents.php");
            }
        }
    }

    // get the last eventID in the database
    $sql = "SELECT eventID FROM tbl_events ORDER BY eventID DESC LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $eventid = $row['eventID'] + 1;

    // I got an error when I tried to insert the eventdesc into the database 
    // because of the single quote (') so I used this function to replace it with (\')
    $eventitle = str_replace("'", "\'", $eventitle);
    $eventloc = str_replace("'", "\'", $eventloc);
    $eventdesc = str_replace("'", "\'", $eventdesc);

    $sql = "INSERT INTO tbl_events(eventID, eventTitle, eventDescription, eventImage, eventDate, eventStartTime, eventEndTime, eventType, eventCompletion, eventEnded, eventLocation, eventSlots, eventOrganizer, eventCreated) VALUES ('$eventid', '$eventitle', '$eventdesc', '$eventimg', '$eventdate', '$eventstart', '$eventend', '$eventtype', '$eventcom', 'false', '$eventloc', '$eventslot', '$eventorg', '$DateCreated')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['message'] = "Event has been added successfully!";
        $_SESSION['icon'] = "success";
        $_SESSION['Show'] = true;
        header("Location: ../../Admin/AdminEvents.php");
    } else {
        $_SESSION['message'] = "Event has not been added successfully!";
        $_SESSION['icon'] = "error";
        $_SESSION['Show'] = true;
        header("Location: ../../Admin/AdminEvents.php");
    }
}
?>