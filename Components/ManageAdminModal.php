<!-- Create Account -->
<div class="modal fade" id="CreateModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content text-bg-dark">
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
                                        placeholder="0123456789" required title="USN must be 10 numbers." >
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="CreUname" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="CreUname" name="CreUname"
                                        placeholder="Username" required pattern="[a-z0-9]{5,20}"
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
                                    <label for="showPassword" class="form-label">Show Password</label>
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
                                    <select class="form-select" id="CreDept" name="CreDept" required
                                        title="Select Department">
                                        <option selected hidden></option>
                                        <option value="BSCS">Computer Science</option>
                                        <option value="BSIT">Information Technology</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="CreRole" class="form-label">Role</label>
                                    <select class="form-select" id="CreRole" name="CreRole" required
                                        title="Select Role">
                                        <option selected hidden></option>
                                        <option value="administrator">Administrator</option>
                                        <option value="moderator">Moderator(Coordinator)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="CrePic" class="form-label">Profile Picture</label>
                                <input class="form-control" type="file" id="CrePic" name="CrePic" placeholder="Image"
                                    accept="png, jpg, jpeg, gif" required
                                    title="Image must be in png, jpg, jpeg, gif format.">
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
        <div class="modal-content text-bg-dark">
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
                            <li class="list-group-item bg-dark text-secondary">Name: <span class="text-light"
                                    id="modalName">Not Available</span></li>
                            <li class="list-group-item bg-dark text-secondary">Username: <span class="text-light"
                                    id="modalUname">Not Available</span></li>
                            <li class="list-group-item bg-dark text-secondary">Email: <span class="text-light"
                                    id="modalEmail">Not Available</span></li>
                            <li class="list-group-item bg-dark text-secondary">Department: <span class="text-light"
                                    id="modalDept">Not Available</span></li>
                            <li class="list-group-item bg-dark text-secondary">Role: <span class="text-light"
                                    id="modalRole">Not Available</span></li>
                            <li class="list-group-item bg-dark text-secondary">Date Created: <span class="text-light"
                                    id="modalCreated">Not Available</span></li>
                            <li class="list-group-item bg-dark text-secondary">Last Login: <span class="text-light"
                                    id="ModalLastLogin">Not Available</span></li>
                            <li class="list-group-item bg-dark text-secondary">Status: <span class="text-light"
                                    id="modalStatus">Not Available</span></li>
                        </ul>
                    </div>
                </div>
                <!-- notice -->
                <p class="blockquote-footer">You can't View the <span class="text-warning">Password</span> of this
                    Account. (For Security Purposes)</p>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <a class="btn btn-primary" id="modalEdit">Edit Account</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Edit/Update Account -->
<div class="modal fade" id="EditModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md">
        <div class="modal-content text-bg-dark">
            <form action="" method="POST" enctype="multipart/form-data" id="EditForm">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Edit Account</h1>
                    <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="UpFname" class="form-label">First name</label>
                            <input type="text" class="form-control" id="UpFname" name="UpFname" placeholder="Johnny"
                                required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="UpLname" class="form-label">Last name</label>
                            <input type="text" class="form-control" id="UpLname" name="UpLname" placeholder="Sins"
                                required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="UpUname" class="form-label">Username</label>
                            <input type="text" class="form-control" id="UpUname" name="UpUname"
                                placeholder="johnnysins123" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="Upmail" class="form-label">Email Address</label>
                            <input type="text" class="form-control" id="Upmail" name="Upmail"
                                placeholder="Example@domain.com" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="UpPword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="UpPword" name="UpPword"
                                placeholder="Password" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="UpConPword" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="UpConPword" name="UpConPword"
                                placeholder="Confirm Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="UpDept" class="form-label">Department</label>
                            <select class="form-select" id="UpDept" name="UpDept" required>
                                <option selected hidden></option>
                                <option value="BSCS">Computer Science</option>
                                <option value="BSIT">Information Technology</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="UpRole" class="form-label">Role</label>
                            <select class="form-select" id="UpRole" name="UpRole" required>
                                <option selected hidden></option>
                                <option value="administrator">Administrator</option>
                                <option value="moderator">Moderator(Coordinator)</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="UpPic" class="form-label">Profile Picture</label>
                        <input class="form-control" type="file" id="UpPic" name="UpPic" placeholder="Image"
                            accept="png, jpg, jpeg, gif" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" name="update" value="Update Account">
                </div>
            </form>
        </div>
    </div>
</div>