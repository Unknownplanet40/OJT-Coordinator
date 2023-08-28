<style>
    .sidebar li .active {
        background-color: var(--primary-color);
    }

    .sidebar li .active .text {
        color: var(--sidebar-color);
    }

    .sidebar li .active .icon svg {
        fill: var(--sidebar-color);
    }
</style>

<nav class="sidebar close">
    <header>
        <div class="image-text">
            <span class="image">
                <?php
                if (isset($_SESSION['Profile'])) {
                    echo '<img class="rounded"  style="width: 48px; height: 48px;"  src="' . $_SESSION['Profile'] . '" alt="Profile Picture" title="Click your name to edit your profile">';
                } else {
                    // incase the user did not upload a profile picture
                    echo '<img class="rounded"  style="width: 48px; height: 48px;"  src="../Image/Profile.png" alt="Profile Picture">';
                }
                ?>
            </span>

            <div class="text logo-text">
                <span class="name text-capitalize text-truncate" style="max-width: 155px;"
                    title="<?php echo $_SESSION['GlobalName']; ?> - <?php echo $_SESSION['GlobalRole']; ?>">
                    <?php echo $_SESSION['GlobalName']; ?>
                </span>
                <span class="profession text-uppercase text-success"
                    title="<?php echo $_SESSION['GlobalName']; ?> - <?php echo $_SESSION['GlobalRole']; ?>">
                    <?php echo $_SESSION['GlobalRole']; ?>
                </span>
                <input type="hidden" id="GlobalID" value="<?php echo $_SESSION['GlobalID']; ?>">
                <input type="hidden" id="profession" value="<?php echo $_SESSION['GlobalRole']; ?>">
            </div>
        </div>
        <i class='toggle'>
            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 96 960 960" width="24"
                fill="var(--toggle-color)">
                <path
                    d="M329 808q-20-20-20-48t20-47l137-137-137-138q-20-19-20-47t20-48q19-19 47-19t47 19l185 185q10 10 15 22.5t5 25.5q0 13-5 25t-15 22L423 808q-19 19-47 19t-47-19Z" />
            </svg>
        </i>
    </header>

    <div class="menu-bar">
        <div class="menu">
            <ul class="menu-links">
                <li class="nav-link" title="Dashboard">
                    <!-- this is a ternary operator that checks if the current page is the same as the link it will highlight the link -->
                    <a <?php echo (basename($_SERVER['PHP_SELF']) == "AdminDashboard.php") ? "class='active'" : "href='../Admin/AdminDashboard.php'"; ?>>
                        <i class='icon'>
                            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 96 960 960" width="24">
                                <path
                                    d="M513.333 442.667V249.333q0-14.166 9.583-23.75Q532.5 216 546.666 216h260.001q14.166 0 23.75 9.583 9.583 9.584 9.583 23.75v193.334q0 14.167-9.583 23.75-9.584 9.584-23.75 9.584H546.666q-14.166 0-23.75-9.584-9.583-9.583-9.583-23.75ZM120 576V249.333q0-14.166 9.583-23.75 9.584-9.583 23.75-9.583h260.001q14.166 0 23.75 9.583 9.583 9.584 9.583 23.75V576q0 14.167-9.583 23.75-9.584 9.583-23.75 9.583H153.333q-14.166 0-23.75-9.583Q120 590.167 120 576Zm393.333 326.667V576q0-14.167 9.583-23.75 9.584-9.583 23.75-9.583h260.001q14.166 0 23.75 9.583Q840 561.833 840 576v326.667q0 14.166-9.583 23.75-9.584 9.583-23.75 9.583H546.666q-14.166 0-23.75-9.583-9.583-9.584-9.583-23.75Zm-393.333 0V709.333q0-14.167 9.583-23.75 9.584-9.584 23.75-9.584h260.001q14.166 0 23.75 9.584 9.583 9.583 9.583 23.75v193.334q0 14.166-9.583 23.75Q427.5 936 413.334 936H153.333q-14.166 0-23.75-9.583-9.583-9.584-9.583-23.75Z" />
                            </svg>
                        </i>
                        <span class="text nav-text">Dashboard</span>
                    </a>
                </li>

                <li class="nav-link" title="Trainee's Details">
                    <a <?php echo (basename($_SERVER['PHP_SELF']) == "AdminTrainees.php") ? "class='active'" : "href='../Admin/AdminTrainees.php'"; ?>>
                        <i class='icon'>
                            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                <path
                                    d="M482-401q58 0 98-40t40-98q0-58-40-98t-98-40q-58 0-98 40t-40 98q0 58 40 98t98 40ZM180-120q-24 0-42-18t-18-42v-600q0-24 18-42t42-18h600q24 0 42 18t18 42v600q0 24-18 42t-42 18H180Zm0-60h600v-37q-60-56-136-90.5T480-342q-88 0-164 34.5T180-217v37Z" />
                            </svg>
                        </i>
                        <span class="text nav-text">Trainee's Details</span>
                    </a>
                </li>

                <li class="nav-link" title="Trainee's Programs Details" hidden>
                    <a <?php echo (basename($_SERVER['PHP_SELF']) == "AdminPrograms.php") ? "class='active'" : "href='../Admin/AdminPrograms.php'"; ?>>
                        <i class='icon'>
                            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                <path
                                    d="M390-733h180v-87H390v87ZM720-47q-81 0-137-56t-56-137q0-81 56-137t137-56q81 0 137 56t56 137q0 81-56 137T720-47Zm74-92 27-27-84-76v-124h-42v135.776L794-139Zm-296 19H140q-24.75 0-42.375-17.625T80-180v-493q0-24.75 17.625-42.375T140-733h190v-87q0-24.75 17.625-42.375T390-880h180q24.75 0 42.375 17.625T630-820v87h190q24.75 0 42.375 17.625T880-673v238q-34-28-75-43t-85-15q-105.718 0-179.359 73.641T467-240q0 32 8 62t23 58Z" />
                            </svg>
                        </i>
                        <span class="text nav-text">Program's Details</span>
                    </a>
                </li>

                <li class="nav-link" title="Trainee's Events Details">
                    <a <?php echo (basename($_SERVER['PHP_SELF']) == "AdminEvents.php") ? "class='active'" : "href='../Admin/AdminEvents.php'"; ?>>
                        <i class='icon'>
                            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                <path
                                    d="m438-342 139-139q12-12 29-12t29 12q12 12 12 29t-12 29L466-254q-12 12-28 12t-28-12l-85-85q-12-12-12-29t12-29q12-12 29-12t29 12l55 55ZM200-80q-33 0-56.5-23.5T120-160v-560q0-33 23.5-56.5T200-800h40v-40q0-17 11.5-28.5T280-880q17 0 28.5 11.5T320-840v40h320v-40q0-17 11.5-28.5T680-880q17 0 28.5 11.5T720-840v40h40q33 0 56.5 23.5T840-720v560q0 33-23.5 56.5T760-80H200Zm0-80h560v-400H200v400Z" />
                            </svg>
                        </i>
                        <span class="text nav-text">Events Details</span>
                    </a>
                </li>

                <li class="nav-link" title="Evaluate Trainee">
                    <a <?php echo (basename($_SERVER['PHP_SELF']) == "AdminTraineeEvaluation.php") ? "class='active'" : "href='../Admin/AdminTraineeEvaluation.php'"; ?>>
                        <i class='icon'>
                            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                <path
                                    d="M320-480q-17 0-28.5 11.5T280-440v120q0 17 11.5 28.5T320-280q17 0 28.5-11.5T360-320v-120q0-17-11.5-28.5T320-480Zm320-200q-17 0-28.5 11.5T600-640v320q0 17 11.5 28.5T640-280q17 0 28.5-11.5T680-320v-320q0-17-11.5-28.5T640-680ZM480-400q-17 0-28.5 11.5T440-360v40q0 17 11.5 28.5T480-280q17 0 28.5-11.5T520-320v-40q0-17-11.5-28.5T480-400ZM200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200Zm280-360q17 0 28.5-11.5T520-520q0-17-11.5-28.5T480-560q-17 0-28.5 11.5T440-520q0 17 11.5 28.5T480-480Z" />
                            </svg>
                        </i>
                        <span class="text nav-text">Assesment</span>
                    </a>
                </li>

                <li class="nav-link" title="Trainee's Documents Submitted">
                    <a <?php echo (basename($_SERVER['PHP_SELF']) == "AdminTraineeResource.php") ? "class='active'" : "href='../Admin/AdminTraineeResource.php'"; ?>>
                        <i class='icon'>
                            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                <path
                                    d="M360-240h240q17 0 28.5-11.5T640-280q0-17-11.5-28.5T600-320H360q-17 0-28.5 11.5T320-280q0 17 11.5 28.5T360-240Zm0-160h240q17 0 28.5-11.5T640-440q0-17-11.5-28.5T600-480H360q-17 0-28.5 11.5T320-440q0 17 11.5 28.5T360-400ZM240-80q-33 0-56.5-23.5T160-160v-640q0-33 23.5-56.5T240-880h287q16 0 30.5 6t25.5 17l194 194q11 11 17 25.5t6 30.5v447q0 33-23.5 56.5T720-80H240Zm280-560q0 17 11.5 28.5T560-600h160L520-800v160Z" />
                            </svg>
                        </i>
                        <span class="text nav-text">Documents</span>
                    </a>
                </li>
                <?php if ($_SESSION['GlobalRole'] == "administrator") { ?>
                    <li class="nav-link" title="Manage Moderators Accounts">
                        <a <?php echo (basename($_SERVER['PHP_SELF']) == "ManageAdmin.php" || basename($_SERVER['PHP_SELF']) == "ManageMod.php") ? "class='active'" : "href='../Admin/ManageAdmin.php'"; ?>>
                            <i class='icon'>
                                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                    <path
                                        d="M400-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM120-160q-17 0-28.5-11.5T80-200v-72q0-33 17-62t47-44q51-26 115-44t141-18h14q6 0 12 2-8 18-13.5 37.5T404-360q-5 36-3 60.5t11 59.5q6 21 16 41.5t22 38.5H120Zm560-80q33 0 56.5-23.5T760-320q0-33-23.5-56.5T680-400q-33 0-56.5 23.5T600-320q0 33 23.5 56.5T680-240Zm-52 60q-12-5-22.5-10.5T584-204l-43 13q-7 2-13-.5t-10-8.5l-24-40q-4-6-2.5-13t7.5-12l33-29q-2-14-2-26t2-26l-33-29q-6-5-7.5-12t2.5-13l24-40q4-6 10-8.5t13-.5l43 13q11-8 21.5-13.5T628-460l9-44q2-7 7-11.5t12-4.5h48q7 0 12 4.5t7 11.5l9 44q12 5 22.5 11t21.5 15l42-15q7-3 13.5 0t10.5 9l24 42q4 6 3 13t-7 12l-34 29q2 12 2 25t-2 25l33 29q6 5 7.5 12t-2.5 13l-24 40q-4 6-10 8.5t-13 .5l-43-13q-11 8-21.5 13.5T732-180l-9 44q-2 7-7 11.5t-12 4.5h-48q-7 0-12-4.5t-7-11.5l-9-44Z" />
                                </svg>
                            </i>
                            <span class="text nav-text">Manage</span>
                        </a>
                    </li>

                    <!-- I will disable this for now until I can figure what to do with this -->
                    <li class="nav-link" hidden>
                        <a <?php echo (basename($_SERVER['PHP_SELF']) == "AdminSystemLog.php") ? "class='active'" : "href='../Admin/AdminSystemLog.php'"; ?>>
                            <i class='icon'>
                                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                    <path
                                        d="M680-280q25 0 42.5-17.5T740-340q0-25-17.5-42.5T680-400q-25 0-42.5 17.5T620-340q0 25 17.5 42.5T680-280Zm0 120q31 0 57-14.5t42-38.5q-22-13-47-20t-52-7q-27 0-52 7t-47 20q16 24 42 38.5t57 14.5ZM480-80q-139-35-229.5-159.5T160-516v-189q0-25 14.5-45t37.5-29l240-90q14-5 28-5t28 5l240 90q23 9 37.5 29t14.5 45v172q-19-8-39-14.5t-41-9.5v-147l-240-90-240 90v188q0 47 12.5 94t35 89.5Q310-290 342-254t71 60q11 32 29 61t41 52q-1 0-1.5.5t-1.5.5Zm200 0q-83 0-141.5-58.5T480-280q0-83 58.5-141.5T680-480q83 0 141.5 58.5T880-280q0 83-58.5 141.5T680-80ZM480-494Z" />
                                </svg>
                            </i>
                            <span class="text nav-text">System Logs</span>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>

        <div class="bottom-content">
            <li class="nav-link" title="Logout">
                <a class="logout">
                    <i class='icon'>
                        <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 96 960 960" width="24">
                            <path
                                d="M613 747q-11-13-11-29.5t11-27.5l74-74H400q-17 0-28.5-11.5T360 576q0-17 11.5-28.5T400 536h287l-74-74q-12-12-12-28.5t12-28.5q11-12 27.5-12t27.5 11l144 144q6 6 8.5 13t2.5 15q0 8-2.5 15t-8.5 13L668 748q-13 13-28.5 11.5T613 747ZM200 936q-33 0-56.5-23.5T120 856V296q0-33 23.5-56.5T200 216h240q17 0 28.5 11.5T480 256q0 17-11.5 28.5T440 296H200v560h240q17 0 28.5 11.5T480 896q0 17-11.5 28.5T440 936H200Z" />
                        </svg>
                    </i>
                    <span class="text nav-text" style="cursor: pointer;">Logout</span>
                </a>
                <script>
                    const logout = document.querySelector('.logout');

                    //if logout is clicked it will show a confirmation box using sweetalert
                    logout.addEventListener('click', function (e) {
                        e.preventDefault();
                        Swal.fire({
                            text: "Are you sure you want to logout?",
                            icon: 'warning',
                            allowOutsideClick: false,
                            showCancelButton: true,
                            confirmButtonColor: '#d33',
                            cancelButtonColor: '#3085d6',
                            confirmButtonText: 'Yes, Logout!',
                            background: '#fff',
                            color: '#000',
                            timer: 5000,
                            timerProgressBar: true,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                //random message for the logout
                                const titlemessage = [
                                    'Logging out...',
                                    'See you soon...',
                                    'Bye bye...',
                                    'Have a nice day...',
                                    'Goodbye...',
                                    'See you again...'];
                                const textmessage = [
                                    'Please wait while we are logging you out',
                                    'Closing your session',
                                    'Clearing your session',
                                    'Please wait, where saving your data',
                                    'Please wait a moment'];
                                const ranText = Math.floor(Math.random() * textmessage.length);
                                const ranTitle = Math.floor(Math.random() * titlemessage.length);

                                Swal.fire({
                                    title: titlemessage[ranTitle],
                                    text: textmessage[ranText],
                                    allowOutsideClick: false,
                                    background: '#fff',
                                    color: '#000',
                                    didOpen: () => {
                                        Swal.showLoading()
                                    },
                                })
                                var milliseconds = Math.floor(
                                    Math.random() * (6800 - 1000 + 1) + 1000
                                ).toString();
                                setTimeout(() => {
                                    window.location.href = "../Logout.php";
                                }, milliseconds)
                            }
                        })
                    })
                </script>
            </li>
            <!-- This is the dark mode toggle switch I will Hide this for now Because its so Buggy -->
            <li class="mode" hidden>
                <div class="sun-moon">
                    <i class='icon moon'>
                        <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 96 960 960" width="24"
                            fill="var(--text-color)">
                            <path
                                d="M480 936q-151 0-255.5-104.5T120 576q0-138 90-239.5T440 218q25-3 39 18t-1 44q-17 26-25.5 55t-8.5 61q0 90 63 153t153 63q31 0 61.5-9t54.5-25q21-14 43-1.5t19 39.5q-14 138-117.5 229T480 936Zm0-80q88 0 158-48.5T740 681q-20 5-40 8t-40 3q-123 0-209.5-86.5T364 396q0-20 3-40t8-40q-78 32-126.5 102T200 576q0 116 82 198t198 82Zm-10-270Z" />
                        </svg>
                    </i>
                    <i class='icon sun'>
                        <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 96 960 960" width="24"
                            fill="var(--text-color)">
                            <path
                                d="M480 696q50 0 85-35t35-85q0-50-35-85t-85-35q-50 0-85 35t-35 85q0 50 35 85t85 35Zm0 80q-83 0-141.5-58.5T280 576q0-83 58.5-141.5T480 376q83 0 141.5 58.5T680 576q0 83-58.5 141.5T480 776ZM80 616q-17 0-28.5-11.5T40 576q0-17 11.5-28.5T80 536h80q17 0 28.5 11.5T200 576q0 17-11.5 28.5T160 616H80Zm720 0q-17 0-28.5-11.5T760 576q0-17 11.5-28.5T800 536h80q17 0 28.5 11.5T920 576q0 17-11.5 28.5T880 616h-80ZM480 296q-17 0-28.5-11.5T440 256v-80q0-17 11.5-28.5T480 136q17 0 28.5 11.5T520 176v80q0 17-11.5 28.5T480 296Zm0 720q-17 0-28.5-11.5T440 976v-80q0-17 11.5-28.5T480 856q17 0 28.5 11.5T520 896v80q0 17-11.5 28.5T480 1016ZM226 378l-43-42q-12-11-11.5-28t11.5-29q12-12 29-12t28 12l42 43q11 12 11 28t-11 28q-11 12-27.5 11.5T226 378Zm494 495-42-43q-11-12-11-28.5t11-27.5q11-12 27.5-11.5T734 774l43 42q12 11 11.5 28T777 873q-12 12-29 12t-28-12Zm-42-495q-12-11-11.5-27.5T678 322l42-43q11-12 28-11.5t29 11.5q12 12 12 29t-12 28l-43 42q-12 11-28 11t-28-11ZM183 873q-12-12-12-29t12-28l43-42q12-11 28.5-11t27.5 11q12 11 11.5 27.5T282 830l-42 43q-11 12-28 11.5T183 873Zm297-297Z" />
                        </svg>
                    </i>
                </div>
                <span class="mode-text text">Dark mode</span>

                <div class="toggle-switch">
                    <span class="switch"></span>
                </div>
            </li>
        </div>
    </div>
</nav>