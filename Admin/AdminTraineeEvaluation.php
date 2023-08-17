<?php
session_start();
@include_once("../Database/config.php");

if (!isset($_SESSION['DatahasbeenFetched'])) {
    header("Location: ../Login.php");
} else {
    $ShowAlert = true;
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
    <script src="../Script/MangeAdminTable.js"></script>
    <script defer src="../Script/jquery-3.5.1.js"></script>
    <script defer src="../Script/Bootstrap_Script/bootstrap.bundle.js"></script>
    <title>Trainee Evaluation</title>
</head>

<body class="adminuser" style="min-width: 1080px;">
    <?php
    @include_once '../Components/AdminSidebar.php';
    @include_once '../Components/EvaluateModal.php';
    ?>
    <section class="home">
        <div class="text">
            <h1 class="text-success">Evaluation</h1>
        </div>
        <p class="text-start text-secondary">
            <?php // print_r($_POST); ?>
        </p>
        <div class="container-fluid" style="width: 98%;">
            <div class="container-lg table-responsive" id="AdminTable">
                <div class="container mt-5 text-bg-light rounded border border-success rounded" style="min-width: fit-content;">
                    <table class="table table-hover table-light align-middle caption-top" id="AccountTable">
                        <input type="hidden" id="showPassword">
                        <caption>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="input-group input-group-sm">
                                            <!-- In the future, I will add a Category Search -->
                                            <span class="input-group-text text-bg-light"
                                                title="You can search only by name">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="20"
                                                    viewBox="0 -960 960 960" width="20" fill="var(--bs-success)">
                                                    <path
                                                        d="M382.122-330.5q-102.187 0-173.861-71.674Q136.587-473.848 136.587-576q0-102.152 71.674-173.826Q279.935-821.5 382.087-821.5q102.152 0 173.826 71.674 71.674 71.674 71.674 173.861 0 40.859-12.022 76.292-12.021 35.434-33.065 64.956l212.087 212.326q12.674 12.913 12.674 28.945 0 16.033-12.913 28.707-12.674 12.674-29.326 12.674t-29.326-12.674L523.848-375.587q-29.761 21.044-65.434 33.065-35.672 12.022-76.292 12.022Zm-.035-83q67.848 0 115.174-47.326Q544.587-508.152 544.587-576q0-67.848-47.326-115.174Q449.935-738.5 382.087-738.5q-67.848 0-115.174 47.326Q219.587-643.848 219.587-576q0 67.848 47.326 115.174Q314.239-413.5 382.087-413.5Z" />
                                                </svg>
                                            </span>
                                            <input type="search" class="form-control text-bg-light form-control-sm"
                                                placeholder="Search by Name" id="SearchBar">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <!-- piginations -->
                                        <nav aria-label="Page navigation example">
                                            <ul class="pagination pagination-sm">
                                                <li class="page-item">
                                                    <a class="page-link text-bg-light user-select-none" id="Previous"
                                                        style="cursor: pointer;">
                                                        <span aria-hidden="true">&laquo;</span>
                                                    </a>
                                                </li>
                                                <li class="page-item m-1 text-bg-light"><small
                                                        class="text-success text-center mx-1">Showing <span
                                                            id="CurrentPage"></span> to <span id="TotalPage"></span> of
                                                        <span id="TotalItem"></span> entries</small>
                                                </li>
                                                <li class="page-item">
                                                    <a class="page-link text-bg-light user-select-none" id="Next"
                                                        style="cursor: pointer;">
                                                        <span aria-hidden="true">&raquo;</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                    <div class="col-4" hidden>
                                        <div class="d-flex justify-content-end">
                                            <button type="button" disabled title="Add new account"
                                                class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#CreateModal">
                                                <img src="../Image/Create.svg" alt="">
                                                Add Account
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </caption>
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Profile</th>
                                <th scope="col">Name</th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">Dept.</th>
                                <th scope="col">Status</th>
                                <th scope="col" hidden>id</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM tbl_trainee WHERE role = 'User' ORDER BY name ASC";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                $i = 1;

                                while ($row = mysqli_fetch_assoc($result)) {

                                    $evaluated = $row['evaluated'];

                                    if ($evaluated == "true") {
                                        $evaluated = '<span class="badge bg-success">Evaluated</span>';
                                    } else {
                                        $evaluated = '<span class="badge bg-danger">Not Evaluated</span>';
                                    }

                                    echo '<tr>
                                    <th scope="row">' . $i . '</th>
                                    <td class="text-start"><img src="' . $row['image'] . '" alt="Profile" class="rounded-circle img-fluid" style="width: 50px; height: 50px;"></td>
                                    <td class="text-truncate" style="max-width: 100px;">' . $row['name'] . '</td>
                                    <td class="text-truncate" style="max-width: 100px;">' . $row['trainee_uname'] . '</td>
                                    <td class="text-truncate" style="max-width: 100px;"><a href="mailto:' . $row['email'] . '" class="text-decoration-none text-black">' . $row['email'] . '</a></td>
                                    <td class="text-truncate" style="max-width: 100px;">' . $row['department'] . '</td>
                                    <td class="text-truncate" style="max-width: 100px;">' . $evaluated . '</td>
                                    <td hidden>' . $row['UID'] . '</td>
                                    <td class="text-truncate text-center">
                                        <a title="Evaluate This Account" id="Evaluate" class="btn btn-success btn-sm"><img src="../Image/assessment.gif" alt="Evaluate" style="width: 25px; height: 25px;"></a>
                                        </td>
                                    </tr>

                                    <script>
                                    var Evaluate = document.querySelectorAll("#Evaluate");

                                    Evaluate[' . ($i - 1) . '].addEventListener("click", () => {
                                        window.location.href = "../Components/Proccess/EvaluateTrainee.php?ID=' . $row['UID'] . '";
                                    });
                                    </script>
                                    ';
                                    $i++;
                                }
                            } else {
                                echo '<tr>
                                <th colspan="10" class="text-center">No data available</th>
                            </tr>';
                            }
                            ?>
                        </tbody>
                        <tfoot id="noResult">
                            <tr>
                                <th colspan="10" class="text-center"><span class="text-secondary">No Result</span>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </section>
</body>


</html>