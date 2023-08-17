<!-- Create Account -->
<div class="modal fade" id="CreateModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <form action="../Components/Proccess/CreateSuperuserAcc.php" method="POST" enctype="multipart/form-data"
                id="CreateForm">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Create Admin Account</h1>
                    <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
                </div>
                <div class="modal-body">
                    <p class="text-muted">Note: You can hover the input fields to see the requirements needed.</p>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="CreFname" class="form-label">First name</label>
                            <input type="text" class="form-control" id="CreFname" name="CreFname" placeholder="Johnny"
                                required pattern="[a-zA-Z]+">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="CreLname" class="form-label">Last name</label>
                            <input type="text" class="form-control" id="CreLname" name="CreLname" placeholder="Sins"
                                required pattern="[a-zA-Z]+" title="Name must be in letters.">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="Cremail" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="Cremail" name="Cremail"
                            placeholder="Example@domain.com" required
                            title="Email must be in Example@domain.com format.">
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="CreUSN" class="form-label">USN</label>
                            <input type="number" class="form-control" id="CreUSN" name="CreUSN"
                                placeholder="Default" disabled title="USN is automatically generated.">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="CreUname" class="form-label">Username</label>
                            <input type="text" class="form-control" id="CreUname" name="CreUname" placeholder="Username"
                                required pattern="[a-z0-9]{5,20}"
                                title="Username must be 5-20 characters with a number no special characters and spaces.">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="CrePword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="CrePword" name="CrePword"
                                placeholder="Password" required
                                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}"
                                title="Password must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters and one special character.">
                            <input class="form-check-input" id="showPassword" type="checkbox">
                            <label for="showPassword" class="form-label user-select-none">Show Password</label>
                            <script>
                                let show = document.getElementById("showPassword");
                                show.checked = false;

                                show.addEventListener("click", function () {
                                    let password = document.getElementById("CrePword");
                                    let conpassword = document.getElementById("CreConPword");
                                    if (show.checked) {
                                        password.type = "text";
                                        conpassword.type = "text";
                                    } else {
                                        password.type = "password";
                                        conpassword.type = "password";
                                    }
                                });
                            </script>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="CreConPword" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="CreConPword" name="CreConPword"
                                placeholder="Confirm Password" required
                                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}"
                                title="Password must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters and one special character.">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="CreDept" class="form-label">Department</label>
                            <select class="form-select" id="CreDept" name="CreDept" required title="Select Department">
                                <option selected hidden>Choose...</option>
                                <option value="BSCS">Computer Science</option>
                                <option value="BSIT">Information Technology</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="CreRole" class="form-label">Role</label>
                            <select class="form-select" id="CreRole" name="CreRole" required title="Select Role">
                                <option selected hidden>Choose...</option>
                                <option value="administrator">Administrator</option>
                                <option value="moderator">Moderator(Coordinator)</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="CrePic" class="form-label">Profile Picture</label>
                        <input class="form-control" type="file" id="CrePic" name="CrePic" placeholder="Image"
                            accept="png, jpg, jpeg, gif" required title="Image must be in png, jpg, jpeg, gif format.">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" name="Create" value="Create Account">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- View Account -->
<div class="modal fade" id="AccountDetails" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalTitle">Information</h1>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4 mb-3 text-center">
                        <img id="modalImage" class="img-fluid rounded-start my-5 mx-2"
                            style="width: 256px; height: 256px;" alt="Profile Picture">
                    </div>
                    <div class="col-md-8 mb-3">
                        <ul class="list-group list-group-flush user-select-none">
                            <li class="list-group-item bg-light text-secondary">Name: <span class="text-dark"
                                    id="modalName">Not Available</span></li>
                            <li class="list-group-item bg-light text-secondary">Username: <span class="text-dark"
                                    id="modalUname">Not Available</span></li>
                            <li class="list-group-item bg-light text-secondary">Email: <span class="text-dark"
                                    id="modalEmail">Not Available</span></li>
                            <li class="list-group-item bg-light text-secondary">Department: <span class="text-dark"
                                    id="modalDept">Not Available</span></li>
                            <li class="list-group-item bg-light text-secondary">Role: <span class="text-dark"
                                    id="modalRole">Not Available</span></li>
                            <li class="list-group-item bg-light text-secondary">Date Created: <span class="text-dark"
                                    id="modalCreated">Not Available</span></li>
                            <li class="list-group-item bg-light text-secondary">Last Login: <span class="text-dark"
                                    id="ModalLastLogin">Not Available</span></li>
                            <li class="list-group-item bg-light text-secondary">Status: <span class="text-dark"
                                    id="modalStatus">Not Available</span></li>
                        </ul>
                    </div>
                </div>
                <!-- notice -->
                <p class="blockquote-footer">You can't View the <span class="text-danger">Password</span> of this
                    Account. (For Security Purposes)</p>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <a class="btn btn-primary" id="modalEdit" hidden>Edit Account</a>
                </div>
            </div>
        </div>
    </div>
</div>