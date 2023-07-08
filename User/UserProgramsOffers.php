<?php
session_start();
@include_once("../Database/config.php");
@include_once("../Components/PopupAlert.php");

$_SESSION['SAtheme'] = "light";

if (!isset($_SESSION['DatahasbeenFetched'])) {
    header("Location: ../Login.php");
} elseif ($_SESSION['GlobalProfileCompleted'] == 'false') {
    header("Location: ../User/UserProfile.php");
} else {
    $ShowAlert = true;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style/ImportantImport.css">
    <title>Application</title>
</head>

<body>
    <?php 
    @include_once '../Components/Sidebar.php';
    @include_once '../Components/Modals/ProgramsModals.php';
    if (isset($ShowAlert)) {
        echo NewAlertBox();
        $_SESSION['Show'] = false;
    } ?>
    <section class="home">
        <div class="text">Programs</div>
        <div class="content" style="margin: 10px; width: 98%;">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <h4 class="alert-heading">Reminder!</h4>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <p>We notice that you already have applied for a program. You connot apply for another program until
                    your application is approved, rejected, cancelled, or completed.</p>
                <hr>
                <p class="mb-0">Thank you!</p>
            </div>

            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                    <div class="card h-100">
                        <img style="ratio: 16/9"
                            src="https://resources.workable.com/wp-content/uploads/2018/03/job-offer-featured.png"
                            class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Web Development Internship</h5>
                            <p class="card-text" style="font-size: 14px;">Gain practical experience and training in web
                                development through the
                                Web Development Internship. Develop skills in HTML, CSS, and JavaScript, and collaborate
                                on real-world projects under the guidance of experienced mentors.</p>
                            <small class="text-muted">12 Weeks</small>
                        </div>
                        <div class="card-footer text-end">
                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#First">
                                More
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img style="ratio: 16/9"
                            src="https://www.callcentrehelper.com/images/stories/2022/05/jo-118810083-760.jpg"
                            class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Software Engineering Internship</h5>
                            <p class="card-text" style="font-size: 14px;">Gain practical experience and enhance
                                programming skills through the
                                Software Engineering Internship. Work on real-world software development projects,
                                collaborate with industry professionals, and learn best practices in software
                                engineering.</p>
                            <small class="text-muted">13 Weeks</small>
                        </div>
                        <div class="card-footer text-end">
                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#Second">
                                More
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img style="ratio: 16/9"
                            src="https://resumegenius.com/wp-content/uploads/2019/07/decline-job-offer-500x333.png"
                            class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Digital Marketing Internship</h5>
                            <p class="card-text" style="font-size: 14px;">Gain practical experience and skills in
                                digital marketing through the
                                Digital Marketing Internship. Work on real-world marketing campaigns, learn various
                                digital marketing techniques, and develop a strong foundation in online marketing
                                strategies.</p>
                            <small class="text-muted">12 Weeks</small>
                        </div>
                        <div class="card-footer text-end">
                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#Third">
                                More
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </div>
    </section>
    <script src="../Script/SidebarScript.js"></script>
    <script src="../Script/Bootstrap_Script/bootstrap.bundle.js"></script>
</body>

</html>