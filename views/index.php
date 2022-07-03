<?php include '../config/db.php';

// remove all session variables
session_start();
session_reset();

$email = $password = "";
$emailErr = $passwordErr = "";
$exists = false;

if (isset($_POST['submit'])) {
    # Validate Email
    
    if (empty($_POST['email'])) {
        $emailErr = true;
    } else {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    }

    # Validate Password
    if (empty($_POST['password'])) {
        $passwordErr = true;
    } else {
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($emailErr) && empty($passwordErr)) {
        // First user is an Admin
        $sql = "SELECT COUNT(*) as count FROM admins";
        $result = mysqli_query($conn, $sql);
        $admins = mysqli_fetch_assoc($result);


        if ($admins['count'] == 0) {
            // Check if user already exists
            $sql = "SELECT COUNT(*) AS exist FROM admins WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $admin = mysqli_fetch_assoc($result);
            $exists = $admin['exist'] >= 1;

            if (!$exists) {
                // Hash the password
                $password = password_hash($password, PASSWORD_DEFAULT);

                // Create an admin
                $sql = "INSERT INTO admins (email, password) VALUES ('$email', '$password')";
                mysqli_query($conn, $sql);
                header("location: /" . URL_SUBFOLDER . "/views/admin/auth/login.php");
            }
        } else {
            // Check if user already exists
            $sql = "SELECT COUNT(*) AS exist FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_assoc($result);
            $exists = $user['exist'] >= 1;

            if (!$exists) {
                // Hash the password
                $password = password_hash($password, PASSWORD_DEFAULT);

                // Create a user
                $sql = "INSERT INTO users (email, password, role) VALUES ('$email', '$password', 'student')";
                mysqli_query($conn, $sql);
                header("location: /" . URL_SUBFOLDER . "/views/auth/login.php");
            }
        }
    }
}

if (isset($_GET['logout'])) {
    $logout = (bool)filter_input(INPUT_GET, 'logout', FILTER_SANITIZE_URL);
    setcookie('name', '', time() - 86400, '/');
    session_destroy();
    header("location: " . URL_ROOT);
}

?>
<!DOCTYPE html>
<html lang="en">
<?php include '../inc/head.php' ?>

<body class="d-flex text-center text-white">
    <div id="landing-wrapper" class="container-fluid bg-white">
        <?php include '../inc/sidemenu.php' ?>
        <?php include '../inc/header.php' ?>
        <?php include '../inc/hero.php' ?>
        
    </div>
    <?php include '../inc/footer.php' ?>
    <?php include '../inc/scripts.php' ?>
    <script>
        function validatePassword(input) { 
            let pattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
            if(input.value.match(pattern)) { 
                return true;
            } else { 
                alert('Input Password and Submit [8 to 15 characters which contain at least one lowercase letter, one uppercase letter, one numeric digit, and one special character]')
                return false;
            }
        } 
    </script>
</body>
</html>