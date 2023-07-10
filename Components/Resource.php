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
        $consent = $row['consent'];
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
        $Doc9 = $row['Doc9_date'];
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
        $Doc9_status = $row['Doc9_stat'];
        $Doc10_status = $row['Doc10_stat'];
        $Doc11_status = $row['Doc11_stat'];
        $Doc12_status = $row['Doc12_stat'];
        $Doc13_status = $row['Doc13_stat'];


        function Stat($file, $status)
        {
            if (isset($status)) {
                if ($status == 0) {
                    $stat = "Pending";
                } elseif ($status == 1) {
                    $stat = "Approved";
                } elseif ($status == 2) {
                    $stat = "Resubmit";
                } else {
                    $stat = "NAN";
                }
            } else {
                $stat = "NAN";
            }

            if ($file != null) {
                $date = date("F d, Y", strtotime($file));
            } else {
                $date = "NAN";
            }

            if ($stat == "NAN" && $date == "NAN") {
                $output = "";
            } else {
                $output = $date . " - " . $stat;
            }

            return $output;
        }




    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style/Bootstrap_Style/bootstrap.css">
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
                    <div class="m-2"><a class="btn btn-sm bg-transparent" href="../Admin/AdminTraineeResource.php"
                            title="Back to Trainee Resource"><img src="../Image/backspace.svg" alt="Back"
                                width="24px"></a></div>
                    <h3 class="text-center m-2 text-uppercase">
                        <?php echo $name; ?> Resource
                    </h3>
                    <div></div>
                </div>
            </div>
            <div class=" col-md-12 " style=" background-color: rgba(0,0,0,0.2); backdrop-filter: blur(5px);">
                <br>
                <ol class="list-group list-group-numbered">
                    <li
                        class="list-group-item d-flex justify-content-between align-items-start bg-transparent text-light">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold text-truncate">Resume</div>
                            <span class="text-muted">
                                <?php if (isset($Doc1)) {
                                    echo "Submitted on: " . $Doc1 . " - ";
                                } ?>
                                <?php if (isset($Doc1_status)) {
                                    echo $Doc1_status;
                                } ?>
                            </span>
                        </div>
                        <div>
                            <?php
                            if (isset($resume)) {
                                echo
                                    "
                                <a class='btn btn-sm btn-success' title='View File' href='$resume' target='_blank'>View</a>
                                <a class='btn btn-sm btn-primary' title='Download file' href='$resume' download>Download</a>
                                <a class='btn btn-sm btn-warning' title='Approve file' href='../Components/Proccess/ResourceProccess.php?ID=$userID&file=Doc1&status=1'>Approve</a>
                                <a class='btn btn-sm btn-danger' title='Request for Resubmission of file' href='../Components/Proccess/ResourceProccess.php?ID=$userID&file=Doc1&status=2'>Resubmit</a>
                                ";
                            } else {
                                echo "No file uploaded yet";
                            }
                            ?>
                        </div>
                    </li>
                    <li
                        class="list-group-item d-flex justify-content-between align-items-start bg-transparent text-light">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold text-truncate">Placement Form</div>
                            <span class="text-muted">
                                <?php if (isset($Doc2)) {
                                    echo "Submitted on: " . $Doc2 . " - ";
                                } ?>
                                <?php if (isset($Doc2_status)) {
                                    echo $Doc2_status;
                                } ?>
                            </span>
                        </div>
                        <div>
                            <?php
                            if (isset($placement)) {
                                echo
                                    "
                                <a class='btn btn-sm btn-success' title='View File' href='$placement' target='_blank'>View</a>
                                <a class='btn btn-sm btn-primary' title='Download file' href='$placement' download>Download</a>
                                <a class='btn btn-sm btn-warning' title='Approve file' href='../Components/Proccess/ResourceProccess.php?ID=$userID&file=Doc2&status=1'>Approve</a>
                                <a class='btn btn-sm btn-danger' title='Request for Resubmission of file' href='../Components/Proccess/ResourceProccess.php?ID=$userID&file=Doc2&status=2'>Resubmit</a>
                                ";
                            } else {
                                echo "No file uploaded yet";
                            }
                            ?>
                        </div>
                    </li>
                    <li
                        class="list-group-item d-flex justify-content-between align-items-start bg-transparent text-light">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold text-truncate">Birth Certificate</div>
                            <span class="text-muted">
                                <?php if (isset($Doc3)) {
                                    echo "Submitted on: " . $Doc3 . " - ";
                                } ?>
                                <?php if (isset($Doc3_status)) {
                                    echo $Doc3_status;
                                } ?>
                            </span>
                        </div>
                        <div>
                            <?php
                            if (isset($birth)) {
                                echo
                                    "
                                <a class='btn btn-sm btn-success' title='View File' href='$birth' target='_blank'>View</a>
                                <a class='btn btn-sm btn-primary' title='Download file' href='<$birth' download>Download</a>
                                <a class='btn btn-sm btn-warning' title='Approve file' href='../Components/Proccess/ResourceProccess.php?ID=$userID&file=Doc3&status=1'>Approve</a>
                                <a class='btn btn-sm btn-danger' title='Request for Resubmission of file' href='../Components/Proccess/ResourceProccess.php?ID=$userID&file=Doc3&status=2'>Resubmit</a>
                                ";
                            } else {
                                echo "No file uploaded yet";
                            }
                            ?>
                        </div>
                    </li>
                    <li
                        class="list-group-item d-flex justify-content-between align-items-start bg-transparent text-light">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold text-truncate">Memorandum of Agreement</div>
                            <span class="text-muted">
                                <?php if (isset($Doc4)) {
                                    echo "Submitted on: " . $Doc4 . " - ";
                                } ?>
                                <?php if (isset($Doc4_status)) {
                                    echo $Doc4_status;
                                } ?>
                            </span>
                        </div>
                        <div>
                            <?php
                            if (isset($moa)) {
                                echo
                                    "
                                <a class='btn btn-sm btn-success' title='View File' href='$moa' target='_blank'>View</a>
                                <a class='btn btn-sm btn-primary' title='Download file' href='$moa' download>Download</a>
                                <a class='btn btn-sm btn-warning' title='Approve file' href='../Components/Proccess/ResourceProccess.php?ID=$userID&file=Doc4&status=1'>Approve</a>
                                <a class='btn btn-sm btn-danger' title='Request for Resubmission of file' href='../Components/Proccess/ResourceProccess.php?ID=$userID&file=Doc4&status=2'>Resubmit</a>
                                ";
                            } else {
                                echo "No file uploaded yet";
                            }
                            ?>
                        </div>
                    </li>
                    <li
                        class="list-group-item d-flex justify-content-between align-items-start bg-transparent text-light">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold text-truncate">Waiver</div>
                            <span class="text-muted">
                                <?php if (isset($Doc5)) {
                                    echo "Submitted on: " . $Doc5 . " - ";
                                } ?>
                                <?php if (isset($Doc5_status)) {
                                    echo $Doc5_status;
                                } ?>
                            </span>
                        </div>
                        <div>
                            <?php
                            if (isset($waiver)) {
                                echo
                                    "
                                <a class='btn btn-sm btn-success' title='View File' href='$waiver' target='_blank'>View</a>
                                <a class='btn btn-sm btn-primary' title='Download file' href='$waiver' download>Download</a>
                                <a class='btn btn-sm btn-warning' title='Approve file' href='../Components/Proccess/ResourceProccess.php?ID=$userID&file=Doc5&status=1'>Approve</a>
                                <a class='btn btn-sm btn-danger' title='Request for Resubmission of file' href='../Components/Proccess/ResourceProccess.php?ID=$userID&file=Doc5&status=2'>Resubmit</a>
                                ";
                            } else {
                                echo "No file uploaded yet";
                            }
                            ?>
                        </div>
                    </li>
                    <li
                        class="list-group-item d-flex justify-content-between align-items-start bg-transparent text-light">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold text-truncate">Medical Certificate</div>
                            <span class="text-muted">
                                <?php if (isset($Doc6)) {
                                    echo "Submitted on: " . $Doc6 . " - ";
                                } ?>
                                <?php if (isset($Doc6_status)) {
                                    echo $Doc6_status;
                                } ?>
                            </span>
                        </div>
                        <div>
                        <?php
                            if (isset($medical)) {
                                echo
                                    "
                                <a class='btn btn-sm btn-success' title='View File' href='$medical' target='_blank'>View</a>
                                <a class='btn btn-sm btn-primary' title='Download file' href='$medical' download>Download</a>
                                <a class='btn btn-sm btn-warning' title='Approve file' href='../Components/Proccess/ResourceProccess.php?ID=$userID&file=Doc6&status=1'>Approve</a>
                                <a class='btn btn-sm btn-danger' title='Request for Resubmission of file' href='../Components/Proccess/ResourceProccess.php?ID=$userID&file=Doc6&status=2'>Resubmit</a>
                                ";
                            } else {
                                echo "No file uploaded yet";
                            }
                            ?>
                        </div>
                    </li>
                    <li
                        class="list-group-item d-flex justify-content-between align-items-start bg-transparent text-light">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold text-truncate">Good Moral Certificate</div>
                            <span class="text-muted">
                                <?php if (isset($Doc7)) {
                                    echo "Submitted on: " . $Doc7 . " - ";
                                } ?>
                                <?php if (isset($Doc7_status)) {
                                    echo $Doc7_status;
                                } ?>
                            </span>
                        </div>
                        <div>
                        <?php
                            if (isset($GMcert)) {
                                echo
                                    "
                                <a class='btn btn-sm btn-success' title='View File' href='$GMcert' target='_blank'>View</a>
                                <a class='btn btn-sm btn-primary' title='Download file' href='$GMcert' download>Download</a>
                                <a class='btn btn-sm btn-warning' title='Approve file' href='../Components/Proccess/ResourceProccess.php?ID=$userID&file=Doc7&status=1'>Approve</a>
                                <a class='btn btn-sm btn-danger' title='Request for Resubmission of file' href='../Components/Proccess/ResourceProccess.php?ID=$userID&file=Doc7&status=2'>Resubmit</a>
                                ";
                            } else {
                                echo "No file uploaded yet";
                            }
                            ?>
                        </div>
                    </li>
                    <li
                        class="list-group-item d-flex justify-content-between align-items-start bg-transparent text-light">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold text-truncate">Registration Form</div>
                            <span class="text-muted">
                                <?php if (isset($Doc8)) {
                                    echo "Submitted on: " . $Doc8 . " - ";
                                } ?>
                                <?php if (isset($Doc8_status)) {
                                    echo $Doc8_status;
                                } ?>
                            </span>
                        </div>
                        <div>
                        <?php
                            if (isset($regform)) {
                                echo
                                    "
                                <a class='btn btn-sm btn-success' title='View File' href='$regform' target='_blank'>View</a>
                                <a class='btn btn-sm btn-primary' title='Download file' href='$regform' download>Download</a>
                                <a class='btn btn-sm btn-warning' title='Approve file' href='../Components/Proccess/ResourceProccess.php?ID=$userID&file=Doc8&status=1'>Approve</a>
                                <a class='btn btn-sm btn-danger' title='Request for Resubmission of file' href='../Components/Proccess/ResourceProccess.php?ID=$userID&file=Doc8&status=2'>Resubmit</a>
                                ";
                            } else {
                                echo "No file uploaded yet";
                            }
                            ?>
                        </div>
                    </li>
                    <li
                        class="list-group-item d-flex justify-content-between align-items-start bg-transparent text-light">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold text-truncate">Parental Consent Form</div>
                            <span class="text-muted">
                                <?php if (isset($Doc9)) {
                                    echo "Submitted on: " . $Doc9 . " - ";
                                } ?>
                                <?php if (isset($Doc9_status)) {
                                    echo $Doc9_status;
                                } ?>
                            </span>
                        </div>
                        <div>
                        <?php
                            if (isset($consent)) {
                                echo
                                    "
                                <a class='btn btn-sm btn-success' title='View File' href='$consent' target='_blank'>View</a>
                                <a class='btn btn-sm btn-primary' title='Download file' href='$consent' download>Download</a>
                                <a class='btn btn-sm btn-warning' title='Approve file' href='../Components/Proccess/ResourceProccess.php?ID=$userID&file=Doc9&status=1'>Approve</a>
                                <a class='btn btn-sm btn-danger' title='Request for Resubmission of file' href='../Components/Proccess/ResourceProccess.php?ID=$userID&file=Doc9&status=2'>Resubmit</a>
                                ";
                            } else {
                                echo "No file uploaded yet";
                            }
                            ?>
                        </div>
                    </li>
                    <li
                        class="list-group-item d-flex justify-content-between align-items-start bg-transparent text-light">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold text-truncate">Evaluation Form</div>
                            <span class="text-muted">
                                <?php if (isset($Doc10)) {
                                    echo "Submitted on: " . $Doc10 . " - ";
                                } ?>
                                <?php if (isset($Doc10_status)) {
                                    echo $Doc10_status;
                                } ?>
                            </span>
                        </div>
                        <div>
                        <?php
                            if (isset($eval)) {
                                echo
                                    "
                                <a class='btn btn-sm btn-success' title='View File' href='$eval' target='_blank'>View</a>
                                <a class='btn btn-sm btn-primary' title='Download file' href='$eval' download>Download</a>
                                <a class='btn btn-sm btn-warning' title='Approve file' href='../Components/Proccess/ResourceProccess.php?ID=$userID&file=Doc10&status=1'>Approve</a>
                                <a class='btn btn-sm btn-danger' title='Request for Resubmission of file' href='../Components/Proccess/ResourceProccess.php?ID=$userID&file=Doc10&status=2'>Resubmit</a>
                                ";
                            } else {
                                echo "No file uploaded yet";
                            }
                            ?>
                        </div>
                    </li>
                    <li
                        class="list-group-item d-flex justify-content-between align-items-start bg-transparent text-light">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold text-truncate">Narrative Report</div>
                            <span class="text-muted">
                                <?php if (isset($Doc11)) {
                                    echo "Submitted on: " . $Doc11 . " - ";
                                } ?>
                                <?php if (isset($Doc11_status)) {
                                    echo $Doc11_status;
                                } ?>
                            </span>
                        </div>
                        <div>
                        <?php
                            if (isset($waiver)) {
                                echo
                                    "
                                <a class='btn btn-sm btn-success' title='View File' href='$narrative' target='_blank'>View</a>
                                <a class='btn btn-sm btn-primary' title='Download file' href='$narrative' download>Download</a>
                                <a class='btn btn-sm btn-warning' title='Approve file' href='../Components/Proccess/ResourceProccess.php?ID=$userID&file=Doc11&status=1'>Approve</a>
                                <a class='btn btn-sm btn-danger' title='Request for Resubmission of file' href='../Components/Proccess/ResourceProccess.php?ID=$userID&file=Doc11&status=2'>Resubmit</a>
                                ";
                            } else {
                                echo "No file uploaded yet";
                            }
                            ?>
                        </div>
                    </li>
                    <li
                        class="list-group-item d-flex justify-content-between align-items-start bg-transparent text-light">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold text-truncate">Daily Time Record</div>
                            <span class="text-muted">
                                <?php if (isset($Doc12)) {
                                    echo "Submitted on: " . $Doc12 . " - ";
                                } ?>
                                <?php if (isset($Doc12_status)) {
                                    echo $Doc12_status;
                                } ?>
                            </span>
                        </div>
                        <div>
                        <?php
                            if (isset($timecard)) { 
                                echo
                                    "
                                <a class='btn btn-sm btn-success' title='View File' href='$timecard' target='_blank'>View</a>
                                <a class='btn btn-sm btn-primary' title='Download file' href='$timecard' download>Download</a>
                                <a class='btn btn-sm btn-warning' title='Approve file' href='../Components/Proccess/ResourceProccess.php?ID=$userID&file=Doc12&status=1'>Approve</a>
                                <a class='btn btn-sm btn-danger' title='Request for Resubmission of file' href='../Components/Proccess/ResourceProccess.php?ID=$userID&file=Doc12&status=2'>Resubmit</a>
                                ";
                            } else {
                                echo "No file uploaded yet";
                            }
                            ?>
                        </div>
                    </li>
                    <li
                        class="list-group-item d-flex justify-content-between align-items-start bg-transparent text-light">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold text-wrap">Certificate of Completion</div>
                            <span class="text-muted">
                                <?php if (isset($Doc13)) {
                                    echo "Submitted on: " . $Doc13 . " - ";
                                } ?>
                                <?php if (isset($Doc13_status)) {
                                    echo $Doc13_status;
                                } ?>
                            </span>
                        </div>
                        <div>
                        <?php
                            if (isset($COC)) {
                                echo
                                    "
                                <a class='btn btn-sm btn-success' title='View File' href='$COC' target='_blank'>View</a>
                                <a class='btn btn-sm btn-primary' title='Download file' href='$COC' download>Download</a>
                                <a class='btn btn-sm btn-warning' title='Approve file' href='../Components/Proccess/ResourceProccess.php?ID=$userID&file=Doc13&status=1'>Approve</a>
                                <a class='btn btn-sm btn-danger' title='Request for Resubmission of file' href='../Components/Proccess/ResourceProccess.php?ID=$userID&file=Doc13&status=2'>Resubmit</a>
                                ";
                            } else {
                                echo "No file uploaded yet";
                            }
                            ?>
                        </div>
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <br>
</body>

</html>