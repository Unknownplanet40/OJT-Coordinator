<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "db_test");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "<script>console.log('Connected successfully');</script>";
}
// for debugging purpose
// lalabas dito yung mga data na pinasa ng form
print_r($_POST);

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST['username'];
    $mail = $_POST['email'];
    $pass = $_POST['password'];

    // send data to database
    $sql = "INSERT INTO user (name, email, password) VALUES ('$name', '$mail', '$pass')";
    if (mysqli_query($conn, $sql)) {
       $_SESSION['message'] = "Your account has been created successfully";
    } else {
        $_SESSION['message'] = "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    header("location: ./loginForm.php");


}

?>