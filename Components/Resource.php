<?php
session_start();
@include_once("../Database/config.php");
@include_once("../Components/PopupAlert.php");

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $userID = $_GET['ID'];

    $sql = "SELECT * FROM tbl_trainee WHERE UID = '$userID'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $name = $row['name'];

    $sql = "SELECT * FROM tbl_resource WHERE UID = '$userID'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        $resume = $row['resume'];
        $placement = $row['placement'];
        $birth = $row['Birth'];
        $moa = $row['MoA'];
        $waiver = $row['Waiver'];
        $medical = $row['MedCert'];
        $GMcert = $row['GMCert'];
        $regform = $row['RegForm'];
        $eval = $row['Evaform'];
        $narrative = $row['NarraForm'];
        $timecard = $row['TimeCard'];
        $COC = $row['COC'];

        $Doc1 = $row['Doc1_date'];
        $Doc2 = $row['Doc2_date'];
        $Doc3 = $row['Doc3_date'];
        $Doc4 = $row['Doc4_date'];
        $Doc5 = $row['Doc5_date'];
        $Doc6 = $row['Doc6_date'];
        $Doc7 = $row['Doc7_date'];
        $Doc8 = $row['Doc8_date'];
        $Doc10 = $row['Doc10_date'];
        $Doc11 = $row['Doc11_date'];
        $Doc12 = $row['Doc12_date'];
        $Doc13 = $row['Doc13_date'];

        $Doc1_status = $row['Doc1_stat'];
        $Doc2_status = $row['Doc2_stat'];
        $Doc3_status = $row['Doc3_stat'];
        $Doc4_status = $row['Doc4_stat'];
        $Doc5_status = $row['Doc5_stat'];
        $Doc6_status = $row['Doc6_stat'];
        $Doc7_status = $row['Doc7_stat'];
        $Doc8_status = $row['Doc8_stat'];
        $Doc10_status = $row['Doc10_stat'];
        $Doc11_status = $row['Doc11_stat'];
        $Doc12_status = $row['Doc12_stat'];
        $Doc13_status = $row['Doc13_stat'];
    }

}

if ($Doc1_status == 1 && $Doc2_status == 1 && $Doc3_status == 1 && $Doc4_status == 1 && $Doc5_status == 1 && $Doc6_status == 1 && $Doc7_status == 1 && $Doc8_status == 1  && $Doc10_status == 1 && $Doc11_status == 1 && $Doc12_status == 1 && $Doc13_status == 1) {
    $sql = "UPDATE tbl_trainee SET Resource_Completed = 1 WHERE UID = '$userID'";
    mysqli_query($conn, $sql);
} else {
    $sql = "UPDATE tbl_trainee SET Resource_Completed = 0 WHERE UID = '$userID'";
    mysqli_query($conn, $sql);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style/Bootstrap_Style/bootstrap.css">
    <link rel="stylesheet" href="../Style/ColorPalette.css">
    <script src="../Script/SweetAlert2.js"></script>
    <script src="../Script/Bootstrap_Script/bootstrap.bundle.js"></script>
    <title>Resource</title>
    <style>
        body {
            background-image: url("../Image/BGShiny.svg");
            background-repeat: no-repeat;
            background-size: cover;
        }

        /*For the scroll bar*/
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: var(--body-color);
            transition: var(--tran-05);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--primary-color);
            border-radius: 5px;
        }

        ::selection {
            background-color: var(--primary-color);
            color: #fff;
        }
    </style>
</head>

