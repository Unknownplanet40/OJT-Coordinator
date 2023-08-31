<?php
session_start();
@include_once("../../Database/config.php");
date_default_timezone_set('Asia/Manila');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['Email'];

    $sql = "SELECT * FROM tbl_trainee WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) > 0) {
        if ($row['security_Question'] == 1) {
            $sql = "SELECT * FROM tbl_secquestion WHERE UID = " . $row['UID'];
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {

                    // Splitting the questions and answers
                    $question = explode(";", $row['question']);
                    $answer = explode(";", $row['answer']);

                    // Array of security questions
                    $securityQuestions = [
                        "What is your mother's maiden name?",
                        "What was the name of your first pet?",
                        "In which city were you born?",
                        "What is your favorite movie?",
                        "What is the name of your favorite teacher?",
                        "What was the first concert you attended?",
                        "What is the name of your favorite book?",
                        "What is the make and model of your first car?",
                        "What is your favorite vacation spot?",
                        "What was your high school mascot?",
                        "What is the name of your childhood best friend?",
                        "What is your favorite food?",
                        "What is the name of the street you grew up on?",
                        "What is the year of your parents' wedding anniversary?",
                        "What was the name of your first boss?",
                        "What is your favorite sports team?",
                        "What is the name of the hospital where you were born?",
                        "What is your favorite color?",
                        "What was the name of your first crush?",
                        "What is the name of the town where you had your first job?"
                    ];

                    // Asssigning the questions and answers to session variables
                    $_SESSION['FPUID'] = $row['UID'];
                    $_SESSION['FPQ1'] = $securityQuestions[$question[0] - 1];
                    $_SESSION['FPQ2'] = $securityQuestions[$question[1] - 1];
                    $_SESSION['FPQ3'] = $securityQuestions[$question[2] - 1];
                    $_SESSION['FPA1'] = $answer[0];
                    $_SESSION['FPA2'] = $answer[1];
                    $_SESSION['FPA3'] = $answer[2];

                    $_SESSION['EmailFound'] = 0;
                }
            } else {
                $_SESSION['EmailFound'] = 2;
            }
        } else {
            $_SESSION['EmailFound'] = 2;
        }

    } else {
        $_SESSION['EmailFound'] = 1;
    }
}
header("Location: ./VerifyEmail.php");
?>