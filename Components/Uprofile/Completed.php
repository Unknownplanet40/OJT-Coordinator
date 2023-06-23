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
                                style="width: 256px;" onchange="checkFileInput()">
                            <input type="submit" id="submitButton" class="btn btn-success" name="imageupload"
                                value="Upload" disabled>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="container-fluid">
                    <div class="inner-content">
                        <form class="row g-3 overflow-auto" method="POST" action="../Database/UpdateProfile.php">
                            <div class="col-md-4">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control form-control-sm" name="name" id="name"
                                    placeholder="John Doe" value="<?php echo $_SESSION['GlobalName']; ?>">
                            </div>
                            <div class="col-md-4">
                                <label for="uname" class="form-label d-block text-truncate ">Username</label>
                                <input type="text" class="form-control form-control-sm" name="uname" id="uname"
                                    placeholder="johndoe123" disabled value="<?php echo $_SESSION['GlobalUsername']; ?>">
                            </div>
                            <div class="col-md-2">
                                <label for="pword" class="form-label d-block text-truncate">Password</label>
                                <input type="password" class="form-control form-control-sm" name="pword" id="pword"
                                    placeholder="lorenzoasis1213" value="<?php echo $_SESSION['GlobalPassword']; ?>">
                            </div>
                            <div class="col-md-2">
                                <label for="conpword" class="form-label d-block text-truncate">Confirm</label>
                                <input type="password" class="form-control form-control-sm" name="conpword"
                                    id="conpword" placeholder="lorenzoasis1213" value="<?php echo $_SESSION['GlobalPassword']; ?>">
                            </div>
                            <div class="col-md-8">
                                <label for="Address" class="form-label">Address</label>
                                <input type="text" class="form-control form-control-sm" name="Address" id="Address"
                                    placeholder="1234 Main St" value="<?php echo $_SESSION['GlobalAddress']; ?>">
                            </div>
                            <div class="col-md-2">
                                <label for="city" class="form-label">City</label>
                                <input type="text" class="form-control form-control-sm" name="city" id="city"
                                    placeholder="Imus" value="<?php echo $_SESSION['GlobalCity']; ?>">
                            </div>
                            <div class="col-md-2">
                                <label for="province" class="form-label">Province</label>
                                <input type="text" class="form-control form-control-sm" name="province" id="province"
                                    placeholder="Cavite" value="<?php echo $_SESSION['GlobalProvince']; ?>">
                            </div>
                            <div class="col-md-4">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control form-control-sm" name="email" id="email"
                                    placeholder="lorenzo.Asis@gmail.com" value="<?php echo $_SESSION['GlobalEmail']; ?>">
                            </div>
                            <div class="col-md-4">
                                <label for="birth" class="form-label d-block text-truncate">Birth Date</label>
                                <input type="date" class="form-control form-control-sm" name="birth" id="birth" value="<?php echo $_SESSION['GlobalBirthdate']; ?>">
                            </div>
                            <div class="col-md-4">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control form-control-sm" name="phone" id="phone"
                                    placeholder="09123456789" value="<?php echo $_SESSION['GlobalPhone']; ?>">
                            </div>
                            <div class="col-md-2">
                                <label for="zipcode" class="form-label">Zipcode</label>
                                <input type="text" class="form-control form-control-sm" name="zipcode" id="zipcode"
                                    placeholder="1234" value="<?php echo $_SESSION['GlobalZip']; ?>">
                            </div>
                            <div class="col-md-2">
                                <label for="SID" class="form-label d-block text-truncate">Student ID</label>
                                <input type="text" class="form-control form-control-sm" name="SID" id="SID"
                                    placeholder="123456789" disabled value="<?php echo $_SESSION['GlobalID']; ?>">
                            </div>
                            <div class="col-md-2">
                                <label for="gender" class="form-label d-block text-truncate">Sex</label>
                                <select id="gender" name="gender" class="form-select form-select-sm">
                                    <option selected hidden><?php echo $_SESSION['GlobalGender'];
                                    ?></option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for="Department" class="form-label d-block text-truncate">Dept.</label>
                                <select id="department" name="department" class="form-select form-select-sm" disabled value="<?php echo $_SESSION['GlobalDept']; ?>">
                                    <option selected hidden><?php echo $_SESSION['GlobalDept']; ?></option>
                                    <option value="BSIT">BSIT</option>
                                    <option value="BSCS">BSCS</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for="Section" class="form-label d-block text-truncate">Year</label>
                                <select id="Yearlevel" name="Yearlevel" class="form-select form-select-sm" disabled>
                                    <option selected hidden><?php echo $_SESSION['GlobalYear']; ?></option>
                                    <option value="1">1st Year</option>
                                    <option value="2">2nd Year</option>
                                    <option value="3">3rd Year</option>
                                    <option value="2">4th Year</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for="Section" class="form-label d-block text-truncate">Section</label>
                                <select id="Section" name="Yearlevel" class="form-select form-select-sm" disabled>
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
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-success" name="complete">Confirm</button>
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