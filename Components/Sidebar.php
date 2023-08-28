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
                if ($_SESSION['GlobalRole'] == "User") {
                    $role = "Trainee";
                }
                if (isset($_SESSION['Profile'])) {
                    echo '<img class="rounded img-thumbnail shadow-lg" src="' . $_SESSION['Profile'] . '" alt="Profile Picture" title="Click your name to edit your profile" style="width: 48px; height: 48px;">';
                } else {
                    echo '<img class="rounded img-fluid shadow-lg" src="../Image/Profile.png" alt="Profile Picture" title="Click your name to edit your profile">';
                }
                ?>
            </span>

            <div class="text logo-text">
                <span class="name text-capitalize text-truncate" style="max-width: 155px;"
                    title="<?php echo $_SESSION['GlobalName']; ?> - <?php echo $role; ?>">
                    <?php echo $_SESSION['GlobalName']; ?>
                </span>
                <span class="profession text-uppercase text-success"
                    title="<?php echo $_SESSION['GlobalName']; ?> - <?php echo $role; ?>">
                    <?php echo $role; ?>
                </span>
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
                    <a <?php echo (basename($_SERVER['PHP_SELF']) == "UserDashboard.php") ? "class='active'" : "href='../User/UserDashboard.php'"; ?>>
                        <i class='icon'>
                            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 96 960 960" width="24">
                                <path
                                    d="M513.333 442.667V249.333q0-14.166 9.583-23.75Q532.5 216 546.666 216h260.001q14.166 0 23.75 9.583 9.583 9.584 9.583 23.75v193.334q0 14.167-9.583 23.75-9.584 9.584-23.75 9.584H546.666q-14.166 0-23.75-9.584-9.583-9.583-9.583-23.75ZM120 576V249.333q0-14.166 9.583-23.75 9.584-9.583 23.75-9.583h260.001q14.166 0 23.75 9.583 9.583 9.584 9.583 23.75V576q0 14.167-9.583 23.75-9.584 9.583-23.75 9.583H153.333q-14.166 0-23.75-9.583Q120 590.167 120 576Zm393.333 326.667V576q0-14.167 9.583-23.75 9.584-9.583 23.75-9.583h260.001q14.166 0 23.75 9.583Q840 561.833 840 576v326.667q0 14.166-9.583 23.75-9.584 9.583-23.75 9.583H546.666q-14.166 0-23.75-9.583-9.583-9.584-9.583-23.75Zm-393.333 0V709.333q0-14.167 9.583-23.75 9.584-9.584 23.75-9.584h260.001q14.166 0 23.75 9.584 9.583 9.583 9.583 23.75v193.334q0 14.166-9.583 23.75Q427.5 936 413.334 936H153.333q-14.166 0-23.75-9.583-9.583-9.584-9.583-23.75Z" />
                            </svg>
                        </i>
                        <span class="text nav-text">Dashboard</span>
                    </a>
                </li>

                <li class="nav-link" title="Job Offers" hidden>
                    <a <?php echo (basename($_SERVER['PHP_SELF']) == "UserProgramsOffers.php") ? "class='active'" : "href='../User/UserProgramsOffers.php'"; ?>>
                        <i class='icon'>
                            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 96 960 960" width="24">
                                <path
                                    d="M160 936q-33 0-56.5-23.5T80 856V416q0-33 23.5-56.5T160 336h160v-80q0-33 23.5-56.5T400 176h160q33 0 56.5 23.5T640 256v80h160q33 0 56.5 23.5T880 416v440q0 33-23.5 56.5T800 936H160Zm240-600h160v-80H400v80Z" />
                            </svg>
                        </i>
                        <span class="text nav-text">Job Offers</span>
                    </a>
                </li>

                <li class="nav-link" title="Requirements">
                    <a <?php echo (basename($_SERVER['PHP_SELF']) == "UserRequirements.php") ? "class='active'" : "href='../User/UserRequirements.php'"; ?>>
                        <i class='icon'>
                            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 96 960 960" width="24">
                                <path
                                    d="M352.666 809.333h254.668q14.166 0 23.749-9.617 9.584-9.617 9.584-23.833 0-14.216-9.584-23.716-9.583-9.5-23.749-9.5H352.666q-14.166 0-23.749 9.617-9.584 9.617-9.584 23.833 0 14.216 9.584 23.716 9.583 9.5 23.749 9.5Zm0-166.667h254.668q14.166 0 23.749-9.617 9.584-9.617 9.584-23.833 0-14.216-9.584-23.716-9.583-9.5-23.749-9.5H352.666q-14.166 0-23.749 9.617-9.584 9.617-9.584 23.833 0 14.216 9.584 23.716 9.583 9.5 23.749 9.5ZM226.666 976q-27 0-46.833-19.833T160 909.334V242.666q0-27 19.833-46.833T226.666 176h319.668q13.63 0 25.981 5.333 12.352 5.334 21.352 14.334l186.666 186.666q9 9 14.334 21.352Q800 416.036 800 429.666v479.668q0 27-19.833 46.833T733.334 976H226.666Zm314.001-576q0 14.166 9.584 23.749 9.583 9.584 23.749 9.584h159.334L540.667 242.666V400Z" />
                            </svg>
                        </i>
                        <span class="text nav-text">Requirements</span>
                    </a>
                </li>

                <li class="nav-link" title="Program Details">
                    <a <?php echo (basename($_SERVER['PHP_SELF']) == "UserProgram.php" || basename($_SERVER['PHP_SELF']) == "UserNoProgram.php") ? "class='active'" : "href='../User/UserProgram.php'"; ?>>
                        <i class='icon'>
                            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 96 960 960" width="24">
                                <path
                                    d="M480 520V376q0-17-11.5-28.5T440 336q-17 0-28.5 11.5T400 376v160q0 8 3 15t9 13l80 80q12 12 28 12t28-12q12-12 12-28t-12-28l-68-68ZM363 888q-122-26-202.5-124T80 536q0-150 105-255t255-105q150 0 255 105t105 255q0 43-10 83.5T762 696H518q-66 0-112 47t-46 113q0 8 .5 16t2.5 16Zm157 48h240q33 0 56.5-23.5T840 856q0-33-23.5-56.5T760 776H520q-33 0-56.5 23.5T440 856q0 33 23.5 56.5T520 936Zm0-40q-17 0-28.5-11.5T480 856q0-17 11.5-28.5T520 816q17 0 28.5 11.5T560 856q0 17-11.5 28.5T520 896Zm120 0q-17 0-28.5-11.5T600 856q0-17 11.5-28.5T640 816q17 0 28.5 11.5T680 856q0 17-11.5 28.5T640 896Zm120 0q-17 0-28.5-11.5T720 856q0-17 11.5-28.5T760 816q17 0 28.5 11.5T800 856q0 17-11.5 28.5T760 896Z" />
                            </svg>
                        </i>
                        <span class="text nav-text">Program Details</span>
                    </a>
                </li>

                <li class="nav-link" hidden>
                    <a <?php echo (basename($_SERVER['PHP_SELF']) == "?") ? "class='active'" : "?"; ?>>
                        <i class='icon'>
                            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 96 960 960" width="24">
                                <path
                                    d="M120 936q-17 0-28.5-11.5T80 896V496q0-17 11.5-28.5T120 456h140q17 0 28.5 11.5T300 496v400q0 17-11.5 28.5T260 936H120Zm290 0q-17 0-28.5-11.5T370 896V256q0-17 11.5-28.5T410 216h140q17 0 28.5 11.5T590 256v640q0 17-11.5 28.5T550 936H410Zm290 0q-17 0-28.5-11.5T660 896V576q0-17 11.5-28.5T700 536h140q17 0 28.5 11.5T880 576v320q0 17-11.5 28.5T840 936H700Z" />
                            </svg>
                        </i>
                        <span class="text nav-text">Progress</span>
                    </a>
                </li>

                <li class="nav-link" title="Evaluation">
                    <a <?php echo (basename($_SERVER['PHP_SELF']) == "UserEvaluation.php") ? "class='active'" : "href='../User/UserEvaluation.php'"; ?>>
                        <i class='icon'>
                            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 96 960 960" width="24">
                                <path
                                    d="M240 816 114 942q-10 10-22 5t-12-19V256q0-33 23.5-56.5T160 176h640q33 0 56.5 23.5T880 256v480q0 33-23.5 56.5T800 816H240Zm240-221 76 46q11 7 22-.5t8-20.5l-20-87 68-59q10-9 6-21.5T622 439l-89-7-35-82q-5-12-18-12t-18 12l-35 82-89 7q-14 1-18 13.5t6 21.5l68 59-20 87q-3 13 8 20.5t22 .5l76-46Z" />
                            </svg>
                        </i>
                        <span class="text nav-text">Evaluation</span>
                    </a>
                </li>

                <li class="nav-link" hidden>
                    <a href="#">
                        <i class='icon'>
                            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 96 960 960" width="24">
                                <path
                                    d="m480 976-10-120h-10q-142 0-241-99t-99-241q0-142 99-241t241-99q71 0 132.5 26.5t108 73q46.5 46.5 73 108T800 516q0 152-91 272.5T480 976Zm-21-241q17 0 29-12t12-29q0-17-12-29t-29-12q-17 0-29 12t-12 29q0 17 12 29t29 12Zm1-127q11 0 20-8t12-22q2-13 11-23.5t31-32.5q18-18 30-39t12-45q0-51-34.5-76.5T460 336q-35 0-60.5 16T358 392q-7 11-2.5 23t18.5 17q10 4 20 0t18-15q8-11 19.5-18t28.5-7q27 0 40.5 15t13.5 33q0 17-10 30.5T480 498q-28 24-37.5 39T431 578q-1 12 7.5 21t21.5 9Z" />
                            </svg>
                        </i>
                        <span class="text nav-text">FAQs</span>
                    </a>
                </li>

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
                            confirmButtonText: 'Yes, Logout!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                //random message for the logout
                                const titlemessage = [
                                    'Logging out...',
                                    'See you soon...',
                                    'Bye bye...',
                                    'Have a nice day...',
                                    'Goodbye...',];
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