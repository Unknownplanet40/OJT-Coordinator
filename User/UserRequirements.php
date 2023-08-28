<?php
session_start();
@include_once("../Database/config.php");
include_once '../Components/FileUpload.php';
@include_once("../Components/PopupAlert.php");

$_SESSION['SAtheme'] = "light";

if (!isset($_SESSION['DatahasbeenFetched'])) {
    header("Location: ../Login.php");
} elseif ($_SESSION['GlobalProfileCompleted'] == 'false') {
    header("Location: ../User/UserProfile.php");
} else {
    $ShowAlert = true;
}

$acceptedfile = array('pdf', 'docx', 'doc', 'png', 'jpg', 'jpeg');

if (isset($_POST['submita'])) {
    Document_upload('Resume', 'pl1', 'resume', 'Doc1_date', 'Doc1_stat');
}

if (isset($_POST['submitb'])) {
    Document_upload('PlacementForm', 'pl2', 'placement', 'Doc2_date', 'Doc2_stat');
}

if (isset($_POST['submitc'])) {
    Document_upload('BirthCertificate', 'pl3', 'Birth', 'Doc3_date', 'Doc3_stat');
}

if (isset($_POST['submitd'])) {
    Document_upload('MemorandumOfAgreement', 'pl4', 'MoA', 'Doc4_date', 'Doc4_stat');
}

if (isset($_POST['submite'])) {
    Document_upload('Waiver', 'pl5', 'Waiver', 'Doc5_date', 'Doc5_stat');
}

if (isset($_POST['submitf'])) {
    Document_upload('MedicalCertificate', 'pl6', 'MedCert', 'Doc6_date', 'Doc6_stat');
}

if (isset($_POST['submitg'])) {
    Document_upload('GoodMoralCertificate', 'pl7', 'GMCert', 'Doc7_date', 'Doc7_stat');
}

if (isset($_POST['submith'])) {
    Document_upload('RegistrationForm', 'pl8', 'RegForm', 'Doc8_date', 'Doc8_stat');
}

if (isset($_POST['submitj'])) {
    Document_upload('EvaluationForm', 'pl10', 'Evaform', 'Doc10_date', 'Doc10_stat');
}

if (isset($_POST['submitk'])) {
    Document_upload('NarrativeReport', 'pl11', 'NarraForm', 'Doc11_date', 'Doc11_stat');
}

if (isset($_POST['submitl'])) {
    Document_upload('DailyTimeRecord', 'pl12', 'TimeCard', 'Doc12_date', 'Doc12_stat');
}

if (isset($_POST['submitm'])) {
    Document_upload('CertificateOfCompletion', 'pl13', 'COC', 'Doc13_date', 'Doc13_stat');
}

?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style/ImportantImport.css">
    <link rel="stylesheet" href="../Style/ReqStyle.css">
    <script src="../Script/SweetAlert2.js"></script>
    <script defer src="../Script/SidebarScript.js"></script>
    <script defer src="../Script/UreqScript.js"></script>
    <script defer src="../Script/Bootstrap_Script/bootstrap.bundle.js"></script>
    <title>Requirements</title>
</head>

