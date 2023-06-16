<?php
function logMessage($type, $title, $message)
{

    $filename = "System.log";

    // create log file if it does not exist
    if (!file_exists("../" . $filename)) {
        $file = fopen("../" . $filename, "w");
        fclose($file);
    }

    //open log file in append mode
    if ($file = fopen($filename, "a")) {
        $date = date("Y-m-d H:i:s");
        fwrite($file, "[$date] - $type - $title - $message\n");
        fclose($file);
    }

}


?>