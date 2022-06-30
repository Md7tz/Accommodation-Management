<div class="flex-shrink-0 dropdown">
    <a href="#" class="d-block link-white text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="/<?php echo constant('URL_SUBFOLDER') ?>/public/img/profile-icon.png" alt="profile-image" width="32" height="32" class="rounded-circle">
    </a>
    <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
        <li><a class="dropdown-item" href="<?php echo constant('URL_ROOT') . "/dashboard.php?profile=" . $_SESSION['user']['id'] ?>">Dashboard</a></li>
        <li><a class="dropdown-item" href="<?php echo "index.php?logout=true"; ?>">Sign out</a></li>
    </ul>
</div>