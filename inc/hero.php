<main class="container col-xl-10 col-xxl-8 px-4 py-5 my-3">
    <div class="row align-items-center g-lg-5 py-5">
        <?php if (!isset($_SESSION['user']) && !isset($_SESSION['admin'])) : ?>
            <div class="col-lg-7 text-center text-lg-start">
                <h1 class="display-4 fw-bold lh-1 mb-3">Sign up to find our best deals</h1>
                <p class="col-lg-10 fs-4">Students are able to find luxury and comfort within one place. with our best deals!</p>
            </div>
            <div id="register-form" class="col-md-10 mx-auto col-lg-5 text-dark">
                <form class="p-4 p-md-5 border rounded-3 bg-light" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control <?php if ($exists) echo "is-invalid" ?>" id="floatingInput" placeholder="name@example.com" required>
                        <label for="floatingInput">Email address</label>
                        <div class="invalid-feedback">User already exists</div>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required minlength="6">
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
            </div>
        <?php elseif (isset($_SESSION['admin']) && !isset($_SESSION['user'])) : ?>
            <div class="col-lg-12 text-center text-lg-start">
                <h1 class="display-4 fw-bold lh-1 mb-3">Welcome <span class="text-danger"><?php echo $_SESSION['admin']['email'] ?></span></h1>
            </div>
        <?php elseif (isset($_SESSION['user'])) : ?>
            <div class="col-lg-12 text-center text-lg-start">
                <h1 class="display-4 fw-bold lh-1 mb-3">Welcome <span class="text-danger"><?php echo $_SESSION['user']['email'] ?></span></h1>
                <?php if ($_SESSION['user']['role'] == "student") : ?>
                <div class="d-flex">
                    <h4 class="">Click book now to apply for an <span class="text-success">acommodation request</span></h4>
                    <button class="btn btn-secondary btn-sm mx-3 form-btn">Book now</button>
                </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</main>