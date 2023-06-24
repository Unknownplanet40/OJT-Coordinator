<?php
session_start();
@include_once("../Database/config.php");
@include_once("../Components/PopupAlert.php");

//1111111

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
    <link rel="stylesheet" href="../Style/TestingDashboard.css">
    <script src="../Script/SweetAlert2.js"></script>
    <title>Dashboard</title>
</head>

<body>
    <?php include_once '../Components/Sidebar.php';
    if (isset($ShowAlert)) {
        echo NewAlertBox();
        $_SESSION['Show'] = false;
    } ?>

    <section class="home">
        <div class="text">Dashboard</div>
        <div class="content" style="margin: 10px; width: 98%;">
            <div class="alert alert-success" role="alert">
                <!-- for the announcement, just change the text inside the <p> tag -->
                <h4 class="alert-heading">Announcement!</h4>
                <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit
                    longer so that you can see how spacing within an alert works with this kind of content.</p>
                <hr>
                <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
            </div>
            <div class="row">
                <div class="col-sm-8">
                    <div class="card h-100">
                        <div class="card-header">
                            Program Joined
                        </div>
                        <!-- this should be the program joined by the user -->
                        <div class="card-body">
                            <h5 class="card-title">Web Development Internship</h5>
                            <p class="card-text">Duration: 12 Weeks</p>
                            <p class="card-text">Start and End Date: January 1, 2023 - March 31, 2023</p>
                            <p class="card-text">Gain practical experience and training in web development through the
                                Web Development Internship. Develop skills in HTML, CSS, and JavaScript, and collaborate
                                on real-world projects under the guidance of experienced mentors.
                            </p>
                        </div>
                        <br>
                        <div class="card-footer">
                            <div class="progress">
                                <!-- this should be the progress of the user in the program -->
                                <!-- just change the width of the div to change the progress -->
                                <div class="progress-bar bg-success" role="progressbar" style="width: 25%;"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25% Complete</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card h-100 card border-success mb-3">
                        <div class="card-header">
                            Events Joined
                        </div>
                        <div class="card-body">
                            <!-- this should be a list of events joined by the user -->
                            <h5 class="card-title"></h5> <!-- Event Name -->
                            <p class="card-text">No events joined yet.</p> <!-- Event Description -->
                            <!-- so on and so forth -->
                            <!--<a href="#" class="btn btn-success" hidden>Go somewhere</a>-->
                        </div>
                    </div>
                </div>
            </div>
            <div class="text">Events</div>

            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                    <div class="card h-100">
                        <img style="ratio: 16/9" src="https://via.placeholder.com/500x256" class="card-img-top"
                            alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Leadership Development Workshop</h5>
                            <p class="card-text">August 25, 2023</p>
                            <p class="card-text">Training Room 3, ABC Company Headquarters</p>
                            <p class="card-text" style="font-size: 14px;">Enhance your leadership skills in this
                                engaging workshop. Learn
                                strategies for effective communication, team building, and decision-making. Limited
                                seats available. Register now!
                            </p>
                            <small class="text-muted">Time: 9:00 AM - 12:00 PM | Available Seats: 30</small>
                        </div>
                        <div class="card-footer text-center">
                            <!-- if the user is already registered, the button should be disabled -->
                            <a href="#" class="btn btn-success">Register</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img style="ratio: 16/9" src="https://via.placeholder.com/500x256" class="card-img-top"
                            alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Digital Marketing Seminar</h5>
                            <p class="card-text">September 10, 2023</p>
                            <p class="card-text">Conference Hall B, XYZ Convention Center</p>
                            <p class="card-text" style="font-size: 14px;">Explore the latest digital marketing trends
                                and strategies. Unlock
                                growth opportunities and boost your online presence. Limited seats available. Reserve
                                your spot today!
                            </p>
                            <small class="text-muted">Time: 2:00 PM - 4:00 PM | Available Seats: 20</small>
                        </div>
                        <div class="card-footer text-center">
                            <a href="#" class="btn btn-success">Register</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img style="ratio: 16/9" src="https://via.placeholder.com/500x256" class="card-img-top"
                            alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Time Management Masterclass</h5>
                            <p class="card-text">October 5, 2023</p>
                            <p class="card-text">Training Room 2, DEF Company Headquarters</p>
                            <p class="card-text" style="font-size: 14px;">Learn essential time management techniques to
                                enhance productivity.
                                Maximize your efficiency and prioritize tasks effectively. Limited seats available.
                                Secure your seat now!</p>
                            <small class="text-muted">Time: 10:00 AM - 12:00 PM | Available Seats: 10</small>
                        </div>
                        <div class="card-footer text-center">
                            <a href="#" class="btn btn-success">Register</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img style="ratio: 16/9" src="https://via.placeholder.com/500x256" class="card-img-top"
                            alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Cybersecurity Awareness Webinar</h5>
                            <p class="card-text">November 12, 2023</p>
                            <p class="card-text">Online Webinar</p>
                            <p class="card-text" style="font-size: 14px;">Protect yourself online. Join our
                                cybersecurity webinar and learn
                                practical tips to safeguard your digital presence. Limited seats available. Sign up now!
                            </p>
                            <small class="text-muted">Time: 3:00 PM - 4:00 PM | Available Seats: 15</small>
                        </div>
                        <div class="card-footer text-center">
                            <a href="#" class="btn btn-success">Register</a>
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

<!-- Path: User\UserDashboard.php -->