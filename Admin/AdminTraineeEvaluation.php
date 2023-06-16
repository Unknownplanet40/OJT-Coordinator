<?php
session_start();

if (isset($_POST['SearchTrainee'])) {
    $search = $_POST['search'];

    // Search for ID, Name, Email, username;
}

if (isset($_POST['evaluate'])) {

    // Q1 - Q3 = Quality of Work
    // Q4 - Q7 = Productivity
    // Q8 - Q14 = Work Habits, Talents & Skills
    // Q15 - Q18 = Interpersonal Work Relationship

    // Initialize an array of question keys and their corresponding labels
    $questionKeys = [
        'Q1' => 'Question 1',
        'Q2' => 'Question 2',
        'Q3' => 'Question 3',
        'Q4' => 'Question 4',
        'Q5' => 'Question 5',
        'Q6' => 'Question 6',
        'Q7' => 'Question 7',
        'Q8' => 'Question 8',
        'Q9' => 'Question 9',
        'Q10' => 'Question 10',
        'Q11' => 'Question 11',
        'Q12' => 'Question 12',
        'Q13' => 'Question 13',
        'Q14' => 'Question 14',
        'Q15' => 'Question 15',
        'Q16' => 'Question 16',
        'Q17' => 'Question 17',
        'Q18' => 'Question 18'
    ];
    
    // Check if any input is empty
    $emptyFields = [];
    // Loop through each question key
    // $key = 'Q1' => $label = 'Question 1'
    foreach ($questionKeys as $key => $label) {
        if (empty($_POST[$key])) {
            // Add the label of the empty question to the array
            $emptyFields[] = $label;
        }
        // Assign the value of each question to a variable
        ${$key} = $_POST[$key];
    }

    // Display an alert if any input is empty
    if (!empty($emptyFields)) {
        // Convert the array of empty fields to a string
        $emptyFieldsStr = implode(", ", $emptyFields);
        $alert = "You din\'t answer the following Fields: $emptyFieldsStr.";
        $thereAreEmptyFields = true;
    } else {
        $thereAreEmptyFields = false;
        $QualityOfWork = round((($Q1 + $Q2 + $Q3) / 15) * 100, 2);
        $Productivity = round((($Q4 + $Q5 + $Q6 + $Q7) / 20) * 100, 2);
        $WorkHabitsTalentsSkills = round((($Q8 + $Q9 + $Q10 + $Q11 + $Q12 + $Q13 + $Q14) / 35) * 100, 2);
        $InterpersonalWorkRelationship = round((($Q15 + $Q16 + $Q17 + $Q18) / 20) * 100, 2);
        $TotalScore = round((($QualityOfWork + $Productivity + $WorkHabitsTalentsSkills + $InterpersonalWorkRelationship) / 4), 2);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../Style/ImportantImport.css">
    <link rel="stylesheet" href="../Style/SweetAlert2.css">
    <script src="../Script/SweetAlert2.js"></script>
    <script src="../Script/SidebarScript.js"></script>
    <title>Trainee Evaluation</title>
</head>

<body class="dark adminuser" style="min-width: 1080px;">
    <?php include_once '../Components/AdminSidebar.php'; ?>
    <section class="home">
        <div class="text">Evaluation</div>
        <p class="text-start text-secondary">
            <?php // print_r($_POST); ?>
        </p>
        <div class="container-fluid" style="width: 98%;">
            <!-- for Trainee ID -->
            <form action="AdminTraineeEvaluation.php" method="POST">
                <div class="input-group mb-3" style="min-width: 460px;">
                    <input type="search" name="search" class="form-control"
                        placeholder="Try Searching for Trainee ID, Name, Email, or Username">
                    <input type="submit" class="btn btn-outline-primary" name="SearchTrainee" value="Search Trainee">
                </div>
            </form>

            <?php
            if (isset($alert)) {
                echo "<script>Swal.fire({
                        icon: 'info',
                        title: 'Complete the form',
                        text: '$alert',
                        footer: 'Form will automatically Reset',
                        background: '#19191a',
                        color: '#fff'
                        })</script>";
            }
            $TraineesID = true;
            if (isset($TraineesID)) {
                @include_once '../Components/EvaluateTable.php';
            } else {
                echo "<h5 class='text-center text-bg-warning rounded' style='margin: 20px 0; padding: 15px; font-size: 20px; min-width: 460px;
                    '>You have not searched for any Trainee yet.</h5>";
            } ?>
            <br>
            <div class="container-fluid d-flex justify-content-center">
                <div class="table-responsive rounded">
                    <?php
                    if (isset($TraineesID)) {
                        if (isset($thereAreEmptyFields) && $thereAreEmptyFields == false) {
                            echo "<table class='table table-hover table-dark table-striped' style='min-width: 600px;'>
                        <tbody>
                        <tr>
                            <th scope='row'>Quality of Work: </th>
                            <td colsapn='2' class='text-center'>" . ($Q1 + $Q2 + $Q3) . " - $QualityOfWork%</td>
                        </tr>
                        <tr>
                            <th scope='row'>Productivity: </th>
                            <td colsapn='2' class='text-center'>" . ($Q4 + $Q5 + $Q6 + $Q7) . " - $Productivity%</td>
                        </tr>
                        <tr>
                            <th scope='row'>Work Habits, Talents & Skills: </th>
                            <td colsapn='2' class='text-center'>" . ($Q8 + $Q9 + $Q10 + $Q11 + $Q12 + $Q13 + $Q14) . " - $WorkHabitsTalentsSkills%</td>
                        </tr>
                        <tr>
                            <th scope='row'>Interpersonal Work Relationship: </th>
                            <td colsapn='2' class='text-center'>" . ($Q15 + $Q16 + $Q17 + $Q18) . " - $InterpersonalWorkRelationship%</td>
                        </tr>
                        <tr>
                            <th scope='row'></th>
                            <td colsapn='2' class='text-center'>Total Score: $TotalScore%</td>
                        </tr>
                        <tr>
                            <th scope='row'></th>";
                            if ($TotalScore >= 90) {
                                echo "<td colsapn='2'>Remarks: <b class='text-success fw-bold'>Outstanding</b></td>";
                            } elseif ($TotalScore >= 80) {
                                echo "<td colsapn='2'>Remarks: <b class='text-success fw-bold'>Very Satisfactory</b></td>";
                            } elseif ($TotalScore >= 70) {
                                echo "<td colsapn='2'>Remarks: <b class='text-warning fw-bold'>Satisfactory</b></td>";
                            } elseif ($TotalScore >= 60) {
                                echo "<td colsapn='2'>Remarks: <b class='text-warning fw-bold'>Needs Improvement</b></td>";
                            } elseif ($TotalScore >= 50) {
                                echo "<td colsapn='2'>Remarks: <b class='text-danger fw-bold'>Poor</b></td>";
                            } else {
                                echo "<td colsapn='2'>Remarks: <b class='text-danger fw-bold'>Very Poor</b></td>";
                            }
                            echo "</tr>                        
                    </tbody>
                    </table>";
                        }
                    }
                    ?>
                </div>
            </div>
            <br>
    </section>
</body>


</html>