<?php include "../../config/db.php";

session_start();

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
        // login user if exists
        $sql = "SELECT id, email, role, COUNT(*) AS count FROM users WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_assoc($result);
        $notExist = (int)$user['count'] == 0;
        $_SESSION['user'] = array(
            'id' => $user['id'],
            'email' => $user['email'],
            'role' => $user['role']
        );
        if (!$notExist) header("location: /" . URL_SUBFOLDER . "/views/index.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student login</title>
    <link rel="stylesheet" href="/<?php echo constant('URL_SUBFOLDER') ?>/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="/<?php echo constant('URL_SUBFOLDER') ?>/public/css/main.css">
    <link rel="stylesheet" href="/<?php echo constant('URL_SUBFOLDER') ?>/public/css/cube.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
</head>

<body>
    <div class="container-fluid bg-white h-100 p-md-5 pt-3 d-flex flex-column align-items-center justify-content-center">
        <div class="cube">
            <div class="top"></div>
            <div class="right"></div>
            <div class="bottom"></div>
            <div class="left"></div>
            <div class="front"><img src="/<?php echo constant('URL_SUBFOLDER') ?>/public/img/login.png" width="50"></div>
            <div class="back"><img src="/<?php echo constant('URL_SUBFOLDER') ?>/public/img/login.png" width="50"></div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="text-center m-b-md custom-login">
                    <img class="" alt="" />
                    <h1>Login</h1>
                    <p>Are you a student? Login to find our best deals and manage your dashboard</p>
                </div>
                <section>
                    <form class="needs-validation" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label class="mb-2">Email Address</label>
                                <input type="email" name="email" class="form-control <?php if ($notExist) echo "is-invalid" ?>" placeholder="Enter your Email Address" required />
                                <div class="invalid-feedback">Email or password is incorrect</div>
                            </div>

                            <div class="col-12 mb-3">
                                <label class="mb-2">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Enter your password" required minlength="6" />
                                <!-- <a href="#" class="float-end text-muted">Forgot password?</a> -->
                            </div>

                            <div class="text-center mb-3">
                                <input type="submit" class="btn btn-dark me-3" name="submit" value="Login" />
                                <a id="register-btn" class="btn btn-outline-primary">Register</a>
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
    <script src="/<?php echo constant('URL_SUBFOLDER') ?>/public/js/bootstrap.bundle.min.js"></script>
    <script type="module" src="/<?php echo constant('URL_SUBFOLDER') ?>/public/js/Main.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
</body>

</html>