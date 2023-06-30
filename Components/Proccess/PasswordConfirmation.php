<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $password = $_GET['password'];
    $currentUserPassword = $_SESSION['GlobalPassword'];

    if ($password == $currentUserPassword) {
        $response = array(
            'valid' => true,
            'message' => 'Password is correct.'
        );
    } else {
        $response = array(
            'valid' => false,
            'message' => 'Password is incorrect.'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
    exit; // Exit the script after sending the JSON response
}
?>