<body>
    <?php include_once '../Components/Sidebar.php';
    echo NewAlertBox();
    $_SESSION['Show'] = false;
    unset($_SESSION['message']);
    unset($_SESSION['icon']);

    // check if the current user has already submitted the requirements
    $sql = "SELECT * FROM tbl_resource WHERE UID = '" . $_SESSION['GlobalID'] . "'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        if ($row['resume'] != null) {
            if ($row['Doc1_stat'] == 0 || $row['Doc1_stat'] == 1) {
                $Resume = "hidden";
            } else {
                $Resume = "";
                $mess = "You need to resubmit This file!";
            }
        } else {
            $Resume = "";
        }
        if ($row['placement'] != null) {
            if ($row['Doc2_stat'] == 0 || $row['Doc2_stat'] == 1) {
                $PlacementForm = "hidden";
            } else {
                $PlacementForm = "";
            }
        } else {
            $PlacementForm = "";
        }
        if ($row['Birth'] != null) {
            if ($row['Doc3_stat'] == 0 || $row['Doc3_stat'] == 1) {
                $BirthCertificate = "hidden";
            } else {
                $BirthCertificate = "";
            }
        } else {
            $BirthCertificate = "";
        }
        if ($row['MoA'] != null) {
            if ($row['Doc4_stat'] == 0 || $row['Doc4_stat'] == 1) {
                $MemorandumOfAgreement = "hidden";
            } else {
                $MemorandumOfAgreement = "";
            }
        } else {
            $MemorandumOfAgreement = "";
        }
        if ($row['Waiver'] != null) {
            if ($row['Doc5_stat'] == 0 || $row['Doc5_stat'] == 1) {
                $Waiver = "hidden";
            } else {
                $Waiver = "";
            }
        } else {
            $Waiver = "";
        }
        if ($row['MedCert'] != null) {
            if ($row['Doc6_stat'] == 0 || $row['Doc6_stat'] == 1) {
                $MedicalCertificate = "hidden";
            } else {
                $MedicalCertificate = "";
            }
        } else {
            $MedicalCertificate = "";
        }
        if ($row['GMCert'] != null) {
            if ($row['Doc7_stat'] == 0 || $row['Doc7_stat'] == 1) {
                $GoodMoralCertificate = "hidden";
            } else {
                $GoodMoralCertificate = "";
            }
        } else {
            $GoodMoralCertificate = "";
        }
        if ($row['RegForm'] != null) {
            if ($row['Doc8_stat'] == 0 || $row['Doc8_stat'] == 1) {
                $RegistrationForm = "hidden";
            } else {
                $RegistrationForm = "";
            }
        } else {
            $RegistrationForm = "";
        }

        if ($row['Evaform'] != null) {
            if ($row['Doc10_stat'] == 0 || $row['Doc10_stat'] == 1) {
                $EvaluationForm = "hidden";
            } else {
                $EvaluationForm = "";
            }
        } else {
            $EvaluationForm = "";
        }
        if ($row['NarraForm'] != null) {
            if ($row['Doc11_stat'] == 0 || $row['Doc11_stat'] == 1) {
                $NarrativeReport = "hidden";
            } else {
                $NarrativeReport = "";
            }
        } else {
            $NarrativeReport = "";
        }
        if ($row['TimeCard'] != null) {
            if ($row['Doc12_stat'] == 0 || $row['Doc12_stat'] == 1) {
                $DailyTimeRecord = "hidden";
            } else {
                $DailyTimeRecord = "";
            }
        } else {
            $DailyTimeRecord = "";
        }
        if ($row['COC'] != null) {
            if ($row['Doc13_stat'] == 0 || $row['Doc13_stat'] == 1) {
                $CertificateOfCompletion = "hidden";
            } else {
                $CertificateOfCompletion = "";
            }
        } else {
            $CertificateOfCompletion = "";
        }

        // check if the user has completed the requirements
        if ($row['Doc1_stat'] == 1 && $row['Doc2_stat'] == 1 && $row['Doc3_stat'] == 1 && $row['Doc4_stat'] == 1 && $row['Doc5_stat'] == 1 && $row['Doc6_stat'] == 1 && $row['Doc7_stat'] == 1 && $row['Doc8_stat'] == 1 && $row['Doc10_stat'] == 1 && $row['Doc11_stat'] == 1 && $row['Doc12_stat'] == 1 && $row['Doc13_stat'] == 1) {
            $sql = "UPDATE tbl_trainee SET Resource_Completed = 1 WHERE UID = '" . $_SESSION['GlobalID'] . "'";
            $result = mysqli_query($conn, $sql);
            $_SESSION['GlobalCompleted'] = 'true';
        } else {
            $sql = "UPDATE tbl_trainee SET Resource_Completed = 0 WHERE UID = '" . $_SESSION['GlobalID'] . "'";
            $result = mysqli_query($conn, $sql);
            $_SESSION['GlobalCompleted'] = 'false';
        }


    } else {
        // when the user has not submitted any requirements
        $sql = "INSERT INTO tbl_resource (UID) VALUES ('" . $_SESSION['GlobalID'] . "')";
        $result = mysqli_query($conn, $sql);
    }
    ?>
    <section class="home">
        <div class="text">Your Documents</div>
        <!-- if trainee has completed the requirements a message will be shown -->
        <div class="container-lg" hidden>
            <div class="alert alert-primary" role="alert">
                <h4 class="alert-heading">Hi
                    <?php echo $_SESSION['GlobalName']; ?>!
                </h4>
                <p>Congratulations! You have completed the requirements. Please wait while we check your
                    documents.<br>
                    Once your documents are verified, We will asign you to a company.</p>
                <p class="mb-0">Thank you!</p>
                <hr>
                <small class="text-muted">This message will be removed once you have submitted your
                    requirements if you already have, please disregard this message.</small>
            </div>
        </div>
        <div class="container-lg">
            <div class="row row-cols-1 row-cols-md-2 g-4">
                <div class="col-md-2">
                    <div class="vstack gap-2 mb-1 mx-auto">
                        <div class="text-center">
                            <img src="<?php isset($_SESSION['Profile']) ? print $_SESSION['Profile'] : print "../Image/Profile.png"; ?>"
                                alt="" width="256" height="256" class="img-fluid">

                        </div>
                        <button type="button" class="btn btn-success" onclick="location.href='UserProfile.php'">Update
                            Profile</button>
                        <!-- refresh button -->
                        <button type="button" class="btn btn-primary" onclick="location.href='UserRequirements.php'"
                            title="Refresh Page to see changes">Refresh</button>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="col-md-12">
                        <?php
                        $sql = "SELECT * FROM tbl_resource WHERE UID = '" . $_SESSION['GlobalID'] . "'";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);

                        $count = 0;
                        $completed = 0;

                        if ($row['resume'] != null) {
                            $count++;
                            $completed++;
                            if ($row['Doc1_stat'] == 2) {
                                $count--;
                                $completed--;
                            }
                        }
                        if ($row['placement'] != null) {
                            $count++;
                            if ($row['Doc2_stat'] == 2) {
                                $count--;
                            }
                        }
                        if ($row['Birth'] != null) {
                            $count++;
                            if ($row['Doc3_stat'] == 2) {
                                $count--;
                            }
                        }
                        if ($row['MoA'] != null) {
                            $count++;
                            if ($row['Doc4_stat'] == 2) {
                                $count--;
                            }
                        }
                        if ($row['Waiver'] != null) {
                            $count++;
                            if ($row['Doc5_stat'] == 2) {
                                $count--;
                            }
                        }
                        if ($row['MedCert'] != null) {
                            $count++;
                            if ($row['Doc6_stat'] == 2) {
                                $count--;
                            }
                        }
                        if ($row['GMCert'] != null) {
                            $count++;
                            if ($row['Doc7_stat'] == 2) {
                                $count--;
                            }
                        }
                        if ($row['RegForm'] != null) {
                            $count++;
                            if ($row['Doc8_stat'] == 2) {
                                $count--;
                            }
                        }

                        if (isset($_SESSION['GlobalCompleted']) && $_SESSION['GlobalCompleted'] == 'true') {
                            if ($row['Evaform'] != null) {
                                $count++;
                                if ($row['Doc10_stat'] == 2) {
                                    $count--;
                                }
                            }
                            if ($row['NarraForm'] != null) {
                                $count++;
                                if ($row['Doc11_stat'] == 2) {
                                    $count--;
                                }
                            }
                            if ($row['TimeCard'] != null) {
                                $count++;
                                if ($row['Doc12_stat'] == 2) {
                                    $count--;
                                }
                            }
                            if ($row['COC'] != null) {
                                $count++;
                                if ($row['Doc13_stat'] == 2) {
                                    $count--;
                                }
                            }
                        }

                        //range between 0 - 8
                        if ($count >= 0 && $count <= 8) {
                            $percentage = ($count / 8) * 100;
                            $Phase = "First Part Completed (1/2)";
                        } elseif ($count >= 9 && $count <= 12) {
                            $percentage = ($count / 12) * 100;
                            $Phase = "Completed";
                        }
                        $percentage = round($percentage);

                        if ($percentage >= 100) {
                            $percentage = 100;
                            if ($count >= 12) {
                                $sql = "UPDATE tbl_trainee SET Resource_Completed = 1 WHERE UID = '" . $_SESSION['GlobalID'] . "'";
                                $result = mysqli_query($conn, $sql);
                            } else {
                                $sql = "UPDATE tbl_trainee SET Resource_Completed = 0 WHERE UID = '" . $_SESSION['GlobalID'] . "'";
                                $result = mysqli_query($conn, $sql);
                            }
                        }

                        if ($percentage == 0 && $percentage <= 25) {
                            $color = "text-bg-danger";
                        } elseif ($percentage >= 26 && $percentage <= 50) {
                            $color = "text-bg-warning";
                        } elseif ($percentage >= 51 && $percentage <= 75) {
                            $color = "text-bg-info";
                        } elseif ($percentage >= 6 && $percentage <= 100) {
                            $color = "text-bg-success";
                        }
                        ?>
                        <div class="progress bg-secondary">
                            <div class="progress-bar <?php echo $color ?> progress-bar-striped progress-bar-animated"
                                role="progressbar" style="width: <?php echo $percentage; ?>%;" aria-valuenow="40"
                                aria-valuemin="0" aria-valuemax="100"><?php echo $percentage == 100 ? $Phase : $percentage . "%"; ?>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-md-12 mt-1" style="min-width: 480px;">
                        <ol class="list-group list-group-numbered">
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">Resume</div>
                                    <p>
                                        <?php if ($row['Doc1_stat'] == 2) {
                                            echo "<span class='text-danger'>File Rejected! <br> Need to upload again.</span>";
                                        } elseif ($row['Doc1_stat'] == 1) {
                                            echo "<span class='text-success'>File Approved!</span>";
                                        } else {
                                            echo "<span class='text-warning'>Pending...</span>";
                                        } ?>
                                    </p>
                                </div>
                                <form method="POST" action="<?php basename($_SERVER['PHP_SELF']) ?>"
                                    enctype="multipart/form-data" <?php if (isset($Resume))
                                        echo $Resume; ?>>
                                    <div class="input-group mb-3">
                                        <input type="submit" class="btn btn-success btn-sm" id="SBfile1" name="submita"
                                            disabled>
                                        <input type="file" name="pl1" class="form-control form-control-sm" id="File1"
                                            aria-describedby="SBfile1" aria-label="Upload" onchange="Cfile1()"
                                            style="width: 98px;" accept=".pdf,.docx,.png,.jpg">
                                    </div>
                                </form>

                                <a href="<?php echo $row['resume'] ?>" target="_blank" class="btn btn-primary btn-sm ms-2"
                                    title="View File" <?php if ($row['resume'] == null) echo "hidden"; ?>><img src="../Image/documents.svg"
                                        alt="" width="20" height="20"></a>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold " title="Memorandum of Agreement">Memorandum of
                                        Agreement
                                    </div>
                                    <p>
                                        <?php if ($row['Doc4_stat'] == 2) {
                                            echo "<span class='text-danger'>File Rejected! <br> Need to upload again.</span>";
                                        } elseif ($row['Doc4_stat'] == 1) {
                                            echo "<span class='text-success'>File Approved!</span>";
                                        } else {
                                            echo "<span class='text-warning'>Pending...</span>";
                                        } ?>
                                    </p>
                                </div>

                                <form method="POST" action="<?php basename($_SERVER['PHP_SELF']) ?>"
                                    enctype="multipart/form-data" <?php if (isset($MemorandumOfAgreement))
                                        echo $MemorandumOfAgreement; ?>>
                                    <div class="input-group mb-3">
                                        <input type="submit" class="btn btn-success btn-sm" id="SBfile4" name="submitd"
                                            disabled>
                                        <input type="file" name="pl4" class="form-control form-control-sm" id="File4"
                                            aria-describedby="SBfile4" aria-label="Upload" onchange="Cfile4()"
                                            style="width: 98px;" accept=".pdf,.docx,.png,.jpg">
                                    </div>
                                </form>

                                <a href="<?php echo $row['MoA'] ?>" target="_blank" class="btn btn-primary btn-sm ms-2"
                                    title="View File" <?php if ($row['MoA'] == null) echo "hidden"; ?>><img src="../Image/documents.svg"
                                        alt="" width="20" height="20"></a>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold" title="Good Moral Certificate">Good Moral
                                        Certificate </div>
                                    <p>
                                        <?php if ($row['Doc7_stat'] == 2) {
                                            echo "<span class='text-danger'>File Rejected! <br> Need to upload again.</span>";
                                        } elseif ($row['Doc7_stat'] == 1) {
                                            echo "<span class='text-success'>File Approved!</span>";
                                        } else {
                                            echo "<span class='text-warning'>Pending...</span>";
                                        } ?>
                                    </p>
                                    </p>
                                </div>
                                <form method="POST" action="<?php basename($_SERVER['PHP_SELF']) ?>"
                                    enctype="multipart/form-data" <?php if (isset($GoodMoralCertificate))
                                        echo $GoodMoralCertificate; ?>>
                                    <div class="input-group mb-3">
                                        <input type="submit" class="btn btn-success btn-sm" id="SBfile7" name="submitg"
                                            disabled>
                                        <input type="file" name="pl7" class="form-control form-control-sm" id="File7"
                                            aria-describedby="inputGroupFileAddon03" aria-label="Upload"
                                            onchange="Cfile7()" style="width: 98px;" accept=".pdf,.docx,.png,.jpg">
                                    </div>
                                </form>

                                <a href="<?php echo $row['GMCert'] ?>" target="_blank" class="btn btn-primary btn-sm ms-2"
                                    title="View File" <?php if ($row['GMCert'] == null) echo "hidden"; ?>><img src="../Image/documents.svg"
                                        alt="" width="20" height="20"></a>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">Waiver</div>
                                    <p>
                                        <?php if ($row['Doc5_stat'] == 2) {
                                            echo "<span class='text-danger'>File Rejected! <br> Need to upload again.</span>";
                                        } elseif ($row['Doc5_stat'] == 1) {
                                            echo "<span class='text-success'>File Approved!</span>";
                                        } else {
                                            echo "<span class='text-warning'>Pending...</span>";
                                        } ?>
                                    </p>
                                </div>
                                <form method="POST" action="<?php basename($_SERVER['PHP_SELF']) ?>"
                                    enctype="multipart/form-data" <?php if (isset($Waiver))
                                        echo $Waiver; ?>>
                                    <div class="input-group mb-3">
                                        <input type="submit" class="btn btn-success btn-sm" id="SBfile5" name="submite"
                                            disabled>
                                        <input type="file" name="pl5" class="form-control form-control-sm" id="File5"
                                            aria-describedby="SBfile5" aria-label="Upload" onchange="Cfile5()"
                                            style="width: 98px;" accept=".pdf,.docx,.png,.jpg">
                                    </div>
                                </form>

                                <a href="<?php echo $row['Waiver'] ?>" target="_blank" class="btn btn-primary btn-sm ms-2"
                                    title="View File" <?php if ($row['Waiver'] == null) echo "hidden"; ?>><img src="../Image/documents.svg"
                                        alt="" width="20" height="20"></a>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">Birth Certificate</div>
                                    <p>
                                        <?php if ($row['Doc3_stat'] == 2) {
                                            echo "<span class='text-danger'>File Rejected! <br> Need to upload again.</span>";
                                        } elseif ($row['Doc3_stat'] == 1) {
                                            echo "<span class='text-success'>File Approved!</span>";
                                        } else {
                                            echo "<span class='text-warning'>Pending...</span>";
                                        } ?>
                                    </p>
                                </div>
                                <form method="POST" action="<?php basename($_SERVER['PHP_SELF']) ?>"
                                    enctype="multipart/form-data" <?php if (isset($BirthCertificate))
                                        echo $BirthCertificate; ?>>
                                    <div class="input-group mb-3">
                                        <input type="submit" class="btn btn-success btn-sm" id="SBfile3" name="submitc"
                                            disabled>
                                        <input type="file" name="pl3" class="form-control form-control-sm" id="File3"
                                            aria-describedby="SBfile3" aria-label="Upload" onchange="Cfile3()"
                                            style="width: 98px;" accept=".pdf,.docx,.png,.jpg">
                                    </div>
                                </form>

                                <a href="<?php echo $row['Birth'] ?>" target="_blank" class="btn btn-primary btn-sm ms-2"
                                    title="View File" <?php if ($row['Birth'] == null) echo "hidden"; ?>><img src="../Image/documents.svg"
                                        alt="" width="20" height="20"></a>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">Medical Certificate</div>
                                    <p>
                                        <?php if ($row['Doc6_stat'] == 2) {
                                            echo "<span class='text-danger'>File Rejected! <br> Need to upload again.</span>";
                                        } elseif ($row['Doc6_stat'] == 1) {
                                            echo "<span class='text-success'>File Approved!</span>";
                                        } else {
                                            echo "<span class='text-warning'>Pending...</span>";
                                        } ?>
                                    </p>
                                </div>
                                <form method="POST" action="<?php basename($_SERVER['PHP_SELF']) ?>"
                                    enctype="multipart/form-data" <?php if (isset($MedicalCertificate))
                                        echo $MedicalCertificate; ?>>
                                    <div class="input-group mb-3">
                                        <input type="submit" class="btn btn-success btn-sm" id="SBfile6" name="submitf"
                                            disabled>
                                        <input type="file" name="pl6" class="form-control form-control-sm" id="File6"
                                            aria-describedby="SBfile6" aria-label="Upload" onchange="Cfile6()"
                                            style="width: 98px;" accept=".pdf,.docx,.png,.jpg">
                                    </div>
                                </form>

                                <a href="<?php echo $row['MedCert'] ?>" target="_blank" class="btn btn-primary btn-sm ms-2"
                                    title="View File" <?php if ($row['MedCert'] == null) echo "hidden"; ?>><img src="../Image/documents.svg"
                                        alt="" width="20" height="20"></a>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">Registration Form</div>
                                    <p>
                                        <?php if ($row['Doc8_stat'] == 2) {
                                            echo "<span class='text-danger'>File Rejected! <br> Need to upload again.</span>";
                                        } elseif ($row['Doc8_stat'] == 1) {
                                            echo "<span class='text-success'>File Approved!</span>";
                                        } else {
                                            echo "<span class='text-warning'>Pending...</span>";
                                        } ?>
                                    </p>
                                </div>
                                <form method="POST" action="<?php basename($_SERVER['PHP_SELF']) ?>"
                                    enctype="multipart/form-data" <?php if (isset($RegistrationForm))
                                        echo $RegistrationForm; ?>>
                                    <div class="input-group mb-3">
                                        <input type="submit" class="btn btn-success btn-sm" id="SBfile8" name="submith"
                                            disabled>
                                        <input type="file" name="pl8" class="form-control form-control-sm" id="File8"
                                            aria-describedby="inputGroupFileAddon03" aria-label="Upload"
                                            onchange="Cfile8()" style="width: 98px;" accept=".pdf,.docx,.png,.jpg">
                                    </div>
                                </form>

                                <a href="<?php echo $row['RegForm'] ?>" target="_blank" class="btn btn-primary btn-sm ms-2"
                                    title="View File" <?php if ($row['RegForm'] == null) echo "hidden"; ?>><img src="../Image/documents.svg"
                                        alt="" width="20" height="20"></a>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">Placement Form</div>
                                    <p>
                                        <?php if ($row['Doc2_stat'] == 2) {
                                            echo "<span class='text-danger'>File Rejected! <br> Need to upload again.</span>";
                                        } elseif ($row['Doc2_stat'] == 1) {
                                            echo "<span class='text-success'>File Approved!</span>";
                                        } else {
                                            echo "<span class='text-warning'>Pending...</span>";
                                        } ?>
                                </div>
                                <form method="POST" action="<?php basename($_SERVER['PHP_SELF']) ?>"
                                    enctype="multipart/form-data" <?php if (isset($PlacementForm))
                                        echo $PlacementForm; ?>>
                                    <div class="input-group mb-3">
                                        <input type="submit" class="btn btn-success btn-sm" id="SBfile2" name="submitb"
                                            disabled>
                                        <input type="file" name="pl2" class="form-control form-control-sm" id="File2"
                                            aria-describedby="SBfile2" aria-label="Upload" onchange="Cfile2()"
                                            style="width: 98px;" accept=".pdf,.docx,.png,.jpg">
                                    </div>
                                </form>

                                <a href="<?php echo $row['placement'] ?>" target="_blank" class="btn btn-primary btn-sm ms-2"
                                    title="View File" <?php if ($row['placement'] == null) echo "hidden"; ?>><img src="../Image/documents.svg"
                                        alt="" width="20" height="20"></a>
                            </li>
                            <?php if (isset($_SESSION['GlobalCompleted']) && $_SESSION['GlobalCompleted'] == 'true') { ?>
                                <!-- This will only show if the user has completed -->
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Evaluation Form</div>
                                        <p>
                                            <?php if ($row['Doc10_stat'] == 2) {
                                                echo "<span class='text-danger'>File Rejected! <br> Need to upload again.</span>";
                                            } elseif ($row['Doc10_stat'] == 1) {
                                                echo "<span class='text-success'>File Approved!</span>";
                                            } else {
                                                echo "<span class='text-warning'>Pending...</span>";
                                            } ?>
                                        </p>
                                    </div>
                                    <form method="POST" action="<?php basename($_SERVER['PHP_SELF']) ?>"
                                        enctype="multipart/form-data" <?php if (isset($EvaluationForm))
                                            echo $EvaluationForm; ?>>
                                        <div class="input-group mb-3">
                                            <input type="submit" class="btn btn-success btn-sm" id="SBfile10" name="submitj"
                                                disabled>
                                            <input type="file" name="pl10" class="form-control form-control-sm" id="File10"
                                                aria-describedby="inputGroupFileAddon03" aria-label="Upload"
                                                onchange="Cfile10()" style="width: 98px;" accept=".pdf,.docx,.png,.jpg">
                                        </div>
                                    </form>

                                    <a href="<?php echo $row['Evaform'] ?>" target="_blank" class="btn btn-primary btn-sm ms-2"
                                        title="View File" <?php if ($row['Evaform'] == null) echo "hidden"; ?>><img src="../Image/documents.svg"
                                            alt="" width="20" height="20"></a>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Narrative Report</div>
                                        <p>
                                            <?php if ($row['Doc11_stat'] == 2) {
                                                echo "<span class='text-danger'>File Rejected! <br> Need to upload again.</span>";
                                            } elseif ($row['Doc11_stat'] == 1) {
                                                echo "<span class='text-success'>File Approved!</span>";
                                            } else {
                                                echo "<span class='text-warning'>Pending...</span>";
                                            } ?>
                                        </p>
                                    </div>
                                    <form method="POST" action="<?php basename($_SERVER['PHP_SELF']) ?>"
                                        enctype="multipart/form-data" <?php if (isset($NarrativeReport))
                                            echo $NarrativeReport; ?>>
                                        <div class="input-group mb-3">
                                            <input type="submit" class="btn btn-success btn-sm" id="SBfile11" name="submitk"
                                                disabled>
                                            <input type="file" name="pl11" class="form-control form-control-sm" id="File11"
                                                aria-describedby="inputGroupFileAddon03" aria-label="Upload"
                                                onchange="Cfile11()" style="width: 98px;" accept=".pdf,.docx,.png,.jpg">
                                        </div>
                                    </form>

                                    <a href="<?php echo $row['NarraForm'] ?>" target="_blank" class="btn btn-primary btn-sm ms-2"
                                        title="View File" <?php if ($row['NarraForm'] == null) echo "hidden"; ?>><img src="../Image/documents.svg"
                                            alt="" width="20" height="20"></a>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Daily Time Record</div>
                                        <p>
                                            <?php if ($row['Doc12_stat'] == 2) {
                                                echo "<span class='text-danger'>File Rejected! <br> Need to upload again.</span>";
                                            } elseif ($row['Doc12_stat'] == 1) {
                                                echo "<span class='text-success'>File Approved!</span>";
                                            } else {
                                                echo "<span class='text-warning'>Pending...</span>";
                                            } ?>
                                        </p>
                                    </div>
                                    <form method="POST" action="<?php basename($_SERVER['PHP_SELF']) ?>"
                                        enctype="multipart/form-data" <?php if (isset($DailyTimeRecord))
                                            echo $DailyTimeRecord; ?>>
                                        <div class="input-group mb-3">
                                            <input type="submit" class="btn btn-success btn-sm" id="SBfile12" name="submitl"
                                                disabled>
                                            <input type="file" name="pl12" class="form-control form-control-sm" id="File12"
                                                aria-describedby="inputGroupFileAddon03" aria-label="Upload"
                                                onchange="Cfile12()" style="width: 98px;" accept=".pdf,.docx,.png,.jpg">
                                        </div>
                                    </form>

                                    <a href="<?php echo $row['TimeCard'] ?>" target="_blank" class="btn btn-primary btn-sm ms-2"
                                        title="View File" <?php if ($row['TimeCard'] == null) echo "hidden"; ?>><img src="../Image/documents.svg"
                                            alt="" width="20" height="20"></a>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold text-truncate" title="Certificate of Completion">COC</div>
                                        <p>
                                            <?php if ($row['Doc13_stat'] == 2) {
                                                echo "<span class='text-danger'>File Rejected! <br> Need to upload again.</span>";
                                            } elseif ($row['Doc13_stat'] == 1) {
                                                echo "<span class='text-success'>File Approved!</span>";
                                            } else {
                                                echo "<span class='text-warning'>Pending...</span>";
                                            } ?>
                                        </p>
                                    </div>
                                    <form method="POST" action="<?php basename($_SERVER['PHP_SELF']) ?>"
                                        enctype="multipart/form-data" <?php if (isset($CertificateOfCompletion))
                                            echo $CertificateOfCompletion; ?>>
                                        <div class="input-group mb-3">
                                            <input type="submit" class="btn btn-success btn-sm" id="SBfile13" name="submitm"
                                                disabled>
                                            <input type="file" name="pl13" class="form-control form-control-sm" id="File13"
                                                aria-describedby="inputGroupFileAddon03" aria-label="Upload"
                                                onchange="Cfile13()" style="width: 98px;" accept=".pdf,.docx,.png,.jpg">
                                        </div>
                                    </form>

                                    <a href="<?php echo $row['COC'] ?>" target="_blank" class="btn btn-primary btn-sm ms-2"
                                        title="View File" <?php if ($row['COC'] == null) echo "hidden"; ?>><img src="../Image/documents.svg"
                                            alt="" width="20" height="20"></a>
                                </li>
                            <?php } ?>
                        </ol>
                    </div>
                    <small class="text-muted">Notes to remember:</small> <br>
                    &bull; <small class="text-muted">Their are <?php echo $count; ?> out of 12 documents submitted.</small> <br>
                    &bull; <small class="text-muted">PDF, JPG, JPEG, and PNG files are allowed and maximum file size
                        is 3mb</small>
                    <br>
                    &bull; <small class="text-muted">You can hover over the file name to view the full form of the
                        abbreviation.</small>
                    <br>
                    &bull; <small class="text-muted">If you have completed your OJT, you can now submit the <b
                            class="text-success">Evaluation
                            Form</b>, <b class="text-success">Narrative Report</b>, <b class="text-success">Daily Time
                            Record</b> and <b class="text-success">Certificate of Completion</b>.</small>
                </div>
            </div>
        </div>
        <br>
    </section>
</body>

</html>