<?php

// Note: ternary operator
// (condition) ? value_if_true : value_if_false;

//set name to [No Name Found] if no name is found
!isset($User_Name) ? $name = "[No Name Found]" : $name = $User_Name;
!isset($User_Role) ? $role = "Profession" : $role = $User_Role;

if ($role == "Admin") {
    $logouttype = "Admin";
} else {
    $logouttype = "User";
}

?>

<style>
    /* ===== SideBar-Nav ===== */
    .SideBar-Nav {
        position: fixed;
        top: 0;
        left: 0;
        height: 100%;
        width: 250px;
        padding: 10px 14px;
        background: var(--sidebar-color);
        transition: var(--tran-05);
        z-index: 100;
    }

    /* ===== Reusable code - Here ===== */
    .SideBar-Nav li {
        height: 50px;
        list-style: none;
        display: flex;
        align-items: center;
        margin-top: 10px;
    }

    .SideBar-Nav .text,
    .SideBar-Nav .icon {
        color: var(--text-color);
        transition: var(--tran-03);
    }

    .SideBar-Nav header .image,
    .SideBar-Nav .icon {
        min-width: 60px;
        border-radius: 6px;
    }

    .SideBar-Nav .icon {
        min-width: 60px;
        border-radius: 6px;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
    }

    .SideBar-Nav .icon svg {
        width: 30px;
        height: 30px;
        fill: var(--clr-accent);
    }

    .SideBar-Nav .text {
        font-size: 17px;
        font-weight: 500;
        white-space: nowrap;
        opacity: 1;
    }

    /* =========================== */

    .SideBar-Nav header {
        position: relative;
    }

    .SideBar-Nav header .ImageText {
        display: flex;
        align-items: center;
    }

    .SideBar-Nav header .LogoText {
        display: flex;
        flex-direction: column;
    }

    header .ImageText .name {
        margin-top: 2px;
        font-size: 20px;
        font-weight: 600;
        color: var(--clr-accent);
        display: block;
        width: 235px;
    }

    header .ImageText .Subtitle {
        font-size: 16px;
        display: block;
    }

    .SideBar-Nav header .image {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .SideBar-Nav header .image img {
        width: 40px;
        border-radius: 6px;
    }

    .SideBar-Nav .Menu {
        margin-top: 40px;
    }

    .MenuLinks {
        padding: 0 !important;
        margin: 0 !important;
    }



    .SideBar-Nav li a {
        list-style: none;
        height: 100%;
        background-color: transparent;
        display: flex;
        align-items: center;
        height: 100%;
        width: 100%;
        border-radius: 6px;
        text-decoration: none;
        transition: var(--tran-03);
    }

    .SideBar-Nav li a:hover {
        background-color: var(--clr-accent);

    }

    /* This is the active class for the current page. */
    .SideBar-Nav li .active,
    .SideBar-Nav li .active .text,
    .SideBar-Nav li .active .icon svg {
        background-color: var(--clr-accent);
        color: var(--sidebar-color);
        fill: var(--sidebar-color);

    }

    .SideBar-Nav li a:hover,
    .SideBar-Nav li a:hover .text,
    .SideBar-Nav li a:hover .icon svg {
        color: var(--sidebar-color);
        fill: var(--sidebar-color);
    }

    .SideBar-Nav .menu-bar {
        height: calc(100% - 55px);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        overflow-y: scroll;
    }

    .menu-bar::-webkit-scrollbar {
        display: none;
    }
</style>

<nav class="SideBar-Nav">
    <header>
        <div class="ImageText">
            <!-- Di ko alam kung mag lalagay pako nMenuLinksg logo dito muna to
            <span class="image">
                <img src="logo" alt="" />
            </span>-->
            <div class="text LogoText">
                <!-- truncate the name if it is too long -->
                <span class="name text-truncate">
                    <?php echo $name ?>
                </span>
                <span class="Subtitle">
                    <?php echo $role ?>
                </span>
            </div>
        </div>
    </header>

    <div class="menu-bar">
        <div class="Menu">
            <ul class="MenuLinks">
                <li class="nav-link">
                    <a <?php
                    // The ternary operator is used to add an active class when the user is on the current page.
                    echo (basename($_SERVER['PHP_SELF']) == "AdminDashboard.php") ? "class='active'" : "href='AdminDashboard.php'";
                    ?>>
                        <i class="icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 96 960 960">
                                <path
                                    d="M525.129 439.143V267.474q0-13.582 9.027-22.527 9.027-8.946 22.371-8.946h232.236q13.345 0 22.29 8.946 8.946 8.945 8.946 22.527v171.669q0 13.582-9.028 22.527-9.027 8.945-22.371 8.945H556.364q-13.344 0-22.29-8.945-8.945-8.945-8.945-22.527ZM140.001 559.998V267.122q0-13.23 9.027-22.175 9.027-8.946 22.372-8.946h232.236q13.344 0 22.29 8.95 8.945 8.95 8.945 22.179v292.876q0 13.23-9.027 22.175-9.027 8.946-22.371 8.946H171.237q-13.345 0-22.29-8.95-8.946-8.949-8.946-22.179ZM525.129 884.87V591.994q0-13.23 9.027-22.175 9.027-8.946 22.371-8.946h232.236q13.345 0 22.29 8.95 8.946 8.949 8.946 22.179v292.876q0 13.23-9.028 22.175-9.027 8.946-22.371 8.946H556.364q-13.344 0-22.29-8.95-8.945-8.95-8.945-22.179Zm-385.128-.344V712.857q0-13.582 9.027-22.527t22.372-8.945h232.236q13.344 0 22.29 8.945 8.945 8.945 8.945 22.527v171.669q0 13.582-9.027 22.527-9.027 8.946-22.371 8.946H171.237q-13.345 0-22.29-8.946-8.946-8.945-8.946-22.527Zm50.255-343.654h194.36V286.256h-194.36v254.616Zm385.128 324.872h194.36V611.128h-194.36v254.616Zm0-445.383h194.36V286.256h-194.36v134.105ZM190.256 865.744h194.36V731.639h-194.36v134.105Zm194.36-324.872Zm190.768-120.511Zm0 190.767ZM384.616 731.639Z" />
                            </svg></i>
                        <span class="text NavText">Dashboard</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a <?php
                    echo (basename($_SERVER['PHP_SELF']) == "Page two.php") ? "class='active'" : "href='Page two.php'";
                    ?>>
                        <i class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 96 960 960">
                                <path
                                    d="M480 563.281q-57.749 0-96.438-38.689-38.689-38.688-38.689-96.566 0-57.877 38.689-96.438 38.689-38.56 96.438-38.56t96.438 38.56q38.689 38.561 38.689 96.438 0 57.878-38.689 96.566-38.689 38.689-96.438 38.689Zm248.974 305.025H231.026q-21.089 0-36.057-14.968-14.968-14.967-14.968-36.057v-29.23q0-31.282 16.705-55.576 16.705-24.295 43.808-37.346 61.871-28.41 121.056-42.744 59.184-14.333 118.422-14.333t118.225 14.539q58.987 14.538 120.692 42.72 27.813 13.028 44.451 37.243 16.639 24.215 16.639 55.497v29.23q0 21.09-14.968 36.057-14.968 14.968-36.057 14.968Zm-498.718-50.255h499.488v-30q0-14.462-8.936-27.449-8.936-12.987-23.578-20.603-56.564-27.615-109.34-39.653-52.777-12.039-107.89-12.039t-108.428 12.039q-53.315 12.038-109.213 39.653-14.641 7.616-23.372 20.603-8.731 12.987-8.731 27.449v30ZM480 513.026q35.974 0 60.423-24.448 24.449-24.449 24.449-60.424 0-35.974-24.449-60.423-24.449-24.448-60.423-24.448-35.974 0-60.423 24.448-24.449 24.449-24.449 60.423 0 35.975 24.449 60.424 24.449 24.448 60.423 24.448Zm0-84.872Zm0 389.897Z" />
                            </svg>
                        </i>
                        <span class="text NavText">Trainees</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a <?php
                    echo (basename($_SERVER['PHP_SELF']) == "?.php") ? "class='active'" : "href='?.php'";
                    ?>>
                        <i class="icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 96 960 960">
                                <path
                                    d="m437.59 668.36-72.155-72.154q-7.482-7.436-17.856-7.295-10.374.141-17.937 7.74-7.821 7.958-7.821 18.179 0 10.221 7.821 17.785l86.025 85.82q9.335 9.359 21.783 9.359 12.447 0 22.063-9.359l171.051-171.307q7.435-7.224 7.628-17.701.192-10.478-7.663-18.17-7.856-7.692-17.983-7.692t-17.981 7.82L437.59 668.36Zm41.931 286.562q-70.17 0-132.076-26.564-61.906-26.564-107.906-72.436-45.999-45.872-72.768-107.758-26.77-61.887-26.77-132.525 0-70.637 26.77-132.368 26.769-61.732 72.768-107.937 46-46.205 107.906-72.769 61.906-26.564 132.076-26.564 70.171 0 132.017 26.564 61.846 26.564 108.051 72.769 46.205 46.205 72.769 107.956 26.564 61.75 26.564 132.409 0 70.66-26.564 132.506-26.564 61.845-72.769 107.717-46.205 45.872-108.051 72.436-61.846 26.564-132.017 26.564Zm.069-338.512ZM91.334 377.615q-7.615-7.743-7.41-17.82.205-10.076 7.82-17.691l115.847-113.949q7.23-6.82 17.679-6.679 10.448.141 17.704 7.346 7.615 7.358 7.282 17.563-.333 10.205-7.579 17.519L126.718 377.897q-7.487 6.821-17.961 6.808-10.474-.013-17.423-7.09Zm776.511-.128q-7.205 7.205-17.487 7.41-10.281.205-17.896-7L716.615 263.949q-7.23-6.564-7.628-17.166-.397-10.603 7.218-17.961 6.949-7.205 17.23-7.411 10.282-.205 17.897 6.744l115.846 113.949q7.231 6.871 7.757 17.319.525 10.449-7.09 18.064Zm-388.329 527.18q120.484 0 204.817-84.343 84.334-84.343 84.334-204.763 0-120.527-84.343-204.916t-204.763-84.389q-120.527 0-204.916 84.388-84.389 84.387-84.389 204.872 0 120.484 84.388 204.817 84.387 84.334 204.872 84.334Z" />
                            </svg></i>
                        <span class="text NavText">Attendance</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a <?php
                    echo (basename($_SERVER['PHP_SELF']) == "?.php") ? "class='active'" : "href='?.php'";
                    ?>>
                        <i class="icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 96 960 960">
                                <path
                                    d="M180 936q-24.75 0-42.375-17.625T120 876V436q0-24.75 17.625-42.375T180 376h180q12.75 0 21.375 8.675 8.625 8.676 8.625 21.5 0 12.825-8.625 21.325T360 436H180v440h600V436H600q-12.75 0-21.375-8.675-8.625-8.676-8.625-21.5 0-12.825 8.625-21.325T600 376h180q24.75 0 42.375 17.625T840 436v440q0 24.75-17.625 42.375T780 936H180Zm330-319 68-68q8.5-9 21.25-9t21.75 9q9 9 9 21.5t-9 21.5L501 712q-9 9-21 9t-21-9L339 592q-9-9-8.5-21.5T340 549q9-9 21.5-9t21.5 9l67 68V126q0-12.75 8.675-21.375Q467.351 96 480.175 96 493 96 501.5 104.625T510 126v491Z" />
                            </svg></i>
                        <span class="text NavText">Resource</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a <?php
                    echo (basename($_SERVER['PHP_SELF']) == "?.php") ? "class='active'" : "href='?.php'";
                    ?>>
                        <i class="icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 96 960 960">
                                <path
                                    d="M400 561.127q-57.749 0-96.438-38.56-38.689-38.561-38.689-96.566 0-57.75 38.689-96.439 38.689-38.688 96.438-38.688t96.438 38.688q38.689 38.689 38.689 96.439 0 58.005-38.689 96.566-38.689 38.56-96.438 38.56ZM131.427 866.408q-13.708 0-22.567-9.035t-8.859-22.247v-48.972q0-31.128 15.667-55.167 15.667-24.038 44.846-37.756 60.256-27.82 116.82-42.448Q333.898 636.155 400 636.155h10.538q5.18 0 10.128.154-4.999 12.256-7.807 23.973-2.808 11.718-4.756 26.128H400q-62.974 0-115.538 13.115t-102.103 38.577q-17.256 8.795-24.679 21.205-7.424 12.411-7.424 26.847v29.999h260.257q3.795 13.743 9.551 26.461 5.756 12.718 13.217 23.794H131.427ZM400 510.872q35.974 0 60.423-24.32 24.449-24.321 24.449-60.551 0-35.975-24.449-60.424-24.449-24.448-60.423-24.448-35.974 0-60.423 24.448-24.449 24.449-24.449 60.424 0 36.23 24.449 60.551 24.449 24.32 60.423 24.32Zm0-84.871Zm10.513 390.152Zm268.597-19.026q31.684 0 53.902-22.38t22.218-53.808q0-31.684-22.252-53.901-22.252-22.218-53.936-22.218-31.427 0-53.773 22.252-22.346 22.251-22.346 53.935 0 31.428 22.38 53.774t53.807 22.346Zm-29.597 44.743q-16.872-4.231-32.872-12.975t-27.795-20.949l-39.051 11.898q-4.752 1.743-9.21-.231-4.458-1.975-6.969-6.795l-9.23-16.358q-3.077-3.769-2.038-8.666 1.038-4.898 4.807-8.333l33-28.539q-4.051-12.974-4.051-29.949 0-16.974 4.051-30.205L527.54 661.46q-3.769-3.435-4.808-8.333-1.038-4.897 2.039-9.051l9.23-16.358q2.51-4.051 6.968-6.025 4.458-1.975 9.211.025l38.666 11.898q11.41-12.462 27.603-21.013 16.192-8.552 33.064-12.782l6.026-44.231q1.266-5.155 5.046-8.488 3.78-3.332 8.979-3.332h19.794q5.639 0 9.422 3.32 3.783 3.321 4.603 8.5l5.897 44.231q16.616 4.23 32.809 12.884 16.192 8.654 27.859 21.065l38.204-12.052q5.026-1.948 9.625.129 4.598 2.076 7.144 6.641l9.487 16.511q2.564 4.026 1.692 8.603-.872 4.576-4.897 8.012l-32.821 29.308q4.308 13.198 4.308 30.189t-4.308 29.811l33.257 28.539q4.153 3.435 4.679 8.525.526 5.09-2.295 9.243l-9.486 16.358q-2.444 4.308-6.802 6.154-4.357 1.846-8.993.103l-38.794-11.898q-12.052 12.205-28.052 20.949-16 8.744-32.616 12.975l-5.897 44.23q-.82 5.179-4.603 8.5-3.783 3.32-9.422 3.32h-19.794q-5.199 0-8.979-3.332-3.78-3.333-5.046-8.488l-6.026-44.23Z" />
                            </svg></i>
                        <span class="text NavText">Profile</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a <?php echo "href='./logout.php?type=$logouttype'" ?>>
                        <i class="icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 96 960 960">
                                <path
                                    d="M640.616 726.409q-7.615-7.908-7.615-18.312 0-10.405 7.615-17.687l79.026-79.282H397.179q-10.698 0-17.913-7.249-7.214-7.25-7.214-18t7.214-17.878q7.215-7.128 17.913-7.128h321.643l-80.077-80.077q-7.026-7.025-7.026-17.152t7.963-18.017q7.246-7.599 17.667-7.599 10.42 0 17.779 7.615l119.019 118.773q5.031 5.021 7.262 10.52 2.23 5.499 2.23 11.692 0 6.193-2.23 11.475-2.231 5.282-7.262 10.323L675.41 727.409q-7.23 6.974-17.204 6.667-9.974-.308-17.59-7.667ZM206.411 936q-25.788 0-44.175-18.388-18.388-18.387-18.388-44.175V298.565q0-25.788 18.388-44.176 18.387-18.388 44.175-18.388h248.616q10.698 0 17.913 7.25 7.214 7.249 7.214 17.999t-7.214 17.878q-7.215 7.128-17.913 7.128H206.411q-4.615 0-8.462 3.847-3.846 3.846-3.846 8.462v574.872q0 4.615 3.846 8.462 3.847 3.846 8.462 3.846h248.616q10.698 0 17.913 7.25 7.214 7.249 7.214 17.999t-7.214 17.878Q465.725 936 455.027 936H206.411Z" />
                            </svg></i>
                        <span class="text NavText">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>