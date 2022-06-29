<?php include '../config/db.php'; session_start();

// Redirect to login if not authenticated
if (!isset($_SESSION['user']) || (isset($_SESSION['user']) && $_SESSION['user']['role'] != 'student')) {
    header("location: " . URL_ROOT . '/auth/login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include '../inc/head.php' ?>
<body class="bg-none">
    <div class="area container-fluid px-0 bg-white h-100 fw-bold">
        <header class="row justify-content-end bg-black mx-0">
            <p class="w-fit m-0 p-2">Welcome <span class="text-primary"><?php echo $_SESSION['user']['email'] ?> </span></p>
        </header>
        <?php include '../inc/sidebar.php'?>
        <?php include '../inc/scripts.php' ?>
</body>

</html>