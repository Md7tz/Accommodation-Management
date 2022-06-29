<?php include '../config/db.php'; session_start();?>
<?php include '../config/utils.php';?>

<!DOCTYPE html>
<html lang="en">
<?php include '../inc/head.php';?>

<body class="bg-none">
    <div class="container-fluid bg-white h-100 fw-bold">
        <?php _include('../inc/header.php', array('header_color' => 'bg-black'))?>
        <?php include '../inc/application.form.php' ?>
        <?php include '../inc/scripts.php' ?>
    </div>
</body>

</html>