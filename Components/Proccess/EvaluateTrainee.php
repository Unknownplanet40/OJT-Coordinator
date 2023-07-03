<?php
session_start();
@include_once("../../Database/config.php");
@include_once("../../Components/PopupAlert.php");

if (!isset($_SESSION['DatahasbeenFetched'])) {
    header("Location: ../../Login.php");
} else {
    $ShowAlert = true;
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $ID = $_GET['ID'];

    $sql = "SELECT * FROM tbl_trainee WHERE UID = '$ID'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $name = $row['name'];
        $email = $row['email'];
        $trainee_uname = $row['trainee_uname'];
        $evaluated = $row['evaluated'];
        $_SESSION['evaluated'] = $evaluated;

        if ($evaluated == "true") {
            $sql = "SELECT * FROM tbl_evaluation WHERE UID = '$ID'";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                $row = mysqli_fetch_assoc($result);
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
                $Comment = $row['feedback'];
                $QualityOfWork = $row['QoW'];
                $Productivity = $row['Prod'];
                $WorkHabitsTalentsSkills = $row['WHTS'];
                $InterpersonalWorkRelationship = $row['IWR'];
                $TotalScore = $row['Total'];
                $date = $row['date_Taken'];
                $evaluator = $row['evaluated_by'];

                $showResult = true;
            } else {
                $_SESSION['message'] = "Error in line: " . __LINE__ . " in " . __FILE__;
                $_SESSION['icon'] = "error";
                $_SESSION['Show'] = true;
                header("Location:" . $_SERVER['HTTP_REFERER']);
            }
        }

    } else {
        $_SESSION['message'] = "Error in line: " . __LINE__ . " in " . __FILE__;
        $_SESSION['icon'] = "error";
        $_SESSION['Show'] = true;
        header("Location:" . $_SERVER['HTTP_REFERER']);
    }
    $showResult = true;
}


?>


<!DOCTYPE html>
<html lang="en, fil">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../Style/ImportantImport.css">
    <script src="../../Script/SweetAlert2.js"></script>
    <script defer src="../../Script/Bootstrap_Script/bootstrap.bundle.js"></script>
    <script src="../../Script/jquery-3.5.1.js"></script>
    <title> [Trainee Name] Evaluation </title>
</head>

<body class="dark adminuser">
    <br>
    <div class="container-lg rounded">
        <div class="container-lg">
            <?php
            if (isset($ShowAlert)) {
                echo NewAlertBox();
                $_SESSION['Show'] = false;
            }

            if ($showResult) {
                $output = "<script> 
                    Swal.fire({
                        icon: 'info',
                        text: 'This trainee has already been evaluated',
                        showConfirmButton: false,
                        timer: 0001,
                        didOpen: () => {
                            Swal.showLoading()
                        },
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        allowEnterKey: false,
                        stopKeydownPropagation: false,
                        width: '25rem',
                        padding: '1rem',
                        heightAuto: false,
                        background: '#1a1a1a',
                        color: '#ffffff',
                    }) 
                    </script>";
                @include "../../Components/EvaluateTable.php";
            }
            ?>

            <div class="container-lg text-bg-dark rounded table-responsive">
                
            </div>


        </div>
    </div>
</body>

</html>