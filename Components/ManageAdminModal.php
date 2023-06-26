<!-- Create Account -->
<div class="modal fade" id="CreateModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content text-bg-dark">
            <form action="" method="POST">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Create Admin Account</h1>
                    <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName" class="form-label">First name</label>
                            <input type="text" class="form-control" id="firstName" name="firstName" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName" class="form-label">Last name</label>
                            <input type="text" class="form-control" id="lastName" name="lastName" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password1" name="password1" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="password" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="password2" name="password2" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="department" class="form-label">Department</label>
                            <select class="form-select" id="department" name="department" required>
                                <option selected hidden></option>
                                <option value="BSCS">Computer Science</option>
                                <option value="BSIT">Information Technology</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-select" id="role" name="role" required>
                                <option selected hidden></option>
                                <option value="administator">Administator</option>
                                <option value="moderator">Moderator(Coordinator)</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Profile Picture</label>
                        <input class="form-control" type="file" id="formFile" name="profilePicture" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Create Account">
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
                <h1 class="modal-title fs-5" id="modalTitle">Your Information</h1>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <img id="modalImage" class="img-fluid rounded-start my-5 mx-2" style="width: 256px;"
                            alt="Profile Picture">
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
