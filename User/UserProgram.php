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
    <title>Program Details</title>
</head>

<body>
<?php include_once '../Components/Sidebar.php';
    if (isset($ShowAlert)) {
        echo NewAlertBox();
        $_SESSION['Show'] = false;
    } ?>
    <section class="home">
        <div class="text">Program Details</div>
        <div style="margin: 10px; width: 98%;">
            <div class="text-center text-uppercase fs-3 fw-bolder">Web Development Internship</div>
            <div style="display: flex; justify-content: center;">
                <div class="fs-5 text-center mt-2 mb-2" style="width: 75%;">
                    Gain practical experience and training in web development through the
                    Web Development Internship. Develop skills in HTML, CSS, and JavaScript, and collaborate
                    on real-world projects under the guidance of experienced mentors.
                </div>
            </div>
            <br>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <ul class="list-group shadow-lg">
                            <li class="list-group-item text-bg-success text-center text-uppercase">Program Objectives:
                            </li>
                            <li class="list-group-item">Proficiency in HTML, CSS, and JavaScript.</li>
                            <li class="list-group-item">Practical skills in front-end and back-end web development.</li>
                            <li class="list-group-item">Knowledge of industry best practices and coding standards.</li>
                            <li class="list-group-item">Collaboration on real-world web projects.</li>
                            <li class="list-group-item">Problem-solving and critical thinking abilities.</li>
                        </ul>
                    </div>
                    <br>
                    <div class="col">
                        <ul class="list-group shadow-lg">
                            <!-- explode text into array seperated by ; -->
                            <li class="list-group-item text-bg-success text-center text-uppercase">Eligibility
                                Requirements:</li>
                            <?php
                            $text = "Enrolled in a computer science or related program.;Basic
                            understanding of HTML, CSS, and JavaScript.;Strong
                            problem-solving skills, attention to detail, ability to work independently and as part of a team.";
                            //$text = "";
                            // if array is empty, explode will return false
                            if ($text == false) {
                                echo "<li class='list-group-item'>No requirements</li>";
                            } else {
                                $array = explode(";", $text);
                                echo "<li class='list-group-item'><span class='fw-bold'>Educational Qualifications: </span>$array[0]</li>";
                                echo "<li class='list-group-item'><span class='fw-bold'>Technical Skills: </span>$array[1]</li>";
                                echo "<li class='list-group-item'><span class='fw-bold'>Personal Qualities: </span>$array[2]</li>";
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <br>
            <div class="text">Progress</div>
            <div>
                <div class="text-center text-uppercase fs-6 fw-bolder">Web Development Internship</div>
                <div class="text-center fs-6 fw-bolder">Progress: 50%</div>
                <br>
                <div style="display: flex; justify-content: center;">
                    <div class="progress bg-secondary" style="width: 75%;">
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-success"
                            role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0"
                            aria-valuemax="100">50%</div>
                    </div>
                </div>
            </div>
            <br>
            <div class="text">Schedeule</div>
            <div class="text">Event Joined</div>
            <div class="d-flex justify-content-center">
                <div style="width: 75%; margin-bottom: 10px;">
                    <ol class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-start list-group-item-success">
                            <div class="ms-2 me-auto ">
                                <div class="fw-bold">Event Name</div>
                            </div>
                            Status
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto ">
                                <div class="fw-light">You don't have any event joined yet.</div>
                            </div>
                            <!--<span class="badge bg-primary rounded-pill">Done</span>-->
                            <!--<span class="badge bg-primary rounded-pill">Ongoing</span>-->
                        </li>
                    </ol>
                </div>
            </div>
            <br>
        </div>
    </section>
    <script src="../Script/SidebarScript.js"></script>
    <script src="../Script/Bootstrap_Script/bootstrap.bundle.js"></script>
</body>

</html>