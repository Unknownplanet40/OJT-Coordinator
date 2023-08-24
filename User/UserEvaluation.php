<?php
session_start();
@include_once("../Database/config.php");
@include_once("../Components/PopupAlert.php");

$_SESSION['SAtheme'] = "light";

if (!isset($_SESSION['DatahasbeenFetched'])) {
    header("Location: ../Login.php");
} elseif ($_SESSION['GlobalProfileCompleted'] == 'false') {
    header("Location: ../User/UserProfile.php");
} else {
    $ShowAlert = true;
    $ID = $_SESSION['GlobalID'];
}


$sql = "SELECT * FROM tbl_evaluation WHERE UID = '$ID'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    if ($_SESSION['GlobalEvaluated'] == "true") {
        $showForm = true;
        $Q1 = $row['Q1'];
        $Q2 = $row['Q2'];
        $Q3 = $row['Q3'];
        $Q4 = $row['Q4'];
        $Q5 = $row['Q5'];
        $Q6 = $row['Q6'];
        $Q7 = $row['Q7'];
        $Q8 = $row['Q8'];
        $Q9 = $row['Q9'];
        $Q10 = $row['Q10'];
        $Q11 = $row['Q11'];
        $Q12 = $row['Q12'];
        $Q13 = $row['Q13'];
        $Q14 = $row['Q14'];
        $Q15 = $row['Q15'];
        $Q16 = $row['Q16'];
        $Q17 = $row['Q17'];
        $Q18 = $row['Q18'];
        $Total_Score = $row['Total'];
        $fed = $row['feedback'];
        $evaby = $row['evaluated_by'];
        $datetaken = date("M d, Y - h:i A", strtotime($row['date_Taken']));
        $QoW = $row['QoW'];
        $Prod = $row['Prod'];
        $WHTS = $row['WHTS'];
        $IWR = $row['IWR'];
        

    } else {
        $showForm = null;
    }


} else {
    
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style/ImportantImport.css">
    <script src="../Script/SweetAlert2.js"></script>
    <title>Evaluation</title>
</head>

<body>
    <?php include_once '../Components/Sidebar.php';
    if (isset($ShowAlert)) {
        echo NewAlertBox();
        $_SESSION['Show'] = false;
    } ?>
    <section class="home">
        <div class="text">Evaluation</div>
        <div class="content d-flex justify-content-center" style="margin: 10px; width: 98%;">
            <?php

            isset($showForm) ? include_once '../Components/EvaluateData.php' : $stat = "Not Evaluated Yet";

            if (isset($stat)) {
                echo $stat;
            }
            ?>
        </div>
    </section>
    <script src="../Script/SidebarScript.js"></script>
    <script src="../Script/Bootstrap_Script/bootstrap.bundle.js"></script>
</body>

</html>