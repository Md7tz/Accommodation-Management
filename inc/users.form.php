<h1 id="heading">Add User</h1>
<div class="container">
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']) . "?add=true" ?>" method="POST">
        <!-- type drop down manager/admin -->
        <!-- email & password with encryption -->

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">User Type</label>
            <select name="value" class="form-select" aria-label="Default select example">
                <option selected value="admin">Admin</option>
                <option value="manager">Manager</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label" >Email address</label>
            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>

        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1" required>
        </div>

        <button type="submit" name="add" class="btn btn-primary">Add</button>

    </form>
</div>