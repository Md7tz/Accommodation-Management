<?php include '../config/db.php';

// remove all session variables
// session_start();
// session_unset();
// session_destroy();

$email = $password = "";
$emailErr = $passwordErr = "";
$exists = false;

if (isset($_POST['submit'])) {
    # Validate Email
    if(empty($_POST['email'])) {
        $emailErr = true;
    } else {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    }

    # Validate Password
    if(empty($_POST['password'])) {
        $passwordErr = true;
    } else {
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if(empty($emailErr) && empty($passwordErr)) {
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
                // Insert an admin RECORD
                $sql = "INSERT INTO admins (email, password) VALUES ('$email', '$password')";
                mysqli_query($conn, $sql);
                header("location: /" . URL_SUBFOLDER . "/views/admin/login.php");
            }
        } else {
            // Check if user already exists
            $sql = "SELECT COUNT(*) AS exist FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_assoc($result);
            $exists = $user['exist'] >= 1;
            
            if (!$exists) {   
                // INSERT a user RECORD
                $sql = "INSERT INTO users (email, password, role) VALUES ('$email', '$password', 'student')";
                mysqli_query($conn, $sql);
                header("location: /" . URL_SUBFOLDER . "/views/auth/login.php");
            }
        }
    } else {
        // header('location: index.html');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Accomodation</title>
    <link rel="stylesheet" href="/<?php echo constant('URL_SUBFOLDER')?>/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="/<?php echo constant('URL_SUBFOLDER')?>/public/css/main.css">
    <link rel="stylesheet" href="/<?php echo constant('URL_SUBFOLDER')?>/public/css/cookies.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
</head>

<body class="d-flex text-center text-white">
    <div id="landing-wrapper" class="container-fluid bg-white">
        <nav class="side-menu">
            <ul>
                <li><button class="border-0 bg-transparent" href="#register-form">What to do?<span><i class="fa fa-map-marker"></i></span></button></li>
                <li><button class="border-0 bg-transparent" id="form-btn">Accomodation<span><i class="fa fa-bed"></i></span></button></li>
            </ul>
        </nav>
        <header class="row align-items-center justify-content-around"> 
            <div class="d-flex col" id="brand-container">
                <a id="brand-link" class="d-flex">
                    <img id="brand-img" src="/<?php echo constant('URL_SUBFOLDER')?>/public/svg/house-svgrepo-com.svg" alt="house">
                    <h1 id="brand" class="p-2">Student Accomodation</h1>
                </a>
            </div>

            <div class="d-flex col justify-content-end" id="profile-container">
                <div class="flex-shrink-0 dropdown">
                    <a href="#" class="d-block link-white text-decoration-none dropdown-toggle" id="dropdownUser2"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="/<?php echo constant('URL_SUBFOLDER')?>/public/img/profile-icon.png" alt="profile-image" width="32" height="32"
                            class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><a id="dashboard-btn" class="dropdown-item" href="#">Dashboard</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Sign out</a></li>
                    </ul>
                </div>
                <a id="login-btn" class="btn btn-sm btn-outline-light ms-3">Login</a>
            </div>
        </header>
        <main class="container col-xl-10 col-xxl-8 px-4 py-5 my-3">
            <div class="row align-items-center g-lg-5 py-5">
                <div class="col-lg-7 text-center text-lg-start">
                    <h1 class="display-4 fw-bold lh-1 mb-3">Sign up to find our best deals</h1>
                    <p class="col-lg-10 fs-4">Students are able to find luxury and comfort within one place. with our best deals!</p>
                </div>
                <div id="register-form" class="col-md-10 mx-auto col-lg-5 text-dark">
                    <?php if (!isset($_SESSION['user'])) : ?> 
                        <form class="p-4 p-md-5 border rounded-3 bg-light" action="index.php" method="POST">
                            <div class="form-floating mb-3">
                                <input type="email" name="email" class="form-control <?php if($exists) echo "is-invalid"?>" id="floatingInput" placeholder="name@example.com" required>
                                <label for="floatingInput">Email address</label>
                                <div class="invalid-feedback">User already exists</div>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                                <label for="floatingPassword">Password</label>
                            </div>
                            <div class="checkbox mb-3">
                                <label>
                                    <input type="checkbox" value="remember-me"> Remember me
                                </label>
                            </div>
                            <input class="w-100 btn btn-lg btn-primary" type="submit" name="submit" value="Sign up">
                            <hr class="my-4">
                            <small class="text-muted">By clicking Sign up, you agree to the terms of use.</small>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </main>
    </div>
    <footer class="container-fluid text-white-50">
        <div class="col-md-12 col-md-12 col-sm-12 col-12 text-center">
            Copyright &copy; <span class="text-white">2022 Student Accomodation™ All rights reserved.</span>
        </div>
        <div class="container">          
          <div class="pin-title">Cookie Popup</div>
          
          <div class="cookie-popup cookie-popup--short cookie-popup--dark">
            
            <div>
            This website uses cookies to provide you with a great user experience. By using it, you accept our <a>use of cookies</a>
            </div>
            <div class="cookie-popup-actions">
              <button>Okay</button>
            </div>
        
          </div>
          
        </div>
    </footer>
    <script src="/<?php echo constant('URL_SUBFOLDER')?>/public/js/bootstrap.bundle.min.js"></script>
    <script type="module" src="/<?php echo constant('URL_SUBFOLDER')?>/public/js/Main.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
</body>

</html>