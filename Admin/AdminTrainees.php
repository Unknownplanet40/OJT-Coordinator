<?php
session_start();
@include_once("../Database/config.php");
@include_once("../Components/PopupAlert.php");

// prevent user from accessing the page without logging in
if (!isset($_SESSION['DatahasbeenFetched'])) {
    header("Location: ../Login.php");
} else {
    $ShowAlert = true;
}
$_SESSION['Statalert'] = false;
?>


<!DOCTYPE html>
<html lang="en, fil">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../Style/ImportantImport.css">
    <script src="../Script/SidebarScript.js"></script>
    <script src="../Script/SweetAlert2.js"></script>
    <script defer src="../Script/MangeAdminTable.js"></script>
    <script defer src="../Script/Bootstrap_Script/bootstrap.bundle.js"></script>
    <title>Admin Dashboard</title>
</head>

<body class="adminuser" style="min-width: 1080px;">
    <?php
    @include_once '../Components/AdminSidebar.php';
    @include_once '../Components/Modals/AdminTraineeModal.php';
    if (isset($ShowAlert)) {
        echo NewAlertBox();
        $_SESSION['Show'] = false;
    }
    ?>
    <section class="home">
        <div class="text">
            <h1 class="text-success">Trainees</h1>
        </div>
        <div class="container-fluid" style="width: 98%;" id="AdminTable">
            <div class="container-lg table-responsive">
                <div class="container mt-5 text-bg-light rounded border border-1 border-success" style="min-width: fit-content;">
                    <table class="table table-hover table-light align-middle caption-top" id="AccountTable">
                        <caption>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="input-group input-group-sm mb-3">
                                            <!-- In the future, I will add a Category Search -->
                                            <span class="input-group-text input-group-sm"
                                                title="You can search only by name">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="20"
                                                    viewBox="0 -960 960 960" width="20" fill="var(--bs-success)">
                                                    <path
                                                        d="M382.122-330.5q-102.187 0-173.861-71.674Q136.587-473.848 136.587-576q0-102.152 71.674-173.826Q279.935-821.5 382.087-821.5q102.152 0 173.826 71.674 71.674 71.674 71.674 173.861 0 40.859-12.022 76.292-12.021 35.434-33.065 64.956l212.087 212.326q12.674 12.913 12.674 28.945 0 16.033-12.913 28.707-12.674 12.674-29.326 12.674t-29.326-12.674L523.848-375.587q-29.761 21.044-65.434 33.065-35.672 12.022-76.292 12.022Zm-.035-83q67.848 0 115.174-47.326Q544.587-508.152 544.587-576q0-67.848-47.326-115.174Q449.935-738.5 382.087-738.5q-67.848 0-115.174 47.326Q219.587-643.848 219.587-576q0 67.848 47.326 115.174Q314.239-413.5 382.087-413.5Z" />
                                                </svg>
                                            </span>
                                            <input type="search" class="form-control form-control-sm"
                                                placeholder="Search by Name" id="SearchBar">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <!-- piginations -->
                                        <nav aria-label="Page navigation example">
                                            <ul class="pagination pagination-sm">
                                                <li class="page-item">
                                                    <a class="page-link user-select-none" id="Previous"
                                                        style="cursor: pointer;">
                                                        <span aria-hidden="true">&laquo;</span>
                                                    </a>
                                                </li>
                                                <li class="page-item m-1"><small
                                                        class="text-success text-center mx-1">Showing <span
                                                            id="CurrentPage"></span> to <span id="TotalPage"></span> of
                                                        <span id="TotalItem"></span> entries</small>
                                                </li>
                                                <li class="page-item">
                                                    <a class="page-link user-select-none" id="Next"
                                                        style="cursor: pointer;">
                                                        <span aria-hidden="true">&raquo;</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>

                                </div>
                            </div>
                        </caption>
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Avatar</th>
                                <th scope="col">Name</th>
                                <th scope="col">Username</th>
                                <th scope="col">Password</th>
                                <th scope="col" hidden>Unhidden Password</th>
                                <th scope="col">Email</th>
                                <th scope="col">Dept.</th>
                                <th scope="col">Status</th>
                                <th scope="col" hidden>id</th>
                                <th scope="col" class="text-center">Action</th>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM tbl_trainee WHERE role = 'User' ORDER BY name ASC";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                $i = 1;
                                function hiddenPasswordAdmin($password)
                                {
                                    $hiddenPassword = "";
                                    for ($i = 0; $i < strlen($password); $i++) {
                                        $hiddenPassword .= "&#x2022;";
                                    }
                                    return $hiddenPassword;
                                }
                                while ($row = mysqli_fetch_assoc($result)) {

                                    if (isset($row['program'])) {
                                        $status = '<span class="badge bg-success">Assigned</span>';
                                        $modalStatus = 'Assigned';
                                    } else {
                                        $status = '<span class="badge bg-danger">Pending</span>';
                                        $modalStatus = 'Pending';
                                    }

                                    // F - full month name, j - day without leading 0, Y - full year
                                    // h - 12 hour format, i - minutes, s - seconds, a - lowercase AM or PM
                                    // H - 24 hour format, I - capital AM or PM
                                    $dateCreated = date("F j, Y", strtotime($row['account_Created']));

                                    echo '<tr>
                                    <th scope="row">' . $i . '</th>
                                    <td class="text-center"><img src="' . $row['image'] . '" alt="Profile" class="rounded-circle img-fluid" style="width: 50px; height: 50px;"></td>
                                    <td class="text-truncate" style="max-width: 100px;" title="' . $row['name'] . '">' . $row['name'] . '</td>
                                    <td class="text-truncate" style="max-width: 100px;">' . $row['trainee_uname'] . '</td>
                                    <td class="text-truncate" style="max-width: 100px;">' . hiddenPasswordAdmin($row['trainee_pword']) . '</td>
                                    <td hidden>' . $row['trainee_pword'] . '</td>
                                    <td class="text-truncate" style="max-width: 100px;"><a href="mailto:' . $row['email'] . '" class="text-decoration-none text-dark">' . $row['email'] . '</a></td>
                                    <td class="text-truncate" style="max-width: 100px;">' . $row['department'] . '</td>
                                    
                                    <td class="text-truncate" style="max-width: 100px;">' . $status . '</td>
                                    <td hidden>' . $row['UID'] . '</td>
                                    <td class="text-truncate">
                                        <div class="d-flex justify-content-evenly">
                                        <a title="Update this account" id="UpdateAccount" class="btn btn-primary btn-sm"><img src="../Image/Update.svg" alt="Update" style="width: 20px; height: 20px;"></a>
                                        <a title="Asign a OJT to this account" id="AsignAccount" class="btn btn-warning btn-sm"><img src="../Image/Asign.svg" alt="Update" style="width: 20px; height: 20px;"></a>
                                        <a title="View this account" id="ViewAccount" data-bs-toggle="modal" data-bs-target="#AccountDetails" class="btn btn-success btn-sm"><img src="../Image/View.svg" alt="View" style="width: 20px; height: 20px;"></a>
                                        </div>
                                        </td>
                                   </tr>
                                    <script>
                                        var UpdateAccount = document.querySelectorAll("#UpdateAccount");
                                        var ViewAccount = document.querySelectorAll("#ViewAccount");
                                        var AsignAccount = document.querySelectorAll("#AsignAccount");

                                        // Please note that the UpdateAccount, DeleteAccount is from ChatGPT
                                        UpdateAccount[' . ($i - 1) . '].addEventListener("click", () => {
                                            // password confirmation
                                            if (' . $_SESSION['GlobalID'] . ' == ' . $row['UID'] . ') {
                                                window.location.href = "../Components/Proccess/UpdateSuperuserAcc_USER.php?id=' . $row['UID'] . '";
                                            } else if ("' . $row['status'] . '" == 1) {
                                                Swal.fire({
                                                    icon: "error",
                                                    title: "Oops...",
                                                    text: "You cannot update an account that is currently signed in!",
                                                    background: "#fff",
                                                    color: "#000",
                                                });
                                            } else {
                                                /* Swal.fire({
                                                    //text: "You are about to update an account that is not yours. Please enter your password to continue.",
                                                    text: "We need to verify your password first before you can update this account.",
                                                    input: "password",
                                                    inputAttributes: {
                                                      autocapitalize: "off",
                                                      placeholder: "Enter your password",
                                                    },
                                                    showCancelButton: true,
                                                    confirmButtonText: "Confirm",
                                                    showLoaderOnConfirm: true,
                                                    preConfirm: async () => {
                                                      try {
                                                        const password = Swal.getInput().value; // Get the password from the input field
                                                        const response = await fetch("../Components/Proccess/PasswordConfirmation.php?password=" + password);
                                                
                                                        if (!response.ok) {
                                                          throw new Error(response.statusText);
                                                        }
                                                
                                                        return response.json();
                                                      } catch (error) {
                                                        Swal.showValidationMessage(`Request failed: ${error}`);
                                                      }
                                                    },
                                                    allowOutsideClick: () => !Swal.isLoading(),
                                                    background: "#fff",
                                                    color: "#000",
                                                  }).then((result) => {
                                                    if (result.isConfirmed && result.value.valid) {
                                                      window.location.href = "../Components/Proccess/UpdateSuperuserAcc_USER.php?id=' . $row['UID'] . '";
                                                    }
                                                }); */
                                                //warning
                                                Swal.fire({
                                                    icon: "warning",
                                                    title: "Reminder",
                                                    text: "Please be reminded that you can only modify some of the information of this account.",
                                                    allowOutsideClick: false,
                                                    background: "#fff",
                                                    color: "#000",
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        window.location.href = "../Components/Proccess/UpdateSuperuserAcc_USER.php?id=' . $row['UID'] . '";
                                                    }
                                                });
                                            }
                                          });
                                        ViewAccount[' . ($i - 1) . '].addEventListener("click", () => {
                                            let modalName = document.querySelector("#modalName");
                                            let modalEmail = document.querySelector("#modalEmail");
                                            let modalDept = document.querySelector("#modalDept");
                                            
                                          
                                            let modalBirthdate = document.querySelector("#modalBirthdate");
                                            let modalAge = document.querySelector("#modalAge");
                                            let modalCourse = document.querySelector("#modalCourse");
                                            let modalAddress = document.querySelector("#modalAddress");
                                           
                                            let modalStatus = document.querySelector("#modalStatus");
                                            let modalImage = document.querySelector("#modalImage");
                                            let modalUname = document.querySelector("#modalUname");
                                            let modalTitle = document.querySelector("#modalTitle");
                                            let modalID = document.querySelector("#UpID");


                                            modalBirthdate.innerHTML = "' . $row['birthdate'] . '";
                                            modalAge.innerHTML = "' . $row['age'] . '";
                                            modalCourse.innerHTML = "' . $row['course'] . '";
                                            modalAddress.innerHTML = "' . $row['address'] . '";
                                            modalName.innerHTML = "' . $row['name'] . '";
                                            modalEmail.innerHTML = "' . $row['email'] . '";
                                            modalDept.innerHTML = "' . $row['department'] . '";
                                            
                                            modalStatus.innerHTML = "' . $modalStatus . '";
                                            modalImage.setAttribute("src", "' . $row['image'] . '");
                                            modalUname.innerHTML = "' . $row['trainee_uname'] . '";
                                            modalID.innerHTML = "' . $row['UID'] . '";

                                          

                                            let modalEdit = document.querySelector("#modalEdit");
                                            modalEdit.setAttribute("href", "../Components/Proccess/UpdateSuperuserAcc_USER.php?id=' . $row['UID'] . '");
                                        });

                                        AsignAccount[' . ($i - 1) . '].addEventListener("click", () => {
                                            window.location.href = "../Components/Program.php?id=' . $row['UID'] . '&title=' . $row['program'] . '";
                                        });

                                    
                                        
                                        </script>';
                                    $i++;
                                }
                            } else {
                                echo '<tr>
                                <th colspan="10" class="text-center">No data available</th>
                            </tr>';
                            }
                            ?>
                        </tbody>
                        <tfoot id="noResult">
                            <tr>
                                <th colspan="10" class="text-center"><span class="text-secondary">No Result</span>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        </div>
    </section>

</body>

</html>