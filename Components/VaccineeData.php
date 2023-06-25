<?php
$sql = "SELECT * FROM tbl_vaccine WHERE UID = " . $_SESSION['GlobalID'];
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    $_SESSION['GlobalVaccName'] = $row['vaccineName'];
    $_SESSION['GlobalVaccType'] = $row['vaccineType'];
    $_SESSION['GlobalVaccDose'] = $row['vaccineDose'];
    $_SESSION['GlobalVaccLoc'] = $row['vaccineLoc'];
    $_SESSION['GlobalVaccImage'] = $row['vaccineImage'];
    $_SESSION['GlobalVD1'] =  date("F j, Y", strtotime($row['VaccDoseOne']));
    $_SESSION['GlobalVD2'] =  date("F j, Y", strtotime($row['VaccDosetwo']));
    $_SESSION['GlobalVD3'] =  date("F j, Y", strtotime($row['VaccDoseBooster']));
    $_SESSION['GlobalVaccCompleted'] = 1;

    if ($_SESSION['GlobalVaccDose'] == 'one') {
        $_SESSION['GlobalVD2'] = NULL;
        $_SESSION['GlobalVD3'] = NULL;
    } else if ($_SESSION['GlobalVaccDose'] == 'two') {
        $_SESSION['GlobalVD3'] = NULL;
    }

    if ($_SESSION['GlobalVaccImage'] == NULL) {
        $_SESSION['GlobalVaccImage'] = "../Image/Vaccination_Image.jpg";
    }

    if ($_SESSION['GlobalVaccType'] ==  1){
        $_SESSION['GlobalVaccType'] = "Full Vaccination series";
    } else {
        $_SESSION['GlobalVaccType'] = "Single Dose Vaccine";
    }
} else {
    $_SESSION['GlobalVaccCompleted'] = 0;
}
?>