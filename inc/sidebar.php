<nav class="main-menu">
    <ul>
        <li class="has-subnav">
            <a href="<?php echo htmlentities($_SERVER['PHP_SELF']) . "?application=" . $_SESSION['user']['id'] ?>">
                <i class="fa fa-list fa-2x"></i>
                <span class="nav-text">
                    Applications
                </span>
            </a>
        </li>
        <li class="has-subnav">
            <a href="<?php echo htmlentities($_SERVER['PHP_SELF']) . "?profile=" . $_SESSION['user']['id'] ?>">
                <i class="fa fa-user fa-2x"></i>
                <span class="nav-text">
                    Profile
                </span>
            </a>
        </li>
    </ul>

    <ul class="logout">
        <li>
            <a href="<?php echo "index.php?logout=true"; ?>">
                <i class="fa fa-power-off fa-2x"></i>
                <span class="nav-text">
                    Sign out
                </span>
            </a>
        </li>
    </ul>
</nav>