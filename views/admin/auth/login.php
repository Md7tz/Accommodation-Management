<?php include "../../../config/db.php";

session_start();
session_reset();

$email = $password = "";
$emailErr = $passwordErr = "";
$notExist;

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

        // Login admin if exists
        $sql = "SELECT id, email, password, COUNT(*) AS count FROM admins WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
        $admin = mysqli_fetch_assoc($result);

        // Check if Email does not exist
        $notExist = (int)$admin['count'] == 0;

        // Check if password doesn't match
        $hashed_password = $admin['password'];
        if (!empty($hash_password)) {
            $notExist = !password_verify($password, $hashed_password);
        }
        
        if (!$notExist) {
            $_SESSION['admin'] = array(
                'id' => $admin['id'],
                'email' => $admin['email']
            );

            header("location: /" . URL_SUBFOLDER . "/views/index.php");
        }
    }else{

    }
}

?>

<!DOCTYPE html>
<html lang="en">

<?php include "../../../inc/head.php"; ?>

<body>
    <div class="container-fluid bg-white h-100 p-md-5 pt-3 d-flex flex-column align-items-center justify-content-center">
        <?php include "../../../inc/cube.php"; ?>
        <div class="row">
            <div class="col-12">
                <div class="text-center m-b-md custom-login">
                    <img class="" alt="" />
                    <h1>Admin</h1>
                </div>
                <section>
                    <form class="needs-validation" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label class="mb-2">Email Address</label>
                                <!-- <input type="email" class="form-control" name="email" placeholder="Enter your Email Address" required /> -->
                                <input type="email" name="email" class="form-control <?php if ($notExist) echo "is-invalid" ?>" placeholder="Enter your Email Address" required />
                            </div>

                            <div class="col-12 mb-3">
                                <label class="mb-2">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Enter your password" required minlength="6" />
                            </div>

                            <div class="text-center mb-3">
                                <input type="submit" class="btn btn-dark me-3" name="submit" value="Login">
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
    <footer class="row mg-t-15">
        <div class="col-md-12 col-md-12 col-sm-12 col-12 text-center">
            <p>Copyright © 2022 Student Accomodation™ All rights reserved.</p>
        </div>
    </footer>
    </div>
    <?php include '../../../inc/scripts.php' ?>
</body>

</html>