<?php session_start();
include '../../config/db.php';
include '../../config/utils.php';
include '../../config/constants.php';

if (!isset($_SESSION['admin'])) {
    header("location: " . URL_ROOT . '/admin/auth/login.php');
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_GET['user'])) {
    // Users listing
    $query = "SELECT * FROM users";
    $result = $conn->query($query);
} elseif (isset($_GET['add'])) {
    
} else {
    // Application listing
    $query = "SELECT * FROM applications";
    $result = $conn->query($query);
}

if (isset($_GET['user'])) {
    if (isset($_POST['delete'])) {
        $id = (int)$_POST['id'];
        $sql = "DELETE from users WHERE id=$id";
        mysqli_query($conn, $sql);
        header("location: /" . URL_SUBFOLDER . "/views/admin/dashboard.php?user=true");
    }
} elseif (isset($_GET['add'])) {
    $sql = "INSERT INTO";
    print_r($_POST);
    if (isset($_POST['value'])){
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        if ($_POST['value']=="admin"){
            // Check if admin already exists
            $sql = "SELECT COUNT(*) as count FROM admins WHERE admins.email = '$email'" ;
            $result = mysqli_query($conn, $sql);
            $admin = mysqli_fetch_assoc($result);
            if ((int)$admin['count'] == 0) {
                // Create new admin
                $sql = "INSERT INTO admins (email, password) VALUES ( '$email', '$password')";
                $result = mysqli_query($conn, $sql);
            } else {
                // Update admin
                $sql = "UPDATE admins SET email = '$email', password = '$password'";
                $result = mysqli_query($conn, $sql);
        }
        }else{

        }
    }

} else {
    if (isset($_POST['delete'])) {
        $id = (int)$_POST['id'];
        $sql = "DELETE from applications WHERE id=$id";
        mysqli_query($conn, $sql);
        header("location: /" . URL_SUBFOLDER . "/views/admin/dashboard.php?application=true");
    } elseif (isset($_POST['accept'])) {
        $id = (int)$_POST['id'];
        $sql = "UPDATE applications SET status=1 WHERE id=$id";
        mysqli_query($conn, $sql);
        header("location: /" . URL_SUBFOLDER . "/views/admin/dashboard.php?application=true");
    } elseif (isset($_POST['reject'])) {
        $id = (int)$_POST['id'];
        $sql = "UPDATE applications SET status=0 WHERE id=$id";
        mysqli_query($conn, $sql);
        header("location: /" . URL_SUBFOLDER . "/views/admin/dashboard.php?application=true");
    }
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

        <!-- users & application listing -->
        <?php if (isset($_GET['user'])) : ?>
            <?php include '../../inc/users.table.php' ?>
        <?php elseif (isset($_GET['add'])) : ?>    
            <?php include '../../inc/users.form.php' ?>
        <?php else : ?>
            <?php include '../../inc/application.table.php' ?>
        <?php endif; ?>


        <?php include '../../inc/sidebar.php' ?>
        <?php include '../../inc/scripts.php' ?>
</body>

</html>