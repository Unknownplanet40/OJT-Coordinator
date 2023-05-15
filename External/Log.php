<?php

function logMessage($message){
    //check if log file exists and if not create one
    $filename = "log.txt";
    if(!file_exists($filename)){
        $file = fopen($filename, "w");
        fclose($file);
    }
    //open log file in append mode
    if($file = fopen($filename, "a")){
        $date = date("Y-m-d H:i:s");
        fwrite($file, "[$date] - $message\n");
        fclose($file);
    }
}


?>