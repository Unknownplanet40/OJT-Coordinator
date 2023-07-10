<?php
session_start();
@include_once("../Database/config.php");
@include_once("../Components/PopupAlert.php");

// prevent user from accessing the page without logging in
if (!isset($_SESSION['DatahasbeenFetched'])) {
    header("Location: ../Login.php");
} else {
    $ShowAlert = true;
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

<body class="dark adminuser user-select-none" style="min-width: 1080px;">
    <?php
    @include_once '../Components/AdminSidebar.php';
    if (isset($ShowAlert)) {
        echo NewAlertBox();
        $_SESSION['Show'] = false;
    }
    ?>
    <section class="home">
        <div class="text">
            <h1 class="text-warning">Dashboard</h1>
        </div>
        <div class="container-fluid" style="width: 98%;">
            <div class="row row-cols-1 row-cols-md-4 g-4">
                <div class="col">
                    <div class="card h-100" style="background: linear-gradient(to right, #2a9134 1%,#3fa34d 53%,#2a9134 100%)">
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
            <div class="row row-cols-1 row-cols-md-2 g-4">
                <div class="col">
                    <div class="card text-bg-dark" style="min-width: 380px;">
                        <div class="card-body">
                            <h5 class="card-title text-uppercase d-block text-truncate">Gender</h5>
                            <canvas id="gender"></canvas>
                            <?php include_once '../Components/Chart/GenderChart.php'; ?>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card text-bg-dark" style="min-width: 380px;">
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
                <div class="container mt-5 text-bg-dark rounded" style="min-width: fit-content;">
                    <table class="table table-hover table-dark align-middle caption-top" id="TraineeTable">
                        <caption>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="input-group">
                                            <!-- In the future, I will add a Category Search -->
                                            <span class="input-group-text text-bg-dark"
                                                title="You can search only by name">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="20"
                                                    viewBox="0 -960 960 960" width="20" fill="var(--bs-warning)">
                                                    <path
                                                        d="M382.122-330.5q-102.187 0-173.861-71.674Q136.587-473.848 136.587-576q0-102.152 71.674-173.826Q279.935-821.5 382.087-821.5q102.152 0 173.826 71.674 71.674 71.674 71.674 173.861 0 40.859-12.022 76.292-12.021 35.434-33.065 64.956l212.087 212.326q12.674 12.913 12.674 28.945 0 16.033-12.913 28.707-12.674 12.674-29.326 12.674t-29.326-12.674L523.848-375.587q-29.761 21.044-65.434 33.065-35.672 12.022-76.292 12.022Zm-.035-83q67.848 0 115.174-47.326Q544.587-508.152 544.587-576q0-67.848-47.326-115.174Q449.935-738.5 382.087-738.5q-67.848 0-115.174 47.326Q219.587-643.848 219.587-576q0 67.848 47.326 115.174Q314.239-413.5 382.087-413.5Z" />
                                                </svg>
                                            </span>
                                            <input type="search" class="form-control text-bg-dark"
                                                placeholder="Search by Name" id="TraineeSearchBar">
                                            <a href="../Admin/AdminTrainees.php" class="btn btn-outline-primary">Show
                                                more</a>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <!-- piginations -->
                                        <nav aria-label="Page navigation example">
                                            <ul class="pagination pagination-sm">
                                                <li class="page-item">
                                                    <a class="page-link text-bg-dark user-select-none" id="TraineePrevious"
                                                        style="cursor: pointer;">
                                                        <span aria-hidden="true">&laquo;</span>
                                                    </a>
                                                </li>
                                                <li class="page-item m-1 text-bg-dark"><small
                                                        class="text-warning text-center mx-1">Showing <span
                                                            id="TraineeCurrentPage"></span> to <span id="TraineeTotalPage"></span> of
                                                        <span id="TraineeTotalItem"></span> entries</small>
                                                </li>
                                                <li class="page-item">
                                                    <a class="page-link text-bg-dark user-select-none" id="TraineeNext"
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
                                <th scope="col">Username</th>
                                <th scope="col" title="Email Address">Email</th>
                                <th scope="col" title="Department">Dept.</th>
                                <th scope="col">Gender</th>
                                <th scope="col" title="Deployed to a field">DPY</th>
                                <th scope="col" title="Vaccinated">VAC</th>
                                <th scope="col" title="Evaluated the Training">EVL</th>
                                <th scope="col" title="Completed the Training">CMP</th>
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
                                        $Progstat = '<span class="text-secondary">No</span>';
                                    } else {
                                        $Progstat = '<span class="text-warning">Yes</span>';
                                    }

                                    if ($row['vaccine_Completed'] == 1) {
                                        $Vaccinated = '<span class="text-warning">Yes</span>';
                                    } else {
                                        $Vaccinated = '<span class="text-secondary">No</span>';
                                    }

                                    if ($row['evaluated'] == 'true') {
                                        $Evaluated = '<span class="text-warning">Yes</span>';
                                    } else {
                                        $Evaluated = '<span class="text-secondary">No</span>';
                                    }

                                    if ($row['completed'] == null) {
                                        $Status = '<span class="text-secondary">No</span>';
                                    } else {
                                        $Status = '<span class="text-warning">Yes</span>';
                                    }

                                    if ($row['gender'] == null) {
                                        $GEN = 'UNK';
                                    } else {
                                        $GEN = strtoupper($row['gender']);
                                    }

                                    echo '<tr>
                                    <td class="text-center"><img src="' . $row['image'] . '" alt="Profile" class="rounded-circle img-fluid" style="width: 50px; height: 50px;"></td>
                                    <td class="text-truncate" style="max-width: 100px;" title="' . $row['name'] . '">' . $row['name'] . '</td>
                                    <td class="text-truncate" style="max-width: 100px;">' . $row['trainee_uname'] . '</td>
                                    <td class="text-truncate" style="max-width: 100px;"><a href="mailto:' . $row['email'] . '" class="text-decoration-none text-white" title="' . $row['email'] . '">' . $row['email'] . '</a></td>
                                    <td class="text-truncate" style="max-width: 100px;">' . $row['department'] . '</td>
                                    <td class="text-truncate" style="max-width: 100px;">' . $GEN . '</td>
                                    <td class="text-truncate" style="max-width: 100px;">' . $Progstat . '</td>
                                    <td class="text-truncate" style="max-width: 100px;">' . $Vaccinated . '</td>
                                    <td class="text-truncate" style="max-width: 100px;">' . $Evaluated . '</td>
                                    <td class="text-truncate" style="max-width: 100px;">' . $Status . '</td>
                                    </tr>';
                                    $i++;
                                }
                            } else {
                                echo '<tr>
                                <th colspan="10" class="text-center">No data available</th>
                            </tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <hr class="mt-4 mb-4" style="background-color: white; height: 5px; border-radius: 5px;">

            <div class="container-lg table-responsive-lg">
                <div class="container mt-5 text-bg-dark rounded" style="min-width: fit-content;">
                    <table class="table table-hover table-dark align-middle caption-top" id="ProgTable">
                        <caption>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="input-group">
                                            <!-- In the future, I will add a Category Search -->
                                            <span class="input-group-text text-bg-dark"
                                                title="You can search only by name">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="20"
                                                    viewBox="0 -960 960 960" width="20" fill="var(--bs-warning)">
                                                    <path
                                                        d="M382.122-330.5q-102.187 0-173.861-71.674Q136.587-473.848 136.587-576q0-102.152 71.674-173.826Q279.935-821.5 382.087-821.5q102.152 0 173.826 71.674 71.674 71.674 71.674 173.861 0 40.859-12.022 76.292-12.021 35.434-33.065 64.956l212.087 212.326q12.674 12.913 12.674 28.945 0 16.033-12.913 28.707-12.674 12.674-29.326 12.674t-29.326-12.674L523.848-375.587q-29.761 21.044-65.434 33.065-35.672 12.022-76.292 12.022Zm-.035-83q67.848 0 115.174-47.326Q544.587-508.152 544.587-576q0-67.848-47.326-115.174Q449.935-738.5 382.087-738.5q-67.848 0-115.174 47.326Q219.587-643.848 219.587-576q0 67.848 47.326 115.174Q314.239-413.5 382.087-413.5Z" />
                                                </svg>
                                            </span>
                                            <input type="search" class="form-control text-bg-dark"
                                                placeholder="Search by Name" id="ProgSearchBar">
                                            <a href="../Admin/AdminPrograms.php" class="btn btn-outline-primary">Show more</a>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <!-- piginations -->
                                        <nav aria-label="Page navigation example">
                                            <ul class="pagination pagination-sm">
                                                <li class="page-item">
                                                    <a class="page-link text-bg-dark user-select-none" id="ProgPrevious"
                                                        style="cursor: pointer;">
                                                        <span aria-hidden="true">&laquo;</span>
                                                    </a>
                                                </li>
                                                <li class="page-item m-1 text-bg-dark"><small
                                                        class="text-warning text-center mx-1">Showing <span
                                                            id="ProgCurrentPage"></span> to <span id="ProgTotalPage"></span> of
                                                        <span id="ProgTotalItem"></span> entries</small>
                                                </li>
                                                <li class="page-item">
                                                    <a class="page-link text-bg-dark user-select-none" id="ProgNext"
                                                        style="cursor: pointer;">
                                                        <span aria-hidden="true">&raquo;</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                    <div class="col-4">
                                        <div class="d-flex justify-content-center">
                                            List of Program's in the System
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
                                <th scope="col" title="Department">Dept.</th>
                                <th scope="col" title="Duration of the Program in weeks">Duration</th>
                                <th scope="col" title="Hours needed to complete the Program">Hours</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM tbl_programs ORDER BY title ASC";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                $i = 1;
                                while ($row = mysqli_fetch_assoc($result)) {

                                    $date = date("M d, Y", strtotime($row['start_date']));
                                    $start = date("h:i A", strtotime($row['start_time']));
                                    $end = date("h:i A", strtotime($row['end_time']));


                                    echo '<tr>
                                    <th scope="row">' . $i . '</th>
                                    <td class="text-truncate" style="max-width: 100px;" title="' . $row['title'] . '">' . $row['title'] . '</td>
                                    <td class="text-truncate" style="max-width: 100px;" title="' . $row['description'] . '">' . $row['description'] . '</td>
                                    <td class="text-truncate" style="max-width: 100px;">' . $date . '</td>
                                    <td class="text-truncate" style="max-width: 100px;" title="' . $start . ' - ' . $end . '">' . $start . ' - ' . $end . '</td>
                                    <td class="text-truncate" style="max-width: 100px;">' . $row['department'] . '</td>
                                    <td class="text-truncate" style="max-width: 100px;">' . $row['Duration'] . ' weeks</td>
                                    <td class="text-truncate" style="max-width: 100px;">' . $row['hours'] . '</td>
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
                    </table>
                </div>
            </div>

            <hr class="mt-4 mb-4" style="background-color: white; height: 5px; border-radius: 5px;">

            <div class="container-lg table-responsive-lg">
                <div class="container mt-5 text-bg-dark rounded" style="min-width: fit-content;">
                    <table class="table table-hover table-dark align-middle caption-top" id="EveTable">
                        <caption>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="input-group">
                                            <!-- In the future, I will add a Category Search -->
                                            <span class="input-group-text text-bg-dark"
                                                title="You can search only by name">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="20"
                                                    viewBox="0 -960 960 960" width="20" fill="var(--bs-warning)">
                                                    <path
                                                        d="M382.122-330.5q-102.187 0-173.861-71.674Q136.587-473.848 136.587-576q0-102.152 71.674-173.826Q279.935-821.5 382.087-821.5q102.152 0 173.826 71.674 71.674 71.674 71.674 173.861 0 40.859-12.022 76.292-12.021 35.434-33.065 64.956l212.087 212.326q12.674 12.913 12.674 28.945 0 16.033-12.913 28.707-12.674 12.674-29.326 12.674t-29.326-12.674L523.848-375.587q-29.761 21.044-65.434 33.065-35.672 12.022-76.292 12.022Zm-.035-83q67.848 0 115.174-47.326Q544.587-508.152 544.587-576q0-67.848-47.326-115.174Q449.935-738.5 382.087-738.5q-67.848 0-115.174 47.326Q219.587-643.848 219.587-576q0 67.848 47.326 115.174Q314.239-413.5 382.087-413.5Z" />
                                                </svg>
                                            </span>
                                            <input type="search" class="form-control text-bg-dark"
                                                placeholder="Search by Name" id="EveSearchBar">
                                            <a href="../Admin/AdminEvents.php" class="btn btn-outline-primary">Show more</a>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <!-- piginations -->
                                        <nav aria-label="Page navigation example">
                                            <ul class="pagination pagination-sm">
                                                <li class="page-item">
                                                    <a class="page-link text-bg-dark user-select-none" id="EvePrevious"
                                                        style="cursor: pointer;">
                                                        <span aria-hidden="true">&laquo;</span>
                                                    </a>
                                                </li>
                                                <li class="page-item m-1 text-bg-dark"><small
                                                        class="text-warning text-center mx-1">Showing <span
                                                            id="EveCurrentPage"></span> to <span id="EveTotalPage"></span> of
                                                        <span id="EveTotalItem"></span> entries</small>
                                                </li>
                                                <li class="page-item">
                                                    <a class="page-link text-bg-dark user-select-none" id="EveNext"
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
                                <th scope="col" title="Event Ended">Ended</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM tbl_events ORDER BY eventTitle ASC";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                $i = 1;
                                while ($row = mysqli_fetch_assoc($result)) {

                                    $start = date("h:i A", strtotime($row['eventStartTime']));
                                    $end = date("h:i A", strtotime($row['eventEndTime']));
                                    $date = date("M d, Y", strtotime($row['eventDate']));

                                    if($row['eventEnded'] == 'true'){
                                        $Ended = '<span class="text-warning">Yes</span>';
                                    }else{
                                        $Ended = '<span class="text-secondary">No</span>';
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
                                <th colspan="10" class="text-center">No Program Available at the moment</th>
                            </tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <hr class="mt-4 mb-4" style="background-color: white; height: 5px; border-radius: 5px;">

    </section>
    <script src="../Script/Bootstrap_Script/bootstrap.js"></script>
</body>

</html>