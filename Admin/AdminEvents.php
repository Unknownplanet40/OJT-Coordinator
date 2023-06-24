<?php
session_start();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style/ImportantImport.css">
    <script src="../Script/SidebarScript.js"></script>
    <script src="../Script/SweetAlert2.js"></script>
    <title>Events</title>
</head>

<body class="dark adminuser" style="min-width: 1080px;">
    <?php
    @include_once '../Components/AdminSidebar.php';
    ?>
    <section class="home">
        <div class="text">Events</div>
        <div class="container-fluid" style="width: 98%;">
            <div class="container-xl my-1 table-responsive">
                <form class="row g-3 rounded mt-1" method="POST" action="#">
                    <div class="col-md-6">
                        <div class="form-floating mb-3 text-light">
                            <input type="text" class="form-control text-bg-dark" id="EventTitle" name="EventTitle"
                                placeholder="Event Name">
                            <label for="EventTitle">Event Name</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3 text-light">
                            <input type="text" class="form-control text-bg-dark" id="EventLocation" name="EventLocation"
                                placeholder="Event Location">
                            <label for="EventLocation">Event Location</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating mb-3 text-light">
                            <input type="date" class="form-control text-bg-dark" id="EventDate" name="EventDate"
                                placeholder="Event Date">
                            <label for="EventDate">Event Date</label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-floating mb-3 text-light">
                            <input type="time" class="form-control text-bg-dark" id="EventStart" name="EventStart"
                                placeholder="Event Start Time">
                            <label for="EventStart">Event Start Time</label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-floating mb-3 text-light">
                            <input type="time" class="form-control text-bg-dark" id="EventEnd" name="EventEnd"
                                placeholder="Event End Time">
                            <label for="EventEnd">Event End Time</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating mb-3 text-light">
                            <select class="form-select text-bg-dark" id="EventType" aria-label="Events Type">
                                <option selected hidden>Choose...</option>
                                <option value="webinar">Webinar</option>
                                <option value="workshop">Workshop</option>
                                <option value="seminar">Seminar</option>
                                <option value="conference">Conference</option>
                                <option value="other">Other</option>
                            </select>
                            <label for="floatingSelect">Event Type</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating mb-3 text-light">
                            <input type="date" class="form-control text-bg-dark" id="EventCompletion"
                                name="EventCompletion" placeholder="Event Completion Date">
                            <label for="EventCompletion">Event Completion Date</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating mb-3 text-light">
                            <input type="text" class="form-control text-bg-dark" id="EventOrganizer"
                                name="EventOrganizer" placeholder="Event Organizer">
                            <label for="EventOrganizer">Event Organizer</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating mb-3 text-light">
                            <input type="number" max="50" min="5" class="form-control text-bg-dark" id="EventSlot"
                                name="EventSlot" placeholder="Event Slot">
                            <label for="EventOrganizer">Event Organizer</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="input-group mb-3 text-bg-dark">
                            <input type="file" class="form-control text-bg-dark" id="EventImage" name="EventImage">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-floating mb-3 text-light">
                            <textarea class="form-control text-bg-dark" placeholder="Event Description"
                                id="EventDescription" name="EventDescription" style="height: 150px"
                                minlength="256"></textarea>
                            <label for="EventDescription">Event Description</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <input type="submit" class="btn btn-primary mb-1 w-50" name="addEvent" id="addEvent"
                            value="Submit">
                        <input type="reset" class="btn btn-danger w-50" name="resetEvent" id="resetEvent" value="Reset">
                    </div>
                    <div class="col">
                        <p class="text-danger error">Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae quos
                            provident enim id numquam voluptates molestiae quasi laborum quis eum quod ex alias
                            deserunt, porro eligendi temporibus sapiente, atque corporis?</p>
                    </div>
                </form>
                <hr class="mt-4 mb-4" style="background-color: white; height: 5px; border-radius: 5px;">

                <!-- search bar -->
                <form action="" method="POST">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control text-bg-dark" placeholder="Search Event"
                            aria-label="Search Event" aria-describedby="button-addon2" name="searchEvent"
                            id="searchEvent">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
                    </div>
                </form>

                <?php @include_once '../Components/CardPlaceholder.php'; ?>
            </div>
        </div>
        </div>
    </section>

</body>

</html>