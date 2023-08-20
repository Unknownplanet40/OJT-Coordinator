<?php
session_start();
@include_once("../../Database/config.php");
date_default_timezone_set("Asia/Manila");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ID = $_POST['EvID'];
    $Q1 = $_POST['Q1'];
    $Q2 = $_POST['Q2'];
    $Q3 = $_POST['Q3'];
    $Q4 = $_POST['Q4'];
    $Q5 = $_POST['Q5'];
    $Q6 = $_POST['Q6'];
    $Q7 = $_POST['Q7'];
    $Q8 = $_POST['Q8'];
    $Q9 = $_POST['Q9'];
    $Q10 = $_POST['Q10'];
    $Q11 = $_POST['Q11'];
    $Q12 = $_POST['Q12'];
    $Q13 = $_POST['Q13'];
    $Q14 = $_POST['Q14'];
    $Q15 = $_POST['Q15'];
    $Q16 = $_POST['Q16'];
    $Q17 = $_POST['Q17'];
    $Q18 = $_POST['Q18'];
    $Comment = $_POST['Comments'];

    // check if comment have ' or " and replace it with \' or \"
    $Comment = str_replace("'", "\'", $Comment);


    $address = "EvaluateTrainee.php?ID=" . $ID;

    // check if Q1 to Q18 don't have a value
    if ($Q1 == "" || $Q2 == "" || $Q3 == "" || $Q4 == "" || $Q5 == "" || $Q6 == "" || $Q7 == "" || $Q8 == "" || $Q9 == "" || $Q10 == "" || $Q11 == "" || $Q12 == "" || $Q13 == "" || $Q14 == "" || $Q15 == "" || $Q16 == "" || $Q17 == "" || $Q18 == "") {
        $_SESSION['message'] = "Please fill all the fields";
        $_SESSION['icon'] = "error";
        $_SESSION['Show'] = true;
        $_SESSION['EvID'] = $ID;
        header("Location: ../Proccess/" . $address);
    } else if ($Comment == "") {
        $_SESSION['message'] = "Please fill all the fields including the comment section";
        $_SESSION['icon'] = "error";
        $_SESSION['Show'] = true;
        $_SESSION['EvID'] = $ID;
        header("Location: ../Proccess/" . $address);
    } else {
        $QualityOfWork = round((($Q1 + $Q2 + $Q3) / 15) * 100, 2);
        $Productivity = round((($Q4 + $Q5 + $Q6 + $Q7) / 20) * 100, 2);
        $WorkHabitsTalentsSkills = round((($Q8 + $Q9 + $Q10 + $Q11 + $Q12 + $Q13 + $Q14) / 35) * 100, 2);
        $InterpersonalWorkRelationship = round((($Q15 + $Q16 + $Q17 + $Q18) / 20) * 100, 2);
        $bonus = round(((5 + 5) / 10) * 100, 2);
        $TotalScore = round((($QualityOfWork + $Productivity + $WorkHabitsTalentsSkills + $InterpersonalWorkRelationship + $bonus) / 5), 2);
        // current date and time
        $date = date("Y-m-d H:i:s");
        $evaluator = $_SESSION['GlobalName'];

        if ($_SESSION['evaluated'] == "false") {
            $sql = "INSERT INTO tbl_evaluation (UID, Q1, Q2, Q3, Q4, Q5, Q6, Q7, Q8, Q9, Q10, Q11, Q12, Q13, Q14, Q15, Q16, Q17, Q18, QoW, Prod, WHTS, IWR, Total, date_Taken, feedback, evaluated_by) VALUES ('$ID', '$Q1', '$Q2', '$Q3', '$Q4', '$Q5', '$Q6', '$Q7', '$Q8', '$Q9', '$Q10', '$Q11', '$Q12', '$Q13', '$Q14', '$Q15', '$Q16', '$Q17', '$Q18', '$QualityOfWork', '$Productivity', '$WorkHabitsTalentsSkills', '$InterpersonalWorkRelationship', '$TotalScore', '$date', '$Comment', '$evaluator')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                $sql = "UPDATE tbl_trainee SET evaluated = 'true' WHERE UID = '$ID'";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    $_SESSION['message'] = "Evaluation submitted successfully";
                    $_SESSION['icon'] = "success";
                    $_SESSION['Show'] = true;
                    header("Location: ../Proccess/" . $address);
                } else {
                    $_SESSION['message'] = "Error in line: " . __LINE__ . " in " . __FILE__;
                    $_SESSION['icon'] = "error";
                    $_SESSION['Show'] = true;
                    header("Location: ../Proccess/" . $address);
                }
            } else {
                $_SESSION['message'] = "Error in line: " . __LINE__ . " in " . __FILE__;
                $_SESSION['icon'] = "error";
                $_SESSION['Show'] = true;
                header("Location: ../Proccess/" . $address);
            }
        } else {
            $sql = "UPDATE tbl_evaluation SET Q1 = '$Q1', Q2 = '$Q2', Q3 = '$Q3', Q4 = '$Q4', Q5 = '$Q5', Q6 = '$Q6', Q7 = '$Q7', Q8 = '$Q8', Q9 = '$Q9', Q10 = '$Q10', Q11 = '$Q11', Q12 = '$Q12', Q13 = '$Q13', Q14 = '$Q14', Q15 = '$Q15', Q16 = '$Q16', Q17 = '$Q17', Q18 = '$Q18', QoW = '$QualityOfWork', Prod = '$Productivity', WHTS = '$WorkHabitsTalentsSkills', IWR = '$InterpersonalWorkRelationship', Total = '$TotalScore', date_Taken = '$date', feedback = '$Comment', evaluated_by = '$evaluator' WHERE UID = '$ID'";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                $_SESSION['message'] = "Evaluation submitted successfully";
                $_SESSION['icon'] = "success";
                $_SESSION['Show'] = true;
                header("Location: ../Proccess/" . $address);
            } else {
                $_SESSION['message'] = "Error in line: " . __LINE__ . " in " . __FILE__;
                $_SESSION['icon'] = "error";
                $_SESSION['Show'] = true;
                header("Location: ../Proccess/" . $address);
            }
        }
    }
}

?>