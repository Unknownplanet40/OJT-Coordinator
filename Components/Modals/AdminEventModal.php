<!-- Modal -->
<div class="modal fade" id="ViewEvent" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content text-bg-dark">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="Mtitle">Event Name</h1>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-4 text-center">
                        <img src="https://via.placeholder.com/256" id="Mimg" class="img-fluid img-thumbnail" alt="..." width="256" height="256">
                    </div>
                    <div class="col-sm-8">
                        <p class="card-text text-wrap" id="Mdesc"></p>
                        <p class="card-text"><small class="text-muted">Event Date:</small>&nbsp;<span id="Mdate"></span></p>
                        <p class="card-text"><small class="text-muted">Event Time:</small>&nbsp;<span id="Mtime"></span></p>
                        <p class="card-text"><small class="text-muted">Event Location:</small>&nbsp;<span id="Mloc"></span></p>
                        <p class="card-text"><small class="text-muted">Event Type:</small>&nbsp;<span id="Mtype"></span></p>
                        <p class="card-text"><small class="text-muted">Event Status:</small>&nbsp;<span id="Mstat"></span></p>
                        <p class="card-text"><small class="text-muted">Event Organizer:</small>&nbsp;<span id="Morg"></span></p>
                        <br>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a type="button" class="btn btn-primary" id="Mup" >Update</a>
                </div>
            </div>
        </div>
    </div>
</div>