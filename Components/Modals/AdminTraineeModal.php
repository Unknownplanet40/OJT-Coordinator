<!-- Modal -->
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
                            <li class="list-group-item bg-dark text-secondary">Birthdate: <span class="text-light"
                                    id="modalBirthdate">Not Available</span></li>
                            <li class="list-group-item bg-dark text-secondary">Age: <span class="text-light"
                                    id="modalAge">Not Available</span></li>
                            <li class="list-group-item bg-dark text-secondary">Course: <span class="text-light"
                                    id="modalCourse">Not Available</span></li>
                            <li class="list-group-item bg-dark text-secondary">Department: <span class="text-light"
                                    id="modalDept">Not Available</span></li>
                            <li class="list-group-item bg-dark text-secondary">Address: <span class="text-light"
                                    id="modalAddress">Not Available</span></li>
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
                    <a class="btn btn-primary" id="modalEdit" hidden>Edit Account</a>
                </div>
            </div>
        </div>
    </div>
</div>