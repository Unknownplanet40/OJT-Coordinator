<div class="container">
    <div class="container-fluid">
        <div class="row row-cols-1">
            <div class="col-md-4">
                <div style="display:flex; flex-wrap: wrap; align-items: center; justify-content: space-evenly;">
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
            <div class="col-md-8">
                <div class="container-fluid">
                    <div class="inner-content">
                        <form class="row g-3 overflow-auto" id="COMform" method="POST"
                            action="../Components/Uprofile/COMfunction.php">
                            <div class="col-md-4">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control form-control-sm" name="name" id="COMname"
                                    placeholder="John Doe" maxlength="50"
                                    value="<?php echo $_SESSION['GlobalName']; ?>">
                            </div>
                            <div class="col-md-4">
                                <label for="uname" class="form-label d-block text-truncate ">Username</label>
                                <input type="text" class="form-control form-control-sm" name="uname" id="COMuname"
                                    placeholder="johndoe123" disabled
                                    value="<?php echo $_SESSION['GlobalUsername']; ?>">
                            </div>
                            <div class="col-md-2">
                                <label for="COMage" class="form-label">Age</label>
                                <input type="text" class="form-control form-control-sm" name="age" id="COMage"
                                    placeholder="99+" maxlength="99" value="<?php echo $_SESSION['GlobalAge']; ?>">
                            </div>
                            <div class="col-md-2">
                                <label for="COMgender" class="form-label d-block text-truncate">Sex</label>
                                <select id="COMgender" name="gender" class="form-select form-select-sm"
                                    value="<?php echo $_SESSION['GlobalGender']; ?>">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="pword" class="form-label d-block text-truncate">Password</label>
                                <input type="password" class="form-control form-control-sm" name="pword" id="COMpword"
                                    placeholder="lorenzoasis1213" value="<?php echo $_SESSION['GlobalPassword']; ?>">
                                <input type="checkbox" id="showPassword" class="form-check-input">
                                <label for="showPassword" class="text-muted" title="Show Password"><small
                                        class="form-check-label">Show Password</small></label>
                            </div>
                            <div class="col-md-4">
                                <label for="COMconpword" class="form-label d-block text-truncate">Confirm</label>
                                <input type="password" class="form-control form-control-sm" name="COMconpword"
                                    id="COMconpword" placeholder="lorenzoasis1213"
                                    value="<?php echo $_SESSION['GlobalPassword']; ?>">
                            </div>
                            <div class="col-md-4">
                                <label for="birth" class="form-label d-block text-truncate">Birth Date</label>
                                <input type="date" class="form-control form-control-sm" name="birth" id="COMbirth"
                                    min="<?php echo $year; ?>-01-01" max="<?php echo $year; ?>-12-31"
                                    value="<?php echo $_SESSION['GlobalBirthdate']; ?>">
                            </div>
                            <div class="col-md-4">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control form-control-sm" name="phone" id="COMphone"
                                    placeholder="09123456789" maxlength="11"
                                    value="<?php echo $_SESSION['GlobalPhone']; ?>">
                            </div>
                            <div class="col-md-4">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control form-control-sm" name="email" id="COMemail"
                                    placeholder="lorenzo.Asis@gmail.com"
                                    value="<?php echo $_SESSION['GlobalEmail']; ?>">
                            </div>
                            <div class="col-md-4">
                                <label for="SID" class="form-label d-block text-truncate">Student ID</label>
                                <input type="text" class="form-control form-control-sm" name="SID" id="COMSID"
                                    placeholder="123456789" disabled value="<?php echo $_SESSION['GlobalID']; ?>">
                            </div>
                            <div class="col-md-12">
                                <label for="Address" class="form-label">Address</label>
                                <input type="text" class="form-control form-control-sm" name="Address" id="COMaddress"
                                    placeholder="1234 Main St" value="<?php echo $_SESSION['GlobalAddress']; ?>">
                            </div>
                            <script>
                                let showpass = document.getElementById("showPassword");
                                let pass = document.getElementById("COMpword");
                                let conpass = document.getElementById("COMconpword");

                                let form = document.getElementById("COMform");

                                showpass.checked = false;

                                showpass.addEventListener("click", function () {
                                    if (pass.type === "password") {
                                        pass.type = "text";
                                        conpass.type = "text";
                                    } else {
                                        pass.type = "password";
                                        conpass.type = "password";
                                    }
                                });

                                let v1 = false;
                                let v2 = false;
                                pass.addEventListener("keyup", function () {
                                    if (pass.value != conpass.value) {
                                        // add is-invalid class to the input
                                        pass.classList.add("is-invalid");
                                    } else {
                                        // remove is-invalid class from the input
                                        pass.classList.remove("is-invalid");
                                        v1 = true;
                                    }
                                });

                                form.addEventListener("submit", (e) => {
                                    e.preventDefault();
                                    if (v1 == true && v2 == true) {
                                        form.submit();
                                    }
                                });

                            </script>
                            <div class="col-md-2">
                                <label for="city" class="form-label">City</label>
                                <input type="text" class="form-control form-control-sm" name="city" id="COMcity"
                                    placeholder="City" value="<?php echo $_SESSION['GlobalCity']; ?>" list="cityList">
                                <datalist id="cityList">
                                    <script>
                                        // api for cities
                                        // (next time ko ilalagay to tenesting ko pa lang, Enable ko nlang kapag hindi nako tinatamad)

                                        // check if user has internet connection
                                        var Enable_Features = false;
                                        if (Enable_Features) {
                                            if (navigator.onLine) {
                                                let city = document.getElementById("COMcity");
                                                let cityList = document.getElementById("cityList");
                                                let cityArray = [];

                                                // philippines cities api
                                                fetch("https://psgc.gitlab.io/api/island-groups/luzon/cities.json")
                                                    .then(response => response.json())
                                                    .then(data => {
                                                        for (let i = 0; i < data.length; i++) {
                                                            cityArray.push(data[i].name);
                                                        }
                                                        for (let i = 0; i < cityArray.length; i++) {
                                                            let option = document.createElement("option");
                                                            option.value = cityArray[i];
                                                            cityList.appendChild(option);
                                                        }
                                                    });
                                            } else {
                                                // if user has no internet connection
                                                // create option element
                                                let option = document.createElement("option");
                                                // set the value of the option element
                                                option.value = "Can't load cities";
                                                // append the option element to the datalist
                                                document.getElementById("cityList").appendChild(option);
                                            }
                                        }
                                    </script>
                                </datalist>
                            </div>
                            <div class="col-md-2">
                                <label for="province" class="form-label">Province</label>
                                <input type="text" class="form-control form-control-sm" name="province" id="COMprovince"
                                    placeholder="Cavite" value="<?php echo $_SESSION['GlobalProvince']; ?>">
                            </div>
                            <div class="col-md-2">
                                <label for="zipcode" class="form-label">Zipcode</label>
                                <input type="text" class="form-control form-control-sm" name="zipcode" id="COMzipcode"
                                    placeholder="1234" maxlength="4" value="<?php echo $_SESSION['GlobalZip']; ?>">
                            </div>
                            <div class="col-md-2">
                                <label for="COMdept" class="form-label d-block text-truncate">Dept.</label>
                                <select id="COMdept" name="department" class="form-select form-select-sm"
                                    value="<?php echo $_SESSION['GlobalDept']; ?>">
                                    <option selected hidden>
                                        <?php echo $_SESSION['GlobalDept']; ?>
                                    </option>
                                    <option value="BSIT">BSIT</option>
                                    <option value="BSCS">BSCS</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for="COMyearlevel" class="form-label d-block text-truncate">Year</label>
                                <select id="COMyearlevel" name="Yearlevel" class="form-select form-select-sm">
                                    <option value="1" <?php if ($_SESSION['GlobalYear'] == "1") {
                                        echo "selected";
                                    } ?>>1st
                                        Year</option>
                                    <option value="2" <?php if ($_SESSION['GlobalYear'] == "2") {
                                        echo "selected";
                                    } ?>>2nd
                                        Year</option>
                                    <option value="3" <?php if ($_SESSION['GlobalYear'] == "3") {
                                        echo "selected";
                                    } ?>>3rd
                                        Year</option>
                                    <option value="4" <?php if ($_SESSION['GlobalYear'] == "4") {
                                        echo "selected";
                                    } ?>>4th
                                        Year</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for="COMsec" class="form-label d-block text-truncate">Section</label>
                                <select id="COMsec" name="Section" class="form-select form-select-sm">
                                    <option value="A" <?php if ($_SESSION['GlobalSection'] == "A") {
                                        echo "selected";
                                    } ?>>
                                        A</option>
                                    <option value="B" <?php if ($_SESSION['GlobalSection'] == "B") {
                                        echo "selected";
                                    } ?>>
                                        B</option>
                                    <option value="C" <?php if ($_SESSION['GlobalSection'] == "C") {
                                        echo "selected";
                                    } ?>>
                                        C</option>
                                    <option value="D" <?php if ($_SESSION['GlobalSection'] == "D") {
                                        echo "selected";
                                    } ?>>
                                        D</option>
                                    <option value="E" <?php if ($_SESSION['GlobalSection'] == "E") {
                                        echo "selected";
                                    } ?>>
                                        E</option>
                                    <option value="F" <?php if ($_SESSION['GlobalSection'] == "F") {
                                        echo "selected";
                                    } ?>>
                                        F</option>
                                    <option value="G" <?php if ($_SESSION['GlobalSection'] == "G") {
                                        echo "selected";
                                    } ?>>
                                        G</option>
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
                            <div class="col-12 text-center gap-2">
                                <input type="submit" value="Update Info" class="btn btn-success mt-2" name="COM"
                                    id="Complete">
                                <button type="button" class="btn btn-primary mt-2 position-relative"
                                    data-bs-toggle="modal" data-bs-target="#SecQue">
                                    Security Question
                                    <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle" <?php echo isset($secBadge) ? $secBadge : ""; ?>>
                                        <span class="visually-hidden">Security Question</span>
                                    </span>
                                </button>
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