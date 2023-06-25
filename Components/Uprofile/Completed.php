<div class="container">
    <div class="container-fluid">
        <div class="row row-cols-1">
            <div class="col-xl-4">
                <div style="display:flex; flex-wrap: wrap; align-items: center; justify-content: space-evenly;"
                    style="min-width: 256px;">
                    <?php
                    if (isset($_SESSION['Profile'])) {
                        echo '<img class="rounded shadow-lg img-fluid img-thumbnail" src="' . $_SESSION['Profile'] . '" alt="Profile Picture" style="width: 256px;">';
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
                        <form class="row g-3 overflow-auto" id="COMform" method="POST" action="../Components/Uprofile/COMfunction.php">
                            <div class="col-md-4">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control form-control-sm" name="name" id="COMname"
                                    placeholder="John Doe" maxlength="50" value="<?php echo $_SESSION['GlobalName']; ?>">
                            </div>
                            <div class="col-md-4">
                                <label for="uname" class="form-label d-block text-truncate ">Username</label>
                                <input type="text" class="form-control form-control-sm" name="uname" id="COMuname"
                                    placeholder="johndoe123" disabled value="<?php echo $_SESSION['GlobalUsername']; ?>">
                            </div>
                            <div class="col-md-2">
                                <label for="pword" class="form-label d-block text-truncate">Password</label>
                                <input type="password" class="form-control form-control-sm" name="pword" id="COMpword"
                                    placeholder="lorenzoasis1213" value="<?php echo $_SESSION['GlobalPassword']; ?>">
                            </div>
                            <div class="col-md-2">
                                <label for="conpword" class="form-label d-block text-truncate">Confirm</label>
                                <input type="password" class="form-control form-control-sm" name="COMconpword"
                                    id="conpword" placeholder="lorenzoasis1213" value="<?php echo $_SESSION['GlobalPassword']; ?>">
                            </div>
                            <div class="col-md-8">
                                <label for="Address" class="form-label">Address</label>
                                <input type="text" class="form-control form-control-sm" name="Address" id="COMaddress"
                                    placeholder="1234 Main St" value="<?php echo $_SESSION['GlobalAddress']; ?>">
                            </div>
                            <div class="col-md-2">
                                <label for="city" class="form-label">City</label>
                                <input type="text" class="form-control form-control-sm" name="city" id="COMcity"
                                    placeholder="Imus" value="<?php echo $_SESSION['GlobalCity']; ?>">
                            </div>
                            <div class="col-md-2">
                                <label for="province" class="form-label">Province</label>
                                <input type="text" class="form-control form-control-sm" name="province" id="COMprovince"
                                    placeholder="Cavite" value="<?php echo $_SESSION['GlobalProvince']; ?>">
                            </div>
                            <div class="col-md-4">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control form-control-sm" name="email" id="COMemail"
                                    placeholder="lorenzo.Asis@gmail.com" value="<?php echo $_SESSION['GlobalEmail']; ?>">
                            </div>
                            <div class="col-md-4">
                                <label for="birth" class="form-label d-block text-truncate">Birth Date</label>
                                <input type="date" class="form-control form-control-sm" name="birth" id="COMbirth value="<?php echo $_SESSION['GlobalBirthdate']; ?>">
                            </div>
                            <div class="col-md-2">
                                <label for="COMage" class="form-label">Age</label>
                                <input type="text" class="form-control form-control-sm" name="age" id="COMage"
                                    placeholder="99+" maxlength="11" value="<?php echo $_SESSION['GlobalAge']; ?>">
                            </div>
                            <div class="col-md-2">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control form-control-sm" name="phone" id="COMphone"
                                    placeholder="09123456789" maxlength="11" value="<?php echo $_SESSION['GlobalPhone']; ?>">
                            </div>
                            <div class="col-md-2">
                                <label for="zipcode" class="form-label">Zipcode</label>
                                <input type="text" class="form-control form-control-sm" name="zipcode" id="COMzipcode"
                                    placeholder="1234" maxlength="4" value="<?php echo $_SESSION['GlobalZip']; ?>">
                            </div>
                            <div class="col-md-2">
                                <label for="SID" class="form-label d-block text-truncate">Student ID</label>
                                <input type="text" class="form-control form-control-sm" name="SID" id="COMSID"
                                    placeholder="123456789" disabled value="<?php echo $_SESSION['GlobalID']; ?>">
                            </div>
                            <div class="col-md-2">
                                <label for="COMgender" class="form-label d-block text-truncate">Sex</label>
                                <select id="COMgender" name="gender" class="form-select form-select-sm">
                                    <option selected hidden><?php echo $_SESSION['GlobalGender'];
                                    ?></option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for="COMdept" class="form-label d-block text-truncate">Dept.</label>
                                <select id="COMdept" name="department" class="form-select form-select-sm" disabled value="<?php echo $_SESSION['GlobalDept']; ?>">
                                    <option selected hidden><?php echo $_SESSION['GlobalDept']; ?></option>
                                    <option value="BSIT">BSIT</option>
                                    <option value="BSCS">BSCS</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for="COMyearlevel" class="form-label d-block text-truncate">Year</label>
                                <select id="COMyearlevel" name="Yearlevel" class="form-select form-select-sm" disabled>
                                    <option selected hidden><?php echo $_SESSION['GlobalYear']; ?></option>
                                    <option value="1">1st Year</option>
                                    <option value="2">2nd Year</option>
                                    <option value="3">3rd Year</option>
                                    <option value="2">4th Year</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for="COMsec" class="form-label d-block text-truncate">Section</label>
                                <select id="COMsec" name="Section" class="form-select form-select-sm" disabled>
                                    <option selected hidden><?php echo $_SESSION['GlobalSection']; ?></option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>
                                    <option value="F">F</option>
                                    <option value="G">G</option>
                                </select>
                            </div>
                            <div class="col-12" hidden>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                    <label class="form-check-label" for="gridCheck">
                                        Check me out
                                    </label>
                                </div>
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
                                <input type="submit" value="Update Info" class="btn btn-success" name="COM" id="Complete">
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
                picture. Please upload a valid file. (This has been Fix)</span>
        </div>
    </div>
</div>