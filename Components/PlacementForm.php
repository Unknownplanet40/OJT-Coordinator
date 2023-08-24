<?php
session_start();
$dbhost = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "ojtcs_database";

try {
    $conn = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname);
    if ($conn) {
    } else {
        echo "<script>console.log('Failed to connect to database.');</script>";
    }
} catch (\Throwable $th) {
    header("location: ErrorPage.php?error=500");
}

$sql = "SELECT * FROM tbl_programs WHERE progID = '" . $_SESSION['USERID'] . "'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $title = $row['title'];
        $description = $row['description'];
        $date = date("F j, Y", strtotime($row['start_date']));
        $comp = date("F j, Y", strtotime($row['end_date']));
        $venue = $row['progloc'];
        $start = date("h:i A", strtotime($row['start_time']));
        $end = date("h:i A", strtotime($row['end_time']));
        $duration = $row['Duration'] . " Weeks";
        $super = $row['Supervisor'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style/Bootstrap_Style/bootstrap.css">
    <title>Placement Form</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        .image {
            position: absolute;
            top: 0;
            left: 90px;
        }

        p {
            font-size: 14px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
            columns: 3;
        }
    </style>
</head>

<body>
    <header>
        <div>
            <img hidden src="../Image/Header.png" alt="Header" class="img-fluid">
        </div>
    </header>
    <main>
        <h3 style="text-align: center;">PLACEMENT FORM</h3>
        <br>
        <div style="display: flex; justify-content: center;">
            <table>
                <tr>
                    <th style="width: 50%;">Name of Trainee:</th>
                    <td style="width: 50%;">
                        <?php echo $_SESSION['GlobalName']; ?>
                    </td>
                </tr>
                <tr>
                    <th style="width: 50%;">Email Address:</th>
                    <td style="width: 50%;">
                        <?php echo $_SESSION['GlobalEmail']; ?>
                    </td>
                </tr>
                <tr>
                    <th style="width: 50%;">Contact Number:</th>
                    <td style="width: 50%;">
                        <?php echo $_SESSION['GlobalPhone']; ?>
                    </td>
                </tr>
                <tr>
                    <th style="width: 50%;">Course and Section:</th>
                    <td style="width: 50%;">
                        <?php echo $_SESSION['GlobalCourse']; ?>
                    </td>
                </tr>
                <tr>
                    <th style="width: 50%;">Main Address:</th>
                    <td style="width: 50%;">
                        <?php echo $_SESSION['GlobalAddress']; ?>
                    </td>
                </tr>
                <tr>
                    <th style="width: 50%;">Program:</th>
                    <td style="width: 50%;">
                        <?php echo $title; ?>
                    </td>
                </tr>
                <tr>
                    <th style="width: 50%;">Program Duration:</th>
                    <td style="width: 50%;">
                        <?php echo $duration; ?>
                    </td>
                </tr>
                <tr>
                    <th style="width: 50%;">Program Start Date:</th>
                    <td style="width: 50%;">
                        <?php echo $date; ?>
                    </td>
                </tr>
                <tr>
                    <th style="width: 50%;">Estimated Completion Date:</th>
                    <td style="width: 50%;">
                        <?php echo $comp; ?>
                    </td>
                </tr>
                <tr>
                    <th style="width: 50%;">Location</th>
                    <td style="width: 50%;">
                        <?php echo $venue; ?>
                    </td>
                </tr>
                <tr>
                    <th style="width: 50%;">Time</th>
                    <td style="width: 50%;">
                        <?php echo $start . " - " . $end; ?>
                    </td>
                </tr>
                <tr>
                    <th style="width: 50%;">Supervisor</th>
                    <td style="width: 50%;">
                        <?php echo $super; ?>
                    </td>
                </tr>
            </table>
        </div>
        <h4>Program Description: <br>
            <span style="text-align: justify; font-size: 9px;">
                <?php echo $description; ?>
            </span>
        </h4>
    </main>
    
</body>

</html>