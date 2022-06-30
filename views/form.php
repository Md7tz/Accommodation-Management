<?php session_start();
include '../config/db.php';
include '../config/utils.php';

// Redirect to login if not authenticated
if (!isset($_SESSION['user']) || (isset($_SESSION['user']) && $_SESSION['user']['role'] != 'student')) {
    header("location: " . URL_ROOT . '/auth/login.php');
}
?>

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