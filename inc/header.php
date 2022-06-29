<header class="row align-items-center justify-content-around <?php if(isset($header_color)) echo $header_color?>">
    <div class="d-flex col" id="brand-container">
        <a id="brand-link" class="d-flex">
            <img id="brand-img" src="/<?php echo constant('URL_SUBFOLDER') ?>/public/svg/house-svgrepo-com.svg" alt="house">
            <h1 id="brand" class="p-2">Student Accomodation</h1>
        </a>
    </div>

    <div class="d-flex col justify-content-end" id="dropdown-container">
        <div class="flex-shrink-0 dropdown">
            <a href="#" class="d-block link-white text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="/<?php echo constant('URL_SUBFOLDER') ?>/public/img/profile-icon.png" alt="profile-image" width="32" height="32" class="rounded-circle">
            </a>
            <?php if (isset($_SESSION['user'])) include '../inc/dropdown.php' ?>
        </div>
        <?php if (!isset($_SESSION['user']))
            echo '<a id="login-btn" class="btn btn-sm btn-outline-light ms-3">Login</a>'
        ?>
    </div>
</header>