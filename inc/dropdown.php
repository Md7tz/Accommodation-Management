<ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
    <li><a class="dropdown-item" href="<?php echo constant('URL_ROOT') . "/dashboard.php?profile=" . $_SESSION['user']['id'] ?>">Dashboard</a></li>
    <li><a class="dropdown-item" href="<?php echo "index.php?logout=true"; ?>">Sign out</a></li>
</ul>