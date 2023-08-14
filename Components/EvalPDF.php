<?php
session_start();
@include_once("../Database/config.php");

$id = $_SESSION['GlobalID'];

$sql = "SELECT * FROM tbl_evaluation WHERE UID = '$id'";
$result = mysqli_query($conn, $sql);
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
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style/Fonts.css">
    <title>Document</title>
    <style>
        * {
            font-family: poppins;
            
        }
        table {
            border-collapse: collapse;
            width: 100%;
            color: black;
            text-align: left;
            border: 1px solid #198754;
        }

        th {
            background-color: #198754;
            color: white;
            font-size: 20px;
            text-align: center;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2
        }

        td {
            border: 1px solid black;
            vertical-align: bottom;
        }

        .ans {
            border: 1px solid black;
            vertical-align: bottom;
            width: 10%;
            text-align: center;
            font-weight: 900;
            font-size: 15px;
        }

        .sub {
            color: grey;
            font-size: 15px;
            text-align: center;
        }

        .Que {
            color: black;
            font-size: 15px;
            text-align: left;
        }
        .Ques, .anss{
            color: black;
            font-size: 15px;
            text-align: left;
            border: 1px solid white;
        }
    </style>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th colspan="6">QUALITY OF WORK</th>
            </tr>
        </thead>
        <tbody>
            <tr class="sub">
                <td>Question</td>
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>4</td>
                <td>5</td>
            </tr>
            <tr>
                <td class="Que">1. Accuracy of completed work according to the operational standards</td>
                <?php
                    for ($i = 1; $i <= 5; $i++) {
                        echo "<td class='ans'";
                    if ($i == $Q1) {
                        echo ">X";
                    }
                        echo "</td>";
                    }
                ?>
            </tr>
            <tr>
                <td class="Que">2. Thoroughness & attention to detail in performing the assigned tasks.</td>
                <?php
                    for ($i = 1; $i <= 5; $i++) {
                        echo "<td class='ans'";
                    if ($i == $Q2) {
                        echo ">X";
                    }
                        echo "</td>";
                    }   
                ?>
            </tr>
            <tr>
                <td class="Que">3. Neatness & presentation of work.</td>
                <?php
                    for ($i = 1; $i <= 5; $i++) {
                        echo "<td class='ans'";
                    if ($i == $Q3) {
                        echo ">X";
                    }
                        echo "</td>";
                    }
                ?>
            </tr>
            <tr>
                <th colspan="6">PRODUCTIVITY</th>
            </tr>
            <tr>
                <td class="Que">1. Effective use of time</td>
                <?php
                    for ($i = 1; $i <= 5; $i++) {
                        echo "<td class='ans'";
                    if ($i == $Q4) {
                        echo ">X";
                    }
                        echo "</td>";
                    }
                ?>
            </tr>
            <tr>
                <td class="Que">2. Task Accomplished</td>
                <?php
                    for ($i = 1; $i <= 5; $i++) {
                        echo "<td class='ans'";
                    if ($i == $Q5) {
                        echo ">X";
                    }
                        echo "</td>";
                    }
                ?>
            </tr>
            <tr>
                <td class="Que">3. Prompt completion of work assignments</td>
                <?php
                    for ($i = 1; $i <= 5; $i++) {
                        echo "<td class='ans'";
                    if ($i == $Q6) {
                        echo ">X";
                    }
                        echo "</td>";
                    }
                ?>
            </tr>
            <tr>
                <td class="Que">4. Useful or effective application of knowledge & skills</td>
                <?php
                    for ($i = 1; $i <= 5; $i++) {
                        echo "<td class='ans'";
                    if ($i == $Q7) {
                        echo ">X";
                    }
                        echo "</td>";
                    }
                ?>
            </tr>
            <tr>
                <th colspan="6">WORK HABITS, TALENTS & SKILLS</th>
            </tr>
            <tr>
                <td class="Que">1. Appropriate Attire</td>
                <?php
                    for ($i = 1; $i <= 5; $i++) {
                        echo "<td class='ans'";
                    if ($i == $Q8) {
                        echo ">X";
                    }
                        echo "</td>";
                    }
                ?>
            </tr>
            <tr>
                <td class="Que">2. Adherence to policies & procedures</td>
                <?php
                    for ($i = 1; $i <= 5; $i++) {
                        echo "<td class='ans'";
                    if ($i == $Q9) {
                        echo ">X";
                    }
                        echo "</td>";
                    }
                ?>
            </tr>
            <tr>
                <td class="Que">3. Attendance & punctuality</td>
                <?php
                    for ($i = 1; $i <= 5; $i++) {
                        echo "<td class='ans'";
                    if ($i == $Q10) {
                        echo ">X";
                    }
                        echo "</td>";
                    }
                ?>
            </tr>
            <tr>
                <td class="Que">4. Ability to communicate effectively to guest, supervisor & colleagues.</td>
                <?php
                    for ($i = 1; $i <= 5; $i++) {
                        echo "<td class='ans'";
                    if ($i == $Q11) {
                        echo ">X";
                    }
                        echo "</td>";
                    }
                ?>
            </tr>
            <tr>
                <td class="Que">5. Ability to think independently.</td>
                <?php
                    for ($i = 1; $i <= 5; $i++) {
                        echo "<td class='ans'";
                    if ($i == $Q12) {
                        echo ">X";
                    }
                        echo "</td>";
                    }
                ?>
            </tr>
            <tr>
                <td class="Que">6. Ability to remain calm & in control when presented with stressful situations.</td>
                <?php
                    for ($i = 1; $i <= 5; $i++) {
                        echo "<td class='ans'";
                    if ($i == $Q13) {
                        echo ">X";
                    }
                        echo "</td>";
                    }
                ?>
            </tr>
            <tr>
                <td class="Que">7. Demonstrates an interest & willingness to learn the task required to maintain
                    operational standards.</td>
                <?php
                    for ($i = 1; $i <= 5; $i++) {
                        echo "<td class='ans'";
                    if ($i == $Q14) {
                        echo ">X";
                    }
                        echo "</td>";
                    }
                ?>
            </tr>
            <tr>
                <th colspan="6">INTERPERSONAL WORK RELATIONSHIP</th>
            </tr>
            <tr>
                <td class="Que">1. Demonstrates positive relationship with the establishments’ workers.</td>
                <?php
                    for ($i = 1; $i <= 5; $i++) {
                        echo "<td class='ans'";
                    if ($i == $Q15) {
                        echo ">X";
                    }
                        echo "</td>";
                    }
                ?>
            </tr>
            <tr>
                <td class="Que">2. Relates effectively with visitors in a friendly & courteous manner.</td>
                <?php
                    for ($i = 1; $i <= 5; $i++) {
                        echo "<td class='ans'";
                    if ($Q16 == $i) {
                        echo ">X";
                    }
                        echo "</td>";
                    }
                ?>
            </tr>
            <tr>
                <td class="Que">3. Accepts suggestions, directions & constructive criticism from employees &
                    supervisors.</td>
                    <?php
                    for ($i = 1; $i <= 5; $i++) {
                        echo "<td class='ans'";
                    if ($Q17 == $i) {
                        echo ">X";
                    }
                        echo "</td>";
                    }
                ?>
            </tr>
            <tr>
                <td class="Que">4. Cooperative team player.</td>
                    <?php
                    for ($i = 1; $i <= 5; $i++) {
                        echo "<td class='ans'";
                    if ($Q18 == $i) {
                        echo ">X";
                    }
                        echo "</td>";
                    }
                ?>
            </tr>
            <tr>
                <th colspan="6">COMMENTS</th>
            </tr>
            <tr>
                <td class="Que" colspan="6">
                    <?php echo $row['feedback']; ?>
                </td>
            </tr>
            <tr>
                <th colspan="6"></th>
            </tr>
            <tr>
                <td class="Que Ques"></td>
                <td class="anss" colspan="2">
                    Score: <br>
                    <?php
                        $total = $row['Total'];

                        if ($total >= 90) {
                            $grade = "Excellent";
                        } elseif ($total >= 80) {
                            $grade = "Very Good";
                        } elseif ($total >= 70) {
                            $grade = "Good";
                        } elseif ($total >= 60) {
                            $grade = "Fair";
                        } elseif ($total >= 50) {
                            $grade = "Poor";
                        } else {
                            $grade = "Very Poor";
                        }
                        echo $total . "% - " . $grade;
                    ?>
                </td>
                <td class="anss" colspan="3">
                    Evaluated by: <br>
                    <?php echo $row['evaluated_by']; ?>
                </td>
            </tr>
        </tbody>
    </table>

</body>

</html>