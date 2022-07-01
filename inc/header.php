<header class="row align-items-center justify-content-around <?php if(isset($header_color)) echo $header_color?>">
    <div class="d-flex col" id="brand-container">
        <a id="brand-link" class="d-flex">
            <img id="brand-img" src="/<?php echo constant('URL_SUBFOLDER') ?>/public/svg/house-svgrepo-com.svg" alt="house">
            <h1 id="brand" class="p-2">Student Accomodation</h1>
        </a>
    </div>

    <div class="d-flex col justify-content-end" id="dropdown-container">
        <?php if (isset($_SESSION['user']) || isset($_SESSION['admin'])) include_once '../inc/dropdown.php'?>
        <?php if (!isset($_SESSION['user']))
            echo '<a id="login-btn" class="btn btn-sm btn-outline-light ms-3">Login</a>'
        ?>
    </div>
</header>