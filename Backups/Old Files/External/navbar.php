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
            <div class="text LogoText">
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
                    <a <?php echo (basename($_SERVER['PHP_SELF']) == "AdminDashboard.php") ? "class='active'" : "href='AdminDashboard.php'"; ?>>
                        <i class="icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 96 960 960">
                            <!-- SVG path code -->
                        </svg></i>
                        <span class="text NavText">Dashboard</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a <?php echo (basename($_SERVER['PHP_SELF']) == "Page two.php") ? "class='active'" : "href='Page two.php'"; ?>>
                        <i class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 96 960 960">
                                <!-- SVG path code -->
                            </svg>
                        </i>
                        <span class="text NavText">Trainees</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a <?php echo (basename($_SERVER['PHP_SELF']) == "?.php") ? "class='active'" : "href='?.php'"; ?>>
                        <i class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 96 960 960">
                                <!-- SVG path code -->
                            </svg>
                        </i>
                        <span class="text NavText">Attendance</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a <?php echo (basename($_SERVER['PHP_SELF']) == "?.php") ? "class='active'" : "href='?.php'"; ?>>
                        <i class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 96 960 960">
                                <!-- SVG path code -->
                            </svg>
                        </i>
                        <span class="text NavText">Resource</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a <?php echo (basename($_SERVER['PHP_SELF']) == "?.php") ? "class='active'" : "href='?.php'"; ?>>
                        <i class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg"...
                                <!-- SVG path code -->
                            </svg>
                        </i>
                        <span class="text NavText">...</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
