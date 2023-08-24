<!-- Modal -->
<div class="modal fade" id="ViewProg" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-break" id="Vtitle">Event Name</h1>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-4 text-center">
                        <img src="https://via.placeholder.com/256" id="Vimg" class="img-fluid img-thumbnail" alt="...">
                    </div>
                    <div class="col-sm-8">
                        <p class="card-text text-wrap text-break" id="Vdesc" style="text-align: justify;"></p>
                        <hr>
                        <p class="card-text"><small class="text-muted">Event Date:</small>&nbsp;<span id="Vdate"></span></p>
                        <p class="card-text"><small class="text-muted">Time (Time In/Out):</small>&nbsp;<span id="Vtime"></span></p>
                        <p class="card-text"><small class="text-muted">Location:</small>&nbsp;<span id="Vloc"></span></p>
                        <p class="card-text"><small class="text-muted">Duration:</small>&nbsp;<span id="Vtype"></span> Weeks</p>
                        <p class="card-text"><small class="text-muted">Status:</small>&nbsp;<span id="Vstat"></span></p>
                        <p class="card-text"><small class="text-muted">Supervisor:</small>&nbsp;<span id="Vorg"></span></p>
                        <br>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a type="button" class="btn btn-primary" id="Vup" >Update</a>
                </div>
            </div>
        </div>
    </div>
</div>