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

if (isset($_POST['submita'])) {
    Doc1_upload();
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
    <script src="../Script/UreqScript.js"></script>
    <title>Requirements</title>
</head>

<body>
    <?php include_once '../Components/Sidebar.php';
    echo NewAlertBox();
    $_SESSION['Show'] = false;
    ?>
    <section class="home">
        <div class="text">Your Documents</div>
        <div class="announcement" style="margin: 10px; width: 98%; dispaly: flex; justify-content: center;">
            <!-- if the aadmin wants to submit the requirements personally this will show -->
            <div class="alert alert-primary" role="alert">
                <h4 class="alert-heading">Hi <?php echo $_SESSION['GlobalName']; ?>!</h4>
                <p>We have noticed that you have completed your requirements. We would like to have a physical copy of
                    your requirements. Please submit it to the Office of the Registrar on the 2nd floor of the Main
                    Building from 8:00 AM to 5:00 PM, Monday to Friday.</p>
                <p class="mb-0">Thank you!</p>
                <hr>
                <small class="text-muted">This message will be removed once you have submitted your
                    requirements if you already have, please disregard this message.</small>
            </div>
            <div class="content">
                <div class="profile">
                    <img src="<?php isset($_SESSION['Profile']) ? print $_SESSION['Profile'] : print "../Image/Profile.png";?>" alt="">
                    <div class="d-grid gap-2">
                        <br>
                        <button type="button" class="btn btn-success" onclick="location.href='UserProfile.php'">Update
                            Profile</button>
                    </div>
                </div>
                <div class="inner-content">
                    <!-- progress bar -->
                    <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 40%;" aria-valuenow="40"
                            aria-valuemin="0" aria-valuemax="100">40% Done!</div>
                    </div>
                    <br>
                    <ol class="list-group list-group-numbered">
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Resume</div>
                                <p hidden>comment here</p>
                            </div>
                            <form method="POST" action="<?php basename($_SERVER['PHP_SELF']) ?>"
                                enctype="multipart/form-data">
                                <div class="input-group mb-3">
                                    <input type="submit" class="btn btn-success btn-sm" id="SBfile1" name="submita"
                                        disabled>
                                    <input type="file" name="pl1" class="form-control form-control-sm" id="File1"
                                        aria-describedby="SBfile1" aria-label="Upload" style="width: 98px;"
                                        onchange="Cfile1()">
                                </div>
                            </form>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Placement Form</div>
                                <p hidden>comment here</p>
                            </div>
                            <form method="POST" action="<?php basename($_SERVER['PHP_SELF']) ?>"
                                enctype="multipart/form-data">
                                <div class="input-group mb-3">
                                    <input type="submit" class="btn btn-success btn-sm" id="SBfile2" name="submitb"
                                        disabled>
                                    <input type="file" name="pl2" class="form-control form-control-sm" id="File2"
                                        aria-describedby="SBfile2" aria-label="Upload" style="width: 98px;"
                                        onchange="Cfile2()">
                                </div>
                            </form>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Birth Certificate</div>
                                <p hidden>comment here</p>
                            </div>
                            <form method="POST" action="<?php basename($_SERVER['PHP_SELF']) ?>"
                                enctype="multipart/form-data">
                                <div class="input-group mb-3">
                                    <input type="submit" class="btn btn-success btn-sm" id="SBfile3" name="submitc"
                                        disabled>
                                    <input type="file" name="pl3" class="form-control form-control-sm" id="File3"
                                        aria-describedby="SBfile3" aria-label="Upload" style="width: 98px;"
                                        onchange="Cfile3()">
                            </form>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Memorandum of Agreement</div>
                                <p hidden>comment here</p>
                            </div>
                            <form method="POST" action="<?php basename($_SERVER['PHP_SELF']) ?>"
                                enctype="multipart/form-data">
                                <div class="input-group mb-3">
                                    <input type="submit" class="btn btn-success btn-sm" id="SBfile4" name="submitd"
                                        disabled>
                                    <input type="file" name="pl4" class="form-control form-control-sm" id="File4"
                                        aria-describedby="SBfile4" aria-label="Upload" style="width: 98px;"
                                        onchange="Cfile4()">
                                </div>
                            </form>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Waiver</div>
                                <p hidden>comment here</p>
                            </div>
                            <form method="POST" action="<?php basename($_SERVER['PHP_SELF']) ?>"
                                enctype="multipart/form-data">
                                <div class="input-group mb-3">
                                    <input type="submit" class="btn btn-success btn-sm" id="SBfile5" name="submite"
                                        disabled>
                                    <input type="file" name="pl5" class="form-control form-control-sm" id="File5"
                                        aria-describedby="SBfile5" aria-label="Upload" style="width: 98px;"
                                        onchange="Cfile5()">
                                </div>
                            </form>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Medical Certificate</div>
                                <p hidden>comment here</p>
                            </div>
                            <form method="POST" action="<?php basename($_SERVER['PHP_SELF']) ?>"
                                enctype="multipart/form-data">
                                <div class="input-group mb-3">
                                    <input type="submit" class="btn btn-success btn-sm" id="SBfile6"
                                        name="submitf" disabled>
                                    <input type="file" name="pl6" class="form-control form-control-sm"
                                        id="File6" aria-describedby="SBfile6"
                                        aria-label="Upload" style="width: 98px;" onchange="Cfile6()">
                                </div>
                            </form>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Good Moral Certificate</div>
                                <p>You need to resubmit This file because of [reason]</p>
                            </div>
                            <form method="POST" action="<?php basename($_SERVER['PHP_SELF']) ?>"
                                enctype="multipart/form-data">
                                <div class="input-group mb-3">
                                    <input type="submit" class="btn btn-success btn-sm" id="SBfile7"
                                        name="submitg" disabled>
                                    <input type="file" name="pl7" class="form-control form-control-sm"
                                        id="File7" aria-describedby="inputGroupFileAddon03"
                                        aria-label="Upload" style="width: 98px;" onchange="Cfile7()">
                                </div>
                            </form>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Registration Form</div>
                                <p>You need to resubmit This file because of [reason]</p>
                            </div>
                            <form method="POST" action="<?php basename($_SERVER['PHP_SELF']) ?>"
                                enctype="multipart/form-data">
                                <div class="input-group mb-3">
                                    <input type="submit" class="btn btn-success btn-sm" id="SBfile8"
                                        name="submitg" disabled>
                                    <input type="file" name="pl8" class="form-control form-control-sm"
                                        id="File8" aria-describedby="inputGroupFileAddon03"
                                        aria-label="Upload" style="width: 98px;" onchange="Cfile8()">
                                </div>
                            </form>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Parent Consent Form</div>
                                <p>You need to resubmit This file because of [reason]</p>
                            </div>
                            <form method="POST" action="<?php basename($_SERVER['PHP_SELF']) ?>"
                                enctype="multipart/form-data">
                                <div class="input-group mb-3">
                                    <input type="submit" class="btn btn-success btn-sm" id="SBfile9"
                                        name="submitg" disabled>
                                    <input type="file" name="pl9" class="form-control form-control-sm"
                                        id="File9" aria-describedby="inputGroupFileAddon03"
                                        aria-label="Upload" style="width: 98px;" onchange="Cfile9()">
                                </div>
                            </form>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Evaluation Form</div>
                                <p>You need to resubmit This file because of [reason]</p>
                            </div>
                            <form method="POST" action="<?php basename($_SERVER['PHP_SELF']) ?>"
                                enctype="multipart/form-data">
                                <div class="input-group mb-3">
                                    <input type="submit" class="btn btn-success btn-sm" id="SBfile10"
                                        name="submitg" disabled>
                                    <input type="file" name="pl10" class="form-control form-control-sm"
                                        id="File10" aria-describedby="inputGroupFileAddon03"
                                        aria-label="Upload" style="width: 98px;" onchange="Cfile10()">
                                </div>
                            </form>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Narrative Report</div>
                                <p>You need to resubmit This file because of [reason]</p>
                            </div>
                            <form method="POST" action="<?php basename($_SERVER['PHP_SELF']) ?>"
                                enctype="multipart/form-data">
                                <div class="input-group mb-3">
                                    <input type="submit" class="btn btn-success btn-sm" id="SBfile11"
                                        name="submitg" disabled>
                                    <input type="file" name="pl11" class="form-control form-control-sm"
                                        id="File11" aria-describedby="inputGroupFileAddon03"
                                        aria-label="Upload" style="width: 98px;" onchange="Cfile11()">
                                </div>
                            </form>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Daily Time Record</div>
                                <p>You need to resubmit This file because of [reason]</p>
                            </div>
                            <form method="POST" action="<?php basename($_SERVER['PHP_SELF']) ?>"
                                enctype="multipart/form-data">
                                <div class="input-group mb-3">
                                    <input type="submit" class="btn btn-success btn-sm" id="SBfile12"
                                        name="submitg" disabled>
                                    <input type="file" name="pl12" class="form-control form-control-sm"
                                        id="File12" aria-describedby="inputGroupFileAddon03"
                                        aria-label="Upload" style="width: 98px;" onchange="Cfile12()">
                                </div>
                            </form>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Certificate of Completion</div>
                                <p>You need to resubmit This file because of [reason]</p>
                            </div>
                            <form method="POST" action="<?php basename($_SERVER['PHP_SELF']) ?>"
                                enctype="multipart/form-data">
                                <div class="input-group mb-3">
                                    <input type="submit" class="btn btn-success btn-sm" id="SBfile13"
                                        name="submitg" disabled>
                                    <input type="file" name="pl13" class="form-control form-control-sm"
                                        id="File13" aria-describedby="inputGroupFileAddon03"
                                        aria-label="Upload" style="width: 98px;" onchange="Cfile13()">
                                </div>
                            </form>
                        </li>
                    </ol>
                    <small class="text-muted">Note: PDF, JPG, PNG, files are allowed and maximum file size is
                        3mb</small>
                </div>
            </div>
        </div>
        <br>
    </section>
    <script src="../Script/SidebarScript.js"></script>
    <script src="../Script/Bootstrap_Script/bootstrap.bundle.js"></script>
</body>

</html>