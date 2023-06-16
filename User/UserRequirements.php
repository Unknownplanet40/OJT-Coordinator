<?php
session_start();
include_once '../Components/PopupAlert.php';
include_once '../Components/ImageUpload.php';

if (isset($_POST['submita'])) {
    pl1upload();
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
                <h4 class="alert-heading">Hi [Username]!</h4>
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
                    <?php
                    $fileExtensions = ['jpg', 'png', 'jpeg'];
                    $profilePicture = '';

                    foreach ($fileExtensions as $extension) {
                        $path = '../uploads/ryanj_Credentials/ryanj_Profile.' . $extension;
                        if (file_exists($path)) {
                            $profilePicture = $path;
                            break;
                        }
                    }

                    if (!empty($profilePicture)) {
                        echo '<img class="rounded shadow-lg" src="' . $profilePicture . '" alt="Profile Picture">';
                    } else {
                        echo '<img class="rounded" src="../Image/Profile.png" alt="Profile Picture">';
                    }

                    ?>

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
                                <div class="fw-bold">Placeholder 1</div>
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
                                <div class="fw-bold">Placeholder 2</div>
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
                                <div class="fw-bold">Placeholder 3</div>
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
                                <div class="fw-bold">Placeholder 4</div>
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
                                <div class="fw-bold">Placeholder 5</div>
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
                                <div class="fw-bold">Placeholder 6</div>
                                <p hidden>comment here</p>
                            </div>
                            <form method="POST" action="<?php basename($_SERVER['PHP_SELF']) ?>"
                                enctype="multipart/form-data">
                                <div class="input-group mb-3">
                                    <input type="submit" class="btn btn-success btn-sm" id="inputGroupFileAddon03"
                                        name="submitf" disabled>
                                    <input type="file" name="pl6" class="form-control form-control-sm"
                                        id="inputGroupFile03" aria-describedby="inputGroupFileAddon03"
                                        aria-label="Upload" style="width: 98px;" disabled>
                                </div>
                            </form>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Placeholder 7</div>
                                <p>You need to resubmit This file because of [reason]</p>
                            </div>
                            <form method="POST" action="<?php basename($_SERVER['PHP_SELF']) ?>"
                                enctype="multipart/form-data">
                                <div class="input-group mb-3">
                                    <input type="submit" class="btn btn-success btn-sm" id="inputGroupFileAddon03"
                                        name="submitg" disabled>
                                    <input type="file" name="pl7" class="form-control form-control-sm"
                                        id="inputGroupFile03" aria-describedby="inputGroupFileAddon03"
                                        aria-label="Upload" style="width: 98px;" disabled>
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