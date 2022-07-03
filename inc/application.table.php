<h1 id="heading">Applications</h1>
<div class="container">
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']) . "?application=true" ?>" method="POST">
        <table class="table table-hover table-light table-bordered" id="myTable">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Student Name</th>
                    <th scope="col">Rooms</th>
                    <th scope="col">Budget</th>
                    <th scope="col">Stay from</th>
                    <th scope="col">Stay To</th>
                    <th scope="col">Details</th>
                    <th scope="col">Status</th>
                    <?php if (strstr($_SERVER['REQUEST_URI'], "admin") || $_SESSION['user']['role']=="manager") : ?>
                    <th scope="col">Action</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['student_name'] ?></td>
                        <td><?php echo $row['no_of_rooms'] ?></td>
                        <td><?php echo $row['monthly_budget'] ?></td>
                        <td><?php echo $row['stay_from'] ?></td>
                        <td><?php echo $row['stay_to'] ?></td>
                        <td><?php echo $row['details'] ?></td>
                        <td><span class="<?php echo StatusCss[$row['status']] ?>"><?php echo ApplicationStatus[(int)$row['status']] ?></span></td>
                        <?php if (strstr($_SERVER['REQUEST_URI'], "admin") || $_SESSION['user']['role']=="manager") : ?>
                            <td>
                                <div class="btn-group">
                                    <input type="submit" class="fw-bold btn btn-sm btn-outline-danger" name="delete" value="delete">
                                    <input type="submit" class="fw-bold btn btn-sm btn-outline-primary" name="accept" value="accept">
                                    <input type="submit" class="fw-bold btn btn-sm btn-outline-warning" name="reject" value="reject">
                                </div>
                            </td>
                            <input type="hidden" class="btn btn-sm btn-danger" name="id" value="<?php echo $row['id'] ?>">
                        <?php endif; ?>
                    </tr>
                <?php }
                } ?>
            </tbody>
        </table>
    </form>
</div>