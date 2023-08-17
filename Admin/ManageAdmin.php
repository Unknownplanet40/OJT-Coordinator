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
    <script src="../Script/MangeAdminTable.js"></script>
    <script defer src="../Script/Bootstrap_Script/bootstrap.bundle.js"></script>
    <title>Accounts</title>
</head>

<body>
    <?php
    @include_once '../Components/AdminSidebar.php';
    @include_once '../Components/Modals/ManageAdminModal.php';
    if (isset($ShowAlert)) {
        echo NewAlertBox();
        $_SESSION['Show'] = false;
    }
    ?>
    <section class="home">
        <div>
            <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                    <a class="navbar-brand text-success">Accounts</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item" id="Tabs">
                                <a class="nav-link active" id="AdminTab" style="cursor: pointer;">Administrator</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="ModTab" style="cursor: pointer;"
                                    href="../Admin/ManageMod.php">Moderator</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="container-fluid" style="width: 98%;" id="AdminTable">
            <div class="container-lg table-responsive">
                <div class="container mt-5 text-bg-light rounded" style="min-width: fit-content;">
                    <table class="table table-hover table-light align-middle caption-top" id="AccountTable">
                        <caption>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="input-group">
                                            <!-- In the future, I will add a Category Search -->
                                            <span class="input-group-text text-bg-light"
                                                title="You can search only by name">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="20"
                                                    viewBox="0 -960 960 960" width="20" fill="var(--bs-success)">
                                                    <path
                                                        d="M382.122-330.5q-102.187 0-173.861-71.674Q136.587-473.848 136.587-576q0-102.152 71.674-173.826Q279.935-821.5 382.087-821.5q102.152 0 173.826 71.674 71.674 71.674 71.674 173.861 0 40.859-12.022 76.292-12.021 35.434-33.065 64.956l212.087 212.326q12.674 12.913 12.674 28.945 0 16.033-12.913 28.707-12.674 12.674-29.326 12.674t-29.326-12.674L523.848-375.587q-29.761 21.044-65.434 33.065-35.672 12.022-76.292 12.022Zm-.035-83q67.848 0 115.174-47.326Q544.587-508.152 544.587-576q0-67.848-47.326-115.174Q449.935-738.5 382.087-738.5q-67.848 0-115.174 47.326Q219.587-643.848 219.587-576q0 67.848 47.326 115.174Q314.239-413.5 382.087-413.5Z" />
                                                </svg>
                                            </span>
                                            <input type="search" class="form-control text-bg-light"
                                                placeholder="Search by Name" id="SearchBar">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <!-- piginations -->
                                        <nav aria-label="Page navigation example">
                                            <ul class="pagination pagination-sm">
                                                <li class="page-item">
                                                    <a class="page-link text-bg-light user-select-none" id="Previous"
                                                        style="cursor: pointer;">
                                                        <span aria-hidden="true">&laquo;</span>
                                                    </a>
                                                </li>
                                                <li class="page-item m-1 text-bg-light"><small
                                                        class="text-success text-center mx-1">Showing <span
                                                            id="CurrentPage"></span> to <span id="TotalPage"></span> of
                                                        <span id="TotalItem"></span> entries</small>
                                                </li>
                                                <li class="page-item">
                                                    <a class="page-link text-bg-light user-select-none" id="Next"
                                                        style="cursor: pointer;">
                                                        <span aria-hidden="true">&raquo;</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                    <div class="col-4">
                                        <div class="d-flex justify-content-end">
                                            <button type="button" title="Add new account" class="btn btn-primary btn-sm"
                                                data-bs-toggle="modal" data-bs-target="#CreateModal">
                                                <img src="../Image/Create.svg" alt="">
                                                Add Account
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </caption>
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Profile</th>
                                <th scope="col">Name</th>
                                <th scope="col">Username</th>
                                <th scope="col">Password</th>
                                <th scope="col" hidden>Unhidden Password</th>
                                <th scope="col">Email</th>
                                <th scope="col">Dept.</th>
                                <th scope="col">Position</th>
                                <th scope="col">Status</th>
                                <th scope="col" hidden>id</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM tbl_admin WHERE role = 'administrator' ORDER BY name ASC";
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

                                    if ($row['status'] == 1) {
                                        if ($_SESSION['GlobalID'] == $row['UID']) {
                                            $status = '<span class="badge bg-success">You</span>';
                                            $modalStatus = 'Currently Signed In';
                                        } else {
                                            $status = '<span class="badge bg-success">Signed In</span>';
                                            $modalStatus = 'Signed In';
                                        }
                                    } else {
                                        $status = '<span class="badge bg-danger">Signed Out</span>';
                                        $modalStatus = 'Signed Out';
                                    }

                                    if ($row['role'] == 'administrator') {
                                        $row['role'] = 'ADMIN';
                                    } else {
                                        $row['role'] = 'MOD';
                                    }

                                    // format date to Januaray 1, 2021
                                    $dateCreated = date("F j, Y", strtotime($row['date_created']));

                                    if (isset($row['last_login'])) {
                                        $lastlog = date("F j, Y - h:i A", strtotime($row['last_login']));
                                    } else {
                                        $lastlog = "Never";
                                    }



                                    echo '<tr>
                                    <th scope="row">' . $i . '</th>
                                    <td class="text-center"><img src="' . $row['imagePath'] . '" alt="Profile" class="rounded-circle img-fluid" style="width: 50px; height: 50px;"></td>
                                    <td class="text-truncate" style="max-width: 100px;" title="' . $row['name'] . '">' . $row['name'] . '</td>
                                    <td class="text-truncate" style="max-width: 100px;">' . $row['admin_uname'] . '</td>
                                    <td class="text-truncate" style="max-width: 100px;">' . hiddenPasswordAdmin($row['admin_pword']) . '</td>
                                    <td hidden>' . $row['admin_pword'] . '</td>
                                    <td class="text-truncate" style="max-width: 100px;"><a href="mailto:' . $row['admin_email'] . '" class="text-decoration-none text-dark">' . $row['admin_email'] . '</a></td>
                                    <td class="text-truncate" style="max-width: 100px;">' . $row['department'] . '</td>
                                    <td class="text-truncate" style="max-width: 100px;">' . $row['role'] . '</td>
                                    <td class="text-truncate" style="max-width: 100px;">' . $status . '</td>
                                    <td hidden>' . $row['UID'] . '</td>
                                    <td class="text-truncate">
                                        <div class="d-flex justify-content-evenly">
                                        <a title="Update this account" id="UpdateAccount" class="btn btn-primary btn-sm"><img src="../Image/Update.svg" alt="Update" style="width: 20px; height: 20px;"></a>
                                        <a title="Delete this account" id="DeleteAccount" class="btn btn-danger btn-sm"><img src="../Image/Delete.svg" alt="Delete" style="width: 20px; height: 20px;"></a>
                                        <a title="View this account" id="ViewAccount" data-bs-toggle="modal" data-bs-target="#AccountDetails" class="btn btn-success btn-sm"><img src="../Image/View.svg" alt="View" style="width: 20px; height: 20px;"></a>
                                        </div>
                                        </td>
                                    </tr>
                                    <script>
                                        var UpdateAccount = document.querySelectorAll("#UpdateAccount");
                                        var DeleteAccount = document.querySelectorAll("#DeleteAccount");
                                        var ViewAccount = document.querySelectorAll("#ViewAccount");

                                        // Please note that the UpdateAccount, DeleteAccount is from ChatGPT
                                        UpdateAccount[' . ($i - 1) . '].addEventListener("click", () => {
                                            // password confirmation
                                            if (' . $_SESSION['GlobalID'] . ' == ' . $row['UID'] . ') {
                                                window.location.href = "../Components/Proccess/UpdateSuperuserAcc.php?id=' . $row['UID'] . '";
                                            } else if ("' . $row['status'] . '" == 1) {
                                                Swal.fire({
                                                    icon: "error",
                                                    title: "Oops...",
                                                    text: "You cannot update an account that is currently signed in!",
                                                    background: "#fff",
                                                    color: "#000",
                                                });
                                            } else {
                                                Swal.fire({
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
                                                      window.location.href = "../Components/Proccess/UpdateSuperuserAcc.php?id=' . $row['UID'] . '";
                                                    }
                                                  });
                                            }
                                          });
                                        ViewAccount[' . ($i - 1) . '].addEventListener("click", () => {
                                            let modalName = document.querySelector("#modalName");
                                            let modalEmail = document.querySelector("#modalEmail");
                                            let modalDept = document.querySelector("#modalDept");
                                            let modalRole = document.querySelector("#modalRole");
                                            let modalCreated = document.querySelector("#modalCreated");
                                            let modalLastLogin = document.querySelector("#ModalLastLogin");
                                            let modalStatus = document.querySelector("#modalStatus");
                                            let modalImage = document.querySelector("#modalImage");
                                            let modalUname = document.querySelector("#modalUname");
                                            let modalTitle = document.querySelector("#modalTitle");

                                            modalName.innerHTML = "' . $row['name'] . '";
                                            modalEmail.innerHTML = "' . $row['admin_email'] . '";
                                            modalDept.innerHTML = "' . $row['department'] . '";
                                            modalRole.innerHTML = "' . $row['role'] . '";
                                            modalStatus.innerHTML = "' . $modalStatus . '";
                                            modalImage.setAttribute("src", "' . $row['imagePath'] . '");
                                            modalUname.innerHTML = "' . $row['admin_uname'] . '";

                                            if (' . $row['status'] . ' == 1) {
                                                modalTitle.innerHTML = "Your Information";
                                                modalCreated.innerHTML = "' . $dateCreated . '";
                                                modalLastLogin.innerHTML = "Now";
                                            } else {
                                                modalTitle.innerHTML = "Account Information";
                                                modalCreated.innerHTML = "' . $dateCreated . '";
                                                modalLastLogin.innerHTML = "' . $lastlog . '";
                                            }

                                            let modalEdit = document.querySelector("#modalEdit");
                                            modalEdit.setAttribute("href", "../Components/Proccess/UpdateSuperuserAcc.php?id=' . $row['UID'] . '");
                                        });

                                        if (' . $_SESSION['GlobalID'] . ' == ' . $row['UID'] . ') {
                                            DeleteAccount[' . ($i - 1) . '].addEventListener("click", () => {
                                                Swal.fire({
                                                    icon: "error",
                                                    title: "Oops...",
                                                    text: "You cannot delete your own account!",
                                                    background: "#fff",
                                                    color: "#000",
                                                });
                                            });
                                        } else if (' . $row['status'] . ' == 1) {
                                            DeleteAccount[' . ($i - 1) . '].addEventListener("click", () => {
                                                Swal.fire({
                                                    icon: "error",
                                                    title: "Oops...",
                                                    text: "You cannot delete an account that is currently signed in!",
                                                    background: "#fff",
                                                    color: "#000",
                                                });
                                            });
                                        } else {
                                            DeleteAccount[' . ($i - 1) . '].addEventListener("click", () => {
                                                Swal.fire({
                                                    title: "Are you sure?",
                                                    text: "You won\'t be able to revert this!",
                                                    icon: "warning",
                                                    showCancelButton: true,
                                                    confirmButtonColor: "#3085d6",
                                                    cancelButtonColor: "#d33",
                                                    confirmButtonText: "Yes, delete it!",
                                                    background: "#fff",
                                                    color: "#000",
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        Swal.fire({
                                                            text: "Verify your password first before you can delete this account.",
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
                                                                window.location.href = "../Components/Proccess/Delete.php?ID=' . $row['UID'] . '&username=' . $row['admin_uname'] . '";
                                                            } else {
                                                                Swal.fire({
                                                                    icon: "error",
                                                                    title: "Oops...",
                                                                    text: "You entered an incorrect password!",
                                                                    background: "#fff",
                                                                    color: "#000",
                                                                    showConfirmButton: false,
                                                                    timer: 1500,
                                                                });
                                                            }
                                                        });
                                                    }
                                                });
                                            });
                                        }
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
                    </table>
                </div>
            </div>
        </div>
    </section>

</body>

</html>

<!-- if you find comment like this, it means that the code is from ChatGPT -->
<!-- for Update Account,Delete Account, Code is from ChatGPT I just modified it to fit my needs -->