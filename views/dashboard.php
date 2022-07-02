<?php session_start();
include '../config/db.php';
include '../config/utils.php';
include '../config/constants.php';

// Redirect to login if not authenticated
if (!isset($_SESSION['user'])) {
    header("location: " . URL_ROOT . '/auth/login.php');
}
// Profile handling
if (isset($_GET['profile'])) {
    $sql = "SELECT fname, lname, phoneNo, age, gender, users.email, COUNT(*) as count FROM profiles INNER JOIN users ON users.id=profiles.user_id WHERE profiles.user_id = " . $_SESSION['user']['id'];
    $result = mysqli_query($conn, $sql);
    $profile = mysqli_fetch_assoc($result);
    if (isset($profile['fname'])) {
        setcookie('name', $profile['fname'], time() + (86400 * 30), "/");
    }
}

if (isset($_POST['submit'])) {
    $fname = $lname = $phoneNo = $age = $gender = "";
    
    $fname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lname = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $phoneNo = filter_input(INPUT_POST, 'phoneNo', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $age = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_NUMBER_INT);
    $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
    if (!empty($fname) 
        && !empty($lname) 
        && !empty($phoneNo) 
        && !empty($age) 
        && !empty($gender)) {
        // Check if profile already exists
        $sql = "SELECT COUNT(*) as count FROM profiles WHERE profiles.user_id = " . $_SESSION['user']['id'];
        $result = mysqli_query($conn, $sql);
        $profile = mysqli_fetch_assoc($result);
        if ((int)$profile['count'] == 0) {
            // Create new profile
            $sql = "INSERT INTO profiles (fname, lname, phoneNo, age, gender, user_id) VALUES('$fname', '$lname', '$phoneNo', $age, '$gender', " . (int)$_SESSION['user']['id'] . ')';
            $result = mysqli_query($conn, $sql);
        } else {
            // Update profile
            $sql = "UPDATE profiles SET fname = '$fname', lname = '$lname', phoneNo = '$phoneNo', age = $age, gender = '$gender'";
            $result = mysqli_query($conn, $sql);
        }
        header("location: /" . URL_SUBFOLDER . "/views/dashboard.php?profile=" . $_SESSION['user']['id']);
    }
}

// Application listing
$id = $_SESSION['user']['id'];
$query = "SELECT * FROM applications WHERE user_id = $id";
$result = $conn->query($query);

?>

<!DOCTYPE html>
<html lang="en">
<?php include '../inc/head.php' ?>
<body class="bg-none">
    <div class="area container-fluid px-0 bg-white h-100 fw-bold">
        <header class="row justify-content-end bg-black mx-0">
            <p class="w-fit m-0 p-2">Welcome <span class="text-primary"><?php if(empty($_COOKIE['name'])) echo $_SESSION['user']['email']; else echo $_COOKIE['name']; ?> </span></p>
        </header>

        <?php if (isset($_GET['profile'])) : ?>
            <?php _include('../inc/profile.form.php', $profile)?>
        <?php elseif (isset($_GET['application'])) : ?>
            <?php include('../inc/application.table.php')?>
        <?php endif ?>

        <?php include '../inc/sidebar.php'?>
        <?php include '../inc/scripts.php' ?>
</body>

</html>