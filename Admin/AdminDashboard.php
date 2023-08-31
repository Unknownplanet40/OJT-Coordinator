<?php
session_start();
@include_once("../Database/config.php");
@include_once("../Components/PopupAlert.php");

// prevent user from accessing the page without logging in
if (!isset($_SESSION['DatahasbeenFetched'])) {
    header("Location: ../Login.php");
} else {
    $ShowAlert = true;
    $_SESSION['isUpdated'] = 'false';
}

$sql = "SELECT COUNT(UID), COUNT(program), COUNT(completed) FROM tbl_trainee;";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_row($result);
    $TotalTrainee = $row[0];
    $Deployed = $row[1];
    $Completed = $row[2];
}

function Program($column)
{
    global $conn;
    $sql = "SELECT COUNT($column) FROM tbl_trainee WHERE $column = 1";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_row($result);
        return $row[0];
    }
}

function studentassign($columnID)
{
    global $conn;
    $sql = "SELECT COUNT(UID) FROM tbl_trainee WHERE program = '$columnID'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_row($result);
        return $row[0];
    }
}

//gender chart
function maleChart()
{
    global $conn;
    $sql = "SELECT COUNT(UID) FROM `tbl_trainee` WHERE `gender` = 'male'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_row($result);
        return $row[0];
    }
}

function femaleChart()
{
    global $conn;
    $sql = "SELECT COUNT(UID) FROM `tbl_trainee` WHERE `gender` = 'female'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_row($result);
        return $row[0];
    }
}

// for Formating the output of the number of gender
function formatNumberWithAbbreviation($number)
{
    $originalNumber = $number;
    $abbreviations = array(
        'K',
        'M',
        'B',
        'T',
    );
    $abbreviation = '';
    $index = 0;

    while ($number >= 1000 && $index < count($abbreviations)) {
        $number /= 1000;
        $abbreviation = $abbreviations[$index];
        $index++;
    }

    if ($abbreviation !== '') {
        $formattedNumber = number_format($number, 0) . $abbreviation;
        $originalFormatted = number_format($originalNumber);
    } else {
        $formattedNumber = number_format($number);
        $originalFormatted = number_format($originalNumber);
    }

    return array('formatted' => $formattedNumber, 'originalFormatted' => $originalFormatted);
}

$male = maleChart();
$female = femaleChart();

$maleFormattedData = formatNumberWithAbbreviation($male);
$femaleFormattedData = formatNumberWithAbbreviation($female);

$maleFormatted = $maleFormattedData['formatted'];
$maletitle = $maleFormattedData['originalFormatted'];

$femaleFormatted = $femaleFormattedData['formatted'];
$femaletitle = $femaleFormattedData['originalFormatted'];




function MonthlyChart($month)
{
    global $conn;
    $sql = "SELECT COUNT(UID) FROM tbl_trainee WHERE MONTH(account_Created) = $month";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_row($result);
        return $row[0];
    }
}

?>
<!DOCTYPE html>
<html lang="en, fil">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../Style/ImportantImport.css">
    <script src="../Script/SidebarScript.js"></script>
    <script src="../Script/SweetAlert2.js"></script>
    <script src="../Script/chart.js"></script>
    <script src="../Script/DashTables_T.js"></script>
    <script src="../Script/DashTables_P.js"></script>
    <script src="../Script/DashTables_E.js"></script>
    <title>Admin Dashboard</title>
</head>

