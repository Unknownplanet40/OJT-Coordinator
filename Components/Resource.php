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
                <div class="m-2"><a class="btn btn-sm bg-transparent" href="../Admin/AdminTraineeResource.php" title="Back to Trainee Resource"><img src="../Image/backspace.svg" alt="Back" width="24px"></a></div>
                <h3 class="text-center m-2 text-uppercase"><?php echo $name; ?> Resource</h3>
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
                            <span class="text-muted">Submitted on:
                                <?php if (isset($Doc1)) {
                                    echo $Doc1;
                                } ?>
                            </span>
                        </div>
                        <div>
                            <a class="btn btn-sm btn-success" title="View File" href="" target="_blank">View</a>
                            <a class="btn btn-sm btn-primary" title="Download file" href="" download>Download</a>
                            <a class='btn btn-sm btn-warning' title='Approve file'
                                href='fillocation?ID=$userID&file=Doc1&status=1'>Approve</a>
                            <a class="btn btn-sm btn-danger" title="Request for Resubmission of file"
                                href="fillocation?ID=<?php echo $userID; ?>&file=Doc1">Resubmit</a>
                        </div>
                    </li>
                    <li
                        class="list-group-item d-flex justify-content-between align-items-start bg-transparent text-light">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold text-truncate">Placement Form</div>
                            <span class="text-muted">Submitted on:
                                <?php if (isset($Doc2)) {
                                    echo $Doc2;
                                } ?>
                            </span>
                        </div>
                        <div>
                            <a class="btn btn-sm btn-success" title="View File" href="" target="_blank">View</a>
                            <a class="btn btn-sm btn-primary" title="Download file" href="" download>Download</a>
                            <a class='btn btn-sm btn-warning' title='Approve file'
                                href='fillocation?ID=$userID&file=Doc1&status=1'>Approve</a>
                            <a class="btn btn-sm btn-danger" title="Request for Resubmission of file"
                                href="fillocation?ID=<?php echo $userID; ?>&file=Doc2">Resubmit</a>
                        </div>
                    </li>
                    <li
                        class="list-group-item d-flex justify-content-between align-items-start bg-transparent text-light">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold text-truncate">Birth Certificate</div>
                            <span class="text-muted">Submitted on:
                                <?php if (isset($Doc3)) {
                                    echo $Doc3;
                                } ?>
                            </span>
                        </div>
                        <div>
                            <a class="btn btn-sm btn-success" title="View File" href="" target="_blank">View</a>
                            <a class="btn btn-sm btn-primary" title="Download file" href="" download>Download</a>
                            <a class='btn btn-sm btn-warning' title='Approve file'
                                href='fillocation?ID=$userID&file=Doc1&status=1'>Approve</a>
                            <a class="btn btn-sm btn-danger" title="Request for Resubmission of file"
                                href="fillocation?ID=<?php echo $userID; ?>&file=Doc3">Resubmit</a>
                        </div>
                    </li>
                    <li
                        class="list-group-item d-flex justify-content-between align-items-start bg-transparent text-light">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold text-truncate">Memorandum of Agreement</div>
                            <span class="text-muted">Submitted on:
                                <?php if (isset($Doc4)) {
                                    echo $Doc4;
                                } ?>
                            </span>
                        </div>
                        <div>
                            <a class="btn btn-sm btn-success" title="View File" href="" target="_blank">View</a>
                            <a class="btn btn-sm btn-primary" title="Download file" href="" download>Download</a>
                            <a class='btn btn-sm btn-warning' title='Approve file'
                                href='fillocation?ID=$userID&file=Doc1&status=1'>Approve</a>
                            <a class="btn btn-sm btn-danger" title="Request for Resubmission of file"
                                href="fillocation?ID=<?php echo $userID; ?>&file=Doc4">Resubmit</a>
                        </div>
                    </li>
                    <li
                        class="list-group-item d-flex justify-content-between align-items-start bg-transparent text-light">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold text-truncate">Waiver</div>
                            <span class="text-muted">Submitted on:
                                <?php if (isset($Doc5)) {
                                    echo $Doc5;
                                } ?>
                            </span>
                        </div>
                        <div>
                            <a class="btn btn-sm btn-success" title="View File" href="" target="_blank">View</a>
                            <a class="btn btn-sm btn-primary" title="Download file" href="" download>Download</a>
                            <a class='btn btn-sm btn-warning' title='Approve file'
                                href='fillocation?ID=$userID&file=Doc1&status=1'>Approve</a>
                            <a class="btn btn-sm btn-danger" title="Request for Resubmission of file"
                                href="fillocation?ID=<?php echo $userID; ?>&file=Doc5">Resubmit</a>
                        </div>
                    </li>
                    <li
                        class="list-group-item d-flex justify-content-between align-items-start bg-transparent text-light">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold text-truncate">Medical Certificate</div>
                            <span class="text-muted">Submitted on:
                                <?php if (isset($Doc6)) {
                                    echo $Doc6;
                                } ?>
                            </span>
                        </div>
                        <div>
                            <a class="btn btn-sm btn-success" title="View File" href="" target="_blank">View</a>
                            <a class="btn btn-sm btn-primary" title="Download file" href="" download>Download</a>
                            <a class='btn btn-sm btn-warning' title='Approve file'
                                href='fillocation?ID=$userID&file=Doc1&status=1'>Approve</a>
                            <a class="btn btn-sm btn-danger" title="Request for Resubmission of file"
                                href="fillocation?ID=<?php echo $userID; ?>&file=Doc6">Resubmit</a>
                        </div>
                    </li>
                    <li
                        class="list-group-item d-flex justify-content-between align-items-start bg-transparent text-light">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold text-truncate">Good Moral Certificate</div>
                            <span class="text-muted">Submitted on:
                                <?php if (isset($Doc7)) {
                                    echo $Doc7;
                                } ?>
                            </span>
                        </div>
                        <div>
                            <a class="btn btn-sm btn-success" title="View File" href="" target="_blank">View</a>
                            <a class="btn btn-sm btn-primary" title="Download file" href="" download>Download</a>
                            <a class='btn btn-sm btn-warning' title='Approve file'
                                href='fillocation?ID=$userID&file=Doc1&status=1'>Approve</a>
                            <a class="btn btn-sm btn-danger" title="Request for Resubmission of file"
                                href="fillocation?ID=<?php echo $userID; ?>&file=Doc7">Resubmit</a>
                        </div>
                    </li>
                    <li
                        class="list-group-item d-flex justify-content-between align-items-start bg-transparent text-light">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold text-truncate">Registration Form</div>
                            <span class="text-muted">Submitted on:
                                <?php if (isset($Doc8)) {
                                    echo $Doc8;
                                } ?>
                            </span>
                        </div>
                        <div>
                            <a class="btn btn-sm btn-success" title="View File" href="" target="_blank">View</a>
                            <a class="btn btn-sm btn-primary" title="Download file" href="" download>Download</a>
                            <a class='btn btn-sm btn-warning' title='Approve file'
                                href='fillocation?ID=$userID&file=Doc1&status=1'>Approve</a>
                            <a class="btn btn-sm btn-danger" title="Request for Resubmission of file"
                                href="fillocation?ID=<?php echo $userID; ?>&file=Doc8">Resubmit</a>
                        </div>
                    </li>
                    <li
                        class="list-group-item d-flex justify-content-between align-items-start bg-transparent text-light">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold text-truncate">Parental Consent Form</div>
                            <span class="text-muted">Submitted on:
                                <?php if (isset($Doc9)) {
                                    echo $Doc9;
                                } ?>
                            </span>
                        </div>
                        <div>
                            <a class="btn btn-sm btn-success" title="View File" href="" target="_blank">View</a>
                            <a class="btn btn-sm btn-primary" title="Download file" href="" download>Download</a>
                            <a class='btn btn-sm btn-warning' title='Approve file'
                                href='fillocation?ID=$userID&file=Doc1&status=1'>Approve</a>
                            <a class="btn btn-sm btn-danger" title="Request for Resubmission of file"
                                href="fillocation?ID=<?php echo $userID; ?>&file=Doc9">Resubmit</a>
                        </div>
                    </li>
                    <li
                        class="list-group-item d-flex justify-content-between align-items-start bg-transparent text-light">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold text-truncate">Evaluation Form</div>
                            <span class="text-muted">Submitted on:
                                <?php if (isset($Doc10)) {
                                    echo $Doc10;
                                } ?>
                            </span>
                        </div>
                        <div>
                            <a class="btn btn-sm btn-success" title="View File" href="" target="_blank">View</a>
                            <a class="btn btn-sm btn-primary" title="Download file" href="" download>Download</a>
                            <a class='btn btn-sm btn-warning' title='Approve file'
                                href='fillocation?ID=$userID&file=Doc1&status=1'>Approve</a>
                            <a class="btn btn-sm btn-danger" title="Request for Resubmission of file"
                                href="fillocation?ID=<?php echo $userID; ?>&file=Doc10">Resubmit</a>
                        </div>
                    </li>
                    <li
                        class="list-group-item d-flex justify-content-between align-items-start bg-transparent text-light">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold text-truncate">Narrative Report</div>
                            <span class="text-muted">Submitted on:
                                <?php if (isset($Doc11)) {
                                    echo $Doc11;
                                } ?>
                            </span>
                        </div>
                        <div>
                            <a class="btn btn-sm btn-success" title="View File" href="" target="_blank">View</a>
                            <a class="btn btn-sm btn-primary" title="Download file" href="" download>Download</a>
                            <a class='btn btn-sm btn-warning' title='Approve file'
                                href='fillocation?ID=$userID&file=Doc1&status=1'>Approve</a>
                            <a class="btn btn-sm btn-danger" title="Request for Resubmission of file"
                                href="fillocation?ID=<?php echo $userID; ?>&file=Doc11">Resubmit</a>
                        </div>
                    </li>
                    <li
                        class="list-group-item d-flex justify-content-between align-items-start bg-transparent text-light">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold text-truncate">Daily Time Record</div>
                            <span class="text-muted">Submitted on:
                                <?php if (isset($Doc12)) {
                                    echo $Doc12;
                                } ?>
                            </span>
                        </div>
                        <div>
                            <a class="btn btn-sm btn-success" title="View File" href="" target="_blank">View</a>
                            <a class="btn btn-sm btn-primary" title="Download file" href="" download>Download</a>
                            <a class='btn btn-sm btn-warning' title='Approve file'
                                href='fillocation?ID=$userID&file=Doc1&status=1'>Approve</a>
                            <a class="btn btn-sm btn-danger" title="Request for Resubmission of file"
                                href="fillocation?ID=<?php echo $userID; ?>&file=Doc12">Resubmit</a>
                        </div>
                    </li>
                    <li
                        class="list-group-item d-flex justify-content-between align-items-start bg-transparent text-light">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold text-wrap
                            
                            ">Certificate of Completion</div>
                            <span class="text-muted">Submitted on:
                                <?php if (isset($Doc13)) {
                                    echo $Doc13;
                                } ?>
                            </span>
                        </div>
                        <div>
                            <a class="btn btn-sm btn-success" title="View File" href="" target="_blank">View</a>
                            <a class="btn btn-sm btn-primary" title="Download file" href="" download>Download</a>
                            <a class='btn btn-sm btn-warning' title='Approve file'
                                href='fillocation?ID=$userID&file=Doc1&status=1'>Approve</a>
                            <a class="btn btn-sm btn-danger" title="Request for Resubmission of file"
                                href="fillocation?ID=<?php echo $userID; ?>&file=Doc13">Resubmit</a>
                        </div>
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <br>
</body>

</html>