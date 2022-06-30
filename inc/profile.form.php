<main class="bg-white">
    <section class="container">
        <div class="py-3">
            <h1>Profile</h1>
        </div>

        <div class="row">
            <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-12"> -->
            <form class="needs-validation py-5" action="<?php echo htmlentities($_SERVER['PHP_SELF'] . "?profile=".$_SESSION['user']['id']); ?>" method="POST">
                <h4 class="mb-3">Student details</h4>
                <div class="row g-3">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" value="<?php if (isset($email)) echo $email ?>" readonly>
                    </div>
                    
                    <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                        <label for="firstName" class="form-label">First name</label>
                        <input name="fname" type="text" class="form-control" id="firstName" value="<?php if (isset($fname)) echo $fname ?>" required>
                        <div class="invalid-feedback">Valid first name is required.</div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                        <label for="lastName" class="form-label">Last name</label>
                        <input name="lname" type="text" class="form-control" id="lastName" value="<?php if (isset($lname)) echo $lname ?>" required>
                        <div class="invalid-feedback">Valid last name is required.</div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                        <label for="phone" class="form-label">Phone number</label>
                        <input name="phoneNo" type="text" class="form-control" id="phoneNo" value="<?php if (isset($phoneNo)) echo $phoneNo ?>" required>
                        <div class="invalid-feedback">Phone number is required.</div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                        <label for="age" class="form-label">Age</label>
                        <input name="age" type="number" class="form-control" id="age" value="<?php if (isset($age)) echo $age ?>" required>
                        <div class="invalid-feedback">Age is required.</div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-select" name="gender" aria-label="Default select example">
                            <option selected=>Select your gender</option>
                            <option value="male" <?php if (isset($gender) && $gender == "male") echo 'selected="selected"' ?>>Male</option>
                            <option value="female" <?php if (isset($gender) && $gender == "female") echo 'selected="selected"' ?>>Female</option>
                        </select>
                        <div class="invalid-feedback">Gender</div>
                    </div>

                    <div class="d-flex col-lg-12 col-md-12 col-sm-12 col-12 align-items-end justify-content-center">
                        <hr class="mt-4">
                        <input class="btn btn-outline-dark w-100" type="submit" name="submit" value="Save">
                    </div>
                </div>

            </form>
            <!-- </div> -->
        </div>
    </section>
</main>