<body class="bg-dark">
    <div class="container-lg mt-4 rounded table-responsive" style="min-width: 595px;">
        <div class="row">
            <div class="col-md-12 text-bg-success rounded-top">
                <div class="d-flex justify-content-between">
                    <div class="mt-2">
                        <input class="btn btn-primary btn-sm fw-bold text-uppercase" type="button" value="Back"
                            onclick="window.location.href='../Admin/AdminTraineeResource.php'" title="Back to Trainee Documents">
                    </div>
                    <h3 class="text-center m-2 text-uppercase">
                        <?php echo $name; ?> Documents
                        <?php
                        $ShowAlert = true;
                        if (isset($ShowAlert)) {
                            echo NewAlertBox();
                            $_SESSION['Show'] = false;
                        } ?>
                    </h3>
                    <div></div>
                </div>
            </div>
            <div class=" col-md-12" style=" background-color: rgba(0,0,0,0.2); backdrop-filter: blur(10px);">
                <br>
                <ol class="list-group list-group-numbered">
                    <li
                        class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold text-truncate">Resume</div>
                            <span class="text-muted">
                                <?php if (isset($Doc1)) {
                                    echo "Submitted on: " . date("F j, Y", strtotime($Doc1)) . " - ";
                                } ?>
                                <?php if (isset($Doc1_status)) {
                                    if ($Doc1_status == 0) {
                                        echo "<span class='text-warning'>Pending</span>";
                                    } else if ($Doc1_status == 1) {
                                        echo "<span class='text-success'>Approved</span>";
                                    } else if ($Doc1_status == 2) {
                                        echo "<span class='text-danger'>Rejected</span>";
                                    } else {
                                        echo "<span class='text-secondary'>Unknown</span>";
                                    }
                                } ?>
                            </span>
                        </div>
                        <div>
                            <?php
                            if (isset($resume)) {
                                echo
                                    "
                                    <div class='dropdown'>
                                        <button class='btn btn-sm btn-primary dropdown-toggle' type='button' id='dropdownMenuButton1' data-bs-toggle='dropdown' aria-expanded='false'>
                                            Action
                                        </button>
                                        <ul class='dropdown-menu' aria-labelledby='dropdownMenuButton1'>
                                            <li><a class='dropdown-item' title='View File' href='$resume' target='_blank'><img src='../Image/ReDocs.svg' alt='View' width='24px'> View</a></li>
                                            <li><a class='dropdown-item' title='Download file' href='$resume' download><img src='../Image/DownDocs.svg' alt='Download' width='24px'> Download</a></li>
                                            <li><hr class='dropdown-divider'></li>
                                            <li><a class='dropdown-item' title='Approve file' href='../Components/Proccess/ResourceProccess.php?ID=$userID&file=Doc1&status=1'><img src='../Image/thumb_up.svg' alt='Approve' width='24px'> Approve This File</a></li>
                                            <li><a class='dropdown-item' title='Request for Resubmission of file' href='../Components/Proccess/ResourceProccess.php?ID=$userID&file=Doc1&status=2'><img src='../Image/denied.svg' alt='Denied' width='24px'> Request for Resubmission</a></li>
                                        </ul>
                                    ";
                            } else {
                                echo "<div class='spinner-border text-warning' role='status'>
                                    <span class='visually-hidden'>Loading...</span>
                                </div>";
                            }
                            ?>
                        </div>
                    </li>
                    <li
                        class="list-group-item d-flex justify-content-between align-items-start ">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold text-truncate">Placement Form</div>
                            <span class="text-muted">
                                <?php if (isset($Doc2)) {
                                    echo "Submitted on: " . date("F j, Y", strtotime($Doc2)) . " - ";
                                } ?>
                                <?php if (isset($Doc2_status)) {
                                    if ($Doc2_status == 0) {
                                        echo "<span class='text-warning'>Pending</span>";
                                    } else if ($Doc2_status == 1) {
                                        echo "<span class='text-success'>Approved</span>";
                                    } else if ($Doc2_status == 2) {
                                        echo "<span class='text-danger'>Rejected</span>";
                                    } else {
                                        echo "<span class='text-secondary'>Unknown</span>";
                                    }
                                } ?>
                            </span>
                        </div>
                        <div>
                            <?php
                            if (isset($placement)) {
                                echo
                                    "
                                    <div class='dropdown'>
                                        <button class='btn btn-sm btn-primary dropdown-toggle' type='button' id='dropdownMenuButton1' data-bs-toggle='dropdown' aria-expanded='false'>
                                            Action
                                        </button>
                                        <ul class='dropdown-menu ' aria-labelledby='dropdownMenuButton1'>
                                            <li><a class='dropdown-item' title='View File' href='$placement' target='_blank'><img src='../Image/ReDocs.svg' alt='View' width='24px'> View</a></li>
                                            <li><a class='dropdown-item' title='Download file' href='$placement' download><img src='../Image/DownDocs.svg' alt='Download' width='24px'> Download</a></li>
                                            <li><hr class='dropdown-divider'></li>
                                            <li><a class='dropdown-item' title='Approve file' href='../Components/Proccess/ResourceProccess.php?ID=$userID&file=Doc2&status=1'><img src='../Image/thumb_up.svg' alt='Approve' width='24px'> Approve This File</a></li>
                                            <li><a class='dropdown-item' title='Request for Resubmission of file' href='../Components/Proccess/ResourceProccess.php?ID=$userID&file=Doc2&status=2'><img src='../Image/denied.svg' alt='Denied' width='24px'> Request for Resubmission</a></li>
                                        </ul>
                                ";
                            } else {
                                echo "<div class='spinner-border text-warning' role='status'>
                                    <span class='visually-hidden'>Loading...</span>
                                </div>";
                            }
                            ?>
                        </div>
                    </li>
                    <li
                        class="list-group-item d-flex justify-content-between align-items-start ">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold text-truncate">Birth Certificate</div>
                            <span class="text-muted">
                                <?php if (isset($Doc3)) {
                                    echo "Submitted on: " . date("F j, Y", strtotime($Doc3)) . " - ";
                                } ?>
                                <?php if (isset($Doc3_status)) {
                                    if ($Doc3_status == 0) {
                                        echo "<span class='text-warning'>Pending</span>";
                                    } else if ($Doc3_status == 1) {
                                        echo "<span class='text-success'>Approved</span>";
                                    } else if ($Doc3_status == 2) {
                                        echo "<span class='text-danger'>Rejected</span>";
                                    } else {
                                        echo "<span class='text-secondary'>Unknown</span>";
                                    }
                                } ?>
                            </span>
                        </div>
                        <div>
                            <?php
                            if (isset($birth)) {
                                echo
                                    "
                                    <div class='dropdown'>
                                        <button class='btn btn-sm btn-primary dropdown-toggle' type='button' id='dropdownMenuButton1' data-bs-toggle='dropdown' aria-expanded='false'>
                                            Action
                                        </button>
                                        <ul class='dropdown-menu ' aria-labelledby='dropdownMenuButton1'>
                                            <li><a class='dropdown-item' title='View File' href='$birth' target='_blank'><img src='../Image/ReDocs.svg' alt='View' width='24px'> View</a></li>
                                            <li><a class='dropdown-item' title='Download file' href='$birth' download><img src='../Image/DownDocs.svg' alt='Download' width='24px'> Download</a></li>
                                            <li><hr class='dropdown-divider'></li>
                                            <li><a class='dropdown-item' title='Approve file' href='../Components/Proccess/ResourceProccess.php?ID=$userID&file=Doc3&status=1'><img src='../Image/thumb_up.svg' alt='Approve' width='24px'> Approve This File</a></li>
                                            <li><a class='dropdown-item' title='Request for Resubmission of file' href='../Components/Proccess/ResourceProccess.php?ID=$userID&file=Doc3&status=2'><img src='../Image/denied.svg' alt='Denied' width='24px'> Request for Resubmission</a></li>
                                        </ul>
                                ";
                            } else {
                                echo "<div class='spinner-border text-warning' role='status'>
                                    <span class='visually-hidden'>Loading...</span>
                                </div>";
                            }
                            ?>
                        </div>
                    </li>
                    <li
                        class="list-group-item d-flex justify-content-between align-items-start  ">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold text-truncate">Memorandum of Agreement</div>
                            <span class="text-muted">
                                <?php if (isset($Doc4)) {
                                    echo "Submitted on: " . date("F j, Y", strtotime($Doc4)) . " - ";
                                } ?>
                                <?php if (isset($Doc4_status)) {
                                    if ($Doc4_status == 0) {
                                        echo "<span class='text-warning'>Pending</span>";
                                    } else if ($Doc4_status == 1) {
                                        echo "<span class='text-success'>Approved</span>";
                                    } else if ($Doc4_status == 2) {
                                        echo "<span class='text-danger'>Rejected</span>";
                                    } else {
                                        echo "<span class='text-secondary'>Unknown</span>";
                                    }
                                } ?>
                            </span>
                        </div>
                        <div>
                            <?php
                            if (isset($moa)) {
                                echo
                                    "
                                    <div class='dropdown'>
                                        <button class='btn btn-sm btn-primary dropdown-toggle' type='button' id='dropdownMenuButton1' data-bs-toggle='dropdown' aria-expanded='false'>
                                            Action
                                        </button>
                                        <ul class='dropdown-menu ' aria-labelledby='dropdownMenuButton1'>
                                            <li><a class='dropdown-item' title='View File' href='$moa' target='_blank'><img src='../Image/ReDocs.svg' alt='View' width='24px'> View</a></li>
                                            <li><a class='dropdown-item' title='Download file' href='$moa' download><img src='../Image/DownDocs.svg' alt='Download' width='24px'> Download</a></li>
                                            <li><hr class='dropdown-divider'></li>
                                            <li><a class='dropdown-item' title='Approve file' href='../Components/Proccess/ResourceProccess.php?ID=$userID&file=Doc4&status=1'><img src='../Image/thumb_up.svg' alt='Approve' width='24px'> Approve This File</a></li>
                                            <li><a class='dropdown-item' title='Request for Resubmission of file' href='../Components/Proccess/ResourceProccess.php?ID=$userID&file=Doc4&status=2'><img src='../Image/denied.svg' alt='Denied' width='24px'> Request for Resubmission</a></li>
                                        </ul>
                                    ";
                            } else {
                                echo "<div class='spinner-border text-warning' role='status'>
                                    <span class='visually-hidden'>Loading...</span>
                                </div>";
                            }
                            ?>
                        </div>
                    </li>
                    <li
                        class="list-group-item d-flex justify-content-between align-items-start  ">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold text-truncate">Waiver</div>
                            <span class="text-muted">
                                <?php if (isset($Doc5)) {
                                    echo "Submitted on: " . date("F j, Y", strtotime($Doc5)) . " - ";
                                } ?>
                                <?php if (isset($Doc5_status)) {
                                    if ($Doc5_status == 0) {
                                        echo "<span class='text-warning'>Pending</span>";
                                    } else if ($Doc5_status == 1) {
                                        echo "<span class='text-success'>Approved</span>";
                                    } else if ($Doc5_status == 2) {
                                        echo "<span class='text-danger'>Rejected</span>";
                                    } else {
                                        echo "<span class='text-secondary'>Unknown</span>";
                                    }
                                } ?>
                            </span>
                        </div>
                        <div>
                            <?php
                            if (isset($waiver)) {
                                echo
                                    "
                                    <div class='dropdown'>
                                        <button class='btn btn-sm btn-primary dropdown-toggle' type='button' id='dropdownMenuButton1' data-bs-toggle='dropdown' aria-expanded='false'>
                                            Action
                                        </button>
                                        <ul class='dropdown-menu ' aria-labelledby='dropdownMenuButton1'>
                                            <li><a class='dropdown-item' title='View File' href='$waiver' target='_blank'><img src='../Image/ReDocs.svg' alt='View' width='24px'> View</a></li>
                                            <li><a class='dropdown-item' title='Download file' href='$waiver' download><img src='../Image/DownDocs.svg' alt='Download' width='24px'> Download</a></li>
                                            <li><hr class='dropdown-divider'></li>
                                            <li><a class='dropdown-item' title='Approve file' href='../Components/Proccess/ResourceProccess.php?ID=$userID&file=Doc5&status=1'><img src='../Image/thumb_up.svg' alt='Approve' width='24px'> Approve This File</a></li>
                                            <li><a class='dropdown-item' title='Request for Resubmission of file' href='../Components/Proccess/ResourceProccess.php?ID=$userID&file=Doc5&status=2'><img src='../Image/denied.svg' alt='Denied' width='24px'> Request for Resubmission</a></li>
                                        </ul>
                                    ";
                            } else {
                                echo "<div class='spinner-border text-warning' role='status'>
                                    <span class='visually-hidden'>Loading...</span>
                                </div>";
                            }
                            ?>
                        </div>
                    </li>
                    <li
                        class="list-group-item d-flex justify-content-between align-items-start  ">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold text-truncate">Medical Certificate</div>
                            <span class="text-muted">
                                <?php if (isset($Doc6)) {
                                    echo "Submitted on: " . date("F j, Y", strtotime($Doc6)) . " - ";
                                } ?>
                                <?php if (isset($Doc6_status)) {
                                    if ($Doc6_status == 0) {
                                        echo "<span class='text-warning'>Pending</span>";
                                    } else if ($Doc6_status == 1) {
                                        echo "<span class='text-success'>Approved</span>";
                                    } else if ($Doc6_status == 2) {
                                        echo "<span class='text-danger'>Rejected</span>";
                                    } else {
                                        echo "<span class='text-secondary'>Unknown</span>";
                                    }
                                } ?>
                            </span>
                        </div>
                        <div>
                            <?php
                            if (isset($medical)) {
                                echo
                                    "
                                    <div class='dropdown'>
                                        <button class='btn btn-sm btn-primary dropdown-toggle' type='button' id='dropdownMenuButton1' data-bs-toggle='dropdown' aria-expanded='false'>
                                            Action
                                        </button>
                                        <ul class='dropdown-menu ' aria-labelledby='dropdownMenuButton1'>
                                            <li><a class='dropdown-item' title='View File' href='$medical' target='_blank'><img src='../Image/ReDocs.svg' alt='View' width='24px'> View</a></li>
                                            <li><a class='dropdown-item' title='Download file' href='$medical' download><img src='../Image/DownDocs.svg' alt='Download' width='24px'> Download</a></li>
                                            <li><hr class='dropdown-divider'></li>
                                            <li><a class='dropdown-item' title='Approve file' href='../Components/Proccess/ResourceProccess.php?ID=$userID&file=Doc6&status=1'><img src='../Image/thumb_up.svg' alt='Approve' width='24px'> Approve This File</a></li>
                                            <li><a class='dropdown-item' title='Request for Resubmission of file' href='../Components/Proccess/ResourceProccess.php?ID=$userID&file=Doc6&status=2'><img src='../Image/denied.svg' alt='Denied' width='24px'> Request for Resubmission</a></li>
                                        </ul>
                                    ";
                            } else {
                                echo "<div class='spinner-border text-warning' role='status'>
                                    <span class='visually-hidden'>Loading...</span>
                                </div>";
                            }
                            ?>
                        </div>
                    </li>
                    <li
                        class="list-group-item d-flex justify-content-between align-items-start  ">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold text-truncate">Good Moral Certificate</div>
                            <span class="text-muted">
                                <?php if (isset($Doc7)) {
                                    echo "Submitted on: " . date("F j, Y", strtotime($Doc7)) . " - ";
                                } ?>
                                <?php if (isset($Doc7_status)) {
                                    if ($Doc7_status == 0) {
                                        echo "<span class='text-warning'>Pending</span>";
                                    } else if ($Doc7_status == 1) {
                                        echo "<span class='text-success'>Approved</span>";
                                    } else if ($Doc7_status == 2) {
                                        echo "<span class='text-danger'>Rejected</span>";
                                    } else {
                                        echo "<span class='text-secondary'>Unknown</span>";
                                    }
                                } ?>
                            </span>
                        </div>
                        <div>
                            <?php
                            if (isset($GMcert)) {
                                echo
                                    "
                                    <div class='dropdown'>
                                        <button class='btn btn-sm btn-primary dropdown-toggle' type='button' id='dropdownMenuButton1' data-bs-toggle='dropdown' aria-expanded='false'>
                                            Action
                                        </button>
                                        <ul class='dropdown-menu ' aria-labelledby='dropdownMenuButton1'>
                                            <li><a class='dropdown-item' title='View File' href='$GMcert' target='_blank'><img src='../Image/ReDocs.svg' alt='View' width='24px'> View</a></li>
                                            <li><a class='dropdown-item' title='Download file' href='$GMcert' download><img src='../Image/DownDocs.svg' alt='Download' width='24px'> Download</a></li>
                                            <li><hr class='dropdown-divider'></li>
                                            <li><a class='dropdown-item' title='Approve file' href='../Components/Proccess/ResourceProccess.php?ID=$userID&file=Doc7&status=1'><img src='../Image/thumb_up.svg' alt='Approve' width='24px'> Approve This File</a></li>
                                            <li><a class='dropdown-item' title='Request for Resubmission of file' href='../Components/Proccess/ResourceProccess.php?ID=$userID&file=Doc7&status=2'><img src='../Image/denied.svg' alt='Denied' width='24px'> Request for Resubmission</a></li>
                                        </ul>
                                    ";
                            } else {
                                echo "<div class='spinner-border text-warning' role='status'>
                                    <span class='visually-hidden'>Loading...</span>
                                </div>";
                            }
                            ?>
                        </div>
                    </li>
                    <li
                        class="list-group-item d-flex justify-content-between align-items-start  ">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold text-truncate">Registration Form</div>
                            <span class="text-muted">
                                <?php if (isset($Doc8)) {
                                    echo "Submitted on: " . date("F j, Y", strtotime($Doc8)) . " - ";
                                } ?>
                                <?php if (isset($Doc8_status)) {
                                    if ($Doc8_status == 0) {
                                        echo "<span class='text-warning'>Pending</span>";
                                    } else if ($Doc8_status == 1) {
                                        echo "<span class='text-success'>Approved</span>";
                                    } else if ($Doc8_status == 2) {
                                        echo "<span class='text-danger'>Rejected</span>";
                                    } else {
                                        echo "<span class='text-secondary'>Unknown</span>";
                                    }
                                } ?>
                            </span>
                        </div>
                        <div>
                            <?php
                            if (isset($regform)) {
                                echo
                                    "
                                    <div class='dropdown'>
                                        <button class='btn btn-sm btn-primary dropdown-toggle' type='button' id='dropdownMenuButton1' data-bs-toggle='dropdown' aria-expanded='false'>
                                            Action
                                        </button>
                                        <ul class='dropdown-menu ' aria-labelledby='dropdownMenuButton1'>
                                            <li><a class='dropdown-item' title='View File' href='$regform' target='_blank'><img src='../Image/ReDocs.svg' alt='View' width='24px'> View</a></li>
                                            <li><a class='dropdown-item' title='Download file' href='$regform' download><img src='../Image/DownDocs.svg' alt='Download' width='24px'> Download</a></li>
                                            <li><hr class='dropdown-divider'></li>
                                            <li><a class='dropdown-item' title='Approve file' href='../Components/Proccess/ResourceProccess.php?ID=$userID&file=Doc8&status=1'><img src='../Image/thumb_up.svg' alt='Approve' width='24px'> Approve This File</a></li>
                                            <li><a class='dropdown-item' title='Request for Resubmission of file' href='../Components/Proccess/ResourceProccess.php?ID=$userID&file=Doc8&status=2'><img src='../Image/denied.svg' alt='Denied' width='24px'> Request for Resubmission</a></li>
                                        </ul>
                                    ";
                            } else {
                                echo "<div class='spinner-border text-warning' role='status'>
                                    <span class='visually-hidden'>Loading...</span>
                                </div>";
                            }
                            ?>
                        </div>
                    </li>
                    <li
                        class="list-group-item d-flex justify-content-between align-items-start  ">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold text-truncate">Evaluation Form</div>
                            <span class="text-muted">
                                <?php if (isset($Doc10)) {
                                    echo "Submitted on: " . date("F j, Y", strtotime($Doc10)) . " - ";
                                } ?>
                                <?php if (isset($Doc10_status)) {
                                    if ($Doc10_status == 0) {
                                        echo "<span class='text-warning'>Pending</span>";
                                    } else if ($Doc10_status == 1) {
                                        echo "<span class='text-success'>Approved</span>";
                                    } else if ($Doc10_status == 2) {
                                        echo "<span class='text-danger'>Rejected</span>";
                                    } else {
                                        echo "<span class='text-secondary'>Unknown</span>";
                                    }
                                } ?>
                            </span>
                        </div>
                        <div>
                            <?php
                            if (isset($eval)) {
                                echo
                                    "
                                    <div class='dropdown'>
                                        <button class='btn btn-sm btn-primary dropdown-toggle' type='button' id='dropdownMenuButton1' data-bs-toggle='dropdown' aria-expanded='false'>
                                            Action
                                        </button>
                                        <ul class='dropdown-menu ' aria-labelledby='dropdownMenuButton1'>
                                            <li><a class='dropdown-item' title='View File' href='$eval' target='_blank'><img src='../Image/ReDocs.svg' alt='View' width='24px'> View</a></li>
                                            <li><a class='dropdown-item' title='Download file' href='$eval' download><img src='../Image/DownDocs.svg' alt='Download' width='24px'> Download</a></li>
                                            <li><hr class='dropdown-divider'></li>
                                            <li><a class='dropdown-item' title='Approve file' href='../Components/Proccess/ResourceProccess.php?ID=$userID&file=Doc10&status=1'><img src='../Image/thumb_up.svg' alt='Approve' width='24px'> Approve This File</a></li>
                                            <li><a class='dropdown-item' title='Request for Resubmission of file' href='../Components/Proccess/ResourceProccess.php?ID=$userID&file=Doc10&status=2'><img src='../Image/denied.svg' alt='Denied' width='24px'> Request for Resubmission</a></li>
                                        </ul>
                                    ";
                            } else {
                                echo "<div class='spinner-border text-warning' role='status'>
                                    <span class='visually-hidden'>Loading...</span>
                                </div>";
                            }
                            ?>
                        </div>
                    </li>
                    <li
                        class="list-group-item d-flex justify-content-between align-items-start  ">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold text-truncate">Narrative Report</div>
                            <span class="text-muted">
                                <?php if (isset($Doc11)) {
                                    echo "Submitted on: " . date("F j, Y", strtotime($Doc11)) . " - ";
                                } ?>
                                <?php if (isset($Doc11_status)) {
                                    if ($Doc11_status == 0) {
                                        echo "<span class='text-warning'>Pending</span>";
                                    } else if ($Doc11_status == 1) {
                                        echo "<span class='text-success'>Approved</span>";
                                    } else if ($Doc11_status == 2) {
                                        echo "<span class='text-danger'>Rejected</span>";
                                    } else {
                                        echo "<span class='text-secondary'>Unknown</span>";
                                    }
                                } ?>
                            </span>
                        </div>
                        <div>
                            <?php
                            if (isset($narrative)) {
                                echo
                                    "
                                    <div class='dropdown'>
                                        <button class='btn btn-sm btn-primary dropdown-toggle' type='button' id='dropdownMenuButton1' data-bs-toggle='dropdown' aria-expanded='false'>
                                            Action
                                        </button>
                                        <ul class='dropdown-menu ' aria-labelledby='dropdownMenuButton1'>
                                            <li><a class='dropdown-item' title='View File' href='$narrative' target='_blank'><img src='../Image/ReDocs.svg' alt='View' width='24px'> View</a></li>
                                            <li><a class='dropdown-item' title='Download file' href='$narrative' download><img src='../Image/DownDocs.svg' alt='Download' width='24px'> Download</a></li>
                                            <li><hr class='dropdown-divider'></li>
                                            <li><a class='dropdown-item' title='Approve file' href='../Components/Proccess/ResourceProccess.php?ID=$userID&file=Doc11&status=1'><img src='../Image/thumb_up.svg' alt='Approve' width='24px'> Approve This File</a></li>
                                            <li><a class='dropdown-item' title='Request for Resubmission of file' href='../Components/Proccess/ResourceProccess.php?ID=$userID&file=Doc11&status=2'><img src='../Image/denied.svg' alt='Denied' width='24px'> Request for Resubmission</a></li>
                                        </ul>
                                    ";
                            } else {
                                echo "<div class='spinner-border text-warning' role='status'>
                                    <span class='visually-hidden'>Loading...</span>
                                </div>";
                            }
                            ?>
                        </div>
                    </li>
                    <li
                        class="list-group-item d-flex justify-content-between align-items-start  ">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold text-truncate">Daily Time Record</div>
                            <span class="text-muted">
                                <?php if (isset($Doc12)) {
                                    echo "Submitted on: " . date("F j, Y", strtotime($Doc12)) . " - ";
                                } ?>
                                <?php if (isset($Doc12_status)) {
                                    if ($Doc12_status == 0) {
                                        echo "<span class='text-warning'>Pending</span>";
                                    } else if ($Doc12_status == 1) {
                                        echo "<span class='text-success'>Approved</span>";
                                    } else if ($Doc12_status == 2) {
                                        echo "<span class='text-danger'>Rejected</span>";
                                    } else {
                                        echo "<span class='text-secondary'>Unknown</span>";
                                    }
                                } ?>
                            </span>
                        </div>
                        <div>
                            <?php
                            if (isset($timecard)) {
                                echo
                                    "
                                    <div class='dropdown'>
                                        <button class='btn btn-sm btn-primary dropdown-toggle' type='button' id='dropdownMenuButton1' data-bs-toggle='dropdown' aria-expanded='false'>
                                            Action
                                        </button>
                                        <ul class='dropdown-menu ' aria-labelledby='dropdownMenuButton1'>
                                            <li><a class='dropdown-item' title='View File' href='$timecard' target='_blank'><img src='../Image/ReDocs.svg' alt='View' width='24px'> View</a></li>
                                            <li><a class='dropdown-item' title='Download file' href='$timecard' download><img src='../Image/DownDocs.svg' alt='Download' width='24px'> Download</a></li>
                                            <li><hr class='dropdown-divider'></li>
                                            <li><a class='dropdown-item' title='Approve file' href='../Components/Proccess/ResourceProccess.php?ID=$userID&file=Doc12&status=1'><img src='../Image/thumb_up.svg' alt='Approve' width='24px'> Approve This File</a></li>
                                            <li><a class='dropdown-item' title='Request for Resubmission of file' href='../Components/Proccess/ResourceProccess.php?ID=$userID&file=Doc12&status=2'><img src='../Image/denied.svg' alt='Denied' width='24px'> Request for Resubmission</a></li>
                                        </ul>
                                    ";
                            } else {
                                echo "<div class='spinner-border text-warning' role='status'>
                                    <span class='visually-hidden'>Loading...</span>
                                </div>";
                            }
                            ?>
                        </div>
                    </li>
                    <li
                        class="list-group-item d-flex justify-content-between align-items-start  ">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold text-wrap">Certificate of Completion</div>
                            <span class="text-muted">
                                <?php if (isset($Doc13)) {
                                    echo "Submitted on: " . date("F j, Y", strtotime($Doc13)) . " - ";
                                } ?>
                                <?php if (isset($Doc13_status)) {
                                    if ($Doc13_status == 0) {
                                        echo "<span class='text-warning'>Pending</span>";
                                    } else if ($Doc13_status == 1) {
                                        echo "<span class='text-success'>Approved</span>";
                                    } else if ($Doc13_status == 2) {
                                        echo "<span class='text-danger'>Rejected</span>";
                                    } else {
                                        echo "<span class='text-secondary'>Unknown</span>";
                                    }
                                } ?>
                            </span>
                        </div>
                        <div>
                            <?php
                            if (isset($COC)) {
                                echo
                                    "
                                    <div class='dropdown'>
                                        <button class='btn btn-sm btn-primary dropdown-toggle' type='button' id='dropdownMenuButton1' data-bs-toggle='dropdown' aria-expanded='false'>
                                            Action
                                        </button>
                                        <ul class='dropdown-menu ' aria-labelledby='dropdownMenuButton1'>
                                            <li><a class='dropdown-item' title='View File' href='$COC' target='_blank'><img src='../Image/ReDocs.svg' alt='View' width='24px'> View</a></li>
                                            <li><a class='dropdown-item' title='Download file' href='$COC' download><img src='../Image/DownDocs.svg' alt='Download' width='24px'> Download</a></li>
                                            <li><hr class='dropdown-divider'></li>
                                            <li><a class='dropdown-item' title='Approve file' href='../Components/Proccess/ResourceProccess.php?ID=$userID&file=Doc13&status=1'><img src='../Image/thumb_up.svg' alt='Approve' width='24px'> Approve This File</a></li>
                                            <li><a class='dropdown-item' title='Request for Resubmission of file' href='../Components/Proccess/ResourceProccess.php?ID=$userID&file=Doc13&status=2'><img src='../Image/denied.svg' alt='Denied' width='24px'> Request for Resubmission</a></li>
                                        </ul>
                                    ";
                            } else {
                                echo "<div class='spinner-border text-warning' role='status'>
                                    <span class='visually-hidden'>Loading...</span>
                                </div>";
                            }
                            ?>
                        </div>
                    </li>
                </ol>
            <br>
            </div>
        </div>
    </div>
    <br>
</body>

</html>