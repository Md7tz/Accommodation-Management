<nav class="main-menu">
    <?php if (isset($_SESSION['user'])) : ?>
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
    <?php elseif (isset($_SESSION['admin'])): ?>
        <ul>
            <li class="has-subnav">
                <a href="<?php echo htmlentities($_SERVER['PHP_SELF']) . "?application=true" ?>">
                    <i class="fa fa-list fa-2x"></i>
                    <span class="nav-text">
                        Applications
                    </span>
                </a>
            </li>
            <li class="has-subnav">
                <a href="<?php echo htmlentities($_SERVER['PHP_SELF']) . "?user=true" ?>">
                    <i class="fa fa-users fa-2x"></i>
                    <span class="nav-text">
                        Users
                    </span>
                </a>
            </li>
            <li class="has-subnav">
                <a href="<?php echo htmlentities($_SERVER['PHP_SELF']) . "?add=true" ?>">
                <i class="fa fa-user"></i>
                    <span class="nav-text">
                        Add User
                    </span>
                </a>
            </li>
        </ul>
    <?php endif; ?>

    <ul class="logout">
        <li>
        <a href="<?php echo constant('URL_ROOT') . "/index.php?logout=true"; ?>">
                <i class="fa fa-power-off fa-2x"></i>
                <span class="nav-text">
                    Sign out
                </span>
            </a>
        </li>
    </ul>
</nav>