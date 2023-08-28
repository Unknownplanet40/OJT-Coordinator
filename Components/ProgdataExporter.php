<?php
session_start();
@include_once("../Database/config.php");

$sql = "SELECT * FROM tbl_programs";
$result = mysqli_query($conn, $sql);

// create xml if not exists 
if (!file_exists('../Database/Programs.xml')) {
    $xml = new DOMDocument("1.0", "UTF-8");
    $xml->formatOutput = true;
    $xml->preserveWhiteSpace = false;
    $xml->loadXML('<?xml version="1.0" encoding="UTF-8"?>
            <Programs>
            </Programs>');
    $xml->save('../Database/Programs.xml');
} else {
    //clear xml file
    $xml = new DOMDocument("1.0", "UTF-8");
    $xml->formatOutput = true;
    $xml->preserveWhiteSpace = false;
    $xml->loadXML('<?xml version="1.0" encoding="UTF-8"?>
            <Programs>
            </Programs>');
    $xml->save('../Database/Programs.xml');
}

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $P_ID = $row['ID'];
        $P_Title = $row['title'];
        $P_Description = $row['description'];
        $P_Start_Date = $row['start_date'];
        $P_End_Date = $row['end_date'];
        $P_Location = $row['progloc'];
        $P_Hours = $row['hours'];
        $P_Start_Time = $row['start_time'];
        $P_End_Time = $row['end_time'];
        $P_Duration = $row['Duration'];
        $P_Supervisor = $row['Supervisor'];

        // save data to xml
        $rootTag = $xml->getElementsByTagName("Programs")->item(0);

        $dataTag = $xml->createElement("Program");
        $dataTag->appendChild($xml->createElement("ID", $P_ID));
        $dataTag->appendChild($xml->createElement("Title", $P_Title));
        $dataTag->appendChild($xml->createElement("Description", $P_Description));
        $dataTag->appendChild($xml->createElement("Start_Date", $P_Start_Date));
        $dataTag->appendChild($xml->createElement("End_Date", $P_End_Date));
        $dataTag->appendChild($xml->createElement("Location", $P_Location));
        $dataTag->appendChild($xml->createElement("Hours", $P_Hours));
        $dataTag->appendChild($xml->createElement("Start_Time", $P_Start_Time));
        $dataTag->appendChild($xml->createElement("End_Time", $P_End_Time));
        $dataTag->appendChild($xml->createElement("Duration", $P_Duration));
        $dataTag->appendChild($xml->createElement("Supervisor", $P_Supervisor));

        $rootTag->appendChild($dataTag);
        $xml->save('../Database/Programs.xml');

    }
}





?>