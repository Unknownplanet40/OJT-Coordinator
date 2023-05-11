<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Bootstrap_5.3.0/css/bootstrap.css">
    <link rel="stylesheet" href="./Styles/AdminDasboard_Style.css">
    <script src="./Script/jQueryv1.9.1.js"></script>
    <script src="./Script/Chart.js"></script>
    <title>Dashboard</title>
</head>

<body>
    <?php include './External/navbar.php'; ?>
    <section class="dashboard">
        <div class="text">Dashboard</div>
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card text-bg-dark">
                        <div class="card-body">
                            <h3 class="card-title text-uppercase text-center">Deployed</h3>
                            <p class="card-text text-center fw-bold" style="font-size: 96px;">17</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card text-bg-dark">
                        <div class="card-body">
                            <h3 class="card-title text-uppercase text-center">Pending</h3>
                            <p class="card-text text-center fw-bold" style="font-size: 96px;">8</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="text" style="padding-top: 0;">Department</div>
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card text-bg-dark">
                        <div class="card-header text-truncate">Bachelor of Science in <span
                                style="color: var(--clr-accent);">Information Technology </span></div>
                        <div class="card-body">
                            <h5 class="card-title">BSIT Head Name</h5>
                            <br>
                            <p class="card-text" style="text-align: justify;">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi
                                assumenda ipsa porro magnam doloribus, ut aspernatur, labore provident, ratione maxime
                                omnis! Quam sapiente laboriosam iste sunt veniam nulla suscipit animi!
                            </p>
                        </div>
                        <div class="card-footer text-end">
                            <h5>Slots: <span class="slots">15 / 20</span></h5>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card text-bg-dark">
                        <div class="card-header text-truncate">Bachelor of Science in <span
                                style="color: var(--clr-accent);">Computer Science</span></div>
                        <div class="card-body">
                            <h5 class="card-title">BSIT Head Name</h5>
                            <br>
                            <p class="card-text" style="text-align: justify;">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi
                                assumenda ipsa porro magnam doloribus, ut aspernatur, labore provident, ratione maxime
                                omnis! Quam sapiente laboriosam iste sunt veniam nulla suscipit animi!
                            </p>
                        </div>
                        <div class="card-footer text-end">
                            <h5>Slots: <span class="slots slots-full">10 / 10</span></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="text" style="padding-top: 0;">Department</div>
        <div style="margin: 0 20px;">
            <nav>
                <ul class="pagination justify-content-end">
                    <li class="page-item disabled">
                        <a class="page-link text-bg-dark" href="#" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link text-bg-dark" href="#">1</a></li>
                    <li class="page-item"><a class="page-link text-bg-dark" href="#">2</a></li>
                    <li class="page-item"><a class="page-link text-bg-dark" href="#">3</a></li>
                    <li class="page-item"><a class="page-link text-bg-dark" href="#">4</a></li>
                    <li class="page-item"><a class="page-link text-bg-dark" href="#">5</a></li>
                    <li class="page-item">
                        <a class="page-link text-bg-dark" href="#" tabindex="1">Next</a>
                    </li>
                </ul>
            </nav>
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th class="text-truncate" scope="col">Name</th>
                        <th class="text-truncate" scope="col">Department</th>
                        <th class="text-truncate" scope="col">Date Started</th>
                        <th class="text-truncate" scope="col">Attendance</th>
                        <th class="text-truncate" scope="col">Status</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <tr>
                        <th scope="row">1</th>
                        <td class="text-truncate">Ryan James Capadocia</td>
                        <td class="text-truncate">BSIT</td>
                        <td class="text-truncate">May 16, 2023</td>
                        <td class="text-truncate">Time In</td>
                        <td class="text-truncate">
                            <h2 class="badge text-bg-success">Active</h2>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td class="text-truncate">James Matthew Veloria</td>
                        <td>BSIT</td>
                        <td class="text-truncate">May 17, 2023</td>
                        <td>Time Out</td>
                        <td>
                            <h2 class="badge text-bg-primary">Completed</h2>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td class="text-truncate">Jeric Geo Dayandante</td>
                        <td>BSIT</td>
                        <td class="text-truncate">May 18, 2023</td>
                        <td>Time Out</td>
                        <td>
                            <h2 class="badge text-bg-warning">Pending</h2>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td class="text-truncate">Brandon Logon</td>
                        <td>BSCS</td>
                        <td class="text-truncate">May 19, 2023</td>
                        <td>Time Out</td>
                        <td>
                            <h2 class="badge text-bg-success">Active</h2>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">5</th>
                        <td class="text-truncate">Lorenzo Asis</td>
                        <td>BSCS</td>
                        <td class="text-truncate">May 20, 2023</td>
                        <td>Time Out</td>
                        <td>
                            <h2 class="badge text-bg-warning">Pending</h2>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
        <hr>
        <div style="margin: 0 20px;">
            <?php include './External/AdminChart.php' ?>
        </div>
        <br>
    </section>
    <script src="./Bootstrap_5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>