<body class="adminuser user-select-none" style="min-width: 1080px;">
    <?php
    @include_once '../Components/AdminSidebar.php';
    if (isset($ShowAlert)) {
        echo NewAlertBox();
        $_SESSION['Show'] = false;
    }
    ?>
    <section class="home">
        <div class="text">
            <h1 class="text-success">Dashboard</h1>
        </div>
        <div class="container-fluid" style="width: 98%;">
            <div class="row row-cols-1 row-cols-md-4 g-4">
                <div class="col">
                    <div class="card h-100"
                        style="background: linear-gradient(to right, #2a9134 1%,#3fa34d 53%,#2a9134 100%)">
                        <div class="card-body text-light">
                            <h5 class="card-title text-uppercase d-block text-truncate">Total Trainee's</h5>
                            <h1 class="card-text text-center fw-bold">
                                <?php echo $TotalTrainee; ?>
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100" style="background: linear-gradient(to right, #8699fb 0%,#8340f6 100%);">
                        <div class="card-body text-light">
                            <h5 class="card-title text-uppercase d-block text-truncate">Deployed</h5>
                            <h1 class="card-text text-center fw-bold">
                                <?php echo $Deployed; ?>
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100" style="background: linear-gradient(to right, #fc7588 0%,#e71c54 100%);">
                        <div class="card-body text-light">
                            <h5 class="card-title text-uppercase d-block text-truncate">Completed</h5>
                            <h1 class="card-text text-center fw-bold">
                                <?php echo $Completed; ?>
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100" style="background: linear-gradient(to right, #668bff 0%,#104dfd 100%);">
                        <div class="card-body text-light">
                            <h5 class="card-title text-uppercase d-block text-truncate">Total Vaccinated</h5>
                            <h1 class="card-text text-center fw-bold">
                                <?php echo Program('vaccine_Completed'); ?>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <style>
                .cardimg {
                    background-image: url("../Image/ProfBG.svg");
                    background-repeat: no-repeat;
                    background-size: cover;
                    background-position: center;
                }

                .blurback {
                    backdrop-filter: blur(10px);
                }
            </style>
            <div class="row row-cols-1 row-cols-md-2 g-4">
                <div class="col">
                    <div class="card h-100 cardimg border border-1 border-success" style="min-width: 380px;">
                        <div class="card-body">
                            <h5 class="card-title text-uppercase d-block text-truncate">Gender</h5>
                            <canvas id="gender"
                                title="There are <?php echo $maleFormatted; ?> Male's, and <?php echo $femaleFormatted ?> Female's in the system."
                                style="cursor: pointer;"></canvas>
                            <?php include_once '../Components/Chart/GenderChart.php'; ?>
                            <div class=" text-center" hidden>
                                <div
                                    class="d-flex justify-content-evenly mt-2 text-center text-light rounded blurback shadow-lg border border-1 border-success bg-transparent">
                                    <p class="fs-5 fw-bold mt-3 p-0 text-dark " title="<?php echo $maletitle; ?>">
                                        <span class="text-uppercase" style="/*color: #059bff;*/">
                                            Male: </span>
                                        <?php echo $maleFormatted; ?>
                                    </p>
                                    <p class="fs-6 mt-3 p-0" title="<?php echo $femaletitle; ?>">
                                        <span class="text-uppercase" style="color: #ff3d67;">
                                            Female: </span>
                                        <?php echo $femaleFormatted; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 cardimg border border-1 border-success" style="min-width: 380px;">
                        <div class="card-body">
                            <h5 class="card-title text-uppercase d-block text-truncate">Monthly Registered Trainee's
                            </h5>
                            <canvas id="Monthly"></canvas>
                            <?php @include_once '../Components/Chart/MonthlyChart.php';
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="mt-4 mb-4" style="background-color: white; height: 5px; border-radius: 5px;">

            <div class="container-lg table-responsive-lg">
                <div class="container mt-5 text-bg-light rounded border border-1 border-success"
                    style="min-width: fit-content;">
                    <table class="table table-hover align-middle caption-top" id="TraineeTable">
                        <caption>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="input-group input-group-sm">
                                            <!-- In the future, I will add a Category Search -->
                                            <span class="input-group-text user-select-none"
                                                title="You can search only by name">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="20"
                                                    viewBox="0 -960 960 960" width="20" fill="#3ea34c">
                                                    <path
                                                        d="M382.122-330.5q-102.187 0-173.861-71.674Q136.587-473.848 136.587-576q0-102.152 71.674-173.826Q279.935-821.5 382.087-821.5q102.152 0 173.826 71.674 71.674 71.674 71.674 173.861 0 40.859-12.022 76.292-12.021 35.434-33.065 64.956l212.087 212.326q12.674 12.913 12.674 28.945 0 16.033-12.913 28.707-12.674 12.674-29.326 12.674t-29.326-12.674L523.848-375.587q-29.761 21.044-65.434 33.065-35.672 12.022-76.292 12.022Zm-.035-83q67.848 0 115.174-47.326Q544.587-508.152 544.587-576q0-67.848-47.326-115.174Q449.935-738.5 382.087-738.5q-67.848 0-115.174 47.326Q219.587-643.848 219.587-576q0 67.848 47.326 115.174Q314.239-413.5 382.087-413.5Z" />
                                                </svg>
                                            </span>
                                            <input type="search" class="form-control form-control-sm"
                                                placeholder="Search by Name" id="TraineeSearchBar">
                                            <a href="../Admin/AdminTrainees.php" class="btn btn-outline-success">Show
                                                more</a>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <!-- piginations -->
                                        <nav aria-label="Page navigation example">
                                            <ul class="pagination pagination-sm">
                                                <li class="page-item">
                                                    <a class="page-link user-select-none" id="TraineePrevious"
                                                        style="cursor: pointer;">
                                                        <span aria-hidden="true">&laquo;</span>
                                                    </a>
                                                </li>
                                                <li class="page-item m-1"><small
                                                        class="text-success text-center mx-1">Showing <span
                                                            id="TraineeCurrentPage"></span> to <span
                                                            id="TraineeTotalPage"></span> of
                                                        <span id="TraineeTotalItem"></span> entries</small>
                                                </li>
                                                <li class="page-item">
                                                    <a class="page-link user-select-none" id="TraineeNext"
                                                        style="cursor: pointer;">
                                                        <span aria-hidden="true">&raquo;</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                    <div class="col-4">
                                        <div class="d-flex justify-content-center">
                                            List of Trainee's in the System
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </caption>
                        <thead>
                            <tr>
                                <th scope="col" title="Profile Picture" class="text-center">Profile</th>
                                <th scope="col" title="Full Name">Name</th>
                                <th scope="col" class="text-center" title="Department">Department</th>
                                <th scope="col">Gender</th>
                                <th scope="col" class="text-center" title="Deployed to a field">Deployed</th>
                                <th scope="col" class="text-center" title="Vaccinated">Vaccinated
                                <th scope="col" class="text-center" title="Evaluated Trainee">Evaluated</th>
                                <th scope="col" class="text-center" title="Completed Program">Completed</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM tbl_trainee WHERE role = 'User' ORDER BY name ASC";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                $i = 1;
                                while ($row = mysqli_fetch_assoc($result)) {

                                    if ($row['program'] == null) {
                                        $Progstat = '<span class="text-secondary" title="This trainee is not deployed to a field"><img src="../Image/NotDone.svg" alt="Not Deployed" class="img-fluid" style="width: 25px; height: 25px;"></span>';
                                    } else {
                                        $Progstat = '<span class="text-primary fw-bolder" title="This trainee is deployed to a field"><img src="../Image/Done.svg" alt="Deployed" class="img-fluid" style="width: 25px; height: 25px;"></span>';
                                    }

                                    if ($row['vaccine_Completed'] == 1) {
                                        $Vaccinated = '<span class="text-primary fw-bolder" title="This trainee is vaccinated"><img src="../Image/Done.svg" alt="Vaccinated" class="img-fluid" style="width: 25px; height: 25px;"></span>';
                                    } else {
                                        $Vaccinated = '<span class="text-secondary" title="This trainee is not vaccinated"><img src="../Image/NotDone.svg" alt="Not Vaccinated" class="img-fluid" style="width: 25px; height: 25px;"></span>';
                                    }

                                    if ($row['evaluated'] == 'true') {
                                        $Evaluated = '<span class="text-primary fw-bolder" title="This trainee is evaluated"><img src="../Image/Done.svg" alt="Evaluated" class="img-fluid" style="width: 25px; height: 25px;"></span>';
                                    } else {
                                        $Evaluated = '<span class="text-secondary" title="This trainee is not evaluated"><img src="../Image/NotDone.svg" alt="Not Evaluated" class="img-fluid" style="width: 25px; height: 25px;"></span>';
                                    }

                                    if ($row['completed'] == null) {
                                        $Status = '<span class="text-secondary" title="This trainee is not completed any program"><img src="../Image/NotDone.svg" alt="Not Completed" class="img-fluid" style="width: 25px; height: 25px;"></span>';
                                    } else {
                                        $Status = '<span class="text-primary fw-bolder" title="This trainee is completed a program"><img src="../Image/Done.svg" alt="Completed" class="img-fluid" style="width: 25px; height: 25px;"></span>';
                                    }

                                    if ($row['gender'] == null) {
                                        $GEN = 'UNK';
                                    } else {
                                        $GEN = strtoupper($row['gender']);
                                    }

                                    echo '<tr>
                                    <td class="text-center"><img src="' . $row['image'] . '" alt="Profile" class="rounded-circle img-fluid" style="width: 50px; height: 50px;"></td>
                                    <td class="text-truncate" style="max-width: 100px;" title="' . $row['name'] . '">' . $row['name'] . '</td>
                                    <td class="text-truncate text-center" style="max-width: 100px;">' . $row['department'] . '</td>
                                    <td class="text-truncate text-center" style="max-width: 100px;">' . $GEN . '</td>
                                    <td class="text-truncate text-center" style="max-width: 100px;">' . $Progstat . '</td>
                                    <td class="text-truncate text-center" style="max-width: 100px;">' . $Vaccinated . '</td>
                                    <td class="text-truncate text-center" style="max-width: 100px;">' . $Evaluated . '</td>
                                    <td class="text-truncate text-center" style="max-width: 100px;">' . $Status . '</td>
                                    </tr>';
                                    $i++;
                                }
                            } else {
                                echo '<tr>
                                <th colspan="10" class="text-center">No Trainee\'s in the System</th>
                            </tr>';
                            }
                            ?>
                        </tbody>
                        <tfoot id="TnoResult">
                            <tr>
                                <th colspan="10" class="text-center"><span class="text-secondary">No Result</span>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

            <hr class="mt-4 mb-4" style="background-color: white; height: 5px; border-radius: 5px;">

            <div class="container-lg table-responsive-lg">
                <div class="container mt-5 text-bg-light rounded border border-1 border-success"
                    style="min-width: fit-content;">
                    <table class="table table-hover align-middle caption-top" id="ProgTable">
                        <caption>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="input-group input-group-sm">
                                            <!-- In the future, I will add a Category Search -->
                                            <span class="input-group-text user-select-none"
                                                title="You can search only by name">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="20"
                                                    viewBox="0 -960 960 960" width="20" fill="#3ea34c">
                                                    <path
                                                        d="M382.122-330.5q-102.187 0-173.861-71.674Q136.587-473.848 136.587-576q0-102.152 71.674-173.826Q279.935-821.5 382.087-821.5q102.152 0 173.826 71.674 71.674 71.674 71.674 173.861 0 40.859-12.022 76.292-12.021 35.434-33.065 64.956l212.087 212.326q12.674 12.913 12.674 28.945 0 16.033-12.913 28.707-12.674 12.674-29.326 12.674t-29.326-12.674L523.848-375.587q-29.761 21.044-65.434 33.065-35.672 12.022-76.292 12.022Zm-.035-83q67.848 0 115.174-47.326Q544.587-508.152 544.587-576q0-67.848-47.326-115.174Q449.935-738.5 382.087-738.5q-67.848 0-115.174 47.326Q219.587-643.848 219.587-576q0 67.848 47.326 115.174Q314.239-413.5 382.087-413.5Z" />
                                                </svg>
                                            </span>
                                            <input type="search" class="form-control form-control-sm"
                                                placeholder="Search by Name" id="ProgSearchBar">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <!-- piginations -->
                                        <nav aria-label="Page navigation example">
                                            <ul class="pagination pagination-sm">
                                                <li class="page-item">
                                                    <a class="page-link user-select-none" id="ProgPrevious"
                                                        style="cursor: pointer;">
                                                        <span aria-hidden="true">&laquo;</span>
                                                    </a>
                                                </li>
                                                <li class="page-item m-1"><small
                                                        class="text-success text-center mx-1">Showing <span
                                                            id="ProgCurrentPage"></span> to <span
                                                            id="ProgTotalPage"></span> of
                                                        <span id="ProgTotalItem"></span> entries</small>
                                                </li>
                                                <li class="page-item">
                                                    <a class="page-link user-select-none" id="ProgNext"
                                                        style="cursor: pointer;">
                                                        <span aria-hidden="true">&raquo;</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                    <div class="col-4">
                                        <div class="d-flex justify-content-center">
                                            List of Assigned Programs to the Trainees
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </caption>
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col" title="Title of the Program">Title</th>
                                <th scope="col" title="Description of the Program">Description</th>
                                <th scope="col" title="Date of the Program">Date</th>
                                <th scope="col" title="Start and End Time of the Program">Time</th>
                                <th scope="col" title="Duration of the Program in weeks">Duration</th>
                                <th scope="col" title="Hours needed to complete the Program">Hours</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT DISTINCT title, description, start_date, end_date, start_time, end_time, Duration, hours, progimage, progloc FROM tbl_programs ORDER BY title ASC";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                $i = 1;
                                while ($row = mysqli_fetch_assoc($result)) {

                                    $date = date("M d, Y", strtotime($row['start_date']));
                                    $start = date("h:i A", strtotime($row['start_time']));
                                    $end = date("h:i A", strtotime($row['end_time']));
                                    $enddate = date("M d, Y", strtotime($row['end_date']));

                                    if (studentassign($row['title']) <= 1) {
                                        $assigned = 'There is <span class="fw-bold text-primary fs-6">' . studentassign($row['title']) . '</span> trainee assigned to this program.';
                                    } else {
                                        $assigned = 'There are <span class="fw-bold text-primary fs-6">' . studentassign($row['title']) . '</span> trainees assigned to this program.';
                                    }

                                    echo '<tr>
                                    <th scope="row">' . $i . '</th>
                                    <td class="text-truncate" style="max-width: 100px;" title="' . $row['title'] . '">' . $row['title'] . '</td>
                                    <td class="text-truncate" style="max-width: 100px;" title="' . $row['description'] . '">' . $row['description'] . '</td>
                                    <td class="text-truncate" style="max-width: 100px;" title="' . $date . ' - ' . $enddate . '">' . $date . ' - ' . $enddate . '</td>
                                    <td class="text-truncate" style="max-width: 100px;" title="' . $start . ' - ' . $end . '">' . $start . ' - ' . $end . '</td>
                                    <td class="text-truncate" style="max-width: 100px;">' . $row['Duration'] . ' weeks</td>
                                    <td class="text-truncate" style="max-width: 100px;">' . $row['hours'] . '</td>
                                    <td class="text-truncate" style="max-width: 100px;"><a title="Show more Details" id="showmore' . $i . '" class="btn btn-sm" style="background: linear-gradient(to right, #2a9134 1%,#3fa34d 53%,#2a9134 100%)"><img src="../Image/assessment.gif" alt="Program" style="width: 16px; height: 16px;"></a></td>
                                    </tr>

                                    <script>
                                    let showmore' . $i . ' = document.getElementById("showmore' . $i . '");

                                    showmore' . $i . '.addEventListener("click", () => {
                                        Swal.fire({
                                            title: "' . $row['title'] . '",
                                            html: `<div class="container-fluid text-start">
                                            <div class="card">
                                            <div class="card-body">
                                                <img src="../' . $row['progimage'] . '" class="card-img-top">
                                                <p class="card-text fs-6 text-center">' . $row['description'] . '</p>
                                                <p class="card-text text-start">' . $row['progloc'] . '</p>
                                                <small class="card-muted text-start text-success">' . $assigned . '</small>
                                                <p class="">' . $date . ' - ' . $enddate . ' <br> ' . $start . ' - ' . $end . '</p>
                                                <p class="text-start"><small class="text-muted">' . $row['Duration'] . ' weeks - ' . $row['hours'] . ' hours</small></p>
                                            </div>
                                        </div>
                                            </div>`,
                                            showCloseButton: false,
                                            showConfirmButton: true,
                                            confirmButtonText: "Close",
                                            focusConfirm: false,
                                            timer: 10000,
                                            timerProgressBar: true,
                                            customClass: {
                                                container: "my-swal"
                                            }
                                        });
                                    });
                                    </script>
                                    ';
                                    $i++;
                                }
                            } else {
                                echo '<tr>
                                <th colspan="10" class="text-center">No Program Available at the moment</th>
                            </tr>';
                            }
                            ?>
                        </tbody>
                        <!-- footer -->
                        <tfoot id="PnoResult">
                            <tr>
                                <th colspan="10" class="text-center"><span class="text-secondary">No Result</span>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

            <hr class="mt-4 mb-4" style="background-color: white; height: 5px; border-radius: 5px;">

            <div class="container-lg table-responsive-lg">
                <div class="container mt-5 text-bg-light rounded border border-1 border-success"
                    style="min-width: fit-content;">
                    <table class="table table-hover align-middle caption-top" id="EveTable">
                        <caption>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="input-group input-group-sm">
                                            <!-- In the future, I will add a Category Search -->
                                            <span class="input-group-text user-select-none"
                                                title="You can search only by name">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="20"
                                                    viewBox="0 -960 960 960" width="20" fill="#3ea34c">
                                                    <path
                                                        d="M382.122-330.5q-102.187 0-173.861-71.674Q136.587-473.848 136.587-576q0-102.152 71.674-173.826Q279.935-821.5 382.087-821.5q102.152 0 173.826 71.674 71.674 71.674 71.674 173.861 0 40.859-12.022 76.292-12.021 35.434-33.065 64.956l212.087 212.326q12.674 12.913 12.674 28.945 0 16.033-12.913 28.707-12.674 12.674-29.326 12.674t-29.326-12.674L523.848-375.587q-29.761 21.044-65.434 33.065-35.672 12.022-76.292 12.022Zm-.035-83q67.848 0 115.174-47.326Q544.587-508.152 544.587-576q0-67.848-47.326-115.174Q449.935-738.5 382.087-738.5q-67.848 0-115.174 47.326Q219.587-643.848 219.587-576q0 67.848 47.326 115.174Q314.239-413.5 382.087-413.5Z" />
                                                </svg>
                                            </span>
                                            <input type="search" class="form-control form-control-sm"
                                                placeholder="Search by Name" id="EveSearchBar">
                                            <a href="../Admin/AdminEvents.php" class="btn btn-outline-success">Show
                                                more</a>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <!-- piginations -->
                                        <nav aria-label="Page navigation example">
                                            <ul class="pagination pagination-sm">
                                                <li class="page-item">
                                                    <a class="page-link user-select-none" id="EvePrevious"
                                                        style="cursor: pointer;">
                                                        <span aria-hidden="true">&laquo;</span>
                                                    </a>
                                                </li>
                                                <li class="page-item m-1"><small
                                                        class="text-success text-center mx-1">Showing <span
                                                            id="EveCurrentPage"></span> to <span
                                                            id="EveTotalPage"></span> of
                                                        <span id="EveTotalItem"></span> entries</small>
                                                </li>
                                                <li class="page-item">
                                                    <a class="page-link user-select-none" id="EveNext"
                                                        style="cursor: pointer;">
                                                        <span aria-hidden="true">&raquo;</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                    <div class="col-4">
                                        <div class="d-flex justify-content-center">
                                            List of Event's in the System
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </caption>
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col" title="Title of the Event">Title</th>
                                <th scope="col" title="Description of the Event">Description</th>
                                <th scope="col" title="Date of the Event">Date</th>
                                <th scope="col" title="Event type">Type</th>
                                <th scope="col" title="Start and End Time of the Event">Time</th>
                                <th scope="col" title="Available Slots">Slots</th>
                                <th scope="col" title="Status of the Event">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM tbl_events ORDER BY eventDate DESC";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                $i = 1;
                                while ($row = mysqli_fetch_assoc($result)) {

                                    $start = date("h:i A", strtotime($row['eventStartTime']));
                                    $end = date("h:i A", strtotime($row['eventEndTime']));
                                    $date = date("M d, Y", strtotime($row['eventDate']));

                                    if ($row['eventEnded'] == 'true') {
                                        $Ended = '<span class="text-secondary">Ended</span>';
                                    } else {
                                        $Ended = '<span class="text-primary">Ongoing</span>';
                                    }

                                    echo '<tr>
                                    <th scope="row">' . $i . '</th>
                                    <td class="text-truncate" style="max-width: 100px;" title="' . $row['eventTitle'] . '">' . $row['eventTitle'] . '</td>
                                    <td class="text-truncate" style="max-width: 100px;" title="' . $row['eventDescription'] . '">' . $row['eventDescription'] . '</td>
                                    <td class="text-truncate" style="max-width: 100px;">' . $date . '</td>
                                    <td class="text-truncate" style="max-width: 100px;">' . $row['eventType'] . '</td>
                                    <td class="text-truncate" style="max-width: 100px;" title="' . $start . ' - ' . $end . '">' . $start . ' - ' . $end . '</td>
                                    <td class="text-truncate" style="max-width: 100px;">' . $row['eventSlots'] . '</td>
                                    <td class="text-truncate" style="max-width: 100px;">' . $Ended . '</td>
                                    
                                    ';
                                    $i++;
                                }
                            } else {
                                echo '<tr>
                                <th colspan="10" class="text-center">NO EVENTS FOUND</th>
                            </tr>';
                            }
                            ?>
                        </tbody>
                        <tfoot id="EnoResult">
                            <tr>
                                <th colspan="10" class="text-center"><span class="text-secondary">No Result</span>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

            <hr class="mt-4 mb-4" style="background-color: white; height: 5px; border-radius: 5px;">

    </section>
    <script src="../Script/Bootstrap_Script/bootstrap.js"></script>
</body>

</html>