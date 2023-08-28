<div class="container">
    <div class="container-fluid">
        <div class="row row-cols-1">
            <div class="col-xl-4">
                <div style="display:flex; flex-wrap: wrap; align-items: center; justify-content: space-evenly;"
                    style="min-width: 256px;">
                    <?php
                    if (isset($_SESSION['Profile'])) {
                        echo '<img class="rounded shadow-lg img-fluid img-thumbnail" src="' . $_SESSION['Profile'] . '" alt="Profile Picture" style="width: 256px; height: 256px;">';
                    } else {
                        echo '<img class="rounded shadow-lg img-fluid img-thumbnail" src="../Image/Profile.png" alt="Profile Picture" style="width: 256px;">';
                    }
                    ?>
                    <form method="POST" action="UserProfile.php" enctype="multipart/form-data">
                        <div class="d-grid gap-2 w-100">
                            <br>
                            <input type="file" id="fileInput" class="form-control form-control-sm" name="Profile"
                                style="width: 256px;" accept=".png, .jpg, .jpeg, .gif" onchange="checkFileInput()">
                            <input type="submit" id="submitButton" class="btn btn-success" name="imageupload"
                                value="Upload" disabled>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="container-fluid">
                    <div class="inner-content">
                        <form class="row g-3 overflow-auto" id="INCform" method="POST" action="../Components/Uprofile/INCfunction.php">
                            <div class="col-md-12">
                                <label for="Address" class="form-label">Address</label>
                                <input type="text" class="form-control form-control-sm" name="Address" id="INCadd"
                                    placeholder="1234 Main St">
                            </div>
                            <div class="col-md-4">
                                <label for="city" class="form-label">City</label>
                                <input type="text" class="form-control form-control-sm" name="city" id="INCcity"
                                    placeholder="Imus">
                            </div>
                            <div class="col-md-4">
                                <label for="zipcode" class="form-label">Zipcode</label>
                                <input type="text" class="form-control form-control-sm" name="zipcode" id="INCzip"
                                    placeholder="1234" maxlength="4">
                            </div>
                            <div class="col-md-4">
                                <label for="province" class="form-label">Province</label>
                                <input type="text" class="form-control form-control-sm" name="province" id="INCprov"
                                    placeholder="Cavite">
                            </div>
                            <div class="col-md-4">
                                <label for="birth" class="form-label d-block text-truncate">Birth Date</label>
                                <input type="date" class="form-control form-control-sm" name="birth" id="INCbirth"
                                    placeholder="01/01/2000" min="<?php echo $year; ?>-01-01" max="<?php echo $year; ?>-12-31">
                                <small class="blockquote-footer" style="font-size: 12px;">We Detect that your age is <?php echo $age; ?>, thats why you can only choose the year <?php echo $year; ?>.</small>
                            </div>
                            <div class="col-md-4">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control form-control-sm" name="phone" id="INCphone"
                                    placeholder="09123456789" maxlength="11">
                            </div>
                            
                            <div class="col-md-4">
                                <label for="INCdept" class="form-label d-block text-truncate">Dept.</label>
                                <select name="department" class="form-select form-select-sm" id="INCdept">
                                    <option selected hidden>Choose...</option>
                                    <option value="BSIT">BSIT</option>
                                    <option value="BSCS">BSCS</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for="INCsex" class="form-label d-block text-truncate">Sex</label>
                                <select name="gender" class="form-select form-select-sm" id="INCsex">
                                    <option selected hidden>Choose...</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="INCyear" class="form-label d-block text-truncate">Year</label>
                                <select name="Yearlevel" class="form-select form-select-sm" id="INCyear">
                                    <option selected hidden>Choose...</option>
                                    <option value="1">1st Year</option>
                                    <option value="2">2nd Year</option>
                                    <option value="3">3rd Year</option>
                                    <option value="2">4th Year</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="INCsec" class="form-label d-block text-truncate">Section</label>
                                <select name="section" class="form-select form-select-sm" id="INCsec">
                                    <option selected hidden>Choose...</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>
                                    <option value="F">F</option>
                                    <option value="G">G</option>
                                </select>
                            </div>
                            <p class="text-muted">Please fill your information correctly and Honestly to avoid
                                any
                                problems
                                in
                                the future. <br>
                                <small class="blockquote-footer" style="font-size: 12px;">Png, Jpg, Jpeg, Gif
                                    files
                                    are
                                    only
                                    allowed and the maximum file size is
                                    3 MB and best resolution is 256x256.</small>
                            </p>
                            <p class="text-danger text-center" id="INCerror">
                                <script>
                                    setTimeout(function () {
                                        document.getElementById('INCerror').innerHTML = "";
                                    }, 6500);
                                </script>
                            </p>
                            <div class="col-12 text-center">
                                <input type="submit" value="Submit and Continue" class="btn btn-success" name="INC" id="Incomplete">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="content" style="background-color: #e4e9f7;">
            <span class="text-danger" hidden>Note: Uploading an invalid file will result in the deletion of the
                old
                profile
                picture. Please upload a valid file. (No worries, this has been fixed already)</span>
        </div>
    </div>
</div>