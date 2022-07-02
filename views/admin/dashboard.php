<?php session_start();
include '../../config/db.php';
include '../../config/utils.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Redirect to login if not authenticated
if (!isset($_SESSION['admin'])) {
    header("location: " . URL_ROOT . '/admin/auth/login.php');
}



?>

<!DOCTYPE html>
<html lang="en">
<?php include '../../inc/head.php' ?>
<body class="bg-none">
    <div class="area container-fluid px-0 bg-white h-100 fw-bold">

        <header class="row justify-content-end bg-black mx-0">
            <p class="w-fit m-0 p-2">Welcome <span class="text-primary"><?php echo $_SESSION['admin']['email'] ?> </span></p>
        </header>


        <?php include $_GET['table']. '.php'?>



        <?php include '../../inc/sidebar.php'?>
        <?php include '../../inc/scripts.php' ?>
</body>

</html>