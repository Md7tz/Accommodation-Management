<main class="bg-white">
    <section class="container">
        <div class="py-3 text-center">
            <h2>Student Accommodation Application</h2>
            <img src="/<?php echo constant('URL_SUBFOLDER') ?>/public/svg/student-svgrepo-com.svg" style="width: 50px">
        </div>

        <div class="row">
            <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-12"> -->
            <form class="needs-validation py-5" method="GET">
                <h4 class="mb-3">Student details</h4>
                <div class="row g-3">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <label for="firstName" class="form-label">First name</label>
                        <input name="fname" type="text" class="form-control" id="firstName" value="" required>
                        <div class="invalid-feedback">Valid first name is required.</div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <label for="lastName" class="form-label">Last name</label>
                        <input name="lname" type="text" class="form-control" id="lastName" value="" required>
                        <div class="invalid-feedback">Valid last name is required.</div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <label for="rooms" class="form-label">No. of rooms</label>
                        <select class="form-select" id="rooms" required>
                            <option value="">Choose...</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                        </select>
                        <div class="invalid-feedback">Please provide number of rooms needed.</div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <label for="budget" class="form-label">Monthly Budget</label>
                        <input type="number" class="form-control" id="budget" required>
                        <div class="invalid-feedback">Budget is required.</div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-12 align-items-center">
                        <p>From</p>
                        <input class='form-control' type="date" placeholder='from' name="from" />
                    </div>

                    <div class="col-lg-5 col-md-5 col-sm-5 col-10 align-items-center">
                        <p>To</p>
                        <input class='form-control' type="date" placeholder='to' name="to" />

                    </div>
                    <div class="d-flex col-lg-1 col-md-1 col-sm-1 col-1 align-items-end justify-content-center">
                        <button type="button" class="btn btn-link p-2">
                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14 1.41L12.59 0L7 5.59L1.41 0L0 1.41L5.59 7L0 12.59L1.41 14L7 8.41L12.59 14L14 12.59L8.41 7L14 1.41Z" fill="black" />
                            </svg>
                        </button>
                    </div>
                    <div>
                        <p>Optional details</p>
                        <textarea name="details" class="w-100 p-2" rows="5" placeholder="details"></textarea>
                    </div>

                    <div class="d-flex col-lg-12 col-md-12 col-sm-12 col-12 align-items-end justify-content-center">
                        <hr class="mt-4">
                        <button class="btn btn-outline-dark w-100" type="submit">Submit</button>
                    </div>
                </div>

            </form>
            <!-- </div> -->
        </div>
    </section>
</main>