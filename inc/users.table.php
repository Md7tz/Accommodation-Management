<h1 id="heading">Users</h1>
<div class="container">
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']) . "?user=true" ?>" method="POST">
        <table class="table table-hover table-light table-bordered" id="myTable">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <tr>
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td><?php echo $row['role'] ?></td>
                            <td>
                                <input type="submit" class="btn btn-sm btn-danger" name="delete" value="delete">
                            </td>
                            <input type="hidden" class="btn btn-sm btn-danger" name="id" value="<?php echo $row['id'] ?>">
                        </tr>
                <?php }
                } ?>
            </tbody>
        </table>
    </form>
</div>